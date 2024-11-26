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
            <form action="login_procces" method="POST">
              <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <!-- <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>
                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-linkedin-in"></i>
                </button> -->
              </div>
              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0">روش های پولسازی</p>
              </div>
              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form3Example3" name="username" class="form-control form-control-lg" placeholder="Enter username" />
                <label class="form-label" for="form3Example3">username</label>
              </div>
              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-3">
                <input type="password" id="form3Example4" name="password" class="form-control form-control-lg" placeholder="Enter password" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                  <label class="form-check-label" for="form2Example3"> Remember me </label>
                </div>
                <a href="forgot_pass" class="text-body">Forgot password?</a>
              </div>
              <div class="text-center text-lg-start mt-4 pt-2">
                <button name="login" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register" class="link-danger">Register</a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>

    </section>
  </body>
</html>