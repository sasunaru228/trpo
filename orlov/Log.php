<?php
namespace orlov;

class Log extends \core\LogAbstract implements \core\LogInterface {
	public static function log($str) {
		self::Instance()->log[] = $str;
	}

	public function _write() {
		foreach($this->log as $val) {
			echo $val . "\n";
		}
	}
	
	public static function write() {
		static::Instance()->_write();
	}
}
?>