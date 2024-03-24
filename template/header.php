<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/d8bcc82f5b.js" crossorigin="anonymous"></script>
    <style>
        
       .error{
        color:red;
       }
        /* .wNav {
            background-color: #45C8DC;
            border: none;
        } */

        .wBrand {
            background-size: cover;
            /* background-color: #3FB4C6; */
            font-size: 28px;
            color: #ECF0F1 !important;
            font-family: Helvetica;
            padding: 15px 0;
            text-align: center;
        }

        .navtext {
            font-size: 18px;
            color: #ECF0F1;
            padding: 15px 0;
            text-align: center;
            font-family: Helvetica;
            border-right: 1px solid gainsboro;
        }

        .sidenavbar {
            background-color: #262A33;
            height: 445px;
            text-align: center;
            color: #323640;
            padding: 10px;
            display: block;
        }

        .sidenavtext {
            display: block;
            text-align: center;
            color: #DDF3F7;
            font-family: times;
            font-size: 18px;
            padding: 12px;
        }
    </style>
</head>
<body>





    <nav class="navbar navbar-expand-sm p-0 navbar-light headerborder">
        <div class="container-fluid wNav">
            <div class="row">
                <a class="col navbar-brand wBrand m-0" href="#">
                    <img src="\Ecommerce\assets\img\logo.png" class="w-25" alt="webnest">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link wHeaderIcon" href="..\..\template\Home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link wHeaderIcon dropdown-toggle" href="#" id="navbarDropdownCategory" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="\Ecommerce\pages\category\addcategory.php">Add Category</a>
                            <a class="dropdown-item" href="\Ecommerce\pages\category\viewcategory.php">View Category</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link wHeaderIcon dropdown-toggle" href="#" id="navbarDropdownProduct" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Product
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="\Ecommerce\pages\product\addproduct.php">Add Product</a>
                            <a class="dropdown-item" href="\Ecommerce\pages\product\viewproduct.php">View Product</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link wHeaderIcon" href="\Ecommerce\post\logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <hr class="m-0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
