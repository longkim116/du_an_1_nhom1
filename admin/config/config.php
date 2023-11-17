<?php
session_start();
ob_start();

date_default_timezone_set("Asia/Ho_Chi_Minh");

$config['base_url'] = "http://localhost/duan1/autosmart/";

$config['default_model'] = "users";
$config['default_controller'] = "index";
$config['default_action'] = "login";
