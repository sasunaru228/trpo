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

final class TestSquare extends TestCase
{
  public function testSquare1(): void
  {
    $solver = new orlov\Square(5, 5, -10);
    $roots = $solver->solve(5, 5, -10);

    $this->assertEquals($roots, [1, -2]);
  }

  public function testSquareNegative(): void
  {
    $this->expectException(orlov\orlovException::class);
    
    $solver = new orlov\Square(-1, -1, -1);
    $roots = $solver->solve(-1, -1, -1);
  }

  public function testSquareZeros(): void
  {
    $this->expectException(orlov\orlovException::class);
    
    $solver = new orlov\Square(0, 0, 0);
    $roots = $solver->solve(0, 0, 0);
  }
}
