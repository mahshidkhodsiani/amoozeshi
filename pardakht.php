<?php
session_start();

if(!isset($_SESSION['user_data'])){
    header('location: login.php');
    exit();
}
$id = $_SESSION['user_data']['id']; 
$admin = $_SESSION['user_data']['admin'];
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>صفحه پرداخت</title>
 

  <link rel="stylesheet" href="css/mainstyles.css">

</head>
<body>




    <?php
    include "sidebar.php";
    include "includes.php";
    ?>

   <!-- Main content -->
   <div class="content">
       <?php include "header.php"; ?>

        <div class="container">
    
            <div class="row">
                <h2 class="">صفحه پرداخت</h2>
            </div>
        
            
            <div class="row mt-5">
                <div class="col-md-12 mb-4" style="text-align: right;">
                    <p style="background-color: yellow; display: inline;">لطفا واریزی را به یکی از آدرس های زیر انجام داده و اسکرین شات واریز را برای این شماره ارسال کنید:</p>

                    <h5 style="background-color: yellow; display: inline;">09902461831</h5>  
                </div>
                
                <div class="col-md-6">
                    <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title font-weight-bold">پرداخت با کد دعوت</h5>
                            <h6 class="card-subtitle mb-3 text-muted">200 دلار</h6>
                            <p class="card-text text-secondary">This is a beautifully designed card that can showcase your content in a stylish way. Add your description here to make it informative and engaging.</p>
                            
                        </div>
                    </div>

                </div>
     

                <div class="col-md-6">
                    <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title font-weight-bold">پرداخت بدون کد دعوعت </h5>
                            <h6 class="card-subtitle mb-3 text-muted">268 دلار</h6>
                            <p class="card-text text-secondary">This is a beautifully designed card that can showcase your content in a stylish way. Add your description here to make it informative and engaging.</p>
                            
                        </div>
                    </div>

                </div>
            </div>

            
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title font-weight-bold">Beautiful Card Title</h5>
                            <h6 class="card-subtitle mb-3 text-muted">Subtitle here</h6>
                            <p class="card-text text-secondary">This is a beautifully designed card that can showcase your content in a stylish way. Add your description here to make it informative and engaging.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title font-weight-bold">Beautiful Card Title</h5>
                            <h6 class="card-subtitle mb-3 text-muted">Subtitle here</h6>
                            <p class="card-text text-secondary">This is a beautifully designed card that can showcase your content in a stylish way. Add your description here to make it informative and engaging.</p>
                            
                        </div>
                    </div>
                </div>
            </div>



            

        </div>
   </div>
 








</body>
</html>
