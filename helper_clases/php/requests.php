<?php
include_once('CCapi.php'); 

print_r("Evalutions of user :</br></br>");
print_r("url :  ".$config['host']."/api/evaluation/ </br></br>");
//get user evaluations
$response = requestCC($config['host'].'/api/evaluation/', "get");

echo $response;

print_r("</br></br>Surveys of first evalution of user :</br></br>");
print_r("url :  ".$config['host']."/api/survey/?evaluation_id=75 </br></br>");

$response = requestCC($config['host'].'/api/survey/', "get", ["evaluation_id"=>75]);

echo $response;

print_r("</br></br> Survey responses survey :</br></br>");
print_r("url :  ".$config['host']."/api/surveyresponse/?survey_id=107 </br></br>");

$response = requestCC($config['host'].'/api/surveyresponse/', "get", ["survey_id"=>107]);

echo $response;

print_r("</br></br>Question responses of survey response 4332 :</br></br>");
print_r("url :  ".$config['host']."/api/questionresponse/?survey_response_id=4332 </br></br>");

$response = requestCC($config['host'].'/api/questionresponse/', "get", ["survey_response_id"=>4332]);

echo $response;
?>
