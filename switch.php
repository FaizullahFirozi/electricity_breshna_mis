<?php

if(!isset($_SESSION)){
    session_start();
}

//this is for language  page

    if($_GET["lang"] == "en"){
        $_SESSION["lang"] = "local/en.php";
    }
    else if ($_GET["lang"] == "ps"){
        $_SESSION["lang"] = "local/ps.php";
    }
    else if ($_GET["lang"] == "dr"){
        $_SESSION["lang"] = "local/ps.php";
    }

    if(isset($_SERVER["HTTP_REFERER"])){

        header("location:" . $_SERVER["HTTP_REFERER"]);

    } else {

        header("location:home.php");

    }


//faizullah firozi wardak  0780002528

?>