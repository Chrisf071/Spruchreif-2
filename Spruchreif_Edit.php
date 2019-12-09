<?php

    include ('ZentralPHP.inc');

// Bei Bestätigung des Buttons soll das ausgeführt werden.
    if(isset($_GET['save'])){
        if(!$con){
            echo "Es besteht keine Verbindung zur Datenbank.";
        }
        $phraseNew = $_GET['phrase_new'];
        $mailNew = $_GET['mail_new'];
        $sql = "UPDATE `phrases` SET `phrase` = '" . $phraseNew . "', `mail`='" .$mailNew . "'  WHERE `phrases`.`id` = " . $_GET['edit-id'] . ";";
        mysqli_query($con, $sql);   
        
        echo '<script language="javascript">';
        echo 'alert("The Phrase has been edited!")';
        echo '</script>'; 
    }

// Abfrage ob edit-id mit übertragen wurde.
    if (!isset($_GET['edit-id'])){
                die("Edit-Id missing!");
            }
    else {
        $editId = $_GET['edit-id'];
    }

// vorhandenen Spruch herholen um diesen dann in die Textarea zu schreiben.
    $sqlStmt = "SELECT * FROM `phrases` WHERE `phrases`.`id` = " . $editId;
    $result = $con->query($sqlStmt);
    $row = mysqli_fetch_row($result); 
    $currentPhrase = $row[1];
    $currentMail = $row[3];  
        
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
                    <br><br>
                </li>
                
                <li>
                        <?php
                          if(!$con){
                            echo "We can't load the phrases because there is no connection to the database.";
                        }
                        else {
                            echo "<h4>This is the Phrase you are editing: </h4>\n";
                            $stmt = "SELECT * FROM `phrases` WHERE `id` = " . $_GET['edit-id'];
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
                              echo "</tr>";
                              }
                              echo "</table>";
                              }}    
                        ?>
                    <br>
                <li>
                    <form action="Spruchreif_Edit.php" method ="get">
                        
                        <div>
                            <p>Edit Phrase here: </p>
                            
                            <textarea type="text" name="phrase_new" cols="40" rows="4"><?php echo $currentPhrase ?>
                            </textarea>
                            
                            <br><br>
                            
                            <p>Edit E-Mail here: </p>
                            
                            <input type="email" name="mail_new" size="38" value="<?php echo $currentMail ?>">
                            
                            <input type="hidden" name="edit-id" value="<?php echo $_GET['edit-id']?>" >
                            
                            <br><br>
                            
                            <button type="submit" name="save" value="1">
                                Submit edit
                            </button>
                            
                        </div>
                    </form>
                    <br>
                    
                    <button onclick="window.location.href = 'Spruchreif_Admin.php?password=GEHEIM';">
                                Cancel edit
                    </button>
                    <br><br>
                    
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