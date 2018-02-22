<!DOCTYPE html>
<html>
<body>
<?php
echo "Author: Stephen Oduor and Sammy Juma";
echo "Hi there ... <br> This is a simple PHP application deployed by Capistrano <br><br>";
echo "Today is " . date("Y-m-d");
date_default_timezone_set("Africa/Nairobi");
echo " and the time is " . date("h:i:sa") . "<br><br>";
echo "I thought you should know also know that ";

$date = strtotime("June 31, 2018 2:00 PM");
$remaining = $date - time();
$days_remaining = floor($remaining / 86400);
$hours_remaining = floor(($remaining % 86400) / 3600);
echo " there are $days_remaining days and $hours_remaining hours remaining to June 31st 2018"
?>
</body>
</html>
