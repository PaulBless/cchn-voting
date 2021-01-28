
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CCHN Voting System</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./includes/materialdesignicons.min.css">
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./includes/bd-wizard.css">
</head>
<body>
  <header >
    <nav class="navbar navbar-expand-sm navbar-light " style="background-color: cadetblue; color: #fff" id="top-nav1">
      <div class="container">
        <a class="navbar-brand" href="#">CCHN Voting System</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
          aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-sm navbar-light bg-light" id="top-nav2">
      <div class="container">
        <!-- <a class="navbar-brand" href="#">CCHN Voting System</a> -->
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
          aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav justify-content-center mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Core Members</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="auxiliary.php">Auxiliary Members</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="d-flex align-items-center">
    <div class="container">
        <div id="wizard">
          <h3>Step 1 Title</h3>
          <section>
           <h5 class="bd-wizard-step-title">Step 1</h5>
           <h2 class="section-heading">Select business type </h2>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
           <div class="purpose-radios-wrapper">
              <div class="purpose-radio">
                  <input type="radio" name="purpose" id="branding" class="purpose-radio-input" value="Branding" checked>
                 <label for="branding" class="purpose-radio-label">
                   <span class="label-icon">
                     <img src="./assets/images/logo.png" alt="branding" class="label-icon-default">
                   </span>
                   <span class="label-text">Branding</span>
                 </label>
                </div>
                <div class="purpose-radio">
                   <input type="radio" name="purpose" id="mobile-design" class="purpose-radio-input" value="Moile Design">
                  <label for="mobile-design" class="purpose-radio-label">
                    <span class="label-icon">
                      <img src="./assets/images/logo.png" alt="branding" class="label-icon-active">
                    </span>
                    <span class="label-text">Moile Design</span>
                  </label>
                 </div>
                 <div class="purpose-radio">
                     <input type="radio" name="purpose" id="web-design" class="purpose-radio-input" value="Web Design">
                    <label for="web-design" class="purpose-radio-label">
                      <span class="label-icon">
                        <img src="./assets/images/logo.png" alt="branding" class="label-icon-default">
                      </span>
                      <span class="label-text">Web Design</span>
                    </label>
                   </div>
           </div>
          </section>
          <h3>Step 2 Title</h3>
          <section>
            <h5 class="bd-wizard-step-title">Step 2</h5>
            <h2 class="section-heading">Enter your Account Details</h2>
            <div class="form-group">
              <label for="firstName" class="sr-only">First Name</label>
              <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
              <label for="lastName" class="sr-only">Last Name</label>
              <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group">
              <label for="phoneNumber" class="sr-only">Phone Number</label>
              <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Phone Number">
            </div>
            <div class="form-group">
              <label for="emailAddress" class="sr-only">Email Address</label>
              <input type="email" name="emailAddress" id="emailAddress" class="form-control" placeholder="Email Address">
            </div>
          </section>
          <h3>Step 3 Title</h3>
          <section>
              <h5 class="bd-wizard-step-title">Step 3</h5>
              <h2 class="section-heading mb-5">Review your Details and Submit</h2>
              <h6 class="font-weight-bold">Select business type</h6>
              <p class="mb-4" id="business-type">Branding</p>
              <h6 class="font-weight-bold">Enter your Account Details</h6>
              <p class="mb-4"><span id="enteredFirstName">Cha</span> <span id="enteredLastName">Ji-Hun C</span> <br>
                  Phone: <span id="enteredPhoneNumber">+230-582-6609</span> <br>
                  Email: <span id="enteredEmailAddress">willms_abby@gmail.com</span></p>

          </section>
        </div>
    </div>
  </main>
  <script src="./assets/js/jquery-3.4.1.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./includes/jquery.steps.min.js"></script>
  <script src="./includes/bd-wizard.js"></script>
</body>
</html>
