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
                <label>کد معرفی</label>
                <input type="text" id="form3Example3" name="invited" class="form-control form-control-lg" placeholder="Enter invited" >
              </div>
              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form3Example3" name="phone" class="form-control form-control-lg" placeholder="Enter phone number" required >
              </div>
              <!-- Email input -->
               <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form3Example3" name="name" class="form-control form-control-lg" placeholder="Enter name" required >
              </div>
              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form3Example3" name="family" class="form-control form-control-lg" placeholder="Enter family" required >
              </div>
              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="form3Example3" name="email" class="form-control form-control-lg" placeholder="Enter email" required >
              </div>


              <div data-mdb-input-init class="form-outline mb-4">
                <input 
                  type="text" 
                  id="form3Example3" 
                  name="username" 
                  class="form-control form-control-lg" 
                  placeholder="Enter username" 
                  required
                  oninput="this.value = this.value.replace(/[^\x00-\x7F]/g, '')">
              </div>

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-3">
                <input 
                  type="password" 
                  id="form3Example4" 
                  name="password" 
                  class="form-control form-control-lg" 
                  placeholder="رمز عبور را وارد کنید" 
                  required 
                  minlength="6" 
                  oninput="validatePassword()">
                <small class="text-danger" id="password-error" style="display: none;">
                  رمز عبور باید حداقل 6 کاراکتر باشد.
                </small>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" >
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


    <script>
      document.getElementById("form3Example4").addEventListener("input", function () {
        const passwordField = this;
        const errorMessage = document.getElementById("password-error");

        if (passwordField.value.length >= 6) {
            errorMessage.style.display = "none"; // Hide error if valid
        } else {
            errorMessage.style.display = "block"; // Show error if invalid
        }
      });
    </script>

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
  $phone = $_POST['phone'];

  $dup = "SELECT * FROM user WHERE username ='$username' OR email ='$email' OR phone ='$phone'";
  $result1 = $conn->query($dup);
  if($result1->num_rows > 0){
    echo "<div id='errorToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-delay='3000' style='position: fixed; bottom: 20px; right: 20px; width: 300px;'>
        <div class='toast-header bg-danger text-white'>
            <strong class='mr-auto'>Error</strong>
        </div>
        <div class='toast-body'>
           کاربری با این شماره یا ایمیل یا یوزرنیم قبلا ثبت شده دوباره تلاش کنید!" .  "
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
    
  }else{

    
    // رفرال کدی هست که میده به بقیه 
    $refferal = generateReferralCode();


    $sql = "INSERT INTO user (name, family, invited_code, referral_code, email, phone, username, password) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

  
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $family, $invited, $refferal, $email, $phone, $username, $password);
  


  
    if ($stmt->execute()) {
      $last = $conn->insert_id;
      if(isset($_POST['invited'])){
        $invited = $_POST['invited'];
        $search = "SELECT * FROM user WHERE referral_code = '$invited'";
        $res = $conn->query($search);
     

       
        // میدونم پیچیدس اما یکبار بخونی میفهمی
        if($res->num_rows > 0){
          $row1 = $res->fetch_assoc();
          $id1 = $row1['id'];

          $garantee = "UPDATE user SET garantee = 0 WHERE id = $id1";
          $conn->query($garantee);


          $insert = "INSERT INTO invited (user_id, invited_id) VALUES ('$id1', '$last')";
          $conn->query($insert);

          $profit1 = "INSERT INTO profits (user_id, profit, created_at) VALUES ($id1, 40, NOW())";
          $result1 = $conn->query($profit1);
          if($result1){
            $sql2 = "SELECT * FROM invited WHERE invited_id = $id1";
            $res2 = $conn->query($sql2);
            if($res2->num_rows > 0){
              $row2 = $res2->fetch_assoc();
              $id2 = $row2['user_id'];
              $profit2 = "INSERT INTO profits (user_id, profit,  created_at) VALUES ($id2,  30, NOW())";
              $result2 = $conn->query($profit2);
              if($result2){
                $sql3 = "SELECT * FROM invited WHERE invited_id = $id2";
                $res3 = $conn->query($sql3);
                if($res3->num_rows > 0){
                  $row3 = $res3->fetch_assoc();
                  $id3 = $row3['user_id'];
                  $profit3 = "INSERT INTO profits (user_id, profit, created_at) VALUES ($id3,  10, NOW())";
                  $result3 = $conn->query($profit3);
                }
              }
            }
          }
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
  }

  $stmt->close();

}