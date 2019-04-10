<?php
    //include('sqlconnectEXAMPLE.php');
function insert() {
    $ser="localhost";
    $user="root";
    $pass="";
    $db="artifactdatabase";

    $conn = mysqli_connect($ser, $user, $pass, $db) or die("Connection Failed");

    mysqli_select_db($conn,"$db");

    $sql = "SELECT Artifact_Name FROM artifact";
    $result = mysqli_query($conn,$sql);

    while($row = $result->fetch_assoc()) 
    {
        echo "<option value=\"" . $row["Artifact_Name"] . "\">" . $row["Artifact_Name"] . "</option>";
    }
}
?>