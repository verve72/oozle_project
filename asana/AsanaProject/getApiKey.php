<?php

session_start();
require_once('connect.php'); //connection script

class getApiKey {

    public static function getKey() {

        $userID = $_SESSION['userID'];

        $query = "select apiKey from auth where id='$userID'";

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('couldnt connect to database');

        $results = mysqli_query($dbc, $query) or die('couldnt make query' . mysqli_error($dbc));

        $key = mysqli_fetch_row($results);
        $apiKey = $key[0];
        return $apiKey;
    }
}
?>
