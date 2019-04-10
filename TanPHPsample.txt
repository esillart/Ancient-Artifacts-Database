<!DOCTYPE html>
<html>
    <head>
        <title>Artifacts Database</title>
        <link rel="stylesheet" href="Artifact.css">
    </head>    

    
    <body>
        <script>
            .fade-in {
              animation: fadeIn 1.0s ease forwards;
            }
            
        </script>
        
        <img src="./homeimg.jpg" alt="Artifacts Home" id="banner">

        <div id="whole">
            <nav>
                    <a href="ArtifactHome.html" target="_self">Home</a>
                    <a href="ArtifactLookup.html" target="_self">Artifact Lookup</a>
                    <a href="ArtifactDirectory.html" target="_self">Directory</a>
                    <a href="ArtifactSources.html" target="_self">Sources</a>
            </nav>
            
<?php   
include('sqlconnectEXAMPLE.php');

//set_time_limit(0);
ini_set('memory_limit', '2000000M');
    
//db_connect(); //for the $conn (connection and variable)

    //Next part is grabbing with the post method
            //selecting name, we need to select more, will decide later
    $filtercounter = 0;

            //making 3 seperate strings to hold the SELECT , FROM, and WHERE
    //$select= "";
    //$from = "discovery";
    //$where = "";
    //$sql = "";
            
    $sql = "SELECT artifact.Artifact_Name, artifact.Location_Found, discovery.Time_Period, artifact.Repository_Name, artifact.Material, specialty.Amount, specialty.Status, supernatural.Cursed, supernatural.Good_Fortune, supernatural.Spirited,supernatural.Sacred
    FROM artifact
    JOIN specialty ON artifact.Artifact_ID = specialty.Artifact_ID 
    JOIN discovery ON artifact.Artifact_Name = discovery.What_Discovered 
    JOIN supernatural ON artifact.Artifact_ID = supernatural.Artifact_ID 
    JOIN repository ON repository.Repository_Name = artifact.Repository_Name 

    WHERE ";
            //from here we add on the form information to the sql string before we send it in.
            
        if($_POST["AName"] != "")  //looking up arifact name
        {
            //$select .= "artifact.Artifact_Name";
            $sql .= "artifact.Artifact_Name = \"" .$_POST['AName'] . "\"";
            $filtercounter++;
        }
        if($_POST["Continent"] != "Select") //CONTINENT
        {
            if($filtercounter > 0)  //adds an AND if needed
            {
                $sql .=" AND ";
            }
            //$select .= "discovery.Continent";
            $sql .= "discovery.Continent = \"" . $_POST['Continent'] . "\"";
            $filtercounter++;
        }
        if($_POST["CName"] != "")       //-----COUNTRY------
        {
            if($filtercounter > 0)
            {
                $sql .=" AND ";
            }
            $sql .= "discovery.Where_Discovered = \"" . $_POST["CName"] . "\"";  //where_discovered is just country
            $filtercounter++;
        }
        if($_POST["APeriod"] != "Select")     //-----TIME PERIOD-----
        {
            if($filtercounter > 0)
            {
                $sql .=" AND ";
            }
            $sql .= "discovery.Time_Period = \"" . $_POST["APeriod"] . "\"";
            $filtercounter++;
        }
        if($_POST["RType"] != "Select")          //-----REPOSITORY TYPE-----
        {
            if($filtercounter > 0)
            {
                $sql .=" AND ";
            }
            $sql .= "repository.Repository_Type = \"" . $_POST["RType"] . "\"";
            $filtercounter++;
        }
        if($_POST["Material"] != "Select")        //-----MATERIAL-----
        {
            if($filtercounter > 0)
            {
                $sql .=" AND ";
            }
            $sql .= "artifact.Material = \"" . $_POST["Material"] . "\"";
            $filtercounter++;
        }
        if(isset($_POST["Specialty"]))       //-----SPECIALTY-----
        {
            if($filtercounter > 0)
            {
                $sql .=" AND ";
            }
            $sql .= "specialty.Status = \"" . $_POST["Specialty"] . "\"";
            $filtercounter++;
        }
        if(isset($_POST["Supernatural"]))    //-----SUPERNATURAL------
        {
            if($filtercounter > 0)
            {
                $sql .=" AND ";
            }
            $sql .= "artifact.Supernatural = " . $_POST["Supernatural"];
            $filtercounter++;
        }
    //$sql = "SELECT " . $select . " FROM " . $from . " WHERE " . $where;
    echo $sql;
    $result = $conn->query($sql);
    //$result = mysqli_query($conn,$sql);

            if(!$result)
            {
                trigger_error("WRONG Q: " . $conn->error);
            }
            
    if ($result->num_rows > 0) {
        // output data of each row
        //if($_POST["AName"] == "hi" )
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "Name: " . $row["Artifact_Name"] . " -  Location Found: " . $row["Location_Found"] . " - Archaic Period: ". $row["Time_Period"] . " - Repository: ". $row["Repository_Name"] . "<br>" . "Material: " . $row["Material"] . " - Status/Amount: " . $row["Amount"] . "/" . $row["Status"] . " - Cursed/Good Fortune/Spirited/Sacred: " . $row["Cursed"] . "/" . $row["Good_Fortune"] . "/" . $row["Spirited"] . "/" . $row["Sacred"] . "---<br>"; 
            //echo "continent: " . $row["Continent"];
            /*echo "id: " . $row["artifact.Artifact_ID"]. " - Name: " . $row["artifact.Artifact_Name"] . " -  Location Found: " . $row["artifact.Location_Found"] . " - Archaic Period: ". $row["discovery.Time_Period"] . " - Repository: ". $row["artifact.Repository_Name"] . "<br>" . "Material: " . $row["artifact.Material"] . " - Status/Amount: " . $row["specialty.Amount"] . "/" . $row["specialty.Status"] . " - Cursed/Good Fortune/Spirited/Sacred: " . $row["supernatural.Cursed"] . "/" . $row["supernatural.Good_Fortune"] . "/" . $row["supernatural.Spirited"] . "/" . $row["supernatural.Sacred"] . "<br>"; */
                                        //shows id, name and location of artifact
                                        //I want to show more, need attribute names
            echo "</li>";
        }
    } else {
         echo "0 results";
    }
            echo "</ul>";
            
    $conn->close();

?>
        
        </div>
    </body>
</html>