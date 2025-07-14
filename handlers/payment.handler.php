<?php

declare(strict_types=1);
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/userPage.util.php';
require_once UTILS_PATH . '/booking.util.php';
require_once UTILS_PATH . '/payment.util.php';


Auth::init();

function getUser()
{
    $loggedUser = Auth::user();
    return $loggedUser['id'];
}

// Connect to database
function connectToDatabase(array $config): PDO
{
    $dsn = "pgsql:host={$config['pgHost']};port={$config['pgPort']};dbname={$config['pgDB']}";
    try {
        $pdo = new PDO($dsn, $config['pgUser'], $config['pgPassword'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
        echo "✅ Connected to database.\n\n";
        return $pdo;
    } catch (PDOException $e) {
        die("❌ Connection failed: " . $e->getMessage() . "\n\n");
    }
}

function payBooking($pdo, string $user_id)
{
    $bookings = Booking::fetchUserBookings($pdo, $user_id);
    // echo "\nChecking booking:\n\n";
    // print_r($bookings);

    $user_booking_id = $_REQUEST['booking_id'];
    $booking_amount = $_REQUEST['amount'];

    foreach ($bookings as $booking) {
        echo "\nChecking booking:\n\n";
        print_r($booking['id']);

        if ($booking['id'] == $user_booking_id) {
            Payment::createPayment($pdo, $user_booking_id,$booking_amount);
            Payment::updateBooking($pdo, $user_booking_id);
            echo "✅ Payment created for booking: $user_booking_id\n\n";
            return;
        }
    }

    // $booking_id = $bookings['id'];
    // // echo "\nChecking booking:\n\n";
    // // print_r($booking_id);

    // $user_booking_id = $_REQUEST['booking_id'];
    // $booking_amount = $_REQUEST['amount'];
    // // echo "\nChecking booking:\n\n";
    // // print_r($user_booking_id);

    // if ($user_booking_id == $booking_id) {
    //     Payment::createPayment($pdo, $booking_id, $booking_amount);
    //     Payment::updateBooking($pdo, $booking_id);
    //     echo "\nChecking booking:\n\n";
    //     print_r($booking_id);
    //     echo "✅ Payment created for booking: $booking_id\n\n";
    //     return;
    // }

    // foreach ($bookings as $booking) {
    //     echo "\nChecking booking:\n\n";
    //     print_r($booking);

    //     if ($booking == $booking_id) {
    //         Payment::createPayment($pdo, $booking_id);
    //         echo "✅ Payment created for booking: $booking_id\n\n";
    //         return;
    //     }
    // }
    // $booking_id = $bookings['id'];

    // echo "\nDEBUG: booking_id from form: ";
    // var_dump($bookings);


    //  $userBooking = $_REQUEST['booking_id'] ?? null;
//     echo "\nChecking booking:\n\n";
//     print_r($bookings);
//     $booking_id = $userBooking['id'];


    // if (!is_array($bookings)) {
    //     die("❌ fetchUserBookings() did not return an array.\n\n");
    // }

    // foreach ($bookings as $booking) {
    //     // echo "\nChecking booking:\n\n";
    //     // print_r($booking);

    //     if ($booking_id == $booking) {


    //         Payment::createPayment($pdo, $booking_id);
    //         echo "✅ Payment created for booking: $booking_id\n\n";
    //         return;
    //     }


    // echo "\nDEBUG: booking_id from form: ";
    // var_dump($booking_id['id']);

    // echo "\nDEBUG: Bookings fetched:\n\n";
    // print_r($bookings);



    // }

    // echo "❌ Booking ID not found or invalid.\n\n";
}










$pdo = connectToDatabase($databases);
$user_id = getUser();
payBooking($pdo, $user_id);