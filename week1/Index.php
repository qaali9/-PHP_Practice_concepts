<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>PHP Practice</title> 
</head> 
<body> 
 
<?php 
 
// Echo statement 
echo "<h1>Learning PHP Programming</h1>"; 
 
// Print statement 
print "<h2>PHP is interesting to learn</h2>"; 
 
// Echo with single quotes 
echo '<p>This message is displayed using echo.</p>'; 
 
// Echo with double quotes 
echo "<p>Today I am practicing PHP.</p>"; 
 
// Print with single quotes 
print '<p>I am learning web development.</p>'; 
 
// Print with double quotes 
print "<p>PHP works with HTML.</p>"; 
 
// Echo with parentheses 
echo ("<h3>Welcome to my PHP practice page</h3>"); 
 
// Print with parentheses 
print ("<h3>Practicing PHP step by step</h3>"); 
 
// Echo with multiple values 
echo "<p>", "PHP ", "Programming</p>"; 
 
 
// String length using strlen() 
$sentence = "I enjoy learning programming"; 
echo strlen($sentence); 
 
// Word count using str_word_count() 
$message = "PHP makes web development easier"; 
echo str_word_count($message); 
 
// Variable with echo 
$studentName = "Qaali Abdullahi"; 
echo "<h2>Student Name: $studentName</h2>"; 
 
// Variable with print 
$courseName = "PHP Programming"; 
print "<h2>Course: $courseName</h2>"; 
 
?> 
 
</body> 
</html> 