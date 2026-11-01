<?php
include "database.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $booking_id = $_POST["booking_id"];
    $phone = $_POST["phone"];

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE appointments
         SET status = 'Cancelled'
         WHERE id = ?
         AND phone = ?
         AND status = 'Booked'"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "is",
        $booking_id,
        $phone
    );

    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $message = "Your appointment has been cancelled successfully.";
    } else {
        $message = "Booking not found. Please check your Booking ID and phone number.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cancel Appointment</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff0f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .cancel-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 5px 20px #e8b8cd;
        }

        h2 {
            color: #d63384;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            box-sizing: border-box;
            border: 1px solid #e8b8cd;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #d63384;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .message {
            text-align: center;
            color: #d63384;
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <div class="cancel-box">

        <h2>🌸 Cancel Appointment</h2>

        <p>Enter your booking details to cancel your appointment.</p>

        <form method="POST" action="cancel.php">

            <label>Booking ID</label>
            <input type="number"
                   name="booking_id"
                   min="1"
                   required>

            <label>Phone Number</label>
            <input type="tel"
                   name="phone"
                   pattern="[0-9]{10}"
                   maxlength="10"
                   required>

            <button type="submit">
                Cancel Booking
            </button>

        </form>

        <p class="message">
            <?php echo htmlspecialchars($message); ?>
        </p>

    </div>

</body>
</html>