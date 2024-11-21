<style>
/* Set the sidebar to RTL */
.sidebar {
    direction: rtl; /* This ensures the whole sidebar follows RTL layout */
    text-align: right; /* Align text to the right */
}

/* Active link style */
.sidebar a.active {
    color: #ffff00; 
    background-color: #495057;
}

</style>


<?php
include "functions.php";

if($admin == 1){

?>

<div class="sidebar" id="sidebar">
    <span class="close-btn" onclick="toggleSidebar()">×</span>
    <span><?=get_name($id)?></span>
    <a href="index.php" class="sidebar-link">داشبورد</a>
    <a href="courses.php" class="sidebar-link">آموزش ها</a>
    <a href="user.php" class="sidebar-link">پروفایل</a>
    <a href="users.php" class="sidebar-link">مدیریت کابران</a>
</div>

<?php
}else{
?>
<div class="sidebar" id="sidebar">
    <span class="close-btn" onclick="toggleSidebar()">×</span>
    <span><?=get_name($id)?></span>
    <a href="index.php" class="sidebar-link">داشبورد</a>
    <a href="courses.php" class="sidebar-link">آموزش ها</a>
    <a href="user.php" class="sidebar-link">پروفایل</a>
</div>
<?php
}
?>


<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get the current page's filename from the URL
    const currentPage = window.location.pathname.split('/').pop();

    // Get all sidebar links
    const sidebarLinks = document.querySelectorAll('.sidebar .sidebar-link');

    // Loop through each link and set the active class based on the current page
    sidebarLinks.forEach(link => {
        // If the link's href matches the current page, add 'active' class
        if (link.getAttribute('href').split('/').pop() === currentPage) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });

    // Add event listener to update active class on click
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Remove 'active' class from all links
            sidebarLinks.forEach(link => link.classList.remove('active'));
            
            // Add 'active' class to the clicked link
            this.classList.add('active');
        });
    });
});

</script>

<script>
    // Toggle sidebar on small screens
    function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("show");
    }   
</script>