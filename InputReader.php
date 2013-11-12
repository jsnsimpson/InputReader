<?php

/**
 * Class for reading input from STDIN
 * @author Jason Simpson
 */
class InputReader {
	
	private $index;
	private $lines;
	
	public function InputReader() {
		$this->index = 0;
		$this->lines = array();
		$this->getAllLines();
	}
	
	public function getFirstLine() {
		$input = fgets(STDIN);
		return $input;
	}
	//converts the line inputs to 
	private function getAllLines() {
		$line = 0;
		$lines = array();
		//ignore line 1
		while($input = fgets(STDIN)) {
			
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
		while($input = fgets(STDIN)) {
		
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