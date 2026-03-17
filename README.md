# php-start

Этот проект представляет собой окружение для изучения PHP и PostgreSQL с использованием Docker. Включает в себя Nginx, PHP-FPM 8.5 и PostgreSQL 18.

## Стек технологий

- **PHP 8.4** (в режиме FPM)
- **Nginx** — веб-сервер
- **PostgreSQL 18** — система управления базами данных
- **Docker & Docker Compose** — контейнеризация и оркестрация

## Требования

- Docker
- Docker Compose

## Быстрый старт

1. Клонируйте репозиторий (если нужно)
2. Запустите контейнеры:
   ```bash
   docker compose up -d
   ```
3. Откройте в браузере: [http://localhost:8080/](http://localhost:8080/)

## Подключение к PostgreSQL

- Хост: `localhost`
- Порт: `5432`
- База данных: `app`
- Пользователь: `user`
- Пароль: `password`

## Структура проекта

```
php-start/
├── docker/
│   ├── Dockerfile          # PHP-FPM 8.5 с поддержкой PostgreSQL
│   └── nginx/
│       └── nginx.conf      # Конфигурация Nginx
├── docker-compose.yml      # Оркестрация сервисов
├── docker-entrypoint.sh    # Точка входа для PHP
└── README.md               # Этот файл
```

## Работа с кодом

Помещайте свои PHP-файлы в корневую директорию проекта. Главная страница — `index.php`.

Пример подключения к PostgreSQL:

```php
<?php
$host = 'postgres';
$db   = 'app';
$user = 'user';
$pass = 'password';
$charset = 'utf8';

$dsn = "pgsql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "Подключение к PostgreSQL успешно!";
} catch (PDOException $e) {
    echo 'Ошибка подключения: ' . $e->getMessage();
}
?>
```