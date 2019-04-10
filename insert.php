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

            //add if statement makng them fill every form
            
            //Table artifact
    $sql1 = "INSERT INTO artifact(Artifact_ID, Artifact_Name, Repository_Name, Location_Found, Supernatural, Material)
    VALUES(NULL,\"" . $_POST["insName"] . "\",\"" . $_POST["insRep"] . "\",\"" . $_POST["insLocation"] . "\"," . $_POST["insSupernatural"] . ",\"" . $_POST["insMaterial"] . "\");";
    mysqli_query($conn,$sql1); 
            
            //table Discovery
    $sql2 = "INSERT INTO discovery(What_Discovered, Where_Discovered, Time_Period, Continent, Latitude, Longitude)
    VALUES(\"" . $_POST["insName"] . "\",\"" . $_POST["insLocation"] . "\",\"" . $_POST["insPeriod"] . "\",\"" . $_POST["insCont"] . "\"," . 30.441900 . "," . 084.298500 . ");";
    mysqli_query($conn,$sql2); 
            
            //table Repository
    $sql3 = "INSERT INTO repository(Repository_Name, Repository_Location, Repository_Type)
    VALUES(\"" . $_POST["insRep"] . "\",\"" . $_POST["insrepLocation"] . "\",\"" . $_POST["insrepType"] . "\");";
    mysqli_query($conn,$sql3); 
            
            //table supernatural
    $sql4 = "INSERT INTO supernatural(Artifact_ID, Cursed, Good_Fortune, Spirited, Sacred)
    VALUES(NULL," . $_POST["insCursed"] . "," . $_POST["insFortune"] . "," . $_POST["insSpirit"] . "," . $_POST["insSacred"] . ");";
    mysqli_query($conn,$sql4); 
            
            //table specialty
    $sql5 = "INSERT INTO specialty(Artifact_ID, Amount, Relocated, Status)
    VALUES(NULL,\"" . $_POST["insAmount"] . "\"," . $_POST["insRelocate"] . ",\"" . $_POST["insStatus"] . "\");";
    mysqli_query($conn,$sql5); 
            
            echo "<br>";
            echo $sql1 . "<br>" . $sql2 . "<br>" . $sql3 .  "<br>" . $sql4 . "<br>" . $sql5 . "<br>";
            echo "Insertion Success";

?>
            
        </div>
    </body>
</html>