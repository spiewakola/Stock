<?php
session_start();
require_once '../funkcje.php';
if(isset($_GET['productId'])){
    $product = getOneProduct($_GET['productId']);
}

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    if(isset($name) || isset($quantity)){
        if(!empty($quantity) || !empty($name)){
            try{
                $db = getDB();
                $sql = "UPDATE products SET name = ?,  quantity = ? WHERE id = ?";
                $stmt= $db->prepare($sql);
                $stmt->execute([$name, $quantity,$id]);
                redirectWithMessage("Product edited succesfully",'../dashboard.php','success');
            }
        catch(Exception $e){
                redirectWithMessage($e->getMessage(),'../dashboard.php','danger');
        }

        }
    }
    redirectWithMessage('You have to fill Quantity and Name','../dashboard.php','danger');
}
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MagazynSoft</title>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <!-- Bootstrap core CSS -->

  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">MagazynSOFT</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Wyloguj się</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-shopping-cart">
                  <circle cx="9" cy="21" r="1"></circle>
                  <circle cx="20" cy="21" r="1"></circle>
                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="clients.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-users">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                Customers
              </a>
            </li>

          </ul>


          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <h1>Edit <?= $product['name'] ?> product</h1>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input value="<?= $product['name'] ?>"type="text" name="name" class="form-control" id="name" placeholder="Name"> 
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input value="<?= $product['quantity'] ?>" type="numer" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
            </div>
            <input type="hidden" name="id" value="<?= $_GET['productId'] ?>">
            <button type="submit" name="edit" class="btn btn-dark">Edit Product</button>
        </form>
      </main>
    </div>
  </div>








</body>

</html>