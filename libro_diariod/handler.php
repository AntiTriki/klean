<?php
session_name('nilds');
session_start();
require_once "stimulsoft/helper.php";

// Please configure the security level as you required.
// By default is to allow any requests from any domains.
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Engaged-Auth-Token");

$handler = new StiHandler();
$handler->registerErrorHandlers();

$handler->onBeginProcessData = function ($args) {
	$database = $args->database;
    $connectionString = $args->connectionString;
    $queryString = $args->queryString;
    $args->parameters["var"] = $_SESSION['id_emp'];
    
	$args->parameters["usu"] = $_SESSION['id_usuario'];
	$args->parameters["ni"] = $_SESSION['nivel_empresa'];
	return StiResult::success();
	
};

$handler->process();