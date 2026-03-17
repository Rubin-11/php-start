<?php

declare(strict_types=1);

//require_once __DIR__ . '/../vendor/autoload.php';
//
//use App\Database\Connection;
//
//$connection = Connection::getInstance();

//$name = readline("Как ваши тебя зовут?:\n");
//$age = readline("Сколько вам лет?:\n");
//
//echo "Вас зовут $name вам $age лет!!!\n";

$task1 = readline("Какая задача стоит перед вами сегодня?:\n");
$time1 = readline("Сколько примерно времени эта задача займет?:\n");
$task2 = readline("Какая задача стоит перед вами сегодня?:\n");
$time2 = readline("Сколько примерно времени эта задача займет?:\n");
$task3 = readline("Какая задача стоит перед вами сегодня?:\n");
$time3 = readline("Сколько примерно времени эта задача займет?:\n");

echo "Иван, сегодня у вас 3 приоритетных задачи на день:\n";
echo ("- $task1 (" . $time1 . "ч)\n");
echo ("- $task2 (" . $time2 . "ч)\n");
echo ("- $task3 (" . $time3 . "ч)\n");