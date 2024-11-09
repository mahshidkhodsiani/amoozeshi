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
            <div class="col-md-4">
            <div class="btn mb-2 mb-md-0 btn-outline-quarternary btn-block">
                <div class="card-body">
                <h5 class="card-title">پولسازی</h5>
                <p class="card-text">دوره روانشناسی پول و ثروت</p>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="btn mb-2 mb-md-0 btn-outline-secondary btn-block">
                <div class="card-body">
                <h5 class="card-title">تصاعد</h5>
                <p class="card-text">دوره تصاعد</p>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="btn mb-2 mb-md-0 btn-outline-tertiary btn-block">
                <div class="card-body">
                <h5 class="card-title">کریپتو</h5>
                <p class="card-text">دوره کامل کریپتو </p>
                </div>
            </div>
            </div>
           
        </div>

        <br>

        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title font-weight-bold">Beautiful Card Title</h5>
                        <h6 class="card-subtitle mb-3 text-muted">Subtitle here</h6>
                        <p class="card-text text-secondary">This is a beautifully designed card that can showcase your content in a stylish way. Add your description here to make it informative and engaging.</p>
                        
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title font-weight-bold">Beautiful Card Title</h5>
                        <h6 class="card-subtitle mb-3 text-muted">Subtitle here</h6>
                        <p class="card-text text-secondary">This is a beautifully designed card that can showcase your content in a stylish way. Add your description here to make it informative and engaging.</p>
                        
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 22rem;">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title font-weight-bold">Beautiful Card Title</h5>
                        <h6 class="card-subtitle mb-3 text-muted">Subtitle here</h6>
                        <p class="card-text text-secondary">This is a beautifully designed card that can showcase your content in a stylish way. Add your description here to make it informative and engaging.</p>
                        
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
