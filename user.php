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
    include "config.php";
    include "functions.php";
    ?>


  <!-- Main content -->
  <div class="content">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="btn btn-outline-light d-lg-none" onclick="toggleSidebar()">☰</button>
      <a class="navbar-brand" href="#">برند</a>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="container">
            <div class="row">
                <h2>پروفایل من</h2>
            </div>
            <div class="row mt-5">
                <div class="col-md-10" style="text-align: right !important;">
                    <?php
                    $people = [];
                    $sql = "SELECT user.*, invited.* 
                            FROM user 
                            LEFT JOIN invited ON user.id = invited.user_id 
                            WHERE user.id = 1
                            ORDER BY user.id";
                    
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $people[] = $row; 
                        }
                    }

                    foreach($people as $who) {
                        echo $who["id"] . "_" . $who["name"] . " ---> " . get_name($who['invited_id']) . "<br>";
                    }
                    ?>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>

  </div>



    

</body>
</html>
