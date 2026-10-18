<?php
// Bilow session si xogta loogu wareejiyo bogga result.php
session_start();

// SU'AASHA 2 (diyaarin): variables madhan, si foomku marka hore u furmo oo cillad aysan jirin
$name = $pob = $dob = $address = $gender = $telephone = $email = "";
$parent_name = $parent_phone = $relationship = "";
$student_id = $faculty = $department = $class = $reg_date = "";

// Halkan waxaa lagu keydiyaa fariimaha cilladaha
$errors = array(
    "name" => "", "pob" => "", "dob" => "", "address" => "", "gender" => "",
    "telephone" => "", "email" => "", "image" => "",
    "parent_name" => "", "parent_phone" => "", "relationship" => "",
    "student_id" => "", "faculty" => "", "department" => "", "class" => "", "reg_date" => ""
);
$hasError = false;

// 2) Marka la riixo batoonka Register
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Qaado xogta foomka (trim = ka saar meelaha banaan, htmlspecialchars = amni)
    $name         = htmlspecialchars(trim($_POST["name"] ?? ""));
    $pob          = htmlspecialchars(trim($_POST["pob"] ?? ""));
    $dob          = htmlspecialchars(trim($_POST["dob"] ?? ""));
    $address      = htmlspecialchars(trim($_POST["address"] ?? ""));
    $gender       = htmlspecialchars(trim($_POST["gender"] ?? ""));
    $telephone    = htmlspecialchars(trim($_POST["telephone"] ?? ""));
    $email        = htmlspecialchars(trim($_POST["email"] ?? ""));
    $parent_name  = htmlspecialchars(trim($_POST["parent_name"] ?? ""));
    $parent_phone = htmlspecialchars(trim($_POST["parent_phone"] ?? ""));
    $relationship = htmlspecialchars(trim($_POST["relationship"] ?? ""));
    $student_id   = htmlspecialchars(trim($_POST["student_id"] ?? ""));
    $faculty      = htmlspecialchars(trim($_POST["faculty"] ?? ""));
    $department   = htmlspecialchars(trim($_POST["department"] ?? ""));
    $class        = htmlspecialchars(trim($_POST["class"] ?? ""));
    $reg_date     = htmlspecialchars(trim($_POST["reg_date"] ?? ""));

    // SU'AASHA 2: Hubi in goob kasta madhnayn (haddii madhan tahay, fariin cillad ah ayaa la keydiyaa)
    if ($name == "")         { $errors["name"] = "Please enter your name"; }
    if ($pob == "")          { $errors["pob"] = "Please enter place of birth"; }
    if ($dob == "")          { $errors["dob"] = "Please select date of birth"; }
    if ($address == "")      { $errors["address"] = "Please enter your address"; }
    if ($gender == "")       { $errors["gender"] = "Please select gender"; }
    if ($telephone == "")    { $errors["telephone"] = "Please enter telephone number"; }
    if ($email == "")        { $errors["email"] = "Please enter your email"; }
    if ($parent_name == "")  { $errors["parent_name"] = "Please enter parent name"; }
    if ($parent_phone == "") { $errors["parent_phone"] = "Please enter parent telephone"; }
    if ($relationship == "") { $errors["relationship"] = "Please select relationship"; }
    if ($student_id == "")   { $errors["student_id"] = "Please enter student ID"; }
    if ($faculty == "")      { $errors["faculty"] = "Please select faculty"; }
    if ($department == "")   { $errors["department"] = "Please enter department"; }
    if ($class == "")        { $errors["class"] = "Please enter class"; }
    if ($reg_date == "")     { $errors["reg_date"] = "Please select registration date"; }

    // SU'AASHA 3 (a): Magaca ha madhnaado, xarfo iyo meel banaan oo keliya ha ka koobnaado
    if ($name != "" && !preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors["name"] = "Name must contain only letters and spaces";
    }

    // SU'AASHA 3 (b): Email: hubi in qaabkiisu sax yahay
    if ($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format (example: ali@gmail.com)";
    }

    // SU'AASHA 3 (c): Sawirka: hubi in la upload gareeyay iyo in uu noociisu yahay sawir
    $imageName = "";
    if ($_FILES["image"]["error"] == UPLOAD_ERR_NO_FILE) {
        $errors["image"] = "Please upload an image";
    } else {
        $allowed = array("png", "jpg", "jpeg", "gif");
        $extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        if (!in_array($extension, $allowed)) {
            $errors["image"] = "Only image files allowed (png, jpg, jpeg, gif)";
        } else {
            $imageName = time() . "." . $extension;   // magac cusub oo ka duwan kuwa kale
        }
    }

    // 7) Hubi in cillad la helay iyo in kale
    foreach ($errors as $e) {
        if ($e != "") { $hasError = true; }
    }

    // SU'AASHA 4: Haddii cillad jirin: keydi sawirka, keydi xogta, oo u gudub (redirect) result.php
    if ($hasError == false) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $imageName);

        $_SESSION["student"] = array(
            "name" => $name, "pob" => $pob, "dob" => $dob, "address" => $address,
            "gender" => $gender, "telephone" => $telephone, "email" => $email,
            "image" => $imageName,
            "parent_name" => $parent_name, "parent_phone" => $parent_phone,
            "relationship" => $relationship,
            "student_id" => $student_id, "faculty" => $faculty,
            "department" => $department, "class" => $class, "reg_date" => $reg_date
        );

        header("Location: result.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration</title>
    <!-- SU'AASHA 5: Bootstrap CSS (qaabaynta foomka) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4" style="max-width: 900px;">

    <h2 class="text-center mb-4">Student Registration Form</h2>

    <!-- Haddii cillad jirto, halkan ayaa lagu sheegayaa -->
    <?php if ($hasError) { ?>
        <div class="alert alert-danger">Please fix the errors shown in red below.</div>
    <?php } ?>

    <form method="post" action="index.php" enctype="multipart/form-data" novalidate>

        <!-- SU'AASHA 1: PERSONAL INFORMATION (Name, POB, DOB, Address, Gender, Telephone, Email, Image) -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Personal Information</div>
            <div class="card-body row g-3">

                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control <?php if ($errors["name"] != "") echo "is-invalid"; ?>" value="<?php echo $name; ?>">
                    <div class="invalid-feedback"><?php echo $errors["name"]; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Place of Birth (POB)</label>
                    <input type="text" name="pob" class="form-control <?php if ($errors["pob"] != "") echo "is-invalid"; ?>" value="<?php echo $pob; ?>">
                    <div class="invalid-feedback"><?php echo $errors["pob"]; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Date of Birth (DOB)</label>
                    <input type="date" name="dob" class="form-control <?php if ($errors["dob"] != "") echo "is-invalid"; ?>" value="<?php echo $dob; ?>">
                    <div class="invalid-feedback"><?php echo $errors["dob"]; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label d-block">Gender</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="gender" value="Male" class="form-check-input <?php if ($errors["gender"] != "") echo "is-invalid"; ?>" <?php if ($gender == "Male") echo "checked"; ?>>
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="gender" value="Female" class="form-check-input <?php if ($errors["gender"] != "") echo "is-invalid"; ?>" <?php if ($gender == "Female") echo "checked"; ?>>
                        <label class="form-check-label">Female</label>
                    </div>
                    <div class="text-danger small"><?php echo $errors["gender"]; ?></div>
                </div>

                <div class="col-12">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control <?php if ($errors["address"] != "") echo "is-invalid"; ?>" value="<?php echo $address; ?>">
                    <div class="invalid-feedback"><?php echo $errors["address"]; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Telephone</label>
                    <input type="text" name="telephone" class="form-control <?php if ($errors["telephone"] != "") echo "is-invalid"; ?>" value="<?php echo $telephone; ?>">
                    <div class="invalid-feedback"><?php echo $errors["telephone"]; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control <?php if ($errors["email"] != "") echo "is-invalid"; ?>" value="<?php echo $email; ?>">
                    <div class="invalid-feedback"><?php echo $errors["email"]; ?></div>
                </div>

                <div class="col-12">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control <?php if ($errors["image"] != "") echo "is-invalid"; ?>">
                    <div class="invalid-feedback"><?php echo $errors["image"]; ?></div>
                </div>

            </div>
        </div>

        <!-- SU'AASHA 1: PARENT INFORMATION (Name, Telephone, Relationship) -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Parent Information</div>
            <div class="card-body row g-3">

                <div class="col-md-4">
                    <label class="form-label">Parent Name</label>
                    <input type="text" name="parent_name" class="form-control <?php if ($errors["parent_name"] != "") echo "is-invalid"; ?>" value="<?php echo $parent_name; ?>">
                    <div class="invalid-feedback"><?php echo $errors["parent_name"]; ?></div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Parent Telephone</label>
                    <input type="text" name="parent_phone" class="form-control <?php if ($errors["parent_phone"] != "") echo "is-invalid"; ?>" value="<?php echo $parent_phone; ?>">
                    <div class="invalid-feedback"><?php echo $errors["parent_phone"]; ?></div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Relationship</label>
                    <select name="relationship" class="form-select <?php if ($errors["relationship"] != "") echo "is-invalid"; ?>">
                        <option value="">-- Select --</option>
                        <option <?php if ($relationship == "Father") echo "selected"; ?>>Father</option>
                        <option <?php if ($relationship == "Mother") echo "selected"; ?>>Mother</option>
                        <option <?php if ($relationship == "Brother") echo "selected"; ?>>Brother</option>
                        <option <?php if ($relationship == "Sister") echo "selected"; ?>>Sister</option>
                        <option <?php if ($relationship == "Uncle") echo "selected"; ?>>Uncle</option>
                        <option <?php if ($relationship == "Guardian") echo "selected"; ?>>Guardian</option>
                    </select>
                    <div class="invalid-feedback"><?php echo $errors["relationship"]; ?></div>
                </div>

            </div>
        </div>

        <!-- SU'AASHA 1: ACADEMIC INFORMATION (ID, Faculty, Department, Class, Registration Date) -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">Academic Information</div>
            <div class="card-body row g-3">

                <div class="col-md-4">
                    <label class="form-label">Student ID</label>
                    <input type="text" name="student_id" class="form-control <?php if ($errors["student_id"] != "") echo "is-invalid"; ?>" value="<?php echo $student_id; ?>">
                    <div class="invalid-feedback"><?php echo $errors["student_id"]; ?></div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Faculty</label>
                    <select name="faculty" class="form-select <?php if ($errors["faculty"] != "") echo "is-invalid"; ?>">
                        <option value="">-- Select --</option>
                        <option <?php if ($faculty == "Computer and IT") echo "selected"; ?>>Computer and IT</option>
                        <option <?php if ($faculty == "Engineering") echo "selected"; ?>>Engineering</option>
                        <option <?php if ($faculty == "Business") echo "selected"; ?>>Business</option>
                        <option <?php if ($faculty == "Law") echo "selected"; ?>>Law</option>
                        <option <?php if ($faculty == "Medicine") echo "selected"; ?>>Medicine</option>
                    </select>
                    <div class="invalid-feedback"><?php echo $errors["faculty"]; ?></div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Department</label>
                    <input type="text" name="department" class="form-control <?php if ($errors["department"] != "") echo "is-invalid"; ?>" value="<?php echo $department; ?>">
                    <div class="invalid-feedback"><?php echo $errors["department"]; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Class</label>
                    <input type="text" name="class" class="form-control <?php if ($errors["class"] != "") echo "is-invalid"; ?>" value="<?php echo $class; ?>">
                    <div class="invalid-feedback"><?php echo $errors["class"]; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Registration Date</label>
                    <input type="date" name="reg_date" class="form-control <?php if ($errors["reg_date"] != "") echo "is-invalid"; ?>" value="<?php echo $reg_date; ?>">
                    <div class="invalid-feedback"><?php echo $errors["reg_date"]; ?></div>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100">Register</button>
    </form>
</div>

<script>
    // SU'AASHA 2: Haddii cillad jirto, u qaad user-ka goobta ugu horreysa ee khaldan (scroll + focus)
    var firstError = document.querySelector(".is-invalid");
    if (firstError) {
        firstError.scrollIntoView({ behavior: "smooth", block: "center" });
        firstError.focus();
    }
</script>
</body>
</html>
