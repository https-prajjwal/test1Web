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
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $cpasswordErr= $addressErr=$message = "";
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
  if($valid){

    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "csd223_prajjwal";

    // Create connection
    $conn = new mysqli($servername, $username, $db_password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `user`(`name`, `password`, `email`, `address`) VALUES ('".$name."','".$password."','".$email."','".$address."')";

    if ($conn->query($sql) === TRUE) {
    $message = "User created successfully!";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

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
        <div class="container-xxxl " style=" background: linear-gradient(#ffffff,#F3F8FF); overflow: hidden; padding-top: 80px; padding-bottom: 64px;">

              <div class="row my-4 align-items-center justify-content-center overflow-hidden g-2" id="chips">
        
                <div class="col-10 col-lg-4">
                  <div class="card" id="border">
                    <div class="card-header text-center " style = "font-size: 26px;">Welcome to Bank of Nepal</div>
                   <div class="card-body justify-content-center align-items-center text-center">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-label" style="margin-bottom: 16px;"><?php echo $message;?></div>
                      <label for="name" class="form-label">Name:  <span class="error">* <?php echo $nameErr;?></span></label>
                      <div class="mb-4 input-group">
                        <span class="input-group-text">
                          <i class="bi bi-person-fill"></i>
                        </span>
                      <input type="text" name = "name" class="form-control" id="name" placeholder="e.g. Utsav Dangol" value="<?php echo $name;?>">
                      <span class="input-group-text">
                        <span class="tt" data-bs-placement="bottom" title="Enter Your Name">
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


                    <label for="cpassword" class="form-label">Confirm Password: <span class="error">* <?php echo $cpasswordErr;?></span></label>
                    <div class="mb-4 input-group">
                      <span class="input-group-text">
                        <i class="bi bi-key-fill"></i>
                      </span>
                      <input type="password" name = "cpassword" class="form-control" id="cpassword" placeholder="Confirm Password" value="<?php echo $cpassword;?>">
                      <span class="input-group-text">
                        <span class="tt" data-bs-placement="bottom" title="Enter Your Password">
                        <i class="bi bi-question-circle"></i>
                        </span>
                      </span>
                    </div>


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



                    <label for="address" class="form-label">Address: <span class="error">* <?php echo $addressErr;?></span></label>
                    <div class="mb-4 input-group">
                      <textarea  name="address" rows="4" cols="50"><?php echo $address;?><?php echo $address;?></textarea>
                    </div>
                    <div class=" mt-4 text-center">
                      <input type = "submit" class="btn-gradient btn-glow" style="border-radius: 8px; padding: 8px 20px 8px 20px;  font-size: 13px;" value="Create Account" name='submit'>
                      
                    </div>
                    </form>
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



