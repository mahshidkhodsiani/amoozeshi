<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Arrow</title>
    <style>
        /* Style the container */
        .container {
            margin: 20px;
            font-family: Arial, sans-serif;
        }

        /* Style the arrow */
        .arrow {
            cursor: pointer;
            font-size: 30px;
            transition: transform 0.3s ease;
        }

        /* Style for hidden content */
        .content {
            display: none;
            padding: 20px;
            margin-top: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* When the content is visible, show it */
        .content.show {
            display: block;
        }

        /* Rotate arrow when clicked */
        .arrow.open {
            transform: rotate(180deg);
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Arrow and content -->
        <div class="arrow" id="arrow">&#8595;</div>
        <div class="content" id="content">
            <p>This is the hidden content that appears when you click the arrow!</p>
        </div>
    </div>

    <script>
        // Get the arrow and content elements
        const arrow = document.getElementById('arrow');
        const content = document.getElementById('content');

        // Add click event listener to toggle the content visibility
        arrow.addEventListener('click', function() {
            // Toggle the visibility of the content
            content.classList.toggle('show');
            
            // Rotate the arrow when content is shown
            // arrow.classList.toggle('open');
        });
    </script>

</body>
</html>
