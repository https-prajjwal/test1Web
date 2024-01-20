

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
</head>
<body>
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
        <div class="container-xxxl " style=" background: linear-gradient(#ffffff,#F3F8FF); overflow: hidden; padding-top: 56px; padding-bottom: 200px; display: flex; align-items: center; justify-content: center;">
          <div class="container table-container">
            <h2  id="tableHead">Dashboard</h2>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Edit</th>
                  <th>Delete</th>
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

$sql = "SELECT * from `user`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {



    echo "<tr>";
    echo "<td> ".$row["id"]." </td>";
    echo "<td> ".$row["name"]." </td>";
    echo "<td> ".$row["email"]." </td>";
    echo "<td> ".$row["address"]." </td>";
    echo '<td><a href="edit.php?id='.$row['id'].'"><button type = "submit" id= "btn2"> Edit
    </button></a></td>';
    echo '<td><a href="delete.php?id='.$row['id'].'"><button type = "submit" id= "btn2"> Delete
    </button></a></td>';
    echo "</tr>";
}
} else {
  echo "0 results";
}

$conn->close();
?>
            </table>
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