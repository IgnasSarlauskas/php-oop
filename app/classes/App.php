<?php

namespace App;

class App {
	
	/** @var \Core\FileDB */
	public static $db;
	
	public function __construct() {
		self::$db = new \Core\FileDB(DB_FILE);
	}
	
}