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
			
			$ex = explode(" ", $input);
			if(count($ex) > 1) {
				$lines[$line] = $ex;	
			} else {
				$lines[$line] = $input;
			}
			
			$line++;
		}
		$this->lines = $lines;
	}
	
	
	public function hasNext() {
	
		if($this->index < count($this->lines)) {
			return true;
		}
		return false;
	}
	
	//Returns the next line in the list
	public function getNextLine() {
		$rv = null;
		if(($this->index) < count($this->lines)) {
			$rv = $this->lines[$this->index];
			
			$this->index++;
		}
		
		return $rv;
	}
	
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
