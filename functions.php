<?php
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

function price($num) {
    return number_format(ceil($num), 0, '.', ' ');
}

function dateDiff() {
    $diff = strtotime('tomorrow midnight') - time();
    return date('H:i',$diff);
}
