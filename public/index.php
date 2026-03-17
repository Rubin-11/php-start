<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Connection;

$connection = Connection::getInstance();

?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Learning Environment</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
        .success { color: #2e7d32; }
        .error { color: #c62828; }
        pre { background: #f5f5f5; padding: 16px; border-radius: 4px; overflow: auto; }
    </style>
</head>
<body>
    <h1>PHP Learning Environment</h1>

    <?php if ($connection->isConnected()): ?>
        <p class="success">✅ Подключение к PostgreSQL успешно!</p>
    <?php else: ?>
        <p class="error">❌ Ошибка подключения: <?= htmlspecialchars($connection->getError() ?? 'Неизвестная ошибка') ?></p>
    <?php endif; ?>

    <?php if (($_ENV['APP_DEBUG'] ?? 'false') === 'true'): ?>
        <h2>Переменные окружения</h2>
        <pre><?= htmlspecialchars(print_r($_ENV, true)) ?></pre>
    <?php endif; ?>
</body>
</html>
