<?php
declare(strict_types=1);

class AdminPage
{
    /**
     * Fetch all users from the database and format them for the admin dashboard.
     *
     * @param PDO $pdo
     * @return array List of users with name, password, booked, and payment placeholders
     */
    public static function displayUsers(PDO $pdo): array
    {
        try {
            $stmt = $pdo->query("
                SELECT id, username, first_name, last_name, password, role
                FROM public.\"users\"
                ORDER BY last_name ASC
            ");

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $users = [];

            foreach ($rows as $row) {
                $fullName = trim($row['first_name'] . ' ' . $row['last_name']);

                $users[] = [
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'name' => $fullName,
                    'booked' => 'N/A',
                    'payment' => 'N/A'
                ];
            }

            return $users;

        } catch (PDOException $e) {
            error_log('[AdminPage::displayUsers] PDOException: ' . $e->getMessage());
            return [];
        }
    }
}