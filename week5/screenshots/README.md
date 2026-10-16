# PHP Programming — Screenshots

This README explains the 4 screenshots in this folder. Two of them are taken from `select_residence.php` and two are taken from `upload.php`, both shown in the VS Code editor. The examples cover single choice and multiple choice drop-down lists, and uploading a file with PHP.

## 1. Single_Choice.png

### What this screenshot shows
The code in `select_residence.php` that creates a drop-down list where the user can choose only one residence.

### Explanation
- `<form method="post">` sends the chosen value to PHP using the POST method.
- `<select name="single">` creates the drop-down list. The name `single` is the key PHP uses to read the value.
- The first option, "Choose Residence", has `value=""`, so it sends an empty value. The other options (Muqdisho, bosaaso, Marko, kismayo) send their own values.
- The submit button is named `submit1`. `isset($_POST['submit1'])` checks that the Register button was clicked.
- `!empty($_POST['single'])` checks that a real residence was chosen. If so, `echo $_POST['single']` prints it.
- If the user left the first option selected, the `else` branch prints "Please choose a residence".

### Output
The chosen residence (for example "Marko") is printed under the form. If nothing was chosen, the page prints "Please choose a residence".

## 2. Multiple_Choice.png

### What this screenshot shows
The code in `select_residence.php` that creates a list where the user can choose more than one residence at the same time.

### Explanation
- `<select name="multiple[]" multiple size="5">` creates a list box. The word `multiple` allows many selections, and `size="5"` shows 5 rows at once.
- The name ends with `[]`. This tells PHP to store all the chosen values in an array. Without the brackets, PHP would keep only the last choice.
- The first option, "Choose Residence", has the `disabled` attribute, so the user cannot select it. The other options are Muqdisho, bosaaso, Kismayo, and Marko.
- The submit button is named `submit2`, so `isset($_POST['submit2'])` checks that this form was submitted.
- `!empty($_POST['multiple'])` checks that at least one residence was chosen.
- `foreach ($_POST['multiple'] as $r)` loops through the array and runs `echo "$r, "` to print each chosen residence followed by a comma.
- If nothing was chosen, the `else` branch prints "Please choose a residence".

### Output
All chosen residences are printed on one line separated by commas, for example "Muqdisho, Kismayo, ". The user must hold Ctrl while clicking to choose more than one.

## 3. upload-1.png

### What this screenshot shows
The top of `upload.php`: the HTML upload form, and the first part of the PHP code that reads the file information and prepares the destination folder.

### Explanation
- `<form action="" method="post" enctype="multipart/form-data">` is the upload form. `method="post"` and `enctype="multipart/form-data"` are both required, otherwise the file is not sent. `action=""` sends the form back to the same page.
- `<input type="file" name="scertificate" required>` is the Choose File button. The `required` attribute stops the user from submitting without a file.
- The submit button is named `submit`, and `isset($_POST['submit'])` makes the PHP code run only after it is clicked.
- `!empty($_FILES['scertificate']['name'])` checks that a file was really selected.
- Four `echo` lines display the file information stored in the `$_FILES` array: `name` (original file name), `size` (size in bytes), `tmp_name` (temporary location on the server), and `type` (file type).
- `$folder` stores the destination path `C:\Users\hp\Downloads\move files`.
- `is_dir($folder)` checks whether that folder exists, and `mkdir($folder, 0775, true)` creates it if it does not.

### Output
After a file is uploaded, the page prints the File Name, File Size, Temporary Name, and File Type, each on its own line.

## 4. upload-2.png

### What this screenshot shows
The bottom of `upload.php`: moving the uploaded file from the temporary folder to the destination, and displaying a message.

### Explanation
- `$temp` takes the temporary file location from `$_FILES['scertificate']['tmp_name']`.
- `$destination` joins the folder and the file name. `basename()` keeps only the file name, without any folder path.
- `move_uploaded_file($temp, $destination)` moves the file from the temporary folder to the destination. It returns true if the move worked and false if it failed.
- If it worked, the code echoes "File has been uploaded successfully." Otherwise it echoes "Failed to upload the file."
- The last `else` belongs to the first check and echoes "No file is selected." when the user submitted the form without a file.
- The dot next to `upload.php` in the editor tab means the file has unsaved changes.
- Note: `$folder` does not end with a slash, so `$folder . basename(...)` joins the folder name and the file name into one word (for example `move filesassignment.pdf`). To fix this, end the folder path with a slash, such as `"C:/Users/hp/Downloads/move files/"`.

### Output
"File has been uploaded successfully." if the move worked, "Failed to upload the file." if it did not, or "No file is selected." if no file was chosen.

## Topics covered across these screenshots

- HTML forms with the POST method
- Single choice drop-down list with `<select>`
- Multiple choice list with `multiple` and `name="..[]"`
- Looping through an array with `foreach`
- Checking input with `isset()` and `empty()`
- File upload with `enctype="multipart/form-data"` and the `$_FILES` array
- Creating a folder with `is_dir()` and `mkdir()`
- Moving an uploaded file with `move_uploaded_file()`
