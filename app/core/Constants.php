<?php
switch ($_SERVER["SERVER_NAME"]) {
    case 'write_your_website_address_here':
        define("BASEURL", "http://" . $_SERVER["SERVER_NAME"]);
        define("LOCAL_BASEURL", BASEURL);
        break;
    default:
        define("BASEURL", "http://" . $_SERVER["SERVER_NAME"] . "/" . explode('\\', getcwd())[3]);
        define("LOCAL_BASEURL", str_replace("/app/core", "", getcwd()));
        break;
}
