<?php
class A {

}

class B extends A {
	function __construct($a, $b) {
		$this->a = $a;
		$this->b = $b;
	}

	protected $a;
	protected $b;
}

class C extends B {
	function __construct($a, $b, $c) {
		parent::__construct($a, $b);

		$this->c = $c;
	}

	protected $c;
}

$a = new C(new A, new A, new B(new A, new A));
var_dump($a);
?>
