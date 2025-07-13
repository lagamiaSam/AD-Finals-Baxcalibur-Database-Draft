<?php
declare(strict_types=1);

include_once UTILS_PATH . "/envSetter.util.php";

class Payment
{
    public static function createPayment(PDO $pdo, string $booking_id): void
    {
        $stmt = $pdo->prepare("
            INSERT INTO public.\"payments\"
              (booking_id)
            VALUES
              (:booking_id)
        ");

        $stmt->execute([
            ':booking_id' => $booking_id
        ]);
    }
  }  