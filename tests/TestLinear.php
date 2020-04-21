<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("core/EquationInterface.php");
require_once("core/LogAbstract.php");
require_once("core/LogInterface.php");
require_once("../orlov/orlovException.php");
require_once("../orlov/Linear.php");
require_once("../orlov/Log.php");
require_once("../orlov/Square.php");

final class TestLinear extends TestCase
{
  public function testLinear1(): void
  {
    $solver = new orlov\Linear();
    $root = $solver->ur(1, 2);

    $this->assertEquals($root, -2);
  }

  public function testLinear2(): void
  {
    $this->expectException(orlov\orlovException::class);
    
    $solver = new orlov\Linear();
    $root = $solver->ur(0, 0);
  }

  public function testLinear3(): void
  {
    $solver = new orlov\Linear();
    $root = $solver->ur(5, 20);

    $this->assertEquals($root, -4);
  }
}
