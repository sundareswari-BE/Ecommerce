<?php $admin_url = 'http://localhost/Ecommerce/'; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }



        .container-fluid.header-wrap {
            padding: 0;
        }

        /* header section */
        .search-box {
            background-color: #fff;
            border-radius: 25px;
            border: 1px solid #5E9E4D;
            padding: 0 0 0 .7rem;
        }

        .search-box input {
            background-color: none;
            outline: none;
            border: none;
            padding: 0rem 1rem !important;
            border-radius: none;
        }

        .search-box button {
            background-color: none;
            outline: none;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            background-color: #5E9E4D;
            padding: 10px 20px;
        }

        .search-box button svg {
            fill: #fff;
            width: 16px;
            height: 16px;
        }

        .search-box input:focus {
            outline: unset !important;
            border: unset !important;
        }

        .search-box button:hover {
            border-radius: unset;
            background-color: none;
        }

        .navbar-top {
            border-bottom: 1px solid #5E9E4D !important;
        }

        .navbar-top .container-fluid,
        .nav-sec .container-fluid {
            padding: 0;
        }

        .navbar-top .navbar-brand img {
            width: 150px;
        }

        .header {
            background: #fff !important;
            position: sticky;
            top: 0px;
            z-index: 1;
            box-shadow: 0.5px 0.5px 10px #000;
        }

        /* banner section */
        .banner-img {
            height: 500px;
            background: url(../assets/home-test/banner.png) no-repeat right center/contain;
        }

        .shop-btn {
            background-color: black !important;
            color: #fff !important;
            padding: 1rem 2rem !important;
            border-radius: 30px !important;
        }

        .top-heading,
        .bottom-heading {
            font-size: 3rem;
        }

        .green {
            color: #3A632F;
            font-size: 6rem;
        }

        .orange {
            color: #A85013;
        }

        .section-2.products {
            background: linear-gradient(to right, #68A757, #3A632F);
            border-radius: 100px 0 0 100px;
        }

        .img-box {
            background-color: #fff;
            border-radius: 10px;
            padding: 2rem;
            max-height: 400px;
        }

        .img-box .img-cont {
            height: 200px;
            width: 100%;
            margin: 0 auto;
            /* background-color: #5E9E4D; */
            overflow: hidden;
        }

        .img-box .img-cont img {
            width: 200px;
        }

        .logout a {
            text-decoration: none;
            color: #5E9E4D;
        }
    </style>
</head>

<body>

    <div class="container-fluid header-wrap">
        <header class="header px-5">
            <!-- Navbar -->
            <!-- <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light navbar-top">

                   
                    <div class="collapse navbar-collapse d-flex justify-content-end">
                        <form class="d-flex">
                            <div class="search-box form-group d-flex">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg></button>
                            </div>
                        </form>
                    </div>

                </nav>
            </div> -->


            <nav class="navbar navbar-expand-md nav-sec py-3">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                        <a class="navbar-brand" href="#"><img src="<?php echo $admin_url ?>assets/home-test/Logo-1.png" alt="logo image"></a>
                        <ul class="navbar-nav">

                            <li class="nav-item px-3 dropdown">
                                <a class="nav-link fw-bold dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo $admin_url ?>pages/category/addcategory.php">Add category</a>
                                    <a class="dropdown-item" href="<?php echo $admin_url ?>pages/category/viewcategory.php">View category</a>
                                   
                            </li>

                            <li class="nav-item px-3 dropdown">
                                <a class="nav-link fw-bold dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Product
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo $admin_url ?>pages/product/addproduct.php">Add Product</a>
                                    <a class="dropdown-item" href="<?php echo $admin_url ?>pages/product/viewproduct.php">View Product</a>
                                   
                            </li>
                            <li class="nav-item px-3">
                                    <a class="nav-link fw-bold" href="<?php echo $admin_url ?>post/logout.php">Logout</a>
                                </li>
                            
                        </ul>
                        <!-- <div class="logout">
                            <button class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                </svg><a href="<?php echo $admin_url ?>post\logout.php">Logout</a></button>
                        </div> -->
                    </div>
                </div>
            </nav>

        </header>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>