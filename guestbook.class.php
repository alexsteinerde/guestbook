<?php
/**
 * A guestbook class
 * 
 * This class is the main class. Here, all posts are read and written.
* @author Alex Steiner
* @copyright Alex Steiner
* @package Guestbook
* @link http://alexsteiner.de
*/
class guestbook {
	private $basepath;
	private $data;

	/**
	 * The constructor you can pass a different file than the default file, at the first call, this file is created automatically.
	 * @param string $data Filename
	 * @return boolean true|false
	 * */
	function __construct($data="guestbook.txt")
	{
		$this->basepath = __DIR__;
		$this->data = $data;
		if(!file_exists($this->basepath."/".$this->data)) {
			return fwrite(fopen($this->basepath."/".$this->date, "w"), "");
		}
		return true;
	}

	/**
	 * With this function, all existing entries are read and returned as an array.
	 * @return array array('name', 'text', 'time')
	 */
	public function read()
	{
		$data = array();
		$file = file($this->basepath."/".$this->data);
		foreach ($file as $entry) {
			$entry = explode("|", $entry);
			$data[] = array('name' => $entry[0], 'text' => $entry[1], 'time' => $entry[2]);
		}

		$data = $data;
		return $data;
	}

	/**
	 * This individual contributions are written into the file.
	 * @param string $name Username
	 * @param string $text Guestbook text
	 * @return boolean true|false
	 */
	public function write($name, $text)
	{
		$name = mysql_real_escape_string($name);
		$text = mysql_real_escape_string($text);
		$name = str_replace("|", "", $name);
		$text = str_replace("|", "", $text);
		if(!empty($name) && !empty($text)) {
			return fwrite(fopen($this->basepath."/".$this->data, "a"), "$name|$text|".time()."\n");
		}
		else {
			return false;
		}
	}
}

?>