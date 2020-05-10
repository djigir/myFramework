<?php

define("VG_ACCESS", true); // доступ к конфигу запрещен до выполнения index.php

//header("Content-Type:text/html:charset=utf-8"); // браузеру пользователя сказали в какой кодеровке будем отправлять данные
session_start(); // запускаем сессию

require_once 'config.php'; // базовые настройки для быстрого развертывание сайта на хостинг
require_once 'core/base/settings/internal_settings.php';  // фундаментальные настроки тут будут пути к шаблонам, настройки безопасности

use core\base\exceptions\RouteException;
use core\base\controller\RouteController;
use core\base\exceptions\DbException;

try {
    RouteController::instance()->route();
}catch (RouteException $e) {
    exit($e->getMessage());
}
catch (DbException $e) {
    exit($e->getMessage());
}


