<?php
include '../db_connect.php/db_connect.php';

// Fetch all donors
$sql = "SELECT * FROM donors ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Donors</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">View Donors</div>

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
    <h2>Registered Donors</h2>
    
    <?php if (mysqli_num_rows($result) > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Blood Group</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Status</th>
                <th>Registered</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['blood_group']; ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo htmlspecialchars($row['email'] ?? 'N/A'); ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>No donors registered yet.</p>
    <?php endif; ?>
    
    <?php mysqli_close($conn); ?>
</div>

</div>
</body>
</html>
