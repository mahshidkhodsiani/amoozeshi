<?php
session_start();

if(!isset($_SESSION['user_data'])){
    header('location: login.php');
    exit();
}
$id = $_SESSION['user_data']['id'];
$admin = $_SESSION['user_data']['admin'];
if($admin == 1 ){
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>آپلود فایل</title>
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
                <h2>ایجاد فایل جدید</h2>
            </div>


            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <label for="">اسم فایل</label>
                        <input type="text" class="form-control" id="" name="name" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="">انتخاب دسته</label>
                        <select class="form-control" id="" name="category">
                            <option value="1">پولسازی</option>
                            <option value="2">تساعد</option>
                            <option value="3">کریپتو</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6 mt-2">
                        <label>اپلود فایل:</label>
                        <input type="file" class="form-control" id="" name="file">
                    </div>
                    <div class="col-md-6 mt-5">
                        <button class="btn btn-outline-primary" name="submit">ثبت فایل</button>
                    </div>
                </div>
            </form>

     


                    


            <hr>
            
           
            
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
<?php
}
?>
</html>

<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category']; // This value determines the folder
    $file = $_FILES['file'];

    // Determine the target folder based on category
    $targetDir = "uploads/"; // Base directory
    switch ($category) {
        case "1":
            $targetDir .= "poolsazi/";
            break;
        case "2":
            $targetDir .= "tasaod/";
            break;
        case "3":
            $targetDir .= "crypto/";
            break;
        default:
            echo "Invalid category!";
            exit;
    }

    // Ensure the target folder exists
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Create folder if it doesn't exist
    }

    // File upload logic
    $fileName = basename($file['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if the file is valid
    if (in_array(strtolower($fileType), ['jpg', 'png', 'pdf', 'docx', 'mp4', 'zip', 'mp3'])) { // Adjust allowed types as needed
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            // Insert into the database
            $sql = "INSERT INTO courses (name, category, file, fileType) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $category, $targetFilePath, $fileType);

            if ($stmt->execute()) {
                echo "<div id='successToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-delay='3000' style='position: fixed; bottom: 20px; right: 20px; width: 300px;'>
                <div class='toast-header bg-success text-white'>
                    <strong class='mr-auto'>Success</strong>
                </div>
                <div class='toast-body'>
                    فایل با موفقیت ثبت شد!
                </div>
                </div>
                <script>
                    $(document).ready(function(){
                        $('#successToast').toast({
                            autohide: true,
                            delay: 3000
                        }).toast('show');
                        setTimeout(function(){
                            window.location.href = 'upload';
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
                            window.location.href = 'users';
                        }, 3000);
                    });
                </script>";
            }
        } else {
            echo "Failed to upload the file!";
        }
    } else {
        echo "Invalid file type!";
    }
}
