<?php

session_start();

if(isset($_SESSION['userID'])){
require_once("asana.php");
require_once("asana.php");
    require_once("getApiKey.php");

    $key = getApiKey::getKey($_SESSION['userID']); //get API Key  
     
    // See class comments and Asana API for full info    
    $asana = new Asana($key);

// See class comments and Asana API for full info

//$asana = new Asana("QNyYOUi.VD2XA4kGCLGGGwRmo7DUCOBr"); // Your API Key, you can get it in Asana

$workspaceId = "3742864822728"; // The workspace where we want to create our task, take a look at getWorkspaces() method.

// First we create the task
$result = $asana->createTask(array(
	"workspace" => $workspaceId, // Workspace ID
	"name" => "Hello World!", // Name of task
	"assignee" => "2999019649930" // Assign task to...
));

// As Asana API documentation says, when a task is created, 201 response code is sent back so...
if($asana->responseCode == "201" && !is_null($result)){
    
    echo $result;
	//$resultJson = json_decode($result);

	//$taskId = $resultJson->data->id; // Here we have the id of the task that have been created
	
} else {
	echo "Error while trying to connect to Asana, response code: {$asana->responseCode}";
}
}