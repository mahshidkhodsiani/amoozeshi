<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar RTL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      width: 250px;
      background-color: #343a40;
      color: white;
      transition: all 0.3s ease;
      padding-top: 60px;
    }
    .sidebar a {
      color: white;
      padding: 15px;
      text-decoration: none;
      display: block;
      font-size: 18px;
    }
    .sidebar a:hover {
      background-color: #575757;
    }
    .sidebar .active {
      background-color: #28a745;
    }
    .sidebar .close-btn {
      position: absolute;
      top: 15px;
      right: 15px;
      color: white;
      font-size: 24px;
      cursor: pointer;
    }
    /* Mobile responsive styles */
    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(100%);
        z-index: 999;
      }
      .sidebar.show {
        transform: translateX(0);
      }
    }
    .content {
      margin-right: 250px;
      padding: 20px;
    }
    @media (max-width: 768px) {
      .content {
        margin-right: 0;
      }
    }
  </style>
</head>
<body dir="rtl">
  

  

  
  <script>
    // Toggle sidebar on small screens
    function toggleSidebar() {
      document.getElementById("sidebar").classList.toggle("show");
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
