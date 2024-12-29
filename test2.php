<?php
session_start();

if(!isset($_SESSION['user_data'])){
    header('location: login.php');
    exit();
}
$id = $_SESSION['user_data']['id'];
// echo "my user id :". $id;
$admin = $_SESSION['user_data']['admin'];
$confirm = $_SESSION['user_data']['confirm'];

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>صفحه کاربری</title>
  <link rel="stylesheet" href="css/mainstyles.css">



</head>
<body>

    <?php
    include "sidebar.php"; 
    include "includes.php";  
    include "config.php";
    ?>


  <!-- Main content -->
  <div class="content">
    <?php include "header.php"; ?>

    <!-- Main Content -->
    <div class="container">
        <div class="container">
            <div class="row">
                <h2>پروفایل من</h2>
            </div>

         
            <div class="row mt-5 ">
 


               
            </div>
           



              <div class="col-md-5">
                  <h2 style="color: green;">درخت ارجاع</h2>
                  <br>

                  <?php
                  include "class-tree.php";
                      // استفاده از کلاس
                  // $conn باید به یک اتصال معتبر دیتابیس MySQL اشاره کند
                  $tree = new UserTree($conn);
                  echo '<div class="tree">';
                  $tree->displayTree($id); // شناسه کاربر شروع
                  echo '</div>';
                  ?>
              </div>
       
           


            
        </div>
    </div>

  </div>

    <script>
        function toggleInvited(id) {
            var element = document.getElementById("invited-" + id);
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    </script>

    

</body>
</html>
