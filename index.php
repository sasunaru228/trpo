<?php
class orlovException extends RuntimeException {
}

class Linear {
	protected $a;
	protected $b;
	protected $x;
	function __construct($a, $b){
		$this->a=$a;
		$this->b=$b;
	}
	function ur($a, $b){
		if ($a != 0) {
			$x = -1*$b/$a;
			$this->x = $x;
			return $x;
		}
		throw new orlovException("Нет корней");
	}
}

class Square extends Linear {
	protected $c;
	protected $x2;
	function __construct($a, $b, $c){
		parent::__construct($a, $b);
		$this->c=$c;
	}
	protected function bad($a, $b, $c) {
		$bad = $b*$b - 4*$a*$c;
		return $bad;
	}
	function ur2($a, $b, $c) {
		$bad = $this->bad($a, $b, $c);
		if ($a == 0){
			$this ->ur($a , $b);
		}
		if ($bad > 0) {
			$x = (-1*$b + sqrt($bad))/(2*$a);
			$x2 = (-1*$b - sqrt($bad))/(2*$a);
			$this->x = $x;
			$this->x2 = $x2;
			return array($x, $x2);
		} elseif ($bad = 0) {
			$x = (-1*$b)/(2*$a);
			$this->x = $x;
			return array($x);
		}
		throw new orlovException("Нет корней");
	}
}

$solver = new Square(1, 2, 3);
var_dump($solver->ur2(1, 2, -3));
?>
