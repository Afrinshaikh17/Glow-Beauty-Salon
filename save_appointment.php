<?php
include "database.php";
header("Content-Type: text/html; charset=UTF-8");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $service = $_POST["service"];
    $date = $_POST["date"];

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO appointments
        (customer_name, phone, service, appointment_date)
        VALUES (?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssss",
        $name,
        $phone,
        $service,
        $date
    );

    if (mysqli_stmt_execute($stmt)) {
$bookingID = mysqli_insert_id($conn);
        $message = "\u{1F338} *GLOW BEAUTY SALON & SPA* \u{1F338}"
    . "\n\n\u{2728} *APPOINTMENT REQUEST* \u{2728}"
    . "\n\n\u{1F3AB} *Booking ID:* " . $bookingID
    . "\n\u{1F464} *Name:* " . $name
    . "\n\u{1F4F1} *Phone:* " . $phone
    . "\n\u{1F485} *Service:* " . $service
    . "\n\u{1F4C5} *Date:* " . $date
    . "\n\n\u{1F496} Looking forward to a beautiful experience!"
    . "\nThank you!";
        $salonNumber = "917499381751";

        $whatsappURL = "https://wa.me/"
            . $salonNumber
            . "?text="
            . urlencode($message);

        header("Location: " . $whatsappURL);
        exit;

    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>