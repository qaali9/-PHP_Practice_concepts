<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Question 1
    echo "<h2>Three integer numbers Greatest and smallest</h2>";
    $num1 = 20;
    $num2 = 30;
    $num3 = 40;
    
    if ($num1 >= $num2 && $num1 >= $num3)
    {
        $greatest = $num1;
    }
    elseif ($num2 >= $num1 && $num2 >= $num3)
    {
        $greatest = $num2;
    }
    else
    {
        $greatest = $num3;
    }

    if ($num1 <= $num2 && $num1 <= $num3)
    {
        $smallest = $num1;
    }
    elseif ($num2 <= $num1 && $num2 <= $num3)
    {
        $smallest = $num2;
    }
    else
    {
        $smallest = $num3;
    }
    echo "Greatest number: " . $greatest . "<br>";
    echo "Smallest number: " . $smallest;

    //Question 2
    echo "<h2>program that prints whether the number is divisible by 3,5:</h2>";
    $number = 20;
    if ($number % 3 == 0 && $number % 5 == 0) {
        echo "$number is divisible by both 3 and 5.";
    } elseif ($number % 3 == 0) {
        echo "$number is divisible by 3.";
    } elseif ($number % 5 == 0) {
        echo "$number is divisible by 5.";
    } else {
        echo "$number is not divisible by either 3 or 5.";
    }

    //Question 3
    echo "<h2>Odd numbers from 2 to 20: </h2>";
    for ($number = 2; $number <= 20; $number++) {
        if ($number % 2 != 0) {
            echo $number . " ";
        }
    }

    echo "<h2>Even numbers from 35 down to 7:</h2>";
    for ($number = 35; $number >= 7; $number--) {
        if ($number % 2 == 0) {
            echo $number . " ";
        }
    }

    //Question 4
    echo "<h2>numbers divisible by 2 and 5 at the same from 50 t0 2</h2>";
    for($i= 50; $i>=2;$i--){
         if ($i % 2 == 0 && $i % 5 == 0){
            echo $i . " ";
         }
    }
 // Question 5 - Reverse a number
  echo "<h2>Reverse of a number</h2>";
$number = 12345;
$remaining = $number;
$reverse = 0;

while ($remaining > 0) {
    $lastdigit = $remaining % 10;
    $reverse = ($reverse * 10) + $lastdigit;
    $remaining = intdiv($remaining, 10);
}

echo "Number: " . $number . "<br>";
echo "Reverse: " . $reverse . "<br>";


// Question 6 - Find the LCM of two numbers
  echo "<h2>LCM of two numbers</h2>";
$num1 = 8;
$num2 = 12;

$lcm = ($num1 > $num2) ? $num1 : $num2;

while (true) {
    if ($lcm % $num1 == 0 && $lcm % $num2 == 0) {
        break;
    }
    $lcm++;
}

echo "LCM: " . $lcm . "<br>";


// Question 7 - Find the HCF of two numbers
echo "<h2>HCF of two numbers</h2>";
$num1 = 18;
$num2 = 24;

$hcf = 1;

for ($i = 1; $i <= $num1 && $i <= $num2; $i++) {
    if ($num1 % $i == 0 && $num2 % $i == 0) {
        $hcf = $i;
    }
}

echo "HCF: " . $hcf . "<br>";


// Question 8 - Multiplication table up to 12 x 12
//8
echo "question 8:";
echo "<h3>Multiplication Table (12 * 12)</h3>";
echo "<table border='1'>"; 
for($i=1; $i<=12; $i++){ 
    echo "<tr>"; 
    for($j=1; $j<=12; $j++) { 
        echo "<td>".($i*$j)."</td>"; 
    } 
    echo "</tr>"; 
} 
echo "</table><br>";

// Question 9 - Check if a number is prime or non-prime
echo "<h2>Check if a number is prime or non-prime</h2>";
$number = 1;
$isPrime = true;

if ($number < 2) {
    $isPrime = false;
}

for ($i = 2; $i < $number; $i++) {
    if ($number % $i == 0) {
        $isPrime = false;
        break;
    }
}

if ($isPrime) {
    echo "The number is Prime<br>";
} else {
    echo "The number is Non-Prime<br>";
}

// Question 10 - Print prime numbers from 10 to 50
echo "<h2>Prime Numbers from 10 to 50</h2>";
for ($number = 10; $number <= 50; $number++) {

    $isPrime = true;

    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            $isPrime = false;
            break;
        }
    }

    if ($isPrime) {
        echo $number . " ";
    }
}
    ?>
</body>
</html>