<?php
ini_set("display_errors",1);
error_reporting(-1);
require_once("core/EquationInterface.php");
require_once("core/LogInterface.php");
require_once("core/LogAbstract.php");
require_once("orlov/orlovException.php");
require_once("orlov/Linear.php");
require_once("orlov/Square.php");
require_once("orlov/Log.php");

$solver = new orlov\Square();
$roots = $solver->solve(1, 2, -3);
orlov\Log::log("roots: " . implode(" ", $roots));
orlov\Log::write();
?>