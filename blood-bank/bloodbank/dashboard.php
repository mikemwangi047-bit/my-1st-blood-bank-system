<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Homa Bay Referral Hospital</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    Homa Bay County Teaching & Referral Hospital - Blood Bank
</div>

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
    <h2>Welcome Admin</h2>

    <div class="cards">
        <div class="card">
            <h3>Total Donors</h3>
            <p>120</p>
        </div>

        <div class="card">
            <h3>Blood Units Available</h3>
            <p>85</p>
        </div>

        <div class="card">
            <h3>Pending Requests</h3>
            <p>14</p>
        </div>

        <div class="card">
            <h3>Hospitals Connected</h3>
            <p>6</p>
        </div>
    </div>
</div>

</div>
</body>
</html>
