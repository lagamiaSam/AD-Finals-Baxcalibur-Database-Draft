<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

$host     = $databases['pgHost'];
$port     = $databases['pgPort'];
$username = $databases['pgUser'];
$password = $databases['pgPassword'];
$dbname   = $databases['pgDB'];

// Connects to PostgreSQL
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    echo "✅ Connected to database.\n";
} catch (PDOException $e) {
    die("❌ Connection failed: " . $e->getMessage());
}

// Checks if table exists
function tableExists(PDO $pdo, string $table): bool {
    $stmt = $pdo->prepare("
        SELECT EXISTS (
            SELECT 1
            FROM information_schema.tables
            WHERE table_schema = 'public'
              AND table_name = :table
        );
    ");
    $stmt->execute(['table' => $table]);
    return $stmt->fetchColumn();
}

// Loads and applies schema

$schemaFiles = [
    'users'   => 'database/users.model.sql',
    'trips' => 'database/trips.model.sql',
    'bookings' => 'database/bookings.model.sql',
    'payments' => 'database/payments.model.sql',
];

foreach ($schemaFiles as $table => $path) {
    echo "📄 Applying schema from $table [$path]...\n";
    $sql = @file_get_contents($path);
    if ($sql === false) {
        echo "❌ Could not read $path\n";
        continue;
    }

    try {
        $pdo->exec($sql);
        echo "✅ Schema applied: $table\n";
    } catch (PDOException $e) {
        echo "❌ Error applying schema for $table: " . $e->getMessage() . "\n";
    }
}

// Truncates tables
$tables = ['users', 'trips', 'bookings','payments'];
echo "🧹 Truncating tables…\n";

foreach ($tables as $table) {
    if (tableExists($pdo, $table)) {
        try {
            $pdo->exec("TRUNCATE TABLE \"$table\" RESTART IDENTITY CASCADE;");
            echo "✅ Truncated table: $table\n";
        } catch (PDOException $e) {
            echo "❌ Failed to truncate table $table: " . $e->getMessage() . "\n";
        }
    } else {
        echo "⚠️ Skipped: Table '$table' does not exist.\n";
    }
}