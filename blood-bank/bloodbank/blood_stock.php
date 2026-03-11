<?php
include '../db_connect.php/db_connect.php';

// Fetch blood inventory
$sql = "SELECT * FROM blood_inventory ORDER BY blood_group";
$result = mysqli_query($conn, $sql);

// Calculate total units
$total_sql = "SELECT SUM(units_available) as total FROM blood_inventory";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total_units = $total_row['total'] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blood Stock</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">Blood Stock Inventory</div>

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
    <h2>Blood Inventory</h2>
    
    <div class="summary">
        <h3>Total Blood Units Available: <?php echo $total_units; ?></h3>
    </div>
    
    <?php if (mysqli_num_rows($result) > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Blood Group</th>
                <th>Units Available</th>
                <th>Status</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><strong><?php echo $row['blood_group']; ?></strong></td>
                <td><?php echo $row['units_available']; ?></td>
                <td>
                    <?php 
                    if ($row['units_available'] == 0) {
                        echo '<span style="color: red;">Out of Stock</span>';
                    } elseif ($row['units_available'] < 5) {
                        echo '<span style="color: orange;">Low Stock</span>';
                    } else {
                        echo '<span style="color: green;">Available</span>';
                    }
                    ?>
                </td>
                <td><?php echo date('M d, Y H:i', strtotime($row['last_updated'])); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>No blood inventory data available.</p>
    <?php endif; ?>
    
    <?php mysqli_close($conn); ?>
</div>

</div>
</body>
</html>
