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
  <title>مدیریت کاربران</title>
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
            <div class="row">
                <h2>مدیریت کاربران</h2>
            </div>

            <?php
            if(isset($_GET['id_user'])){
                $id_user = $_GET['id_user'];
                $sql = "SELECT * FROM `user` WHERE id = '$id_user'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                }
            }
            ?>

    

            <div class="row mt-5">
                <div class="col-md-6">
              
                    <form action="" method="post">
                        <input type="hidden" name="id_user" value="<?php echo $row['id'];?>">
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" class="form-control"  name="name" value="<?php echo $row['name'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">نام خانوادگی</label>
                            <input type="text" class="form-control"  name="family" value="<?php echo $row['family'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">یوزرنیم</label>
                            <input type="text" class="form-control"  name="username" value="<?php echo $row['username'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">پسورد</label>
                            <input type="text" class="form-control"  name="password" value="<?php echo $row['password'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>" required>
                        </div>
                        <div class="form-group">
                        
                            <button name="edit_user" class="btn btn-primary">ذخیره</button>
                        </div>
                    </form>
                    
                    <a href="users.php" class="btn btn-secondary">بازگشت به لیست کاربران</a>
                </div>
            </div>

       


                    


            <hr>
            
           
            
        </div>
    </div>

  </div>



    

</body>
</html>

<?php

if(isset($_POST['edit_user'])){
    // $id_user = $_POST['id_user'];
    $name = $_POST['name'];
    $family = $_POST['family'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sql = "UPDATE `user` SET `name`='$name', `family`='$family', `username`='$username', `password`='$password', `email`='$email' 
        WHERE id = '$id_user'";
        
   
    if($conn->query($sql)){
        echo "<div id='successToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-delay='3000' style='position: fixed; bottom: 20px; right: 20px; width: 300px;'>
        <div class='toast-header bg-success text-white'>
            <strong class='mr-auto'>Success</strong>
        </div>
        <div class='toast-body'>
            اکانت با موفقیت ادیت شد!
        </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#successToast').toast({
                    autohide: true,
                    delay: 3000
                }).toast('show');
                setTimeout(function(){
                    window.location.href = 'users';
                }, 3000);
            });
        </script>";
    }else{
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
                    window.location.href = 'users';
                }, 3000);
            });
        </script>";
    }
}
