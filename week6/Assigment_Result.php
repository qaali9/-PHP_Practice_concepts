<?php
session_start();

if (!isset($_SESSION["student"])) {
    header("Location: index.php");
    exit;
}

$s = $_SESSION["student"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Details</title>
    <!--  Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4" style="max-width: 900px;">

    <div class="alert alert-success text-center">Registration completed successfully!</div>

    <!-- student image  -->
    <div class="text-center mb-4">
        <img src="uploads/<?php echo $s["image"]; ?>" class="img-thumbnail rounded-circle" style="width:150px; height:150px; object-fit:cover;">
        <h3 class="mt-2"><?php echo $s["name"]; ?></h3>
    </div>

    <!-- Student Personal Information -->
    <h5>Personal Information</h5>
    <table class="table table-bordered table-striped mb-4">
        <tr><th style="width:35%">Name</th><td><?php echo $s["name"]; ?></td></tr>
        <tr><th>Place of Birth</th><td><?php echo $s["pob"]; ?></td></tr>
        <tr><th>Date of Birth</th><td><?php echo $s["dob"]; ?></td></tr>
        <tr><th>Gender</th><td><?php echo $s["gender"]; ?></td></tr>
        <tr><th>Address</th><td><?php echo $s["address"]; ?></td></tr>
        <tr><th>Telephone</th><td><?php echo $s["telephone"]; ?></td></tr>
        <tr><th>Email</th><td><?php echo $s["email"]; ?></td></tr>
    </table>

    <!-- Parent Information -->
    <h5>Parent Information</h5>
    <table class="table table-bordered table-striped mb-4">
        <tr><th style="width:35%">Parent Name</th><td><?php echo $s["parent_name"]; ?></td></tr>
        <tr><th>Telephone</th><td><?php echo $s["parent_phone"]; ?></td></tr>
        <tr><th>Relationship</th><td><?php echo $s["relationship"]; ?></td></tr>
    </table>

    <!-- Academic Information -->
    <h5>Academic Information</h5>
    <table class="table table-bordered table-striped mb-4">
        <tr><th style="width:35%">Student ID</th><td><?php echo $s["student_id"]; ?></td></tr>
        <tr><th>Faculty</th><td><?php echo $s["faculty"]; ?></td></tr>
        <tr><th>Department</th><td><?php echo $s["department"]; ?></td></tr>
        <tr><th>Class</th><td><?php echo $s["class"]; ?></td></tr>
        <tr><th>Registration Date</th><td><?php echo $s["reg_date"]; ?></td></tr>
    </table>

    <div class="text-center">
        <a href="index.php" class="btn btn-primary">Register Another Student</a>
    </div>
</div>
</body>
</html>
