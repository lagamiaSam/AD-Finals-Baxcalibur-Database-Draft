<?php
declare(strict_types=1);

class UserPage
{
    /**
     * Fetch the currently logged-in user's info for their dashboard.
     *
     * @param PDO $pdo
     * @param string $userId
     * @return array|null
     */
    public static function fetchCurrentUser(PDO $pdo, string $userId): ?array
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
}