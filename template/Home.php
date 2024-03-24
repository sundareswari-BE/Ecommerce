<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/d8bcc82f5b.js" crossorigin="anonymous"></script>
    <style>
        .top-head {
            background-color: #02451f !important;
            padding-bottom: 0;
            padding-top: 0;
        }

        .subnav .navlink {
            color: darkgreen;
        }
        .left{
             margin-right: 200px;
        }
        .right{
             margin-left: 200px;
        }
            </style>

</head>

<body>
    <!---------------------------------------------- header ----------------------------------------------------->

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md justify-content-center p-0 top-head">
  <ul class="navbar-nav">
    <li class="nav-item left">
      <a class="nav-link text-light" href="#">Splash Sale is live | Shop Now</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  text-light" href="#">Free Shipping above ₹499 | All India Delivery</a>
    </li>
    <li class="nav-item right">
      <a class="nav-link  text-light" href="#">Contact Us : 96978 43523</a>
    </li>
  </ul>
</nav>







    <nav class="navbar navbar-expand-sm p-0 navbar-light bg-light headerborder">
        <div class="container-fluid wNav">
            <div class="collapse navbar-collapse subnav" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link wHeaderIcon  text-dark" href="">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link wHeaderIcon dropdown-toggle text-dark" href="Ecommerce\template\Home.php" id="navbarDropdownCategory" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu  text-dark" aria-labelledby="navbarDropdownCategory">
                            <a class="dropdown-item" href="#">Indoor Plants</a>
                            <a class="dropdown-item" href="#">Flowering Plants</a>
                            <a class="dropdown-item" href="#">Low Light Plant</a>
                            <a class="dropdown-item" href="#">Cacti & Succulents</a>
                            <a class="dropdown-item" href="#">Hanging Plants</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link wHeaderIcon dropdown-toggle  text-dark" href="#" id="navbarDropdownProduct" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Product
                        </a>
                        <div class="dropdown-menu  text-dark" aria-labelledby="navbarDropdownProduct">
                            <a class="dropdown-item" href="\Ecommerce\pages\product\addproduct.php">Add Product</a>
                            <a class="dropdown-item" href="\Ecommerce\pages\product\viewproduct.php">View Product</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link wHeaderIcon  text-dark" href="\Ecommerce\post\logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
     <!------------------------------------------------------------------ Section-1 ---------------------------------------->

     <section class="section-1">
        <div class="container-fluid">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="assets\img\carosel-1.webp" alt="Los Angeles" class="d-block" style="width:100%">
  </div>
  <div class="carousel-item">
    <img src="Ecommerce\assets\img\carosel-1.webp" alt="Chicago" class="d-block" style="width:100%">
  </div>
  <div class="carousel-item">
    <img src="Ecommerce\assets\img\carosel-1.webp" alt="New York" class="d-block" style="width:100%">
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>
        </div>

     </section>

</body>
</html>





</body>

</html>