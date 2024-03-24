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

    .left {
      margin-right: 200px;
    }

    .right {
      margin-left: 200px;
    }
    .dropdown:hover .dropdown-menu {
        display: block;
      }
    /* .img-bg {
      background-image: url(Ecommerce\assets\img\top.webp);
      background-size: cover;
      background-position: center;
      color: #fff;
      padding: 50px; Adjust padding as needed 
    }*/
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

  <nav class="navbar navbar-expand-sm p-0 navbar-light bg-light headerborder ">
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

  <section class="section-1 mt-3">
  <div class="container-fluid img-bg h-100 border" style="background-image: url('Ecommerce\assets\img\top.webp');">
      <h1>Welcome to our website!</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur purus id velit malesuada, nec fermentum ex ultrices. Phasellus maximus, arcu eget viverra suscipit, felis ligula suscipit ex, nec ultricies nisi turpis et lectus.</p>
  </div>

  <div class="container">
    <h4>Plants</h4>
  </div>
  </section>

</body>

</html>
