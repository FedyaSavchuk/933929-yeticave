<?php
//Получение аргументов (index.php, массив)
function include_template($name, $data) {
    // index.php = templates/index.php
    $name = 'templates/' . $name;
    // вводим новую переменную
    $result = '';

    //Если файл templates/index.php недоступен для чтения (is_readable)
    if (!is_readable($name)) {
        return $result;
    }
    //Если файл templates/index.php доступен для чтения
    // Начинает складывать в буфер:
    ob_start();
    // Раскладывает массив из $data на переменные, то есть:
    // "category" => ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
    // $category = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
    extract($data);

    // Выводит код из templates/index.php:
    require($name);

    $result = ob_get_clean();
    // Выводит код с подставленными из массива данными:
    return $result;
}

function price($num) {
    return number_format(ceil($num), 0, '.', ' ');
}

function dateDiff() {
    $diff = strtotime('tomorrow midnight') - time();
    return date('H:i',$diff);
}
