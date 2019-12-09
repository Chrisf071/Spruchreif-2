<?php
    $date = date('l jS \of F Y');
    $name = $_GET["name"];
    $mail = $_GET['mail'];
    $P1 = $_GET["phrase_01"];
    $P2 = $_GET["phrase_02"];
    
    if($P1 == "nothing"){
         $phrase = $name . " didn't choose all or any words so gets this stupid phrase. Today is " . $date . ".";
    }

    else if($P2 == "atall"){
        $phrase = $name . " fked up to choose all or any words so gets this bullshit. Today is " . $date . ".";
    }

    else if($P1 == "wonderful" && $P2 == "students"){
        $phrase = $name . " went with " . $P1 . " " . $P2 . " to the cinema on " . $date . ".";
    }

    else if($P1 == "wonderful" && $P2 == "mice"){
        $phrase = $name . " went with " . $P1 . " " . $P2 . " to a restaruant on " . $date . ".";
    }

    else if($P1 == "wonderful" && $P2 == "murderers"){
        $phrase = $name . " went with " . $P1 . " " . $P2 . " to a peace conference on " . $date . ".";
    }

    else if($P1 == "nice" && $P2 == "mice"){
        $phrase = $name . " went with " . $P1 . " " . $P2 . " to the cheese factory on " . $date . ".";
    }

    else if($P1 == "nice" && $P2 == "students"){
        $phrase = $name . " went with " . $P1 . " " . $P2 . " to the disco on " . $date . ".";
    }

    else if($P1 == "nice" && $P2 == "murderers"){
        $phrase = $name . " had a talk with " . $P1 . " " . $P2 . " in the park on " . $date . ".";
    }

    else if($P1 == "hateful" && $P2 == "mice"){
        $phrase = $name . " got bitten by " . $P1 . " " . $P2 . " in the cellar on " . $date . ".";
    }

    else if($P1 == "hateful" && $P2 == "students"){
        $phrase = $name . " got beaten up by " . $P1 . " " . $P2 . " on his way home on " . $date . ".";
    }

    else if($P1 == "hateful" && $P2 == "murderers"){
        $phrase = $name . " ran away from " . $P1 . " " . $P2 . " on " . $date . ".";
    }

    else{
        $phrase = $name . " looked at " . $P1 . " " . $P2 . " on " . $date . ".";
    }
?>






