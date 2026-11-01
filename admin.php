<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION["admin_logged_in"]) ||
    $_SESSION["admin_logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

include "database.php";

$query = "SELECT * FROM appointments ORDER BY id DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database error: " . mysqli_error($conn));
}
$totalQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM appointments"
);

$totalBookings = mysqli_fetch_assoc($totalQuery)["total"];

$bookedQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM appointments
     WHERE status = 'Booked'"
);

$activeBookings = mysqli_fetch_assoc($bookedQuery)["total"];

$cancelledQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM appointments
     WHERE status = 'Cancelled'"
);

$cancelledBookings = mysqli_fetch_assoc($cancelledQuery)["total"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - Glow Beauty Salon</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff0f5;
            padding: 20px;
        }

        h1 {
            color: #d63384;
            text-align: center;
        }

        .logout {
            text-align: center;
            margin-bottom: 20px;
        }

        .logout a {
            color: #d63384;
            font-weight: bold;
            text-decoration: none;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #f3b6d2;
            text-align: center;
        }

        th {
            background: #d63384;
            color: white;
        }

        tr:nth-child(even) {
            background: #fff5f9;
        }
        .stats {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    margin: 30px 0;
}

.stat-card {
    background: white;
    padding: 20px;
    width: 200px;
    text-align: center;
    border-radius: 15px;
    box-shadow: 0 5px 15px #e8b8cd;
}

.stat-card h3 {
    color: #d63384;
    font-size: 16px;
}

.stat-card p {
    font-size: 30px;
    font-weight: bold;
    color: #444;
}
    </style>
</head>

<body>

    <h1>Glow Beauty Salon - Admin Dashboard</h1>
<div class="stats">

    <div class="stat-card">
        <h3>Total Bookings</h3>
        <p><?php echo $totalBookings; ?></p>
    </div>

    <div class="stat-card">
        <h3>Active Bookings</h3>
        <p><?php echo $activeBookings; ?></p>
    </div>

    <div class="stat-card">
        <h3>Cancelled Bookings</h3>
        <p><?php echo $cancelledBookings; ?></p>
    </div>

</div>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>

    <div class="table-container">

        <table>
            <tr>
                <th>Booking ID</th>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Service</th>
                <th>Appointment Date</th>
                <th>Status</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <tr>
                <td><?php echo $row["id"]; ?></td>

                <td>
                    <?php echo htmlspecialchars($row["customer_name"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["phone"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["service"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["appointment_date"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["status"]); ?>
                </td>
            </tr>

            <?php } ?>

        </table>

    </div>

</body>
</html>