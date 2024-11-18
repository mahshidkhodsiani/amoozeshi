<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
      .divider:after,
      .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
      }

      .h-custom {
        height: calc(100% - 73px);
      }

      @media (max-width: 450px) {
        .h-custom {
          height: 100%;
        }
      }
    </style>
  </head>
  <body> <?php include "includes.php"; ?> <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="images/5.jpg" class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action="" method="POST">
              <h3 dir="rtl">فرم ثبت نام richMethods</h3>
              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0">in</p>
              </div>
              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form3Example3" name="invited" class="form-control form-control-lg" placeholder="Enter invited" />
              </div>
              <!-- Email input -->
               <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form3Example3" name="name" class="form-control form-control-lg" placeholder="Enter name" />
              </div>
              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form3Example3" name="family" class="form-control form-control-lg" placeholder="Enter family" />
              </div>
              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form3Example3" name="email" class="form-control form-control-lg" placeholder="Enter email" />
              </div>
              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form3Example3" name="username" class="form-control form-control-lg" placeholder="Enter username" />
                
              </div>
              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-3">
                <input type="password" id="form3Example4" name="password" class="form-control form-control-lg" placeholder="Enter password" />
            
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                  <label class="form-check-label" for="form2Example3"> Remember me </label>
                </div>
               
              </div>
              <div class="text-center text-lg-start mt-4 pt-2">
                <button name="register" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                <p class="small fw-bold mt-2 pt-1 mb-0"> have an account? <a href="login" class="link-danger">Login</a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>

    </section>
  </body>
</html>

<?php
include "config.php";
include "functions.php";

if(isset($_POST['register'])){

 
  $invited = $_POST['invited'];
    

  $name = $_POST['name'];
  $family = $_POST['family'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // رفرال کدی هست که میده به بقیه 
  $refferal = generateReferralCode();


  $sql = "INSERT INTO user (name, family, invited_code, referral_code, email, username, password) 
  VALUES (?, ?, ?, ?, ?, ?, ?)";

 
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssss", $name, $family, $invited, $refferal, $email, $username, $password);
 


 
  if ($stmt->execute()) {
    $last = $conn->insert_id;
    if(isset($_POST['invited'])){
      $invited = $_POST['invited'];
      $search = "SELECT * FROM user WHERE referral_code = '$invited'";
      
      $res = $conn->query($search);

      if($res->num_rows > 0){
        $row1 = $res->fetch_assoc();
        $id1 = $row1['id'];
        $insert = "INSERT INTO invited (user_id, invited_id) VALUES ('$id1', '$last')";

        $conn->query($insert);
      }
    }

    echo "<div id='successToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-delay='3000' style='position: fixed; bottom: 20px; right: 20px; width: 300px;'>
        <div class='toast-header bg-success text-white'>
            <strong class='mr-auto'>Success</strong>
        </div>
        <div class='toast-body'>
            اکانت شما با موفقیت ایجاد شد!
        </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#successToast').toast({
                    autohide: true,
                    delay: 3000
                }).toast('show');
                setTimeout(function(){
                    window.location.href = 'login';
                }, 3000);
            });
        </script>";
  } else {
    echo "<div id='errorToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-delay='3000' style='position: fixed; bottom: 20px; right: 20px; width: 300px;'>
        <div class='toast-header bg-danger text-white'>
            <strong class='mr-auto'>Error</strong>
        </div>
        <div class='toast-body'>
            خطایی رخ داده، دوباره امتحان کنید!<br>Error: " . htmlspecialchars($stmt->error) . "
        </div>
      </div>
      <script>
          $(document).ready(function(){
              $('#errorToast').toast({
                  autohide: true,
                  delay: 3000
              }).toast('show');
              setTimeout(function(){
                  window.location.href = 'register';
              }, 3000);
          });
      </script>";

  }

 
  $stmt->close();

}