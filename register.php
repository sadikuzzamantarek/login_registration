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
    <title>Registration</title>
</head>

<body>
    <section class="py-5" id="registration">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Responsive and Design Purpose -->
                </div>
                <div class="col-lg-4">
                    <h3 class="text-center mb-3">Register</h3>
                    <a href="#" class="btn btn-primary btn-block button1 mt-2"><i class="fab fa-google"></i> Login with Google</a>
                    
                    <a href="#" class="btn btn-primary btn-block button2 mt-2"><i class="fab fa-facebook-f"></i></i> Login with Facebook</a>
                    <div class="row mt-2">
                        <div class="col-lg-5"><hr></div>
                        <div class="col-lg-2">Or</div>
                        <div class="col-lg-5"><hr></div>
                    </div>
                    <form action="" method="POST">

                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="name" id="" class="form-control" placeholder="Full name" required>
                        </div>

                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" name="email" id="" class="form-control" placeholder="Email address" required>
                        </div>

                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" name="phone" id="" class="form-control" placeholder="Phone Number" required>
                        </div>

                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></i></span>
                            </div>
                            <input type="password" name="pass" id="" class="form-control" placeholder="Enter password" required>
                        </div>

                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></i></span>
                            </div>
                            <input type="password" name="cpass" id="" class="form-control"
                                placeholder="Confirm password" required>
                        </div>
                        <div class="input-group mt-2">
                            <input type="submit" name="submit" value="Register" class="btn btn-info btn-block">
                        </div>

                    </form>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </section>

    <?php
    if(isset($_POST['submit'])){
        include 'conn.php';
        $user =mysqli_real_escape_string($conn,$_POST['name']);
        $email =mysqli_real_escape_string($conn,$_POST['email']);
        $phone =mysqli_real_escape_string($conn,$_POST['phone']);
        $pass =mysqli_real_escape_string($conn,$_POST['pass']);
        $cpass =mysqli_real_escape_string($conn,$_POST['cpass']);

        $password = password_hash($pass, PASSWORD_BCRYPT);
        $cPassword = password_hash($cpass, PASSWORD_BCRYPT);

        $select = "SELECT * FROM registration WHERE email = '$email'";
        $query = mysqli_query($conn,$select);
        $emailCount = mysqli_num_rows($query);
        if($emailCount>0){
            header('location:error-alert.php');
        }else{
            if($password === $cPassword){

                $insert = "INSERT INTO registration (id, name, email, phone, pass, cpass) VALUES ('$user','$email','$phone','$password','$cPassword')";

                $query2= mysqli_query($conn,$insert) or die(mysqli_error());
                if($query2){
                    ?>
                <script>
                    alert('Insert Successfull');
                </script>
                    <?php
                    }else{
                        ?>
                        <script>
                            alert('Not inserted 😢');
                        </script>
                        <?php
                    }
                
                }else{
                    ?>
                    <script>
                        alert('Password not matched');
                    </script>
                    <?php
            }
        }

    }

    ?>





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