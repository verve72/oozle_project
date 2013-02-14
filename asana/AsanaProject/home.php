<?php
session_start();
if(isset($_SESSION['userID'])){
?>

<!Doctype html>
<html lang="en">
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="jquery-1.7.2.js"></script>
        <script src="asanaJquery.js"></script>
        
    </head>
    <body>
        <div id="info">
            
            <input type="button" value="Get Projects" id="submitButton" />
            <input type="button" value="Get Project Tasks" id="getProjectTasksButton" />        
            <input type="button" value="Create A New Task" id="createNewTaskButton">
            <input type="button" value="Get User Info" id="getUserInfoButton">
             <input type="button" value="Get All" id="getAllButton">
             <input type="button" value="Create Single Task" id="createSingleTaskButton">
        </div>
        
        <table id="content"></table>
    </body>
</html>

<?php
}
else{
    $url = "empLogin.html";
    header("Location: $url");    
    }
?>