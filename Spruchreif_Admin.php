<?php

    include ('ZentralPHP.inc');
    include ('Passwortschutz.inc');
    
    if(isset($_GET['delete-id'])){
                $sqlStmt = "DELETE FROM `phrases` WHERE `phrases`.`id` = " . $_GET['delete-id'];
                $result = $con->query($sqlStmt);            
    
                $deleteCount = 0; 
                if ($con->affected_rows == 0){
                    header('Location: Spruchreif_Admin.php?password=GEHEIM');
                    die;
                }
                else {
                    $deleteCount = $con->affected_rows; 
                    $msg = "ID " . $deleteCount . " has been deleated.";
                    echo '<script language="javascript">';
                    echo 'alert("The Phrase has vanished into the void!")';
                    echo '</script>';
                }                
            }

?>

<!DOCTYPE html>
<html lang="en">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Spruchreif creates a List of Sentences.">
    <meta name="author" content="Chris Fischer">
    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<head></head>     
<title>Spruchreif</title>
    
<body>
    
    <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="Spruchreif_Index.php">Spruchreif</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="Spruchreif_Index.php">Home
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="Spruchreif_Admin.php?password=GEHEIM">Admin</a>
            <span class="sr-only">(current)</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Spruchreif_Contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- Page Content -->
  <div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <ul class="list-unstyled">
                <li>
                    <h1>Area AdminOne</h1> 
                    <br>
                </li>
                <li>   
                        <?php
                            if(!$con){
                            echo "We can't load the phrases because there is no connection to the database.";
                        }
                        else {
                            echo "<h4>These phrases are saved in the database of Spruchreif: </h4>\n";
                            $stmt = "SELECT * FROM `phrases`";
                            $res = mysqli_query($con, $stmt);

                            if(!$res){
                              echo "None";
                            }
                            else {
                              echo "<table border>";
                              echo "<td width= 2%>ID</td>";
                              echo "<td bgcolor= lightgrey . width= 10%>Phrase</td>";
                              echo "<td width= 2%>Name</td>";
                              echo "<td bgcolor= lightgrey . width= 2%>Mail</td>";
                              while ($row = mysqli_fetch_row($res)){
                              echo "<tr>";
                              echo "<td>" . $row[0] . "</td>";
                              echo "<td bgcolor= lightgrey>" . $row[1] . "</td>";
                              echo "<td>" . $row[2] . "</td>";
                              echo "<td bgcolor= lightgrey>" . $row[3] . "</td>";
                              echo "<td width= 1%><a href='Spruchreif_Edit.php?edit-id=" . $row[0] . "'>edit</a></td>"; 
                              echo "<td bgcolor= lightgrey width= 2%>
                              <a onClick=\"script: return confirm('Are you sure you want to delete the phrase?');\" href='?delete-id=".$row[0]."&password=GEHEIM'>delete</a></td>";    
                              echo "</tr>";
                              }
                              echo "</table>";
                              }}
                                
                        ?>
                </li>
            </ul>
        </div>
      </div>
    </div>

    
        <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
    
<footer>
    
</footer>
    
</html>