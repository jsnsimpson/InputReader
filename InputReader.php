<?php

/**
 * Class for reading input from STDIN
 * This has been developed to assist in 
 * saving time when solving online puzzles
 * from the codechef site. It may be modified
 * to cater for other uses.
 * @author Jason Simpson
 */
class InputReader {
	
	private $index;
	private $lines;
	private $file;
	const STDIO = "stdio";
	const ARGS = "args";
	
	
	public function InputReader($mode, $filename="input.txt") {
		$this->index = 0;
		$this->lines = array();
		if($mode == self::STDIO) {
			$this->file = STDIN;
		} else {
			$this->file = fopen($filename, "r");
		}
		$this->getAllLines();
	}
	
	/**
     * Returns the first line of input found in the file passed in from 
     * the command line.
     * @return String - first line of input from the file 
     */
	public function getFirstLine() {
		$input = fgets($this->file);
		return $input;
	}
	//converts the line inputs to 
	private function getAllLines() {
		$line = 0;
		$lines = array();
		//ignore line 1
		while($input = fgets($this->file)) {
			$lines[$line] = $input;
			$line++;
		}
		$this->lines = $lines;
	}
	
	/**
	 * Should be used in conjunction with getNextLine method
	 * to allow easy iteration.
	 * @return boolean - is there another line available?
	 */
	public function hasNext() {
	
		if($this->index < count($this->lines)) {
			return true;
		}
		return false;
	}
	
	/**
	 *
	 * returns the next line or null if none found.
	 * @return String $rv
	 */
	public function getNextLine() {
		$rv = null;
		if(($this->index) < count($this->lines)) {
			$rv = $this->lines[$this->index];
			
			$this->index++;
		}
		
		return $rv;
	}
	
	/**
	 * Gets the next line as an array were the values are separated by the 
	 * $delimeter that is passed in
	 * 
	 * @param $delimeter - split the line on a value (default is a space " ").
	 */
	public function getNextLineAsArray($delimeter=" ") {
		$val = $this->getNextLine();
		$arr = explode($delimeter, $val);
		
		return $arr;

	}
	
	/**
	 * Get and return a specific line or null if line number
	 * is not found
	 * @param $lineNo the line number to be retrieved
	 */
	public function getLine($lineNo) {
		if($this->lines[$lineNo] != null) {
			return $this->lines[$lineNo];
		} else {
			return null;
		}
	}
	
	
	public function getNextXLines($x) {
		$line = 0;
		$lines = array();
		//ignore line 1
		while($input = fgets($this->file)) {
		
			$ex = explode(" ", $input);
			if(count($ex) > 1) {
				$lines[$line] = $ex;	
			} else {
				$lines[$line] = $input;
			}
			
			$line++;
		}
		
		return $lines;
	}
}

