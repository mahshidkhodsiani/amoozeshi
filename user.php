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
    include "functions.php";
    ?>


  <!-- Main content -->
  <div class="content">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="btn btn-outline-light d-lg-none" onclick="toggleSidebar()">☰</button>
      <h5 class="navbar-brand" >روش های پولسازی</h5>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="container">
            <div class="row">
                <h2>پروفایل من</h2>
            </div>

            <div class="row mt-5 ">
 

                <div class="col-md-5" style="text-align: right !important;">
                    <?php
                    $sql = "SELECT * FROM user WHERE id = $id";
                    
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                    }

                    echo '
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">کد معرفی من</h5>
                        <p class="card-text" id="invitedCode">' . $row['referral_code'] . '</p>
                        <button class="btn mb-2 mb-md-0 btn-outline-quarternary btn-block" onclick="copyCode()">کپی کد</button>
                      </div>
                    </div>
                    
                    <script>
                        function copyCode() {
                        // Get the invited code text
                        var codeText = document.getElementById("invitedCode").innerText;
                        
                        // Create a temporary input to copy the text
                        var tempInput = document.createElement("input");
                        tempInput.value = codeText;
                        document.body.appendChild(tempInput);
                        tempInput.select();
                        document.execCommand("copy");
                        document.body.removeChild(tempInput);
                        
                        // Show a success message (optional)
                        alert("کد کپی شد!");
                        }
                    </script>
                    ';
                    ?>
                    

                    
                </div>
               
            </div>
           


            <hr>
            
            <div class="col-md-5">
                <h2 style="color: green;">درخت ارجاع</h2>
                <br>

                <?php
                    // این تابع برای دریافت افرادی که هر کاربر معرفی کرده است استفاده می‌شود.
                    function get_invited_people($user_id, $conn) {
                        $invited_sql = "SELECT user.id, user.name 
                                        FROM user 
                                        INNER JOIN invited ON user.id = invited.invited_id 
                                        WHERE invited.user_id = " . $user_id;
                        $invited_result = $conn->query($invited_sql);
                        
                        $invited_people = [];
                        while($invited = $invited_result->fetch_assoc()) {
                            $invited_people[] = $invited;
                        }
                        
                        return $invited_people;
                    }

                    // نمایش درخت
                    function display_tree($user_id, $conn, $level = 1) {
                        // محدود کردن به 4 سطح
                        if ($level > 4) {
                            return; // توقف بازگشت
                        }

                        // دریافت اطلاعات کاربر
                        $sql = "SELECT * FROM user WHERE id = " . $user_id;
                        $result = $conn->query($sql);
                        $user = $result->fetch_assoc();
                        
                        // نمایش کاربر
                        echo '<div class="tree-item">';
                        echo '<span class="tree-node" onclick="toggleInvited(' . $user["id"] . ')">' . $user["name"] . '</span>';
                        
                        // دریافت افرادی که این کاربر معرفی کرده است
                        $invited_people = get_invited_people($user_id, $conn);
                        
                        if (count($invited_people) > 0) {
                            echo '<div class="tree-branch" id="invited-' . $user["id"] . '" style="display: none;">';
                            foreach($invited_people as $invited) {
                                display_tree($invited['id'], $conn, $level + 1); // ارسال سطح به تابع
                            }
                            echo '</div>';
                        } else {
                            echo '<div class="tree-branch" id="invited-' . $user["id"] . '" style="display: none;">هیچ معرفی نشده است</div>';
                        }
                        
                        echo '</div>';
                    }

                    // شروع نمایش درخت از کاربر با شناسه 1 (می‌توانید شناسه کاربر مورد نظر خود را تغییر دهید)
                    echo '<div class="tree">';
                    display_tree($id, $conn); // تغییر به شناسه کاربری که می‌خواهید از آن شروع کنید
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
