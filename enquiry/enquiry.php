<?php
include("../view/header.php");
include("../post/connection.php");

$product_name = "";

if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($conn, $_GET['id']);


    $sql = "SELECT * FROM addproduct WHERE productid = '$product_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $product_name = $product['productname'];
    } else {
        echo "Product not found";
    }
} else {
}




$fnameErr = $lnameErr = $emailErr = $phonenumberErr  = $inquiryErr = "";
$fname = $lname = $email = $phonenumber = $inquiry = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_name'])) {
        $product_name = $_POST['product_name'];
    }


    if (empty($_POST["fname"])) {
        $fnameErr = "Name is required";
    } else {
        $fname = $_POST["fname"];
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "lname code is required";
    } else {
        $lname = $_POST["lname"];
    }


    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["phonenumber"])) {
        $phonenumberErr = "Phone number is required";
    } else {
        $phonenumber = $_POST["phonenumber"];
    }


    if (empty($_POST["inquiry"])) {
        $inquiryErr = "Inquiry is required";
    } else {
        $inquiry = $_POST["inquiry"];
    }



    if (empty($fnameErr) && empty($emailErr) && empty($phonenumberErr) && empty($lnameErr)) {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $inquiry = $_POST['inquiry'];
        $sql = "INSERT INTO enquiry (productname, fname, lname, phonenumber, email, message) VALUES ('$product_name', '$fname', '$lname', '$phonenumber', '$email', '$inquiry')";

        $done = mysqli_query($conn, $sql);
        if ($done) {
            $submitted = 'Submitted Successfully';
        } else {
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        .enquiry-wrapper {
            max-width: 100%;
            width: 100%;
            overflow-x: hidden;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .error {
            color: red;
        }

        .contact-bg {
            background: url("<?php echo $admin_url ?>assets/home-test/Mask group-6.png") no-repeat center;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>
    <div class="enquiry-wrapper w-100">


        <div class="row d-flex justify-content-center p-5 ">
            <div class="col-md-6 contact-bg px-5">
                <h2 class="text-center mt-5">Contact Us</h2>
                <h4 class="text-center mt-5">Need to get in touch with us <br> ? <br>Fill out the form with your inquiry.</h4>
            </div>
            <div class="col-md-6 form-container px-5">
                <?php

                if (isset($submitted)) {
                    echo '<div id="submitted" class="alert alert-success bg-success">' . $submitted . '</div>';
                    unset($submitted);
                } ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="enquiry-form" id="form">

                    <div class="form-group mt-2">

            <!------------------------------------ For getting product name dynamicaly ------------------->

                        <?php if (!empty($product_name)) : ?>
                            <h4 class="mb-5">Product Name: <?php echo htmlspecialchars($product_name); ?></h4>
                        <?php endif; ?>
                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>">

            <!------------------------------------- Enquiry form --------------------------------------------->

                        <div class="row">
                            <div class="col-md-6">


                                <input type="text" name="fname" id="fname" class="form-control" placeholder="First-Name" value="<?php echo isset($fname) ? $fname : ''; ?>" />
                                <span class="error">
                                    *
                                    <?php echo $fnameErr; ?>
                                </span>
                            </div>
                            <div class="col-md-6">

                                <input type="text" name="lname" id="lname" class="form-control" placeholder="Last-Name" value="<?php echo isset($lname) ? $lname : ''; ?>" />
                                <span class="error">
                                    *
                                    <?php echo $lnameErr; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <div class="row">
                            <div class="col-md">

                                <input type="email" name="email" id="email" placeholder="Email-Id" class="form-control" value="<?php echo isset($email) ? $email : ''; ?>" />
                                <span class="error">
                                    *
                                    <?php echo $emailErr; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2">

                        <input type="tel" name="phonenumber" class="form-control" placeholder="Phone-Number" id="phonenumber" value="<?php echo isset($phonenumber) ? $phonenumber : ''; ?>" />
                        <span class="error">
                            *
                            <?php echo  $phonenumberErr; ?>
                        </span>
                    </div>
                    <div class="form-group mt-2">

                        <textarea name="inquiry" id="inquiry" rows="3" placeholder="What can we help you with?" class="form-control"><?php echo isset($inquiry) ? $inquiry : ''; ?></textarea>
                        <span class="error">
                            *
                            <?php echo  $inquiryErr; ?>
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <div class="form-group mt-2">
                            <button type="submit" class="buy-now-btn btn d-block w-100 text-light">
                                Submit
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <hr>
    <?php include("../view/footer.php"); ?>
    