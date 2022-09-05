## ros-rest-php
RouterOS 7 (REST API) example in PHP
## Requirements
Lamp server
Mikrotik router running [RouterOS 7](https://mikrotik.com/download)
Enable www-ssl service  and install [CA certificate](https://www.youtube.com/watch?v=ae6yHdONfiM)
## Setup
Clone [ros-rest-php](https://github.com/ngangavic/ros-rest-php) repo
```git clone https://github.com/ngangavic/ros-rest-php.git```
## Configuration
Set your router username, password and url in ```exec.php```.
```
$secrets = [
"username" => "your-username",
"password" => "your-password",
"url" => "router-url/rest"
];
```
## Functions
Initialize the class
```
$ros7=new  ROS7Rest($secrets);
```
Pass the command path
```
$ros7->path="/interface/print";//REST API url
```
Pass the POST data
```
$ros7->requestData='{".proplist":["name","type"]}';//send post data
```
Make requests(Responses are in JSON format)
```
$res=$ros7->ros7POST();//post request

$res=$ros7->ros7GET();//get request

$res=$ros7->ros7PUT();//get put request

$res=$ros7->ros7DELETE();//get delete request

$res=$ros7->ros7PATCH();//get patch request
```

# Read more 
https://help.mikrotik.com/docs/display/ROS/REST+API

https://help.mikrotik.com/docs/display/ROS/API
