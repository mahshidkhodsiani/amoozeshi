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
  <title>صفحه پرداخت</title>
 

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

        <div class="container">
    
            <div class="row">
                <h2 class="">صفحه پرداخت</h2>
            </div>
        
            
            <div class="row mt-5">
                <div class="col-md-12 mb-4" style="text-align: right;">
                    <p style="background-color: yellow; display: inline;">لطفا واریزی را به یکی از آدرس های زیر انجام داده و اسکرین شات واریز را برای این شماره ارسال کنید:</p>

                    <h5 style="background-color: yellow; display: inline;"></h5>  
                </div>
                
                <div class="col-md-6">
                    <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title font-weight-bold">پرداخت با کد دعوت</h5>
                            <h6 class="card-subtitle mb-3 text-muted">200 دلار</h6>
                            <form id="referralForm" method="POST">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="invitationCode" 
                                    name="invited" 
                                    placeholder="کد دعوات خودرا وارد کنید" 
                                    required>
                                <button 
                                    type="button" 
                                    id="verifyCode" 
                                    class="btn btn-primary mt-3">تایید</button>
                            </form>

                            <!-- Wallet Address Display -->
                            <div id="walletAddress" style="display: none;">
                                <?php 
                                $wall = "SELECT * FROM wallets";
                                $result = $conn->query($wall);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<p class='card-text text-secondary'> آدرس والت: ". $row["address"]. "</p>";
                                    }
                                } else {
                                echo "<p class='card-text text-secondary'>هنوز والتی ایجاد نشده.</p>";
                                }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#verifyCode').on('click', function() {
                            const invitationCode = $('#invitationCode').val();
                            
                            $.ajax({
                                url: 'check_invitation.php', // Path to PHP script
                                type: 'POST',
                                data: { invited: invitationCode },
                                success: function(response) {
                                    console.log(response); // Debug server response
                                    if (response.trim() === "yes") {
                                        $('#walletAddress').show();
                                    } else {
                                        alert("کد دعوت نامعتبر است");
                                    }
                                }
                                ,
                                error: function() {
                                    alert('خطایی رخ داده است. لطفا دوباره تلاش کنید.');
                                }
                            });
                        });
                    });
                </script>



               
     


                <div class="col-md-6">
                    <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title font-weight-bold">پرداخت بدون کد دعوعت </h5>
                            <h6 class="card-subtitle mb-3 text-muted">268 دلار</h6>
                            <p class="card-text text-secondary">شماره والت : dda23</p>
                            
                        </div>
                    </div>

                </div>
            </div>

            <?php
            if($admin == 1){
                ?>  
                <div class="row mt-5">
                    <div class="col-md-6">
                        اضافه کردن والت جدید
                        <form id="" method="POST">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="newWalletAddress" 
                                name="newAddress" 
                                placeholder="آدرس والتی که میخواهید را اضافه کنید" 
                                required>
                            <button 
                                name="submit"
                                id="addWallet" 
                                class="btn btn-primary mt-3">افزودن</button>
                        </form>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <?php
            }
            ?>




            

        </div>
   </div>
 




</body>
</html>

<?php
if(isset($_POST['submit'])){
    $newAddress = $_POST['newAddress'];
    $sql = "INSERT INTO wallets (address) VALUES ('$newAddress')";
    if ($conn->query($sql) === TRUE) {
        echo "والت  با موفقیت افزوده شد";
    } else {
        echo "خطا: ". $sql. "<br>". $conn->error;
    }
}
