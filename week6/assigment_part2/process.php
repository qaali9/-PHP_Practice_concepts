<?php

require_once "functions.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Please submit the form from <a href='index.html'>index.html</a>.";
    exit;
}

$fullName   = isset($_POST["full_name"])    ? trim($_POST["full_name"])    : "";
$empId      = isset($_POST["emp_id"])       ? trim($_POST["emp_id"])       : "";
$gender     = isset($_POST["gender"])       ? $_POST["gender"]             : "";
$department = isset($_POST["department"])   ? $_POST["department"]         : "";
$basic      = isset($_POST["basic_salary"]) ? trim($_POST["basic_salary"]) : "";
$allowance  = isset($_POST["allowance"])    ? trim($_POST["allowance"])    : "";
$deduction  = isset($_POST["deduction"])    ? trim($_POST["deduction"])    : "";

$errors = "";   
if (empty($fullName)) {
    $errors .= "<li>Employee Full Name must not be empty.</li>";
}
if (empty($empId)) {
    $errors .= "<li>Employee ID must not be empty.</li>";
}
if (empty($gender)) {
    $errors .= "<li>Gender must be selected.</li>";
}
if (empty($department)) {
    $errors .= "<li>Department must be selected.</li>";
}

$basicValid = false;
if ($basic === "" || !is_numeric($basic)) {
    $errors .= "<li>Basic Salary must be entered.</li>";
} elseif ($basic <= 0) {
    $errors .= "<li>Basic Salary must be greater than zero.</li>";
} else {
    $basicValid = true;
}

$allowanceValid = false;
if ($allowance === "" || !is_numeric($allowance)) {
    $errors .= "<li>Allowance must be entered.</li>";
} elseif ($allowance < 0) {
    $errors .= "<li>Allowance cannot be negative.</li>";
} else {
    $allowanceValid = true;
}

$deductionValid = false;
if ($deduction === "" || !is_numeric($deduction)) {
    $errors .= "<li>Deduction must be entered.</li>";
} elseif ($deduction < 0) {
    $errors .= "<li>Deduction cannot be negative.</li>";
} else {
    $deductionValid = true;
}

if ($basicValid && $allowanceValid && $deductionValid) {
    $gross = calculateGrossSalary($basic, $allowance);
    $bonus = calculateBonus($basic);
    if ($deduction > $gross + $bonus) {
        $errors .= "<li>Deduction must not exceed Gross Salary plus Bonus.</li>";
    }
}

if (!isset($_FILES["document"]) || $_FILES["document"]["error"] == UPLOAD_ERR_NO_FILE) {
    $errors .= "<li>An employee document must be selected.</li>";
}

$uploadError  = "";
$uploadStatus = "";

if ($errors == "") {
    $fileName = basename($_FILES["document"]["name"]);   
    $fileType = $_FILES["document"]["type"];
    $fileSize = $_FILES["document"]["size"];
    $tmpName  = $_FILES["document"]["tmp_name"];
    $target   = "uploads/" . $fileName;

    if ($_FILES["document"]["error"] != UPLOAD_ERR_OK) {
        $uploadError = "The document was not uploaded successfully (error code "
                     . $_FILES["document"]["error"] . ").";
    } elseif ($fileSize > 2 * 1024 * 1024) {
        $uploadError = "The file is too large. Maximum allowed size is 2 MB.";
    } elseif (file_exists($target)) {
        $uploadError = "A document named '" . htmlspecialchars($fileName) . "' already exists. Upload was rejected.";
    } elseif (move_uploaded_file($tmpName, $target)) {
        $uploadStatus = "Document uploaded successfully.";
    } else {
        $uploadError = "Failed to move the uploaded document. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Result</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f4f8; }
        .box { width: 620px; margin: 30px auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.15); }
        h2 { text-align: center; color: #1f3a5f; }
        .error { background: #fdecea; color: #b03a2e; padding: 10px 10px 10px 5px; border-left: 4px solid #b03a2e; }
        .success { background: #e8f6ee; color: #1f7a3f; padding: 10px; border-left: 4px solid #1f7a3f; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #1f3a5f; color: #fff; width: 40%; }
        a { display: inline-block; margin-top: 15px; }
    </style>
</head>
<body>
<div class="box">
<?php
if ($errors != "") {
    echo "<h2>Validation Errors</h2>";
    echo "<div class='error'><ul>" . $errors . "</ul></div>";
} elseif ($uploadError != "") {
    echo "<h2>Upload Error</h2>";
    echo "<div class='error'><ul><li>" . $uploadError . "</li></ul></div>";
} else {
    $gross  = calculateGrossSalary($basic, $allowance);
    $bonus  = calculateBonus($basic);
    $net    = calculateNetSalary($gross, $bonus, $deduction);
    $status = checkSalaryStatus($net);
    $sizeKB = round($fileSize / 1024, 2);

    echo "<h2>Employee Registration Result</h2>";
    echo "<div class='success'>" . $uploadStatus . "</div>";
?>
    <table>
        <tr><th>Employee Full Name</th><td><?php echo htmlspecialchars($fullName); ?></td></tr>
        <tr><th>Employee ID</th><td><?php echo htmlspecialchars($empId); ?></td></tr>
        <tr><th>Gender</th><td><?php echo htmlspecialchars($gender); ?></td></tr>
        <tr><th>Department</th><td><?php echo htmlspecialchars($department); ?></td></tr>
        <tr><th>Basic Salary</th><td><?php echo number_format($basic, 2); ?></td></tr>
        <tr><th>Allowance</th><td><?php echo number_format($allowance, 2); ?></td></tr>
        <tr><th>Gross Salary</th><td><?php echo number_format($gross, 2); ?></td></tr>
        <tr><th>Bonus</th><td><?php echo number_format($bonus, 2); ?></td></tr>
        <tr><th>Deduction</th><td><?php echo number_format($deduction, 2); ?></td></tr>
        <tr><th>Net Salary</th><td><?php echo number_format($net, 2); ?></td></tr>
        <tr><th>Salary Status</th><td><?php echo $status; ?></td></tr>
        <tr><th>Uploaded Document Name</th><td><?php echo htmlspecialchars($fileName); ?></td></tr>
        <tr><th>File Type</th><td><?php echo htmlspecialchars($fileType); ?></td></tr>
        <tr><th>File Size</th><td><?php echo $sizeKB; ?> KB</td></tr>
        <tr><th>Upload Status</th><td><?php echo $uploadStatus; ?></td></tr>
    </table>
<?php
}
?>
    <a href="index.html">&larr; Back to registration form</a>
</div>
</body>
</html>
