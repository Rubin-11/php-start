<?php

declare(strict_types=1);

namespace App\Database;

use PDO;
use PDOException;

class Connection
{
    private static ?self $instance = null;
    private ?PDO $pdo = null;
    private ?string $error = null;

    private function __construct()
    {
        $dsn = sprintf(
            'pgsql:host=%s;port=%s;dbname=%s',
            $_ENV['DB_HOST'] ?? 'postgres',
            $_ENV['DB_PORT'] ?? '5432',
            $_ENV['DB_NAME'] ?? 'app',
        );

        try {
            $this->pdo = new PDO(
                $dsn,
                $_ENV['DB_USER'] ?? 'user',
                $_ENV['DB_PASSWORD'] ?? 'password',
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]
            );
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getPdo(): ?PDO
    {
        return $this->pdo;
    }

    public function isConnected(): bool
    {
        return $this->pdo !== null;
    }

    public function getError(): ?string
    {
        return $this->error;
    }
}
