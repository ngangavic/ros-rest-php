<?php

require("ROS7Rest.php");

$secrets = [
    "username" => "your-username",
    "password" => "your-password",
    "url" => "router-url/rest"
];

$ros7=new ROS7Rest($secrets);

$ros7->path="/interface/print";//REST API url
$ros7->requestData='{".proplist":["name","type"]}';//send post data
$res=$ros7->ros7POST();//post request
$res=$ros7->ros7GET();//get request
$res=$ros7->ros7PUT();//get put request
$res=$ros7->ros7DELETE();//get delete request
$res=$ros7->ros7PATCH();//get patch request