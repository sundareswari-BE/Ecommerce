
<?php
session_start();
include("post/connection.php");


$emailErr = $passwordErr = "";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {



    if (empty ($_POST["email"])) {
        $emailErr = "Email is required !";
    } else {
        $email = $_POST["email"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid mail format";
        }
    }

    if (empty ($_POST["password"])) {
        $passwordErr = "Password is required !";
    } else {
        
        $password = $_POST["password"];
    }


    if (empty ($emailErr) && empty ($passwordErr)) {

       

        $email = $_POST["email"];
        $password = ($_POST["password"]);

        $sql = "SELECT * FROM login WHERE  mail = '$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $row['mail'];
            $_SESSION["name"] = $row['name'];
           
            header("Location:pages/product/viewproduct.php");
            exit();
        } else {
            $_SESSION["loggedin"] = false;
            $_SESSION["error"] = "Invalid user!";
        }
    }
}
?>





<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/login-form.css">
  <style>
    .error{
        color:red;
    }
    </style>
</head>

<body>
    <div class="container pt-5">
        <div class="container  form bg-white pt-4 mt-5 border">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <p class="text-center login-heading hide-me">Login Form</p>
                <div class="container hide-me">
                    <div class="row">
                        <div class="col mt-3 pl-5 pr-5">
                            <div class="row mt-4">
                                <div class="col-2 text-center pt-1 pr-0">
                                    <i class="fa fa-user-o" id="user"></i>
                                </div>
                                <div class="col-10 pl-0">
                                    <input type="email" name="email" placeholder="Enter your username" class='input-1'>
                                </div>
                            </div>
                            <hr class="hr-1">
                            <!-- <p class="text-white">*</p> -->
                            *<span class="error">
                                <?php echo $emailErr; ?>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-4 pl-5 pr-5">
                            <div class="row mt-4">
                                <div class="col-2 text-center pt-1 pr-0">
                                    <i class="fa fa-lock" id="lock"></i>
                                </div>
                                <div class="col-10 pl-0">
                                    <input type="password" name="password" placeholder="Ente your password" class="input-2">
                                </div>
                            </div>
                            <hr class="hr-2">
                            <!-- <p class="text-white">*</p> -->
                            *<span class="error">
                                <?php echo $passwordErr; ?>
                            </span>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col pl-5 pr-5">
                        <button type="submit" class="btn btn-block text-white login-button">login</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center">
                            <span
                                style="text-transform: capitalize;font-family: Arial, Helvetica, sans-serif;font-size:15px;font-weight:600;color:rgb(148, 141, 141)">or
                                sign up using</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class='col text-center'>
                            <span class="facebook-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                            <span class="twitter-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                            <span class="google-icon"><i class="fa fa-google" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <!-- <div class="col text-center">
                            <span
                                style="text-transform: capitalize;font-family: Arial, Helvetica, sans-serif;font-size:15px;font-weight:600;color:rgb(148, 141, 141)">or
                                sign up using</span>
                        </div> -->
                        <div class="col-12 text-center">
                            <a href="#"><span class="sign-up">sign up</span></a>
                        </div>
                    </div>
                </div>
            </form>


            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>