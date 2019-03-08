<?php
    //Подключает код из файла ./functions.php
    require('./functions.php');

    //Переменная генерирует рандомное число (rand) 0 или 1
    $is_auth = rand(0, 1);

    $user_name = 'Федор';
    //Одномерный массив, где 0 => "Доски и лыжи", ... 5 => "Разное"
    $category = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];

    //Двумерный массив, где 0 => массив из значения 0
    $item = [
        // 0
        [
            "name" => "2014 Rossignol District Snowboard",
            "category" => "Доски и лыжи",
            "price" => "10999",
            "url" => "img/lot-1.jpg"
        ],
        // 1
        [
            "name" => "DC Ply Mens 2016/2017 Snowboard",
            "category" => "Доски и лыжи",
            "price" => "159999",
            "url" => "img/lot-2.jpg"
        ],
        // 2
        [
            "name" => "Крепления Union Contact Pro 2015 года размер L/XL",
            "category" => "Крепления",
            "price" => "8000",
            "url" => "img/lot-3.jpg"
        ],
        // 3
        [
            "name" => "Ботинки для сноуборда DC Mutiny Charocal",
            "category" => "Ботинки",
            "price" => "10999",
            "url" => "img/lot-4.jpg"
        ],
        // 4
        [
            "name" => "Куртка для сноуборда DC Mutiny Charocal",
            "category" => "Одежда",
            "price" => "7500",
            "url" => "img/lot-5.jpg"
        ],
        // 5
        [
            "name" => "Маска Oakley Canopy",
            "category" => "Разное",
            "price" => "5400",
            "url" => "img/lot-6.jpg"
        ]
    ];





// В сценарии главной страницы выполните подключение к MySQL
$db = mysqli_connect("localhost", "root", "tiger", "yeticave"); //Подключение к БД
mysqli_set_charset($db, "utf-8"); //Определение кодировки

if ($db == false) {
    print('Ошибка подключения: ' . mysqli_connect_error()); //Если не подключились
}
else {
    // Отправьте SQL-запрос для получения списка новых лотов
    $result = mysqli_query($db, "SELECT l.lot_name, c.category, l.first_price, l.lot_img FROM lot l
        LEFT JOIN categories c ON l.category_id = c.category_id"); // Получение информации из БД по запросу
    if ($result) {
        $item = mysqli_fetch_all($result, MYSQLI_ASSOC); //Преобразование полученной информации в массив
    }
    else {
        $error = mysqli_error($db);
        print('Ошибка MySQL: ' . $error); //Если ошибка в запросе
    }

    // Отправьте SQL-запрос для получения списка категорий
    $result = mysqli_query($db, "SELECT category FROM categories"); // Получение информации из БД по запросу
    if ($result) {
        $category = mysqli_fetch_all($result, MYSQLI_ASSOC); //Преобразование полученной информации в массив
    }
    else {
        $error = mysqli_error($db);
        print('Ошибка MySQL: ' . $error); //Если ошибка в запросе
    }
}

// Переменная содержит в себе файл templates/index.php, в котором код
$main = include_template(
    'index.php',
    [
        'category' => $category, //Получает значение переменной ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
        'item' => $item, //Получает значение переменной item (двуммерный массив);
        'dateDiff' => dateDiff()
    ]
);
$layout = include_template(
    'layout.php',
    [
        'title' => 'Главная',
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'main' => $main,
        'item' => $item
    ]
);
echo $layout;
