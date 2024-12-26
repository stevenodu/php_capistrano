<?php
date_default_timezone_set("Africa/Nairobi"); // Set timezone
?>
<?php include 'calculator.php'; ?>
<html>
<head>
    <title>PHP Application</title>
    <style>
        body {
            background-color: turquoise;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
        }
        .content {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            border: 2px solid #1F497D;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
        }
        .countdown-green {
            color: green;
            font-weight: bold;
        }
        .countdown-red {
            color: red;
            font-weight: bold;
        }
        fieldset {
            font-family: sans-serif;
            border: 5px solid #1F497D;
            background: #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            width: 90%;
            max-width: 600px;
        }
        fieldset legend {
            background: #1F497D;
            color: #fff;
            padding: 5px 10px;
            font-size: 32px;
            border-radius: 5px;
            box-shadow: 0 0 0 5px #ddd;
        }
    </style>
    <script>
        function updateCountdown(targetTimestamp) {
            const targetDate = new Date(targetTimestamp * 1000); // Convert to milliseconds
            const now = new Date();

            let remainingTime = Math.floor((targetDate - now) / 1000);
            let passedTime = Math.floor((now - targetDate) / 1000);

            const countdownDiv = document.getElementById("countdown");
            const dateDisplay = targetDate.toLocaleString();

            if (remainingTime > 0) {
                // Calculate remaining time
                const days = Math.floor(remainingTime / 86400);
                const hours = Math.floor((remainingTime % 86400) / 3600);
                const minutes = Math.floor((remainingTime % 3600) / 60);
                const seconds = remainingTime % 60;

                // Display countdown in green
                countdownDiv.innerHTML = 
                    `There are <span class="countdown-green">${days} days, ${hours} hours, ${minutes} minutes, and ${seconds} seconds</span> remaining to ${dateDisplay}`;
            } else {
                // Calculate passed time
                const days = Math.floor(passedTime / 86400);
                const hours = Math.floor((passedTime % 86400) / 3600);
                const minutes = Math.floor((passedTime % 3600) / 60);
                const seconds = passedTime % 60;

                // Display passed countdown in red
                countdownDiv.innerHTML = 
                    `The target date passed <span class="countdown-red">${days} days, ${hours} hours, ${minutes} minutes, and ${seconds} seconds</span> ago.`;
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const targetTimestamp = <?php echo strtotime("June 30, 2025 2:00 PM"); ?>;
            setInterval(() => updateCountdown(targetTimestamp), 1000);
        });
    </script>
</head>
<body>
    <div class="content">
        <?php
        echo "Author: Stephen Oduor<br>";
        echo "Hi there! This is a simple PHP application deployed by Capistrano <br><br>";
        echo "Today is " . date("d-m-Y") . " and the time is " . date("h:i:sa") . "<br><br>";
        ?>
        <div id="countdown"></div>
    </div>
    <fieldset>
        <legend>Calculator</legend>
        <?php include 'calculator_form.php'; ?>
    </fieldset>
</body>
</html>
