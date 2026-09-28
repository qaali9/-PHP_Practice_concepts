# PHP Programming — Screenshots

This README explains the 7 screenshots in this folder i. All of them are taken from the same file, `associatedArry.php`, at different scroll positions in the editor. The examples cover multidimensional arrays, array checks, array functions, and PHP functions.

## 1. Multidimensional Array.png

### What this screenshot shows
The top of `associatedArry.php` — creating a multidimensional array and displaying it two different ways.

###  explanation
- `$info` is a multidimensional array with two inner arrays, each holding a number, a code, and a mark.
- The first `foreach ($info as $list)` loop uses `print_r($list)` to print each inner array as a whole, on its own line.
- `$info` is then recreated with the same values, and a second, nested `foreach` loop goes inside each inner array and prints every individual value with `echo $value`, separated by spaces.

### Output
The page first prints the raw structure of each inner array using `print_r()`, then prints the same data again as plain space-separated values.

## 2. table with associative array.png

### What this screenshot shows
Displaying student records in an HTML table using a two-dimensional array.

###  explanation
- `$student` holds three inner arrays, each with a name, year, address, and phone number.
- PHP echoes out the opening `<table>` tag and the header row (`<th>`) for Name, Year, Address, and Phone.
- `foreach ($student as $k)` then loops through each student record and echoes a table row (`<tr>`), pulling out each value with `$k[0]`, `$k[1]`, `$k[2]`, `$k[3]`.

### Output
A "student information" table with four columns, containing the three students: qali, yusra, and sumaya.

## 3. check is array.png

### What this screenshot shows
Two checks using `is_array()` — one on an actual array, and one on a plain string.

### explanation
- `$student` is first set to an array of three names. `is_array($student)` returns true, so the code echoes "Yes, is array".
- `$student` is then reassigned to the string `"Qali"`. `is_array($student)` now returns false, so the code echoes "Not array".
- This shows that the same variable name can be checked before and after it changes type.

### Output
"Yes, is array" followed by "Not array" on the next check.

## 4. Creating a multidimensional array.png

### What this screenshot shows
Creating a simple array, creating a multidimensional array, and searching inside it with `in_array()`.

###  explanation
- `$info` is a plain indexed array of five numbers.
- `$MULTI` is a multidimensional array containing two inner arrays of numbers.
- `in_array(90, $MULTI[0])` checks whether 90 exists only inside the *first* inner array (`$MULTI[0]`), not the whole `$MULTI` array.
- Since 90 is in the first inner array, the `if` branch runs.

### Output
"Waan Soo Helay" (meaning the value was found), since 90 is inside `$MULTI[0]`.

## 5. array_merge&array_reverse.png

### What this screenshot shows
Combining two arrays with `array_merge()`, and reversing an array with `array_reverse()`.

###  explanation
- `$a1` and `$a2` are two small arrays of names. `array_merge($a1, $a2)` combines them into one new array, `$merge`, keeping the order they were merged in.
- `$student` is a separate array of three names. `array_reverse($student)` returns a new array, `$reverse`, with the names in the opposite order.
- `print_r()` is used to display the contents of both `$merge` and `$reverse`.

### Output
The merged array shows all four names from `$a1` and `$a2` together, followed by the reversed array showing Sumaya, Yusra, Qali (the reverse of the original order).

## 6. functionin&calling.png

### What this screenshot shows
Two user-defined functions: one that echoes its own result, and one that returns a value to the caller.

### explanation
- `sum($x, $y = 100)` adds two numbers and echoes the result directly inside the function. `$y` has a default value of 100, so it can be called with just one argument.
- `sum(10, 200)` calls the function with both arguments supplied.
- `multiply($x, $y)` multiplies two numbers and uses `return` to send the result back, instead of echoing it itself.
- Because `multiply()` returns a value, it can be used directly inside a bigger `echo` statement, joined together with the `.` operator.

### Output
"The sum of 10 and 200 is: 210" from the `sum()` call, followed by "The multiplication result is: 2000" from the `multiply()` call.

## 7. function  two parameters.png

### What this screenshot shows
A second version of the `sum()` function, called twice, plus a check for whether a function exists.

### explanation
- `sum($x, $y = 100)` is defined again here (as a separate example), still echoing its result and still using 100 as the default for `$y`.
- `sum(5, 10)` supplies both arguments.
- `sum(5)` supplies only `$x`, so `$y` falls back to its default value of 100.
- `function_exists("factorial")` checks whether a function named `factorial` has been defined anywhere in the file. Since it hasn't, this check returns false and nothing is printed for that line.

### Output
"Sum of 5 and 10 is: 15" followed by "Sum of 5 and 100 is: 105". Nothing prints for the `function_exists` check, since `factorial` was never defined in this file.

## Topics covered across these screenshots

- Multidimensional arrays and nested `foreach` loops
- Displaying array data in an HTML table
- Array functions: `is_array()`, `in_array()`, `array_merge()`, `array_reverse()`
- Functions that display a result (`echo`) and functions that return a value (`return`)
- Default argument values
- Checking whether a function exists with `function_exists()`
