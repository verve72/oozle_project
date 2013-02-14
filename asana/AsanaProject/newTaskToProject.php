<?php

session_start();

if(isset($_SESSION['userID'])){
    
require_once("asana.php"); require_once("getApiKey.php");
require_once("getApiKey.php");

    $key = getApiKey::getKey($_SESSION['userID']); //get API Key  
     
    // See class comments and Asana API for full info    
    $asana = new Asana($key);
    
// See class comments and Asana API for full info
//$asana = new Asana("QNyYOUi.VD2XA4kGCLGGGwRmo7DUCOBr"); // Your API Key, you can get it in Asana

$workspaceId = "3742864822728"; // The workspace where we want to create our task
$projectId = "3773226484757"; // The project where we want to save our task
$email = "jpolalcsw@gmail.com";

// First we create the task
$result = $asana->createTask(array(
	"workspace" => $workspaceId, // Workspace ID	
	"assignee" => $email,
	"name" => "Another Vacation", // Name of task
        "notes" => "Go to someplace warm, immediately!",
        "due_on" => "2013-02-27"
	
));

// As Asana API documentation says, when a task is created, 201 response code is sent back so...

if($asana->responseCode == "201" && !is_null($result)){
        echo $result;
	$resultJson = json_decode($result);
	$taskId = $resultJson->data->id; // Here we have the id of the task that have been create   

	// Now we do another request to add the task to a project
	$result = $asana->addProjectToTask($taskId, $projectId);
        
       
if($asana->responseCode != "200"){
		echo "Error while assigning project to task: {$asana->responseCode}";
	
	}

} else {
	echo "Error while trying to connect to Asana, response code: {$asana->responseCode}";	
}
}

else {
    header("HTTP/1.0 403 Forbidden");
}