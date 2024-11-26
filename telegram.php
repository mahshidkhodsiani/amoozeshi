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
  <title>صفحه کاربری</title>
  <link rel="stylesheet" href="css/mainstyles.css">


  
    <style>
        .tree {
            font-family: Arial, sans-serif;
        }

        .tree-item {
            padding: 5px 0;
            margin-left: 20px;
            position: relative;
        }

        .tree-item::before {
            content: '';
            position: absolute;
            top: 15px;
            left: -20px;
            border-left: 2px solid #ccc;
            height: 100%;
        }

        .tree-item::after {
            content: '';
            position: absolute;
            top: 15px;
            left: -20px;
            border-top: 2px solid #ccc;
            width: 20px;
        }

        .tree-node {
            font-weight: bold;
            color: #333;
            cursor: pointer;
        }

        .tree-branch {
            margin-left: 15px;
            color: #555;
        }
    </style>

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
            <div class="row mt-5">
                <h2>پشتیبانی تلگرام</h2>

                <a class="btn btn-outline-primary" href="https://t.me/behrooz_137" target="_blank">
                    برای اتصال به تلگرام کلیک کنید
                </a>

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
