

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

  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f9fa;
    }

    .table-container {
      margin: 20px;
      overflow-x: auto;
    }

    .table-container table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .table-container th, .table-container td {
      border: 1px solid #dee2e6;
      padding: 12px;
      text-align: left;
      background: linear-gradient(270deg, #003594 0%, #cf1940 100%);
      background-size: 100%;
      background-clip: text;
      -webkit-text-fill-color: transparent; 
    }

    .table-container th {
      background-image: linear-gradient(270deg, #003594 0%, #cf1940 100%);
      color: white;
      font-weight: bold;
      font-size: 18x;
    }

    .table-container tbody tr:hover {
      background-color: #e2e6ea;
    }
  </style>
</head>
<body>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csd223_prajjwal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT balance FROM account ORDER BY id1 DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $balance = $row['balance'];
} else {
    $balance = 0; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    if (isset($_POST['withdraw'])) {
        $amount = $_POST['amount'];
        $balance = $balance - $amount;
        $sql = "INSERT INTO account (withdraw, balance) VALUES ('$amount', '$balance')";

        if (mysqli_query($conn, $sql)) {
          
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    if (isset($_POST['deposit'])) {
        $amount = $_POST['amount'];
        $balance = $balance + $amount;
        $sql = "INSERT INTO account (deposit, balance) VALUES ('$amount', '$balance')";

        if (mysqli_query($conn, $sql)) {
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if (isset($_POST['logout'])) {
  // Unset all session variables
  $_SESSION = array();

  // Destroy the session
  session_destroy();

  // Redirect to the login page
  header("Location: login.php");
  exit();
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
                <li class="nav-item d-none d-lg-inline" >
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  <button type="submit" name="logout" style="background-color: var(--blue);
  padding: 4px 16px 4px 16px;
  color: white;">Logout</button>
                </form>
                </li>
              </ul>
            </div>
          </div>
        </nav>



        <!--services-->
<div class="container-xxxl " style=" background: linear-gradient(#ffffff,#F3F8FF); overflow: hidden; padding-top: 128px; padding-bottom: 100px;">

<div class="row my-4 align-items-center justify-content-center overflow-hidden g-2" id="chips">

    <div class="col-10 col-lg-4">
        <div class="card" id="border">
            <div class="card-header text-center " style="font-size: 26px;">Amount Feature</div>
            <div class="card-body justify-content-center align-items-center text-center">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="depAmt" class="form-label">Enter the Amount:</label>
                    <div class="mb-4 input-group">
                        <span class="input-group-text">
                            <i class="bi bi-cash-stack"></i>
                        </span>
                        <input type="number" name="amount" class="form-control" id="amount"
                            placeholder="Enter the amount in $">
                        <span class="input-group-text">
                            <span class="tt" data-bs-placement="bottom" title="Enter Your Amount">
                                <i class="bi bi-question-circle"></i>
                            </span>
                        </span>
                    </div>

                    <div class="mt-4 text-center">
                        <input type="submit" class="btn-gradient btn-glow"
                            style="border-radius: 8px; padding: 8px 20px 8px 20px;  font-size: 13px;"
                            value="deposit" name='deposit'>
                        <input type="submit" class="btn-gradient btn-glow"
                            style="border-radius: 8px; padding: 8px 20px 8px 20px;  font-size: 13px;"
                            value="withdraw" name='withdraw'>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>

<!-- Table container -->
<div class="container-xxxl " style=" background: linear-gradient(#ffffff,#F3F8FF); overflow: hidden; padding-top: 20px; padding-bottom: 200px; display: flex; align-items: center; justify-content: center;">
<div class="container table-container">
    <h2 id="tableHead">Account Details</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Withdraw</th>
                <th>Deposit</th>
                <th>Balance</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "csd223_prajjwal";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM account";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

            ?>
            <tr>
                <td><?php echo $row['id1'] ?></td>
                <td><?php echo $row['withdraw'] ?></td>
                <td><?php echo $row['deposit'] ?></td>
                <td><?php echo $row['balance'] ?></td>
            </tr>

            <?php
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);

            ?>
    </table>
</div>
</div>

<!--footer-->
<section>
<div class="footer">
    <p>Copyright &#169; Prajjwal Bhandari. All rights reserved.</p>
</div>
</section>
</body>

</html>