<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

$users = require_once DUMMIES_PATH . '/users.staticData.php';
$bookings = require_once DUMMIES_PATH . '/bookings.staticData.php';

$host = $databases['pgHost'];
$port = $databases['pgPort'];
$username = $databases['pgUser'];
$password = $databases['pgPassword'];
$dbname = $databases['pgDB'];

// ——— Connect to PostgreSQL ———
$dsn = "pgsql:host={$databases['pgHost']};port={$port};dbname={$dbname}";
$pdo = new PDO($dsn, $username, $password, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

// Just indicator it was working
echo "Applying schema from database/users.model.sql…\n";

$sql = file_get_contents('database/users.model.sql');

// Another indicator but for failed creation
if ($sql === false) {
  throw new RuntimeException("Could not read database/users.model.sql");
} else {
  echo "Creation Success from the database/users.model.sql";
}


// simple indicator command seeding started
echo "Seeding users…\n";

// query preparations. NOTE: make sure they matches order and number
$stmt = $pdo->prepare("
    INSERT INTO users (username, first_name, last_name, password, role)
    VALUES (:username, :first_name, :last_name, :password, :role)
");

// plug-in datas from the staticData and add to the database
foreach ($users as $u) {
  $stmt->execute([
    ':username' => $u['username'],
    ':first_name' => $u['first_name'],
    ':last_name' => $u['last_name'],
    ':password' => password_hash($u['password'], PASSWORD_DEFAULT),
    ':role' => $u['role'],
  ]);
}

// bookings


// Just indicator it was working
echo "Applying schema from database/bookings.model.sql…\n";

$sql = file_get_contents('database/bookings.model.sql');

// Another indicator but for failed creation
if ($sql === false) {
    throw new RuntimeException("Could not read database/bookings.model.sql");
} else {
    echo "Creation Success from the database/bookings.model.sql";
}

// simple indicator command seeding started
echo "Seeding bookings…\n";

// query preparations. NOTE: make sure they matches order and number
$stmt = $pdo->prepare("
    INSERT INTO bookings (location_name, description, booking_date, duration_of_days, start_time, end_time)
    VALUES (:location_name, :description, :booking_date, :duration_of_days, :start_time, :end_time)
");

// plug-in datas from the staticData and add to the database
foreach ($bookings as $b) {
    $stmt->execute([
        ':location_name' => $b['location_name'],
        ':description' => $b['description'],
        ':booking_date' => $b['booking_date'],
        ':duration_of_days' => $b['duration_of_days'],
        ':start_time' => $b['start_time'],
        ':end_time' => $b['end_time'],
    ]);
}
