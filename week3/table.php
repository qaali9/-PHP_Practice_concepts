<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$info = array(
    1 => "Qali",
    2 => "Abdullahi",
    3 => "Hassan"
);

echo "<h3>student information</h3>";

echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "</tr>";

foreach ($info as $id => $name) {
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "</tr>";
}

echo "</table>";

?>


</table>
</body>
</html>