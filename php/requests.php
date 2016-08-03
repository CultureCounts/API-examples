<?php
include_once('CCapi.php'); 


print_r("Evalutions of user :</br></br>");
print_r("url :  http://localhost:8000/api/evaluation/ </br></br>");
//get user evaluations
$response = requestCC('http://localhost:8000/api/evaluation/', "get");

echo $response;

print_r("</br></br>Surveys of first evalution of user :</br></br>");
print_r("url :  http://localhost:8000/api/survey/?evaluation_id=75 </br></br>");

$response = requestCC('http://localhost:8000/api/survey/', "get", ["evaluation_id"=>75]);

echo $response;

print_r("</br></br> Survey responses survey :</br></br>");
print_r("url :  http://localhost:8000/api/surveyresponse/?survey_id=107 </br></br>");

$response = requestCC('http://localhost:8000/api/surveyresponse/', "get", ["survey_id"=>107]);

echo $response;

print_r("</br></br>Question responses of survey response 4332 :</br></br>");
print_r("url :  http://localhost:8000/api/questionresponse/?survey_response_id=4332 </br></br>");

$response = requestCC('http://localhost:8000/api/questionresponse/', "get", ["survey_response_id"=>4332]);

echo $response;
?>
