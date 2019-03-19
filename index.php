<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Magazyn</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container-fluid">

    <div class="row d-flex h-100">

      <div class="offset-8 col-3 text-center " id="loginCard">


        <div>
          <?php 
                if (isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
              }
                ?>
        </div>
        <form method="POST" action="logowanie.php">
          <div class="form-group">

            <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Name">

          </div>
          <div class="form-group">

            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
              placeholder="Password">
              <div  class="form-text text-white">Free account:<br> name: <b>admin</b> <br>password: <b>admin</b></div>

              
          </div>

          <button type="submit" class="btn btn-orange">Submit</button>

        </form>

      </div>
    </div>
  </div>


  <script src="script.js"></script>

</body>

</html>