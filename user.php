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
    ?>

    <!-- Main Content -->
    <div class="content">
        <h2 class="mb-4">Dashboard</h2>
        
        <!-- Card Row -->
        <div class="row">
            <div class="col-md-3">
            <div class="card text-white bg-primary mb-4">
                <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text">2,345</p>
                </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card text-white bg-success mb-4">
                <div class="card-body">
                <h5 class="card-title">Revenue</h5>
                <p class="card-text">$4,567</p>
                </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card text-white bg-warning mb-4">
                <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <p class="card-text">745</p>
                </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card text-white bg-danger mb-4">
                <div class="card-body">
                <h5 class="card-title">Issues</h5>
                <p class="card-text">13</p>
                </div>
            </div>
            </div>
        </div>
    
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the current page's filename from the URL
            const currentPage = window.location.pathname.split('/').pop().split('.').shift();

            // Get all sidebar links
            const sidebarLinks = document.querySelectorAll('.sidebar-link');

            // Loop through each link and set the active class based on data-page
            sidebarLinks.forEach(link => {
            if (link.getAttribute('data-page') === currentPage) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
            });
        });
    </script>





</body>
</html>
