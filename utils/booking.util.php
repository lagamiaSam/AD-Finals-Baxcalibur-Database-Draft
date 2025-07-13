<?php
declare(strict_types=1);

include_once UTILS_PATH . "/envSetter.util.php";

class Booking
{
    public static function createBooking(PDO $pdo, $user_id, $trip_id): void
    {
        $stmt = $pdo->prepare("
            INSERT INTO public.\"bookings\"
              (user_id, trip_id)
            VALUES
              (:user_id, :trip_id)
        ");

        $stmt->execute([
            ':user_id' => $user_id,
            ':trip_id' => $trip_id,
        ]);
    }

    function seedAdmins(PDO $pdo, array $admins): void
    {
        echo "\n🌱 Seeding admins…\n";

        $stmt = $pdo->prepare("
        INSERT INTO users (username, first_name, last_name, password, role)
        VALUES (:username, :first_name, :last_name, :password, :role)
    ");

        foreach ($admins as $admin) {
            try {
                $stmt->execute([
                    ':username' => $admin['username'],
                    ':first_name' => $admin['first_name'],
                    ':last_name' => $admin['last_name'],
                    ':password' => password_hash($admin['password'], PASSWORD_DEFAULT),
                    ':role' => $admin['role'],
                ]);
                echo "✅ Inserted admin: {$admin['username']}\n";
            } catch (PDOException $e) {
                echo "❌ Failed to insert admin {$admin['username']}: " . $e->getMessage() . "\n";
            }
        }
    }


    public static function fetchUserBookings(PDO $pdo, string $userId): ?array
    {
        try {
            $stmt = $pdo->prepare('
                SELECT id, username, first_name, last_name, role
                FROM public."users"
                WHERE id = :id
                LIMIT 1
            ');
            $stmt->execute(['id' => $userId]);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $fullName = trim($row['first_name'] . ' ' . $row['last_name']);

                return [
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'name' => $fullName,
                    'role' => $row['role'],
                    'booked' => 'N/A',
                    'payment' => 'N/A'
                ];
            }

            return null;

        } catch (PDOException $e) {
            error_log('[UserPage::fetchCurrentUser] PDOException: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Fetch all bookings made by the user, including related trip info.
     *
     * @param PDO $pdo
     * @param string $userId
     * @return array
     */
    // public static function fetchUserBookings(PDO $pdo, string $userId): array
    // {
    //     try {
    //         $stmt = $pdo->prepare('
    //             SELECT t.destination, t.description, t.booking_date,
    //             b.booking_status, b.payment_status
    //             FROM public."bookings" b
    //             JOIN public."trips" t ON b.trip_id = t.id
    //             WHERE b.user_id = :user_id
    //             ORDER BY t.booking_date DESC
    //         ');
    //         $stmt->execute(['user_id' => $userId]);
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         error_log('[UserPage::fetchUserBookings] PDOException: ' . $e->getMessage());
    //         return [];
    //     }
    // }
}
