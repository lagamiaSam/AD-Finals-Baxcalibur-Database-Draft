<?php
declare(strict_types=1);

// 1) Composer autoload
require_once 'vendor/autoload.php';

// 2) Composer bootstrap
require_once 'bootstrap.php';

// 3) envSetter
require_once UTILS_PATH . '/envSetter.util.php';

$users = require_once DUMMIES_PATH . '/users.staticData.php';

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

// If your model.sql contains a working command it will be executed
// $pdo->exec($sql);

// echo "Truncating tables…\n";
// foreach (['users'] as $table) {
//   $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
// }

// simple indicator command seeding started
echo "Seeding users…\n";

// query preparations. NOTE: make sure they matches order and number
$stmt = $pdo->prepare("
    INSERT INTO users (username, role, first_name, last_name, password)
    VALUES (:username, :role, :fn, :ln, :pw)
");

// plug-in datas from the staticData and add to the database
foreach ($users as $u) {
  $stmt->execute([
    ':username' => $u['username'],
    ':role' => $u['role'],
    ':fn' => $u['first_name'],
    ':ln' => $u['last_name'],
    ':pw' => password_hash($u['password'], PASSWORD_DEFAULT),
  ]);
}
