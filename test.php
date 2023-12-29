<?php

require("ROS7Rest.php");

$secrets = [
    "username" => "",
    "password" => "",
    "url" => ""
];

$ros7 = new ROS7Rest($secrets);
$ros7->path = "/interface/monitor-traffic";
// $ros7->path="/interface/print";
// $ros7->requestData='{".proplist":"name,type"}';
// $ros7->requestData='{".query":["interface=SFP+1","type=vlan"]}';
// $ros7->requestData='{"interface":"SFP+1","duration":"1s"}';
$ros7->requestData = '{"interface":"<pppoe-testing2>","duration":"1s"}';
// json_encode(array("interface"=>"SFP+1","duration"=>"2s"));

$res = $ros7->ros7POST();
// echo $res;
$data = json_decode($res);
$graphData = array();
foreach ($data as $key => $item) {
    // print_r($item->name . ' Upload ' . bytesToMbps($item->{'rx-bits-per-second'}) . ' Download ' . bytesToMbps($item->{'tx-bits-per-second'}) . '</br>');
    array_push($graphData, (["name" => $item->name, "upload" => bytesToMbps($item->{'rx-bits-per-second'}), "download" => bytesToMbps($item->{'tx-bits-per-second'})]));
    // break;
}

echo json_encode($graphData);



function bytesToMbps($bytes)
{
    return sprintf("%.0f", $bytes / 1024 / 1024); // Mega bytes per second

}
