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
            <div class="row">
                <h2>پروفایل من</h2>
            </div>

            <?php
                if($confirm == 1){
            ?>
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

                <div class="col-md-7">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>میزان سود(دلار)</th>
                                    <th>تاریخ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               $sql1 = "SELECT profits.*, invited.*
                               FROM profits
                               LEFT JOIN invited ON profits.user_id = invited.user_id
                               WHERE profits.user_id = $id AND invited.confirm = 1";
                                $result1 = $conn->query($sql1);
                      
                                if ($result1->num_rows > 0) {
                                    while($row1 = $result1->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo get_name($row1['user_id']); ?></td>
                                            <td><?php echo $row1['profit']; ?></td>
                                            <td><?php echo $row1['created_at']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

               
            </div>
           


            <hr>
            
            <?php
            if($admin == 1){
            ?>
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
                        function display_tree($user_id, $conn, $level = 1, $admin = 0) {
                            // محدود کردن به 4 سطح فقط برای کاربران عادی
                            if ($level > 4 && $admin == 0) {
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
                                    display_tree($invited['id'], $conn, $level + 1, $admin); // ارسال سطح به تابع و وضعیت مدیر
                                }
                                echo '</div>';
                            } else {
                                echo '<div class="tree-branch" id="invited-' . $user["id"] . '" style="display: none;">هیچ معرفی نشده است</div>';
                            }
                            
                            echo '</div>';
                        }

                        echo '<div class="tree">';
                        display_tree($id, $conn, 1, $admin); // اضافه کردن $admin به تابع
                        echo '</div>';
                        
                    ?>
                </div>
            <?php
            }else{
            ?>
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
            <?php
            }
            ?>

           


            <?php
                }else{
                    echo "<h2>هنوز پرداخت انجام نشده.</h2>";
                    echo "<a href='pardakht'>صفحه پرداخت</a>";
                }
            ?>

            
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
