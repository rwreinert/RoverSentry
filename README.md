<a href="https://github.com/LPRDev/RoverSentry/blob/master/images/RoverSentry_1.png">
<img src="https://github.com/LPRDev/RoverSentry/blob/master/images/RoverSentry_small.png" align="right">
</a>
# RoverSentry 
An autonomous land based drone utilizing ArduPilot, Dronekit, and RaspberryPi.
----

RoverSentry is a project that transforms a standard RC Car into robotic sentry that will circle a property and take pictures of any suspicious activity it encounters. 
Once programmed with the patrol path the RoverSentry is autonomous and will continue its patrol until the entire patrol path has been traversed. 

# Capabilities
* Web page for setup and mission monitoring
* Utilizes GPS to traverse a property (reqires mission planner - see below)
* Video capture with night vision mode
  * Real time viewing of mission using standard browser
* Heat sensing snapshots
* Support for real time telemetry monitoring (mission planner compatible) built in

# Hardware
Here's a shortened list of the parts needed to recreate this project. See the <a href="https://github.com/LPRDev/RoverSentry/wiki/partsList"> part list page </a>for detials on the individual parts and the <a href=https://github.com/LPRDev/RoverSentry/wiki/RoverLayout> Rover layout page </a>for details o the assembly of the components onto the RC Card frame.
* RC Car
* Raspbery Pi 2
  * Raspberry Pi expansion board
  * Raspicam with night vision LEDs
* APM 2.6 module

The overall cost to reproduce this project from scratch is about $400, < $250 if you have an RC car and RC controller to start with. All of the costs are Hardware related (not including your time). The software is entrirely free!

# Mission Planner 
<a href="https://github.com/LPRDev/RoverSentry/blob/master/images/Mission%20Planner/MissionPlanner_1.jpg">
<img src="https://github.com/LPRDev/RoverSentry/blob/master/images/Mission%20Planner/MissionPlanner_1.jpg" align="right" width="40%"  height="40%" >
</a>
RoverSentry will require a mission planner (e.g. [Mission Planner](http://ardupilot.org/planner/index.html)) to load waypoints for property bounderies. Once the waypoints are loaded and the is autopilot is armed, the Roversentry will start its rounds.

The Rover Sentry also support real time telemtry if a telemetry modem is configured for use. The Mission planner application can be used to monitor the RoverSentry as it traverses the mission waypoint. The Mission planner can also be used to control the mission if desired.

See the <a href="https://github.com/LPRDev/RoverSentry/wiki/Mission-Planner"> Mission Planner wiki page</a> for detials on setup and mission settings.

# Rover Sentry Web App
<a href="https://github.com/LPRDev/RoverSentry/blob/master/images/Webapp/web_app_tablet2.png">
<img src="https://github.com/LPRDev/RoverSentry/blob/master/images/Webapp/web_app_tablet2.png" align="left" width="30%"  height="30%" >
</a>
The RoverSentry web app provides a graphical user interface to view a live video feed from the drone, and give the ability to execute basic functions including photo taking, photo management, and path redirection. The web app provides the following pages:

* Main Page
  * Displays a real time video using the Rovers Sentry video camera
  * Provides easy asccess buttons for basic commands (Start mission, pause, resume, stop, take snapshot, etc.)
  * Links to other pages
* Photo gallery that allows the user to view, sort, and delete photos taken by the drone and snapshots taken by the user. 
* Help page that provides basic help for operation and information on app settings.

See the <a href="https://github.com/LPRDev/RoverSentry/wiki/webappRover"> Sentry web app user guide </a> for detials.

# Open Source APIs utilized 

<H3>Aurdu Pilot</H3> RoverSentry utilizes the [arduroverRS](https://github.com/LPRDev/ardupilotRS) project (a fork of the ardurover projet) but adds a Raspberry Pi for taking video/still picutres and handling sensors (heat, movement, light, etc). 

<H3>Drone Kit</H3> is used to handle the communications between the raspberrypi and the APM 2.0 module. It provides the provides an API that allows the raspberry pi (referred to as a "Companion Computer") to use the mav-link protocol to communicate with the ardupilot software running on the APM 2.6. See the <a href="https://github.com/LPRDev/RoverSentry/wiki/Dronekit"> Dronekit wiki page</a> for details.

<H3>CherryPy</H3> is a minimalist web server written in python. It can be used to provide a simple web page and also supports Rest Calls for each of the methods exposed as a web service. The Rover Sentry CherryPy web page is very primitive so it does not replace the RoverSentry Web app, it complements it. See the <a href="https://github.com/LPRDev/RoverSentry/wiki/CherryPy"> CherryPy web page </a>for details.

# Rover Sentry Wiki

View the [RoverSentry wiki](https://github.com/LPRDev/RoverSentry/wiki) for further detials.
