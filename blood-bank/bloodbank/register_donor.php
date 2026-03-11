<?php
include '../db_connect.php/db_connect.php';

$success_message = '';
$error_message = '';

if (isset($_POST['register'])) {

    $fullname = $_POST['fullname'];
    $blood_group = $_POST['blood_group'];
    $phone = $_POST['phone'];
    $age = $_POST['age'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $email = $_POST['email'] ?? null;
    $address = $_POST['address'] ?? null;

    // Validate required fields
    if (empty($fullname) || empty($blood_group) || empty($phone)) {
        $error_message = "Please fill in all required fields.";
    } elseif (!is_numeric($age) || $age < 18 || $age > 65) {
        $error_message = "Age must be between 18 and 65 years.";
    } else {
        $sql = "INSERT INTO donors (full_name, blood_group, phone, age, gender, email, address)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssisss", $fullname, $blood_group, $phone, $age, $gender, $email, $address);

        if (mysqli_stmt_execute($stmt)) {
            $donor_id = mysqli_insert_id($conn);
            $success_message = "✅ <strong>Registration Successful!</strong><br>
                               Donor ID: #$donor_id<br>
                               Name: $fullname<br>
                               Blood Group: $blood_group<br>
                               Phone: $phone<br>
                               Thank you for joining our life-saving community!";
            
            // Clear form fields
            unset($_POST);
        } else {
            $error_message = "❌ Registration failed: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register Donor</title>
<link rel="stylesheet" href="style.css">
<style>
    .success-message {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        border-left: 5px solid #155724;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
        animation: slideIn 0.5s ease;
    }
    
    .error-message {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        border-left: 5px solid #721c24;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
        animation: slideIn 0.5s ease;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .success-message h3 {
        margin: 0 0 10px 0;
        font-size: 1.2em;
    }
    
    .success-message p {
        margin: 5px 0;
        line-height: 1.4;
    }
    
    .register-btn {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }
    
    .register-btn:hover {
        background: linear-gradient(135deg, #218838, #1e7e34);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
    }
</style>
</head>
<body>

<div class="header">Register Donor</div>

<div class="container">

<div class="sidebar">
<a href="dashboard.php">Dashboard</a>
<a href="register_donor.php">Register Donor</a>
<a href="view_donors.php">View Donors</a>
<a href="blood_stock.php">Blood Stock</a>
<a href="requests.php">Requests</a>
<a href="logout.php">Logout</a>
</div>

<div class="main">

<?php if ($success_message): ?>
    <div class="success-message">
        <?php echo $success_message; ?>
    </div>
<?php endif; ?>

<?php if ($error_message): ?>
    <div class="error-message">
        <strong>Registration Error:</strong><br>
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>

<form method="POST">
<label>Full Name</label><br>
<input type="text" name="fullname" required value="<?php echo htmlspecialchars($_POST['fullname'] ?? ''); ?>"><br><br>

<label>Age</label><br>
<input type="number" name="age" min="18" max="65" value="<?php echo htmlspecialchars($_POST['age'] ?? ''); ?>"><br><br>

<label>Gender</label><br>
<select name="gender">
<option value="Male" <?php echo (($_POST['gender'] ?? '') == 'Male') ? 'selected' : ''; ?>>Male</option>
<option value="Female" <?php echo (($_POST['gender'] ?? '') == 'Female') ? 'selected' : ''; ?>>Female</option>
</select><br><br>

<label>Blood Group</label><br>
<select name="blood_group">
<option value="A+" <?php echo (($_POST['blood_group'] ?? '') == 'A+') ? 'selected' : ''; ?>>A+</option>
<option value="A-" <?php echo (($_POST['blood_group'] ?? '') == 'A-') ? 'selected' : ''; ?>>A-</option>
<option value="B+" <?php echo (($_POST['blood_group'] ?? '') == 'B+') ? 'selected' : ''; ?>>B+</option>
<option value="B-" <?php echo (($_POST['blood_group'] ?? '') == 'B-') ? 'selected' : ''; ?>>B-</option>
<option value="O+" <?php echo (($_POST['blood_group'] ?? '') == 'O+') ? 'selected' : ''; ?>>O+</option>
<option value="O-" <?php echo (($_POST['blood_group'] ?? '') == 'O-') ? 'selected' : ''; ?>>O-</option>
<option value="AB+" <?php echo (($_POST['blood_group'] ?? '') == 'AB+') ? 'selected' : ''; ?>>AB+</option>
<option value="AB-" <?php echo (($_POST['blood_group'] ?? '') == 'AB-') ? 'selected' : ''; ?>>AB-</option>
</select><br><br>

<label>Phone</label><br>
<input type="text" name="phone" required value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>"><br><br>

<label>Email (Optional)</label><br>
<input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"><br><br>

<label>Address (Optional)</label><br>
<textarea name="address" rows="3"><?php echo htmlspecialchars($_POST['address'] ?? ''); ?></textarea><br><br>

<button type="submit" name="register" class="register-btn">Register Donor</button>
</form>

</div>
</div>
</body>
</html>
