<?php
    
    define ('host', 'localhost');
    define ('user', 'root');
    define ('pass', '');
    define ('db', 'Spruchreif'); 
    $con = mysqli_connect (host, user, pass, db);

    if(isset($_GET["save"])){
        if(!$con)
        {echo "Es besteht keine Verbindung zur Datenbank.";}
        else
        {echo "Es besteht eine Verbindung zur Datenbank von Spruchreif.";}
        
        $date = date('l jS \of F Y');
        $name = $_GET["name"];
        $phrase = $_GET["name"] . " went with " . $_GET["phrase_01"] . " " . $_GET["phrase_02"] . " to the cinema on " . $date . "\n";
        $mail = $_GET['mail'];
        
        $sql = 
        "INSERT INTO phrases (phrase, recipient, mail) 
        VALUES ('$phrase', '$name', '$mail')";
        
        mysqli_query($con, $sql); 
        
        header('Location: '.$_SERVER['PHP_SELF']);
        die;
    }
   
?>

<!DOCTYPE html>
<html lang="en">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Spruchreif creates a List of Sentences.">
    <meta name="author" content="Chris Fischer">
    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
<title>Spruchreif</title>
    
<body>
    
    <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Spruchreif</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Spruchreif_Index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Spruchreif_About.php">About</a>
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
            <h1 class="mt-5">We can save sentences you create!</h1>
            <p class="lead">Herefore please insert your name, mail and choose your words.</p>
            <ul class="list-unstyled">
                <li>
                    <!--Aufbau Informationsangaben (Textfelder) -->
                    <form action="Spruchreif_Index.php" method ="get"> 
                        <div class="Textfelder">
                            <p>Name: </p> 
                            <input type="text" name="name" required placeholder="Insert your name">
                            <br><br>
                            <p>E-Mail: </p>
                            <input type="email" name="mail" required placeholder="Insert YourMail@mail.de">
                            <br><br>
                        </div>

                    <!--Aufbau Informationsangaben (Komboboxen) -->               
                        <div> 
                            <select class="custom-select" name="phrase_01">
                                <option value="absolut" Selected>Please choose a adjective</option>
                                <option value="wonderfull">wonderfull</option>
                                <option value="nice">nice</option>
                                <option value="hatefull">hatefull</option>
                            </select>
                            <br><br>
                            <select class="custom-select" name="phrase_02">
                                <option value="nobody" Selected>Please choose a noun</option>
                                <option value="mice">mice</option>
                                <option value="students">students</option>
                                <option value="murderers">murderers</option>
                            </select>
                            <br><br>
                            <button type="submit" class="btn btn-default" name="save" value="1">
                                Submit
                            </button>
                            <br><br>
                        </div>
                    </form>
                </li>
                <br><br>
                <!--Ausgabe der Textdatei der Sprüche aber nicht die der Namen-->
                <li>   
                    <?php
                        if(!$con){
                            echo "We can't load the phrases because there is no connection to the database.";
                        }
                        else {
                            echo "<p>These phrases where already saved in the database of Spruchreif: </p>\n";
                            $stmt = "SELECT * FROM `phrases`";
                            $res = mysqli_query($con, $stmt);

                            if(!$res){
                              echo "None";
                            }
                            else {
                              while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                                echo "<p>&bdquo;" . $row['phrase'] . "&ldquo;</p>" ;
                              }
                            }
                            mysqli_close($con);
                        }


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
