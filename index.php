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
  <title>Beautiful Admin Panel</title>
 

  <link rel="stylesheet" href="css/mainstyles.css">

</head>
<body>




    <?php
    include "sidebar.php";
    include "includes.php";
    ?>

   <!-- Main content -->
   <div class="content">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="btn btn-outline-light d-lg-none" onclick="toggleSidebar()">☰</button>
        <h5 class="navbar-brand" >روش های پولسازی</h5>
        </nav>
    
  


        <div class="container">
    
            <div class="row">
                <h2 class="">داشبورد</h2>
            </div>
            <!-- Card Row -->
            <div class="row mt-5">

                <div class="col-md-4">
                    <div class="btn mb-2 mb-md-0 btn-outline-quarternary btn-block">
                        <div class="card-body">
                        <h5 class="card-title">پولسازی</h5>
                        <p class="card-text">دوره روانشناسی پول و ثروت</p>
                        <p class="card-text">8 جلسه صوتی</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="btn mb-2 mb-md-0 btn-outline-secondary btn-block">
                        <div class="card-body">
                        <h5 class="card-title">تصاعد</h5>
                        <p class="card-text">دوره تصاعد</p>
                        <p class="card-text">8 جلسه تصویری</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="btn mb-2 mb-md-0 btn-outline-tertiary btn-block">
                        <div class="card-body">
                        <h5 class="card-title">کریپتو</h5>
                        <p class="card-text">آموزش 0 تا 100 بازار مالی</p>
                        <p class="card-text">30 جلسه</p>
                        </div>
                    </div>
                </div>
            
            </div>

            <br>

            <!-- <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title font-weight-bold">Beautiful Card Title</h5>
                            <h6 class="card-subtitle mb-3 text-muted">Subtitle here</h6>
                            <p class="card-text text-secondary">This is a beautifully designed card that can showcase your content in a stylish way. Add your description here to make it informative and engaging.</p>
                            
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title font-weight-bold">Beautiful Card Title</h5>
                            <h6 class="card-subtitle mb-3 text-muted">Subtitle here</h6>
                            <p class="card-text text-secondary">This is a beautifully designed card that can showcase your content in a stylish way. Add your description here to make it informative and engaging.</p>
                            
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title font-weight-bold">Beautiful Card Title</h5>
                            <h6 class="card-subtitle mb-3 text-muted">Subtitle here</h6>
                            <p class="card-text text-secondary">This is a beautifully designed card that can showcase your content in a stylish way. Add your description here to make it informative and engaging.</p>
                            
                        </div>
                    </div>

                </div>
            </div> -->




            

        </div>
   </div>
 








</body>
</html>
