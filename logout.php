      
      <?php 
      
        if(!isset($_SESSION)){
            session_start();
        }

           $_SESSION["login"] = NULL;
           
            unset($_SESSION["login"]);

                header("location:index.php");
                exit();
      
      
      
      
      ?>