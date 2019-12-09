<?php
    
    $password = " ";
    if (!isset($_GET['password']) || $_GET['password'] != "GEHEIM"){
	   echo '<script language="javascript">';
       echo 'alert("Passwort falsch oder fehlt.")';
       echo '</script>';
       die();
    }

?>