<?php

session_start();

if(isset($_SESSION['userID'])){

require_once("asana.php");
require_once("getApiKey.php");

 $key = getApiKey::getKey($_SESSION['userID']); //get API Key 
// See class comments and Asana API for full info

$asana = new Asana($key); // Your API Key, you can get it in Asana
$projectId = '3773226484757'; // Your Project ID Key, you can get it in Asana
$project = $asana->getProjectTasks($projectId);

// As Asana API documentation says, when response is successful, we receive a 200 in response so...
if($asana->responseCode == "200" && !is_null($project)){
    
    echo $project;
	//$resultJson = json_decode($project);
   /* foreach ($resultJson->data as $project){
				echo "<strong> " . $project->name . " (id " . $project->id . ")" . " </strong><br>";
				
				// Get all tasks in the current project
				$tasks = $asana->getProjectTasks($project->id);
				$tasksJson = json_decode($tasks);
				if($asana->responseCode == "200" && !is_null($tasks)){
					foreach ($tasksJson->data as $task){
						echo "+ " . $task->name . " (id " . $task->id . ")" . " <br>";
					}
				} else {
					//echo "Error while trying to connect to Asana, response code: {$asana->responseCode}";
				}				
			}
	

} else {
	//echo "Error while trying to connect to Asana, response code: {$asana->responseCode}";
}*/
}
}
else {
    header("HTTP/1.0 403 Forbidden");
}