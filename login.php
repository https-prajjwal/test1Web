<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
  <title>Bank of Nepal</title>
</head>
<body>


<?php
$servername = "localhost";
$username = "root"; // replace with your actual database username
$password =""; // replace with your actual database password
$dbname = "csd223_prajjwal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $password = "";
$loginmessage= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login successful, redirect to transaction.php
            header("Location: amount.php");
            exit();
        } else {
            $loginmessage = "Incorrect email or password";
        }
    } else {
        $loginmessage = "Please enter both email and password";
    }
}
?>


<?php
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $cpasswordErr= $addressErr=$message ="";
$name = $email = $password = $cpassword =$address = "";

 $valid=true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
     $valid=false;
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $valid=false;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $valid=false;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $valid=false; 
    }
  }


  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    $valid=false;
  } else {
    $password = test_input($_POST["password"]);
    // check if e-mail address is well-formed
     
    if(strlen($password)<6){
        $passwordErr = "Please enter at least six charecter password";
        $valid=false;
    }
  }

  if (empty($_POST["cpassword"])) {
    $cpasswordErr = "Confirm Password is required";
    $valid=false;
     
  } else {
    $cpassword = test_input($_POST["cpassword"]);
   

    if($cpassword!=$password){
        $cpasswordErr = "Password and Confirm Password Need to be same";
        $valid=false;
    }

  }
    
   
  if (empty($_POST["address"])) {
   
    $addressErr = "Address is required";
    $valid=false;
     
  } else {

    $address = test_input($_POST["address"]);
    
  }
  
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top" >
          <div class="container-fluid">
            <a class="navbar-brand ms-5" href="./Website.php">
              <img src="./nepal.png" class="me-1">
              <span>Bank of Nepal<span style="color: #003594;">.</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end align-items-end" id="navbarNav">
              <ul class="navbar-nav me-5">
                <li class="nav-item">
                  <a class="nav-link" href="./Website.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#services">Services</a>
                  <div class="dropdown-menu">
                    <a href="./withdraw.php" class="dropdown-item">Withdraw</a>
                    <a href="./deposit.php" class="dropdown-item">Deposit</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contact">Contact Us</a>
                </li>
                <li class="nav-item d-none d-lg-inline">
                  <a href="./login.php"><button>Sign In</button></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>


        <!--services-->
        <div class="container-xxxl " style=" background: linear-gradient(#ffffff,#F3F8FF); overflow: hidden; padding-top: 128px; padding-bottom: 200px;">

              <div class="row my-4 align-items-center justify-content-center overflow-hidden g-2" id="chips">
        
                <div class="col-10 col-lg-4">
                  <div class="card" id="border">
                    <div class="card-header text-center " style = "font-size: 26px;">Welcome to Bank of Nepal</div>
                   <div class="card-body justify-content-center align-items-center text-center">
                    

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-label" style="padding: 16px;"><?php echo $loginmessage;?></div>
                    <label for="email" class="form-label">Email Address: <span class="error">* <?php echo $emailErr;?></span></label>
                    <div class="mb-4 input-group">
                      <span class="input-group-text">
                        <i class="bi bi-envelope-fill"></i>
                      </span>
                      <input type="email" name = "email"class="form-control" id="email" placeholder="e.g. utsav@example.com" value="<?php echo $email;?>">
                      <span class="input-group-text">
                        <span class="tt" data-bs-placement="bottom" title="Enter Your Email Address">
                        <i class="bi bi-question-circle"></i>
                        </span>
                      </span>
                    </div>
                      
                    <label for="password" class="form-label">Password: <span class="error">* <?php echo $passwordErr;?></span></label>
                    <div class="mb-4 input-group">
                      <span class="input-group-text">
                        <i class="bi bi-key-fill"></i>
                      </span>
                      <input type="password" name = "password" class="form-control" id="password" placeholder="Enter Password" value="<?php echo $password;?>">
                      <span class="input-group-text">
                        <span class="tt" data-bs-placement="bottom" title="Enter Your Password">
                        <i class="bi bi-question-circle"></i>
                        </span>
                      </span>
</div>
<div class=" mt-4 text-center">
                      <input type = "submit" class="btn-gradient btn-glow" style="border-radius: 8px; padding: 8px 20px 8px 20px;  font-size: 13px;" value="Login" name='submit'>
                      
                    </div>

                    <div class=" mt-4 text-center" id="sign">
                      Haven't Set Online Banking? <a href='./createUser.php'>Sign Up Now!</a>
                    </div>
                    </form>
                </div>
                </div>
              </div>
              </div>
              </div>
              </div>
              </div>
        
          </div>
        



        <!--footer-->
        <section >
          <div class="footer">
            <p>Copyright &#169; Prajjwal Bhandari. All rights reserved.</p>
          </div>
        </section>
</body>
</html>