<!DOCTYPE html>
<html>
<head>
    <title>Register Donor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">Register New Donor</div>

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
    <form>
        <label>Full Name:</label><br>
        <input type="text" required><br><br>

        <label>Blood Group:</label><br>
        <select>
            <option>A+</option>
            <option>B+</option>
            <option>O+</option>
            <option>AB+</option>
        </select><br><br>

        <label>Phone:</label><br>
        <input type="text"><br><br>

        <button type="submit">Register</button>
    </form>
</div>

</div>
</body>
</html>
