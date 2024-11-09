<style>
/* Set the sidebar to RTL */
.sidebar {
    direction: rtl; /* This ensures the whole sidebar follows RTL layout */
    text-align: right; /* Align text to the right */
}

.sidebar h3 {
    text-align: center;
    margin-bottom: 20px;
    color: #fff; /* Adjust text color if necessary */
}

.sidebar-link {
    display: flex;
    align-items: center;
    justify-content: flex-start; /* Align items from right to left */
    padding: 10px 15px;
    color: #fff;
    text-decoration: none;
}

.sidebar-link i {
    margin-right: 8px; /* Space between icon and text */
    margin-left: 0; /* No space on the left side */
}

/* Active link styling */
.sidebar-link.active {
    color: green;
    font-weight: bold;
}

/* Hover styling */
.sidebar-link:hover {
    color: #ccc;
}


</style>
<div class="sidebar">
    <h3 class="text-white  mb-4">Admin Panel</h3>
    <a href="index.php" data-page="index" class="sidebar-link"><i class="fa fa-home"></i> داشبورد</a>
    <a href="courses.php" data-page="courses" class="sidebar-link"><i class="fa fa-chalkboard"></i> آموزش ها</a>
    <a href="user.php" data-page="user" class="sidebar-link"><i class="fa fa-user"></i> پروفایل</a>
    <a href="reports.php" data-page="reports" class="sidebar-link"><i class="fa fa-chart-line"></i> پورسانت ها</a>
    <a href="settings.php" data-page="settings" class="sidebar-link"><i class="fa fa-cog"></i> تنظیمات</a>
</div>