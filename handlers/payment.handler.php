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

function payBooking($pdo, $user_id)
{
    $bookings = Booking::fetchUserBookings($pdo, $user_id);

    if (!is_array($bookings)) {
        die("❌ fetchUserBookings() did not return an array.\n\n");
    }

    $booking_id = $_REQUEST['booking_id'] ?? null;

    echo "\nDEBUG: booking_id from form: ";
    var_dump($booking_id);

    echo "\nDEBUG: Bookings fetched:\n";
    print_r($bookings);

    foreach ($bookings as $booking) {
        echo "\nChecking booking:\n";
        print_r($booking);

        if (is_array($booking) && isset($booking['id']) && (string)$booking_id === (string)$booking['id']) {
            Payment::createPayment($pdo, $booking_id);
            echo "✅ Payment created for booking: $booking_id\n\n";
            return;
        }
    }

    echo "❌ Booking ID not found or invalid.\n\n";
}

   

    
    

    



$pdo = connectToDatabase($databases);
$user_id = getUser();
payBooking($pdo, $user_id);