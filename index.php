<?php
echo "Hi there ... <br> This is a simple PHP application deployed by Capistrano <br><br>";
echo "Today is " . date("Y-m-d");
date_default_timezone_set("Africa/Nairobi");
echo " and the time is " . date("h:i:sa") . "<br><br>";
echo "I thought you should know that ";

$date = strtotime("June 31, 2018 2:00 PM");
$remaining = $date - time();
$days_remaining = floor($remaining / 86400);
$hours_remaining = floor(($remaining % 86400) / 3600);
$min = floor(($remaining % 3600) / 60);
$sec = ($remaining % 60);
echo " there are $days_remaining days, $hours_remaining hours, $min minutes and $sec seconds remaining to June 31st"
?>


<?php 
	$result = "";
class calculator
{
    var $a;
	    var $b;
        function checkopration($oprator)
	    {
            switch($oprator)
            {
                case '+':
	            return $this->a + $this->b;
	            break;

                case '-':
	            return $this->a - $this->b;
                break;

                case '*':
	            return $this->a * $this->b;
                break;

                case '/':
	            return $this->a / $this->b;
                break;

                default:
	            return "Sorry No command found";
            }   
        }
		    function getresult($a, $b, $c)
			        {
					        $this->a = $a;
						        $this->b = $b;
						        return $this->checkopration($c);
							    }
}

$cal = new calculator();
if(isset($_POST['submit']))
{   
	    $result = $cal->getresult($_POST['n1'],$_POST['n2'],$_POST['op']);
}
?>

<html>
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
    padding: 5px 10px ;
    font-size: 32px;
    border-radius: 5px;
    box-shadow: 0 0 0 5px #ddd;
    margin-left: 20px;
}

</style>
<body bgcolor="turquoise">
<br><br><br><b>
<form method="post">
<fieldset style="min-height:100px;width:30%;margin-left:10%;">
<legend>Simple Calculator:</legend>
<table align="center">
    <tr>
        <td>Enter 1st Number</td>
        <td><input type="text" name="n1"></td>
    </tr>

    <tr>
        <td>Enter 2nd Number</td>
        <td><input type="text" name="n2"></td>
    </tr>

    <tr>
        <td>Select Oprator</td>
        <td><select name="op">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select></td>
    </tr>

    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="="></td>
    </tr>
    

    <tr>
        <td><strong><?php echo $result; ?><strong></td>
    </tr>
</table>
</fieldset>
</form>
</body>
</html>


