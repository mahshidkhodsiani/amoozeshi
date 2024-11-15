<?php
session_start();

if(!isset($_SESSION['user_data'])){
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>آموزش ها</title>
 

  <link rel="stylesheet" href="css/mainstyles.css">

</head>
<body>




    <?php
    include "sidebar.php";
    include "includes.php";
    ?>

 
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="btn btn-outline-light d-lg-none" onclick="toggleSidebar()">☰</button>
        <h5 class="navbar-brand" >روش های پولسازی</h5>
        </nav>

        <div class="container">
            <div class="container">
        
                <div class="row">
                    <h2 class="">آموزش ها</h2>
                </div>
            

                <br>

                <div class="row mt-5 justify-content-center">
                    <div class="col-md-10 ">
                        <div class="card shadow-lg rounded border-0" >
                            <div class="card-body text-center p-4">
                                <img src="images/1.jpeg" height="200px" width="200px">
                                <h5 class="card-title font-weight-bold">پولسازی</h5>

                                <h6 class="card-subtitle mb-3 text-muted">دوره روانشناسی پول و ثروت </h6>
                                <p class="card-text text-secondary">دوره روانشناسی پول و ثروت با هدف درک بهتر ارتباط ذهن و پول، به شما کمک می‌کند تا موانع ذهنی و الگوهای فکری محدودکننده را شناسایی کرده و آن‌ها را برای دستیابی به موفقیت مالی و افزایش ثروت تغییر دهید. این دوره با استفاده از تکنیک‌های علمی و عملی، راهکارهایی برای تحول مالی و زندگی بهتر ارائه می‌دهد.</p>
                                <a class="btn mb-2 mb-md-0 btn-outline-tertiary ">دیدن دوره</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-10 mt-5">
                        <div class="card shadow-lg rounded border-0" >
                            <div class="card-body text-center p-4">
                                <img src="images/2.jpeg" height="200px" width="200px">

                                <h5 class="card-title font-weight-bold">تصاعد</h5>

                                <h6 class="card-subtitle mb-3 text-muted">دوره تصاعد مالی</h6>
                                <p class="card-text text-secondary">دوره تصاعد مالی با تمرکز بر رشد و بهبود مهارت‌های مالی، به شما می‌آموزد که چگونه درآمد خود را به‌صورت مداوم افزایش دهید و به استقلال مالی نزدیک شوید. در این دوره، با تکنیک‌های پیشرفته و استراتژی‌های کاربردی، یاد می‌گیرید که سرمایه‌گذاری‌ها و منابع مالی خود را مدیریت کرده و مسیر موفقیت مالی را با اطمینان بیشتری طی کنید.</p>
                                <a class="btn mb-2 mb-md-0 btn-outline-tertiary ">دیدن دوره</a>
                                
                            </div>
                        </div>

                    </div>
                    <div class="col-md-10 mt-5">
                        <div class="card shadow-lg rounded border-0" >
                            <div class="card-body text-center p-4">
                                <img src="images/4.jpg" height="200px" width="200px">

                                <h5 class="card-title font-weight-bold">کریپتو کارنسی</h5>

                                <h6 class="card-subtitle mb-3 text-muted">دوره کریپتو کارنسی</h6>
                                <p class="card-text text-secondary">دوره کریپتوکارنسی شما را با دنیای ارزهای دیجیتال آشنا می‌کند و اصول اولیه، تحلیل بازار، و روش‌های سرمایه‌گذاری هوشمند را به شما آموزش می‌دهد. در این دوره، علاوه بر آشنایی با مفاهیم پایه مانند بلاکچین و نحوه کارکرد ارزهای دیجیتال، یاد می‌گیرید چگونه ریسک‌ها را مدیریت کرده و بهترین تصمیمات را در بازار پرنوسان کریپتو بگیرید.</p>
                                <a class="btn mb-2 mb-md-0 btn-outline-tertiary ">دیدن دوره</a>
                                
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>






</body>
</html>
