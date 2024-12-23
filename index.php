<?php
date_default_timezone_set("Africa/Nairobi"); // Set timezone
echo "Author: Stephen Oduor Otieno<br>";
echo "Hi there ... <br> This is a simple PHP application deployed by Capistrano <br><br>";
echo "Today is " . date("Y-m-d") . " and the time is " . date("h:i:sa") . "<br><br>";

$target_date = strtotime("June 30, 2018 2:00 PM"); // Corrected date
$remaining = $target_date - time();
if ($remaining > 0) {
    $days_remaining = floor($remaining / 86400);
    $hours_remaining = floor(($remaining % 86400) / 3600);
    $minutes = floor(($remaining % 3600) / 60);
    $seconds = $remaining % 60;
    echo "There are $days_remaining days, $hours_remaining hours, $minutes minutes, and $seconds seconds remaining to June 30th<br><br>";
} else {
    echo "The target date has passed.<br><br>";
}

// Include the calculator class and form
include 'calculator.php';
?>

<html>
<head>
    <title>PHP Application</title>
    <style>
        fieldset {
            font-family: sans-serif;
            border: 5px solid #1F497D;
            background: #ddd;
            border-radius: 5px;
            padding: 15px;
        }

        fieldset legend {
            background: #1F497D;
            color: #fff;
            padding: 5px 10px;
            font-size: 32px;
            border-radius: 5px;
            box-shadow: 0 0 0 5px #ddd;
            margin-left: 20px;
        }
    </style>
</head>
<body bgcolor="turquoise">
    <br><br><br><b>
    <?php include 'calculator_form.php'; ?>
</body>
</html>