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
                <h2>مدیریت تمام کاربران</h2>
            </div>

            <?php
            // Pagination variables
            $limit = 10; // Number of records per page
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
            $offset = ($page - 1) * $limit; // Offset for SQL query

            // Fetch total number of records
            $sqlCount = "SELECT COUNT(*) AS total FROM user";
            $resultCount = $conn->query($sqlCount);
            $totalRecords = $resultCount->fetch_assoc()['total'];
            $totalPages = ceil($totalRecords / $limit);

            // Fetch data for the current page
            $sql = "SELECT * FROM user ORDER BY id DESC LIMIT $limit OFFSET $offset";

            $result = $conn->query($sql);
            ?>

            <div class="row mt-5">
                <div class="col-md-7" style="text-align: right !important;">
                    <table class="table border text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام و نام خانوادگی</th>
                                <th scope="col">ادمین</th>
                                <th scope="col">گارانتی</th>
                                <th scope="col">عملیات</th>
                                <th scope="col">ویرایش اطلاعات کاربر</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $a = $offset + 1; // Record number starts based on offset
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $a ?></th>
                                        <td><?= $row['name'] . " " . $row['family'] ?></td>
                                        <td><?= $row['admin'] ?></td>
                                        <td><?= $row['garantee'] == 1 ? "دارد" : "ندارد" ?></td>
                                        <td>
                                            <form action="" method="POST">
                                                <input type="hidden" name="user_id" value="<?= $row['id'] ?>" />
                                                <button class="btn btn-danger btn-sm" name="delete" onclick="confirmDelete()">حذف</button>
                                                <?php
                                                if($row['confirm'] == 0) {
                                                ?>
                                                    <button class="btn btn-success btn-sm" name="confirm">تایید دوره ها</button>
                                                <?php
                                                }else{
                                                    echo "تایید شده" ;
                                                }
                                                ?>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="edit_user.php?id_user=<?= $row['id'] ?>" class="btn btn-primary btn-sm">ادیت</a>
                                        </td>
                                    </tr>

                                    <script>
                                        function confirmDelete() {
                                            return confirm("آیا مطمئن هستید که می‌خواهید این کاربر را حذف کنید؟");
                                        }
                                    </script>

                                <?php
                                    $a++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination Links -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- Previous Button -->
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page - 1 ?>">قبلی</a>
                        </li>
                    <?php endif; ?>

                    <!-- Page Numbers -->
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next Button -->
                    <?php if ($page < $totalPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page + 1 ?>">بعدی</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>


                    


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
</html>

<?php

if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM user WHERE id = $user_id";
    if($conn->query($sql)){
        echo "<div id='successToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-delay='3000' style='position: fixed; bottom: 20px; right: 20px; width: 300px;'>
        <div class='toast-header bg-success text-white'>
            <strong class='mr-auto'>Success</strong>
        </div>
        <div class='toast-body'>
            اکانت با موفقیت حذف شد!
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

if(isset($_POST['confirm'])){
    $user_id = $_POST['user_id'];




    $invite_cinfirm = "UPDATE invited SET confirmed = 1 WHERE invited_id = $user_id";
    $invite_result = $conn->query($invite_cinfirm);



    if($invite_result){
        $sql = "UPDATE user SET confirm = 1 WHERE id = $user_id";

        if($conn->query($sql)){
        
            echo "<div id='successToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-delay='3000' style='position: fixed; bottom: 20px; right: 20px; width: 300px;'>
            <div class='toast-header bg-success text-white'>
                <strong class='mr-auto'>Success</strong>
            </div>
            <div class='toast-body'>
                اکانت با موفقیت تایید شد!
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
}