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

final class TestLog extends TestCase
{
  public function testLog1(): void
  {
    orlov\Log::Instance()->log("testing");
    orlov\Log::Instance()->log("log");

    ob_start();
    orlov\Log::Instance()->write();
    $log = ob_get_contents();
    ob_end_clean();

    $this->assertEquals($log, "testing\nlog\n");
  }

  public function testLog2(): void
  {
    orlov\Log::Instance()->log("test 1");
    orlov\Log::Instance()->log("test 2");
    orlov\Log::Instance()->log("test 3");
    orlov\Log::Instance()->log("test 4");

    ob_start();
    orlov\Log::Instance()->write();
    $log = ob_get_contents();
    ob_end_clean();

    $this->assertEquals($log, "testing\nlog\ntest 1\ntest 2\ntest 3\ntest 4\n");
  }
}
