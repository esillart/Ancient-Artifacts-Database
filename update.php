<!DOCTYPE html>
<html>
    <head>
        <title>Artifacts Database</title>
        <link rel="stylesheet" href="Artifact.css">
        <script src="dropdowninsert.php"></script>
    </head>
    
    <body>
        <div id="whole"><!-- This div is for the entire main page, everything is containted in this -->
            
            <img src="./homeimg.jpg" alt="Artifacts Home" width=100%> <!--Placeholder header image-->
            
            <nav> <!-- Menu Container -->
                
                    <a href="ArtifactHome.html" target="_self">Home</a>
                    <a href="ArtifactLookup.html" target="_self">Artifact Lookup</a>
                    <a href="ArtifactDirectory.html" target="_self">Directory</a>
                    <a href="ArtifactSources.html" target="_self">Sources</a>
            </nav>

<?php
    include('sqlconnectEXAMPLE.php');

            if(($_POST["insertArt"] != "") and ($_POST["insertLocation"] != "") and $_POST["insertRepType"] != "Select")
            {
            
if($_POST["insertArt"] != "")
{
    $sql1 = "UPDATE artifact 
    SET Repository_Name = \"" . $_POST["insertRepository"] . "\" WHERE Artifact_Name = \"" . $_POST["insertArt"] . "\";";/* . "IF NOT EXISTS(SELECT 1 FROM repository WHERE Repository_Name = \"". $_POST["insertRepository"] . "\")
        INSERT INTO repository (\"Repository_Name\") 
        VALUES (\"" . $_POST["insertRepository"] . "\")";*/
    //$result = mysqli_query($conn,$sql);
    mysqli_query($conn,$sql1);
    echo $sql1;
    echo "change success";
}


if($_POST["insertLocation"] != "")
{
    $sql2 = "UPDATE repository
    SET Repository_Location = \"" . $_POST["insertLocation"] . "\" WHERE Repository_Name = \"" . $_POST["insertRepository"];
    mysqli_query($conn,$sql2);
}
            
if($_POST["insertRepType"] != "Select")
{
    $sql3 = "UPDATE repository
    SET Repository_Type = \"" . $_POST["insertRepType"] . "\" WHERE Repository_Name = \"" . $_POST["insertRepository"];
    mysqli_query($conn,$sql3);
}
           // echo "update successful";
            }
            else
            {
            echo "Must input all fields";
            }
            ?>
            
        </div>
    </body>
</html>
