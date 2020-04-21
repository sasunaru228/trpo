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

$co_arr = [];
foreach(["a", "b", "c"] as $co) {
	echo "Enter ".$co.": ";
	$line = stream_get_line(STDIN, 1024, PHP_EOL);
	$co_arr[$co] = $line === "" ? 0 : $line;
}
$a = $co_arr["a"];
$b = $co_arr["b"];
$c = $co_arr["c"];
try {
	$solver = new orlov\Square();
	orlov\Log::log("Equation: $a*x^2 + $b*x + $c = 0");
	orlov\Log::log("roots: " . implode(" ", $solver->solve($a, $b, $c)));
}catch(orlov\orlovException $ex) {
	orlov\Log::log($ex->getMessage());
}

orlov\Log::write();
?>