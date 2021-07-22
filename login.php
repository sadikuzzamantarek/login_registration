<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>

<?php
if(isset($_POST['submit'])){
    include 'conn.php';

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $emailSearch = "SELECT * FROM registration WHERE email = '$email'";
    $query = mysqli_query($conn, $emailSearch);
    $emailCount = mysqli_num_rows($query);
    if($emailCount){
        $emailPass = mysqli_fetch_assoc($query);
        $userPass  = $emailPass['pass'];
        $userPassDecode = password_verify($pass, $userPass);
        if($userPassDecode){
            echo "Login Success";
        }else{
            echo "Password incorrect";
        }
    }else{
        echo "Invalid Email"; 
    }
}

?>
    <section class="py-5" id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Gap Purpose -->
                </div>
                <div class="col-lg-4">
                    <h3 class="text-center">Login</h3>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" name="email" placeholder="Enter email" class="form-control">
                        </div>


                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></i></span>
                            </div>
                            <input type="password" name="pass" id="" class="form-control" placeholder="Enter password">
                        </div>

                        <div class="input-group mt-2">
                            <input type="submit" class="btn btn-info btn-block" value="Login" name="submit">
                        </div>
                    </form>
                    <div>
                        <p class="">Not registered? <a href="#">Register here</a></p>
                    </div>
                    <div>
                        <p class=""><a href="#">Forgot password?</a></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Gap Purspose -->
                </div>
            </div>
        </div>
    </section>





    <!-- JS FIlES -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>