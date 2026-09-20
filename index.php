<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Practice</title>
</head>

<body>

<?php



//  CONSTANT VARIABLES 
define("AGE", 21);

echo "Constant Age: " . AGE . "<br><br>";


// IF / ELSE 
$Age = 20;

if ($Age >= 18) {
    echo "<h1>Adult</h1>";
} else {
    echo "<h1>Child</h1>";
}


//  SWITCH STATEMENT 
$marks = 87;

switch ($marks) {

    case 90:
        echo "Excellent";
        break;

    case 87:
        echo "<h1>Very Good</hi>";
        break;

    case 70:
        echo "Good";
        break;

    default:
        echo "No matching mark";
}

echo "<br><br>";


//  TERNARY OPERATOR 
$fuel = 0.5;

echo $fuel <= 1
    ? "<h1>Low Tank</h1>"
    : "<h1>Full Tank</h1>";


//  WHILE LOOP
$count = 1;

while ($count <= 5) {
    echo $count . "<br>";
    $count++;
}


// DO WHILE LOOP
$count = 1;

do {
    echo "num: " . $count . "<br>";
    $count++;
} while ($count <= 5);


//FOR LOOP 
for ($count = 1; $count <= 10; $count++) {
    echo "$count times 10 is " . ($count * 10) . "<br>";
}


// SQUARE 
for ($i = 1; $i <= 10; $i++) {
    echo "square of $i is " . ($i * $i) . "<br>";
}


//  BREAK
$i = 1;

while ($i <= 15) {

    echo "$i, ";

    $i++;

    if ($i == 10) {
        break;
    }
}

echo "<br>";


// CONTINUE
$i = 0;

do {
    $i++;

    if ($i % 2 == 0) {
        continue;
    } else {
        echo "$i, ";
    }

} while ($i <= 15);

echo "<br>";


//NESTED LOOP
for ($i = 1; $i <= 12; $i++) {

    for ($j = 1; $j <= 5; $j++) {

        echo "$i * $j = " . ($i * $j) . "<br>";
    }
}



?>

</body>
</html>