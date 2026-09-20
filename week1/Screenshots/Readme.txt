 PHP Programming Screenshots

This README explains the PHP programming screenshots in the folder using simple English.

Each screenshot demonstrates a different PHP concept from the practice code.

Screenshot 1 — Echo & Print with parentheses_2.png

 What this screenshot shows

This screenshot demonstrates using `echo` and `print` with parentheses.

 explanation

`echo` is used to display information on a webpage.

`print` is also used to display information.

Both `echo` and `print` can be written with parentheses around the value.

Code shown

```php
// Echo with parentheses
echo ("<h3>Welcome to my PHP practice page</h3>");

// Print with parentheses
print ("<h3>Practicing PHP step by step</h3>");
```

 Output

The browser displays:
Welcome to my PHP practice page

Practicing PHP step by step


Screenshot 2 — Echo & Print_2.png

What this screenshot shows

This screenshot demonstrates the basic `echo` and `print` statements in PHP.

  explanation

`echo` is used to display the text **Learning PHP Programming**.

`print` is used to display the text **PHP is interesting to learn**.

The `<h1>` and `<h2>` tags are HTML headings.

 Code shown


php
// Echo statement
echo "<h1>Learning PHP Programming</h1>";

// Print statement
print "<h2>PHP is interesting to learn</h2>";

Output

The browser displays:

Learning PHP Programming

PHP is interesting to learning


Screenshot 3 — Echo with multiple values _2.png

 What this screenshot shows

This screenshot demonstrates using `echo` with multiple values.

 Easy English explanation

`echo` can display multiple values at the same time.

The values are separated by commas.

In this example, `PHP` and `Programming` are displayed together.

 Code shown

php
// Echo with multiple values
echo "<p>", "PHP ", "Programming</p>";


Output

The browser displays:

PHP Programming


 Screenshot 4 — Echo with single & double quotes_2.png

 What this screenshot shows

This screenshot demonstrates using `echo` with both single quotes and double quotes.


 explanation

PHP allows strings to be written using single quotes or double quotes.

The first `echo` uses single quotes.

The second `echo` uses double quotes.

Both statements display text on the webpage.

 Code shown

php
// Echo with single quotes
echo '<p>This message is displayed using echo.</p>';

// Echo with double quotes
echo "<p>Today I am practicing PHP.</p>";


 Output

The browser displays:

This message is displayed using echo.**

Today I am practicing PHP.**



Screenshot 5 — Print with single & double quotes_2.png

What this screenshot shows

This screenshot demonstrates using `print` with single quotes and double quotes.

 explanation

`print` can also use both single quotes and double quotes.

The first `print` uses single quotes.

The second `print` uses double quotes.

Both statements display text on the webpage.

 Code shown

php
// Print with single quotes
print '<p>I am learning web development.</p>';

// Print with double quotes
print "<p>PHP works with HTML.</p>";

Output

The browser displays:

I am learning web development


PHP works with HTML.

 Screenshot 6 — String Length using strlen_2.png

What this screenshot shows

This screenshot demonstrates the `strlen()` function in PHP.

 explanation

`strlen()` is used to count the number of characters in a string.

The variable `$sentence` stores the text:

`I enjoy learning programming`

`strlen()` counts all characters, including spaces.

 Code shown

php
// String length using strlen()
$sentence = "I enjoy learning programming";
echo strlen($sentence);


 Output

The browser displays:

29

The number represents the total number of characters in the sentence, including spaces.


Screenshot 7 — Variable with Echo & print_2.png

 What this screenshot shows

This screenshot demonstrates creating variables and displaying their values using `echo` and `print`.

 explanation

`$studentName` is a variable that stores the student's name.

`echo` displays the value stored in `$studentName`.

`$courseName` is another variable that stores the course name.

`print` displays the value stored in `$courseName`.

 Code shown

php
// Variable with echo
$studentName = "Qaali Abdullahi";
echo "<h2>Student Name: $studentName</h2>";

// Variable with print
$courseName = "PHP Programming";
print "<h2>Course: $courseName</h2>";
 Output

The browser displays:

Student Name: Qaali Abdullahi

Course: PHP Programming

 Screenshot 8 — Word count using str_word_coun_2.png

 What this screenshot shows

This screenshot demonstrates the `str_word_count()` function in PHP.

 explanation

`str_word_count()` is used to count the number of words in a string.

The variable `$message` stores the sentence:

`PHP makes web development easier`

The sentence contains five words.

 Code shown

php
// Word count using str_word_count()
$message = "PHP makes web development easier";
echo str_word_count($message);


Output

The browser displays:

5

The number `5` means that PHP counted five words in the sentence.

 Summary

This PHP practice code demonstrates several basic PHP programming concepts.

The main concepts covered are:
_ `echo` statement
_ `print` statement
_ Echo with single quotes
_ Echo with double quotes
_ Print with single quotes
_ Print with double quotes
_ Echo with parentheses
_ Print with parentheses
_ Echo with multiple values
_ `strlen()` function
_ `str_word_count()` function
_ Creating PHP variables
_ Displaying variables using `echo`
_ Displaying variables using `print`
_ Combining PHP with HTML

These exercises help build a basic understanding of PHP syntax, output statements, strings, functions, and variables.
