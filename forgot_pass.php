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
       
              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form3Example3" name="username" class="form-control form-control-lg" placeholder="Enter username" />
                <label class="form-label" for="form3Example3">username</label>
              </div>
         
         
              <div class="text-center text-lg-start mt-4 pt-2">
                <button name="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">اطلاع به ادمین</button>
              
              
              </div>
            </form>
          </div>
        </div>
      </div>

    </section>
  </body>
</html>

<?php

if (isset($_POST['submit'])) {
    include "config.php";

    $username = $_POST['username'];
    $sql = "SELECT * FROM user WHERE username = '$username'";
    // echo $sql ;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $update = "UPDATE user SET forgot_pass = 1 WHERE username = '$username'";
        $conn->query($update);
        echo "<div id='successToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-delay='3000' style='position: fixed; bottom: 20px; right: 20px; width: 300px;'>
        <div class='toast-header bg-success text-white'>
            <strong class='mr-auto'>Success</strong>
        </div>
        <div class='toast-body'>
            رمز عبور جدید به شما اطلاع داده می شود!
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
    }
}