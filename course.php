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
  <title>آموزش ها</title>
 

  <link rel="stylesheet" href="css/mainstyles.css">

</head>
<body>




    <?php
    include "sidebar.php";
    include "includes.php";
    include "config.php";
    ?>

 
    <div class="content">
        <?php include "header.php"; ?>

        <div class="container">
            <div class="container">
        
                <div class="row mt-2">
                    <div class="col-md-6" style="text-align: right;">
                        <h2 class="">آموزش ها</h2>
                    </div>
             
                </div>
            

                <br>
                <div class="row mt-5 justify-content-center">
                    <?php
                    $course = $_GET['num'];
                    $sql = "SELECT * FROM courses WHERE category = '$course'";
                    $result = $conn->query($sql);
                    $counter = 0; // To track the number of cards in a row
                    
                    while ($row = $result->fetch_assoc()) {
                        if ($counter % 3 == 0 && $counter != 0) {
                            // Close the current row and start a new one after every 3 cards
                            echo '</div><div class="row mt-3 justify-content-center">';
                        }
                        ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                                    <?php
                                    // Check the file type and display the appropriate player
                                    if ($row['fileType'] == 'mp3' || $row['fileType'] == 'm4a') {
                                        // Use an audio player for mp3 and m4a files
                                        echo '<audio controls>
                                                <source src="' . htmlspecialchars($row['file']) . '" type="audio/' . ($row['fileType'] == 'mp3' ? 'mpeg' : 'mp4') . '">
                                                Your browser does not support the audio element.
                                            </audio>';
                                    } elseif ($row['fileType'] == 'mp4') {
                                        // Use a video player for mp4 files
                                        echo '<video controls width="100%">
                                                <source src="' . htmlspecialchars($row['file']) . '" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>';
                                    } else {
                                        // Display a placeholder for unsupported file types
                                        echo '<p class="card-text">Unsupported file type.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>


                        <?php
                        $counter++;
                    }
                    ?>
                </div>


            </div>
        </div>

    </div>






</body>
</html>
