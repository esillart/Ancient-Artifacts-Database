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
    echo "connected";

    $sql1 = "DELETE FROM artifact 
    WHERE Artifact_Name = \"" . $_POST["deleteArt"] . "\"";
    mysqli_query($conn,$sql1);
            echo "Deletion Success";
            
    $sql1 = "DELETE FROM discovery 
    WHHERE What_Discovered = \"" . $_POST["deleteArt"] . "\"";
    mysqli_query($conn,$sql1);
            echo "Deletion Success";
            
    $sql1 = "DELETE FROM specialty JOIN artifact ON artifact.Artifact_ID = specialty.Artifact_ID 
    WHERE artifact.Artifact_Name = \"" . $_POST["deleteArt"] . "\"";
    mysqli_query($conn,$sql1);
            echo "Deletion Success";
    $sql1 = "DELETE FROM supernatural JOIN artifact ON artifact.Artifact_ID = supernatural.Artifact_ID
    WHERE artifact.Artifact_Name = \"" . $_POST["deleteArt"] . "\"";
    mysqli_query($conn,$sql1);
            echo "Deletion Success";
?>
            
            
        </div>
    </body>
</html>