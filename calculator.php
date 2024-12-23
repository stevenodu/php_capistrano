<?php

class Calculator
{
    public function calculate($a, $b, $operator)
    {
        // Sanitize input
        $a = filter_var($a, FILTER_VALIDATE_FLOAT);
        $b = filter_var($b, FILTER_VALIDATE_FLOAT);
        
        if ($a === false || $b === false) {
            return "Invalid input. Please enter valid numbers.";
        }

        switch ($operator) {
            case '+':
                return $a + $b;
            case '-':
                return $a - $b;
            case '*':
                return $a * $b;
            case '/':
                return ($b != 0) ? $a / $b : "Cannot divide by zero.";
            default:
                return "Invalid operator selected.";
        }
    }
}

// Handle form submission
$result = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $calculator = new Calculator();
    $result = $calculator->calculate($_POST['n1'], $_POST['n2'], $_POST['op']);
}
?>
