<?php

include 'Request.php';

$request = new Request();
$class = 'Action_' . $request->getGroup();
require_once $class . '.php';
$action = new $class;
$cmd = $request->getCommand();
$action->$cmd($request);

?>