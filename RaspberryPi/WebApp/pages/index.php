<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web App for RoverSentry.">
    <meta name="author" content="Robert Reinert">

    <title> RoverSentry Web App </title>

    <!-- Tab Icon: -->
    <LINK REL="SHORTCUT ICON" HREF="http://nuc2.home/Rdev/RoverSentry/uploads/73a331a2d6a51225c5cb9c91397fd2ff/TurnigyBuggy.jpg" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../source/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <!-- Basic CSS Styling: -->
    <link rel="stylesheet" href="../style/app_STYLE.css">
    <!-- Include JQUERY CDN: -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript: -->
    <script src="../source/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".control_board").hide();

            //If desktop, center the video feed.
            if (screen.width > 660) {
                $("#video_stream").attr("style", "width: 660px; height: 500px;")
            }

            // Code for hiding the control board.
            $("#hide_controls").click(function() {
                $(".control_board").toggle(900);
            });

            // Take a photo.
            $("#snapshot").click(function() {
                //Exec call here.
                //window.alert("Photo will be taken.");
                window.location.href = "../scripts/snapshot.php";
            });

            //Record a video.
            $("#video").click(function() {
                window.alert("Record Video! Coming Soon!");
            });

            // Restart Drivers.
            $("#restart").click(function() {
                var r = confirm("Are you sure you want to restart drivers?");

                //Yes/no box, true = yes.
                if (r == true)
                    window.location.href = "../scripts/restart_drivers.php";
            });

            // APM Pause/Resume toggle.
            $("#pilot_toggle").click(function() {
                window.location.href = "../scripts/pause_resume.php";
            });

            // Toggle the auto snapshot python process.
            $("#photo_toggle").click(function() {
                window.location.href = "../scripts/toggle_autophoto.php";
            });

        });

    </script>

</head>

<body>

    <div class="cont">

        <div id="menutop">
            <!-- PHP Script: -->
            <?php include 'menu_bar.html'; ?>
        </div>

        <div class="box">
            <h1>Live Feed:</h1>
        </div>

        <div id="video_stream" class="centerize" style="width:100%; height:500px;" width=100% min-width="320" min-height="240" ;>
            <iframe id="camera_stream" class="centerize" src="http://raspberrypi.home:8080/stream" style="border:none;" scrolling="yes" seamless sandbox width=100% height=100%>
            </iframe>
        </div>

        <div class="button_board">
            <div class="btn-group btn-group-lg">
                <button type="button" class="btn btn-primary" id="snapshot">Take Snapshot </button>
                <button type="button" class="btn btn-primary" id="video">Record Video </button>
                <button type="button" class="btn btn-primary" id="hide_controls">Cam Options</button>
                <button type="button" class="btn btn-primary" id="restart">Restart UV4L </button>
            </div>
        </div>

        <div class="control_board white">
            <iframe id="controls" src="http://raspberrypi.home:8080/panel" width=99% height=400> </iframe>
        </div>

        <div class="button_board">
            <p>Coming soon... More controls go here...</p>
            <button type="button" id="pilot_toggle"> Pause/Resume </button>
            <?php
                
                // Open the file for reading.
                $toggle = fopen("/usr/share/RoverSentry/PIR/pir_sensor_auto.txt","r") or die("Unable to open file!");
                $data= fread($toggle, filesize("/usr/share/RoverSentry/PIR/pir_sensor_auto.txt"));
                    
                // If the auto PIR is on, make the button green and on.
                if($data == "ON") {
                    echo '<button style="color: green;" type="button" id="photo_toggle"> Auto-Photo: ON </button>';
                } else {
                    echo '<button style="color: red;" type="button" id="photo_toggle"> Auto-Photo: OFF </button>';
                }
            
                //Close the toggle file.
                fclose($toggle);
            
                
            ?>
                
        </div>


    </div>

    <div class="footer">
        <?php include 'footer.html'; ?>
    </div>


</body>

</html>
