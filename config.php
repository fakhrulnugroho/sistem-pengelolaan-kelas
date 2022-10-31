<?php

$config = json_decode(file_get_contents(dirname(__FILE__) . "/config.json"), true);
$BASE_URL = $config["BASE_URL"];
$DB_NAME = $config["DB_NAME"];
$DB_PASS = $config["DB_PASS"];
$DB_USER = $config["DB_USER"];
$DB_HOST = $config["DB_HOST"];

?>