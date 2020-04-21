<?php
namespace orlov;

class Log extends \core\LogAbstract implements \core\LogInterface {
	public static function log($str) {
		self::Instance()->log[] = $str;
	}

	public function _write() {
		$d = new \DateTime();
		if (!is_dir(__DIR__ . "/../Log/")) mkdir (__DIR__ . "/../Log/");
		$name=__DIR__ . "/../Log/".$d->format("d.m.Y_H.i.s.u").".log";
		file_put_contents($name, implode("\n\r", $this->log) . "\n\r");	
        
        foreach($this->log as $val) {
			echo $val . "\n";
		}
	}
	
	public static function write() {
		static::Instance()->_write();
	}
}
?>