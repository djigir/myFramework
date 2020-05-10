<?php

defined('VG_ACCESS') or die("Access denied");

const TEMPLATE = 'templates/default/'; // путь к шаблону
const ADMIN_TEMPLATE = 'core/admin/view/'; // путь к шаблону админки

const COOKIE_VERSION = '1.0.0'; // константа безопасности
//const CRYPT_KEY =  ;// ключ шифрования !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
const COOKIE_TIME = 60; // время бездействия если юзер афк 60 мин. то ему нужно залогиниться заново
const BLOCK_TIME = 3; // на какое время блочить юзера который хотел подобрать пароль к сайту (у которого это не вышло) ЗЩИТА ОТ БРУТФОРСА

const QTY = 8; // константа для постраничной навигации (по умолчанию отображаем 8 товаров)
const QTY_LINKS = 3; // и 3 ссылки левее и правее активной

const ADMIN_CSS_JS = [
    'styles' => [],
    'scripts' => []              // пути к ccs и js файлам необходимы для работы админ панели
];

const USER_CSS_JS = [
    'styles' => ['css/style.css'],
    'scripts' => []              // пути к ccs и js файлам необходимы для работы страницы юзера
];

use core\base\exceptions\RouteException; // импортирую пространство имен

// функция для подключения классов
function autoloadMainClasses($class_name) {
    $class_name = str_replace('\\', '/', $class_name);

    if (!@include_once $class_name . '.php') {
        throw new RouteException("Не верное имя файла для подключения - ".$class_name);
    }
}

spl_autoload_register('autoloadMainClasses');