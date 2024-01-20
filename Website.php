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


        

        <div class="container-fluid hero-section">
          <h1 class="nepal">BANK OF NEPAL</h1>
          <p class="nepal1">Everyday banking made easier with Bank of Nepal. Explore our banking options to find a program that best suits your needs.</p>
          <a href = './login.php'><button class="btn-gradient btn-glow" style="border-radius: 8px; padding: 8px 20px 8px 20px; margin-top: 32px; font-size: 13px;">
            Know more &#8594;
          </button>
        </div>

       
        <!--services-->
          <div class="container-xxxl " style=" background: linear-gradient(#ffffff,#F3F8FF); overflow: hidden;">
              <div class="text-center">
                  <h1 class="display-5" id="servicesHead"><b>OUR SERVICES</b></h1>
              </div>
        
              <div class="row my-4 align-items-center justify-content-center g-2" id="chips">
        
                <div class="col-8 col-lg-3">
                  <div class="card" id ="border">
                    <div class="card-header text-center">Deposit</div>
                      <img class="card-img-top img-fluid" src="./GettyImages-1126878582-6d25dc673.jpg" >

                   <div class="card-body justify-content-center align-items-center text-center">
                  <a href="./login.php"><button class="btn-gradient btn-glow" style="border-radius: 8px; padding: 8px 20px 8px 20px; margin-top: 32px; font-size: 13px;">
                    Deposit Now
                  </button>
                  </a>
                </div>
              </div>
              </div>
        
                <div class="col-10 col-lg-4">
                  <div class="card" id="border">
                    <div class="card-header text-center ">Online Banking</div>
                    <img class="card-img-top img-fluid" src="./OnlineBankingGettyImages01-scale.webp" >
                   <div class="card-body justify-content-center align-items-center text-center">
                    <a href="/login.php">
                      <button class="btn-gradient btn-glow" style="border-radius: 8px; padding: 8px 20px 8px 20px; margin-top: 32px; font-size: 13px;">
                        Connect Now
                      </button>
                    </a>
                </div>
              </div>
              </div>
        
                <div class="col-8 col-lg-3">
                  <div class="card " id ="border">
                    <div class="card-header text-center ">Withdraw</div>
                      <img class="card-img-top img-fluid" src="./the_easiest_way_to_withdraw_payp.jpg" >
                   <div class="card-body justify-content-center align-items-center text-center">
                    <a href="/login.php"><button class="btn-gradient btn-glow" style="border-radius: 8px; padding: 8px 20px 8px 20px; margin-top: 32px; font-size: 13px;">
                      Withdraw Now
                    </button>
                    </a>
                </div>
              </div>
              </div>
              </div>
        
          </div>
      


        <!--contact-->
        <div class="container-xxxl overflow-hidden" style="margin-top:64px; background: linear-gradient(#ffffff,#F3F8FF);margin-left: 0; margin-right: 0; padding-bottom: 64px;">
            <div class="text-center">
              <h1 class="display-5" id="topic" ><b> CONTACT US </b></h1>
            </div>
            <div class="row justify-content-center my-5" id="divFlow">
              <div class="col-lg-8">
                <form>
                  <label for="name" class="form-label">Name:</label>
                  <div class="mb-4 input-group">
                    <span class="input-group-text">
                      <i class="bi bi-person-fill"></i>
                    </span>
                  <input type="text" class="form-control" id="name" placeholder="e.g. Utsav Dangol">
                  <span class="input-group-text">
                    <span class="tt" data-bs-placement="bottom" title="Enter Your Name">
                    <i class="bi bi-question-circle"></i>
                    </span>
                    </span>
                </div>
                <label for="email" class="form-label">Email Address:</label>
                <div class="mb-4 input-group">
                  <span class="input-group-text">
                    <i class="bi bi-envelope-fill"></i>
                  </span>
                  <input type="email" class="form-control" id="email" placeholder="e.g. utsav@example.com">
                  <span class="input-group-text">
                    <span class="tt" data-bs-placement="bottom" title="Enter Your Email Address">
                    <i class="bi bi-question-circle"></i>
                    </span>
                  </span>
                </div>
                  <label for="query" class="form-label">Your Query:</label>
                  <textarea id="query" class="form-control" style="height: 100px;" placeholder="Type something...."></textarea>
                  <div class=" mt-4 text-center">
                    <button type = "submit" class="btn-gradient btn-glow" style="border-radius: 8px; padding: 8px 20px 8px 20px; margin-top: 32px; font-size: 13px;">
                      Submit
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>


        <!--footer-->
        <section >
          <div class="footer">
            <p>Copyright &#169; Prajjwal Bhandari. All rights reserved.</p>
          </div>
        </section>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>