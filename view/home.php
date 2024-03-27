<?php
include("../post/connection.php");
include("header.php");
?>

    <!---------------------------------------------------------- Section-1 -------------------------------------->


    <section class="section-1 banner" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid banner-img">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pt-5">
                        <h1 class="pt-5 mt-3 top-heading">Make Your Space</h1>
                        <h1 class="fw-bolder green">Greener</h1>
                        <h2 class="bottom-heading">With <span class="orange">Plants</span></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, quia. Recusandae
                            temporibus odit voluptatem repellendus qua.</p>
                        <button class="btn shop-btn">Shop Plant<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- --------------------------------Section-2  dynamically displaying products in home ------------------------------------------->

    <section class="section-2 products mt-2 ms-3 p-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid">
            <div class="text">
                <h1 class="text-light text-center">BEST SELLING</h1>
                <h3 class="text-light text-center">Plant Collections</h3>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-9">
                    <div class="slick-slider row">
                        <?php

                        $addproductquery = "SELECT * FROM addproduct ORDER BY productid DESC LIMIT 3";

                        $result = mysqli_query($conn, $addproductquery);

                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="col-md-4">
                                    <div class="img-box">
                                        <div class="img-cont">
                                            <?php echo "<img src='../pages/product/" . $row['productimage'] . "' alt='" . $row['productname'] . "' width='100%' style='max-width: 100%; height: 200px;'>"; ?>
                                        </div>
                                        <div class="description-box">
                                            <h4 class="product-name"><?php echo $row['productname']; ?></h4>
                                           
                                            <h5 class="price fw-bold">$<?php echo $row['productprice']; ?></h5>
                                            <button class="buy-now-btn btn d-block w-100">
                                                <a href="..\view\product-frontview.php?id=<?php echo $row['productid']; ?>" class="text-decoration-none text-white">
                                                    View product
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            
                            echo "No products found.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-----------------------------------------------------section-3-plant-form ---------------------------------------------->



    <section class="section-3 what-best" id="about" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid p-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="../assets/home-test/plant section3.png" alt="" srcset="" class="section-3-img">
                </div>
                <div class="col-md-6 p-5">
                    <h2 class="best-quote">What's Best From</h2>
                    <h2 class="best-quote">Our <span class="green-txt">Plants</span></h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias ullam, nesciunt iste
                        facilis odit laborum. Voluptatibus corrupti distinctio, aut nobis voluptatem tempore
                        nemo quos dolorum?</p>
                    <button class="shop-btn">Shop Now<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                        </svg></button>
                </div>
            </div>
        </div>
    </section>
    <section class="section-4 quote" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid">
            <div class="row p-5 d-flex justify-content-center">
                <div class="col-md-10">
                    <di class="row">
                        <div class="col-md-4 pt-5">
                            <h2 class="garden-txt text-light">Start Gardening</h2>
                            <h2 class="garden-txt text-light">And Grow Your</h2>
                            <h2 class="garden-txt text-light">Own Plant!</h2>
                        </div>
                        <div class="col-md-4 justify-content-center">
                            <img src="../assets/home-test/Group 24.png" alt="">
                        </div>
                        <div class="col-md-4 pt-5">
                            <h5 class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Mollitia autem ea
                                facilis.</h5>
                            <button class="btn readmore">Get Started Now</button>
                        </div>
                </div>

            </div>
        </div>
    </section>
    </main>
    

    <?php include('footer.php');

