# PHP Programming - Week 6

This week introduces file upload handling in PHP, including validating the uploaded file, checking file size, restricting allowed extensions, and optionally renaming the uploaded file before saving it.

---

## 1. `RenameFile.php`

### What this file shows

This file demonstrates how to upload an image to the server, display its information, and save it with either its original name or a custom name entered by the user.

### Easy English explanation

- The form uses `method="post"` and `enctype="multipart/form-data"`, which are required for file uploads.
- The file input field is named `image`.
- The text field named `fullname` lets the user type a new file name if they want to rename the uploaded file.
- When the form is submitted, PHP checks whether a file was selected.
- The script then displays:
  - original file name
  - file size in bytes
  - temporary location on the server
  - file type
- The script checks the file size and allows only images under 10MB.
- Only `png`, `jpeg`, and `jpg` files are accepted.
- If the user enters a custom name, PHP removes unwanted characters using `preg_replace()` and saves the file with that name.
- If the target file already exists in the destination folder, the app shows an error message.
- If everything is valid, `move_uploaded_file()` moves the file to the chosen folder.

### Important note

The current script stores the uploaded file in:

`C:\Users\hp\Downloads\move files\`

This folder is specific to the current Windows user. If you run the code on another computer, change the destination path to a folder that exists and is writable.

---

## 2. Core PHP Concepts Used

This file covers the following PHP features:

- `$_FILES` for handling uploaded files
- `move_uploaded_file()` for moving files from the temporary upload folder
- `file_exists()` to check whether a file already exists
- `preg_replace()` to clean and sanitize the custom filename
- `explode()` and `end()` to get the file extension
- `in_array()` to validate allowed extensions
- `$_POST` for receiving the optional new file name

---

## 3. File Validation Logic

The script validates the file before uploading:

- The user must choose a file
- File size must be less than 10MB
- Only these extensions are allowed:
  - `png`
  - `jpeg`
  - `jpg`

If the file is not allowed, PHP displays a message such as:

- `gif is Not Allowed. Please use PNG or JPEG.`
- `File is too big! Must be under 10MB.`

---

## 4. Optional Rename Function

The text box `fullname` lets the user enter a custom file name.

Example:

- Original file: `photo.jpg`
- User enters: `student_profile`
- Final saved name: `student_profile.jpg`

The script cleans the input to remove unsupported characters and converts unwanted symbols to underscores.

Example:

- Input: `my file@name`
- Sanitized result: `my_file_name`

---

## 5. How the Program Works

1. The user opens `RenameFile.php` in the browser.
2. The user selects an image file.
3. The user may optionally type a new file name.
4. The form is submitted.
5. PHP checks that a file was uploaded.
6. It reads file details such as name, temporary path, type, and size.
7. It checks the extension and size.
8. It creates a final file name.
9. It checks whether the file already exists.
10. If valid, it moves the file to the destination folder.
11. The page prints a success or error message.

---

## 6. Example Output

The script may display messages like:

- `Original Name: photo.jpg`
- `File size: 234567 bytes`
- `Temporary location: C:\...\phpXXXX.tmp`
- `File Type: image/jpeg`
- `Success! File uploaded as: student_profile.jpg`

---

## 7. How to Run

### Prerequisites

- XAMPP installed
- Apache running
- PHP enabled

### Steps

1. Start Apache from XAMPP.
2. Place the project in `htdocs`.
3. Open this page in your browser:

   `http://localhost/PHP_Practice1/Week6/RenameFile.php`

4. Choose an image file.
5. Optionally type a name in the `File Name (Optional rename)` field.
6. Click the upload button.
7. Check the destination folder to confirm the file was saved.

---

## 8. Screenshots

![Rename](Screenshots/rename.png)

![Move](Screenshots/move.png)

---

## 9. Project Structure

```text
Week6/
├── RenameFile.php
├── Readme.md
└── Screenshots/
    ├── rename.png
    └── move.png
```

---

## 10. Summary

Week 6 focuses on uploading and processing files in PHP. The assignment teaches students how to receive a file from a browser, validate it, rename it safely, and save it to a folder on the server. This is a practical example of real-world file upload handling in web applications.

---

## 11. Week 6 Topics

- PHP file upload handling
- `$_FILES` superglobal
- File type validation
- File size validation
- Optional file renaming
- Sanitizing user input
- Uploading files to a folder
- `move_uploaded_file()`
