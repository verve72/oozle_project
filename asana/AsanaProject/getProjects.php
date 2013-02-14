<?php

session_start();

if (isset($_SESSION['userID'])) {

    require_once("asana.php");
    require_once("getApiKey.php");

    $key = getApiKey::getKey($_SESSION['userID']); //get API Key  
     
    // See class comments and Asana API for full info    
    $asana = new Asana($key);
    $result = $asana->getProjects();
 
// As Asana API documentation says, when response is successful, we receive a 200 in response so...
    if ($asana->responseCode == "200" && !is_null($result)) {
        
        echo $result;
        
        /* $resultJson = json_decode($result);               

          // $resultJson contains an object in json with all projects
          foreach($resultJson->data as $project){
          echo "Project ID: {$project->id} is {$project->name}<br>";
          }
          } */
        
    } else {
        echo '<h1>' . $asana->responseCode . '</h1>';
    }
} else {
    header("HTTP/1.0 403 Forbidden");
}