<?php
switch ($_SERVER["SERVER_NAME"]) {
    case 'tponline.epizy.com':
        define("BASEURL", "http://" . $_SERVER["SERVER_NAME"]);
        define("LOCAL_BASEURL", BASEURL);
        break;
    default:
        define("BASEURL", "http://" . $_SERVER["SERVER_NAME"] . "/" . explode('\\', getcwd())[3]);
        define("LOCAL_BASEURL", str_replace("/app/core", "", getcwd()));
        break;
}

define('VALID_EXT', ['JPG', 'JPEG', 'jpg', 'jpeg', 'png', 'PNG']);
