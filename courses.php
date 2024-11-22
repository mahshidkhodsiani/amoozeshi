<?php
session_start();

if(!isset($_SESSION['user_data'])){
    header('location: login.php');
    exit();
}
$id = $_SESSION['user_data']['id'];
$admin = $_SESSION['user_data']['admin'];
$confirm = $_SESSION['user_data']['confirm'];

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
        <?php include "header.php"; ?>

        <div class="container">
            <div class="container">
        
                <div class="row mt-2">
                    <div class="col-md-6" style="text-align: right;">
                        <h2 class="">آموزش ها</h2>
                    </div>
                    <?php
                    if($admin == 1){
                        ?>
                        <div class="col-md-6">
                            <a href="upload" class="btn mb-2 mb-md-0 btn-outline-quarternary">اپلود فایل جدید</a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            

                <br>

                <?php
                if($confirm == 1){
                ?>

                <div class="row mt-5 justify-content-center">
                    <div class="col-md-10 ">
                        <div class="card shadow-lg rounded border-0" >
                            <div class="card-body text-center p-4">
                                <img src="images/1.jpeg" height="200px" width="200px">
                                <h5 class="card-title font-weight-bold">پولسازی</h5>

                                <h6 class="card-subtitle mb-3 text-muted">دوره روانشناسی پول و ثروت </h6>
                                <p class="card-text text-secondary">دوره روانشناسی پول و ثروت با هدف درک بهتر ارتباط ذهن و پول، به شما کمک می‌کند تا موانع ذهنی و الگوهای فکری محدودکننده را شناسایی کرده و آن‌ها را برای دستیابی به موفقیت مالی و افزایش ثروت تغییر دهید. این دوره با استفاده از تکنیک‌های علمی و عملی، راهکارهایی برای تحول مالی و زندگی بهتر ارائه می‌دهد.</p>
                                <a href="course.php?num=1" class="btn mb-2 mb-md-0 btn-outline-tertiary ">دیدن دوره</a>
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
                                <a href="course.php?num=2" class="btn mb-2 mb-md-0 btn-outline-tertiary ">دیدن دوره</a>
                                
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
                                <a href="course.php?num=3" class="btn mb-2 mb-md-0 btn-outline-tertiary ">دیدن دوره</a>
                                
                            </div>
                        </div>

                    </div>
                </div>

                <?php
                }else{
                    echo "<h2>هنوز پرداخت انجام نشده.</h2>";
                    echo "<a href='pardakht'>صفحه پرداخت</a>";
                }
                ?>

            </div>
        </div>

    </div>






</body>
</html>
