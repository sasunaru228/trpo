<?php
namespace orlov;

class Linear {
	protected $x;
	function ur($a, $b){
		if ($a != 0) {
            Log::log("Equation is lineral");

			$x = -1*$b/$a;
			$this->x = $x;
			return $x;
		}
		throw new orlovException("No solutions");
	}
}
?>