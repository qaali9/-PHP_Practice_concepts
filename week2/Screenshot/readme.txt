 PHP Programming Screenshots

This README explains the PHP practice screenshots included in this folder. Each screenshot demonstrates a different PHP concept, including constants, conditional statements, switch statements, ternary operators, loops, break, continue, and nested loops.
 1. Constant Variables

Screenshot — Constant Variables

This screenshot demonstrates how to create and use a constant variable in PHP.

 Code Used

php
define("AGE", 21);

echo "Constant Age: " . AGE;


Explanation

The `define()` function creates a constant named `AGE` with the value `21`.

The constant is displayed using:

php
echo AGE;


 Output

text
Constant Age: 21


 2. If / Else Statement

Screenshot — If / Else

This screenshot demonstrates how to use an `if / else` statement to check a condition.

 Code Used

php
$Age = 20;

if ($Age >= 18) {
    echo "<h1>Adult</h1>";
} else {
    echo "<h1>Child</h1>";
}


 Explanation

The program checks whether the age is greater than or equal to 18.

Since `$Age` is `20`, the condition is true, so the program displays:

text
Adult


 3. Switch Statement

 Screenshot — Switch Statement

This screenshot demonstrates the use of a `switch` statement in PHP.

 Code Used

php
$marks = 87;

switch ($marks) {

    case 90:
        echo "Excellent";
        break;

    case 87:
        echo "Very Good";
        break;

    case 70:
        echo "Good";
        break;

    default:
        echo "No matching mark";
}

 Explanation

The `switch` statement compares the value of `$marks` with different cases.

Since the value is `87`, the program matches `case 87` and displays:

text
Very Good


The `break` statement stops the switch after the matching case.

 4. Ternary Operator

 Screenshot — Ternary Operator

This screenshot demonstrates how to use the ternary operator as a short form of an `if / else` statement.

 Code Used

php
$fuel = 0.5;

echo $fuel <= 1
    ? "<h1>Low Tank</h1>"
    : "<h1>Full Tank</h1>";


 Explanation

The program checks whether `$fuel` is less than or equal to `1`.

Because the value is `0.5`, the condition is true.

 Output

text
Low Tank

The ternary operator follows this structure:

text
condition ? true : false

 5. While Loop

 Screenshot — While Loop

This screenshot demonstrates how to use a `while` loop in PHP.

 Code Used

php
$count = 1;

while ($count <= 5) {
    echo $count . "<br>";
    $count++;
}


 Explanation

The loop starts with `$count = 1` and continues while `$count` is less than or equal to `5`.

The `$count++` increases the value by one after each iteration.

 Output

text
1
2
3
4
5


 6. Do While Loop

 Screenshot — Do While Loop

This screenshot demonstrates the `do while` loop.

 Code Used

php
$count = 1;

do {
    echo "num: " . $count . "<br>";
    $count++;
} while ($count <= 5);
 Explanation

A `do while` loop executes the code first and checks the condition afterward.

The loop prints numbers from `1` to `5`.

Output

text
num: 1
num: 2
num: 3
num: 4
num: 5
 7. For Loop

 Screenshot — For Loop

This screenshot demonstrates how to use a `for` loop.

 Code Used

php
for ($count = 1; $count <= 10; $count++) {
    echo "$count times 10 is " . ($count * 10) . "<br>";
}


 Explanation

The loop starts at `1` and continues until `10`.

For every iteration, the current number is multiplied by `10`.

 Output

text
1 times 10 is 10
2 times 10 is 20
3 times 10 is 30
...
10 times 10 is 100



 8. Square Numbers

 Screenshot — Square

This screenshot demonstrates how to calculate the square of numbers using a `for` loop.

 Code Used

php
for ($i = 1; $i <= 10; $i++) {
    echo "square of $i is " . ($i * $i) . "<br>";
}


 Explanation

The program multiplies each number by itself.

For example:

text
5 × 5 = 25


 Output

text
square of 1 is 1
square of 2 is 4
square of 3 is 9
...
square of 10 is 100


9. Break Statement

 Screenshot — Break

This screenshot demonstrates how the `break` statement stops a loop.

 Code Used

php
$i = 1;

while ($i <= 15) {

    echo "$i, ";

    $i++;

    if ($i == 10) {
        break;
    }
}

 Explanation

The loop normally could continue up to `15`, but the `break` statement stops the loop when `$i` reaches `10`.

 Output

text
1, 2, 3, 4, 5, 6, 7, 8, 9,


 10. Continue Statement

 Screenshot — Continue

This screenshot demonstrates how the `continue` statement skips an iteration of a loop.

 Code Used

php
$i = 0;

do {
    $i++;

    if ($i % 2 == 0) {
        continue;
    } else {
        echo "$i, ";
    }

} while ($i <= 15);



 Explanation

The `%` operator calculates the remainder.

If the number is even, `continue` skips that iteration.

Therefore, only odd numbers are displayed.

 Output

text
1, 3, 5, 7, 9, 11, 13, 15,
 11. Nested Loop

 Screenshot — Nested Loop

This screenshot demonstrates a nested loop, which means a loop inside another loop.

 Code Used

php
for ($i = 1; $i <= 12; $i++) {

    for ($j = 1; $j <= 5; $j++) {

        echo "$i * $j = " . ($i * $j) . "<br>";
    }
}
 Explanation

The outer loop controls the first number from `1` to `12`.

The inner loop controls the second number from `1` to `5`.

For every value of `$i`, the inner loop runs five times.

 Example Output

text
1 * 1 = 1
1 * 2 = 2
1 * 3 = 3
1 * 4 = 4
1 * 5 = 5

2 * 1 = 2
2 * 2 = 4
2 * 3 = 6
2 * 4 = 8
2 * 5 = 10


This demonstrates how nested loops can be used to generate multiplication tables.



 Summary

In this PHP practice, I learned and practiced:

- Constant Variables
- If / Else Statements
- Switch Statements
- Ternary Operators
- While Loops
- Do While Loops
-- For Loops
- Square Calculations
- Break Statements
- Continue Statements
- Nested Loops

These exercises helped me understand basic PHP syntax, conditional statements, and different types of loops.
