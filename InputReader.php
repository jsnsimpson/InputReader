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
	
	public function InputReader() {
		$this->index = 0;
		$this->lines = array();
		$this->getAllLines();
	}
	
	/**
	 * Returns the first line of input found in the file passed in from 
	 * the command line.
	 * @return String - first line of input from the file 
	 */
	public function getFirstLine() {
		$input = fgets(STDIN);
		return $input;
	}
	
	/*
	 * returns all lines
	 */ 
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
	 * Get and return a specific line or null if line number
	 * is not found
	 */
	public function getLine($lineNo) {
		if($this->lines[$lineNo] != null) {
			return $this->lines[$lineNo];
		} else {
			return null;
		}
	}
	
	/**
	 *
	 * Returns a number of lines specified from the start of the file OR
	 * from the last line requested via getNextLine().
	 * TODO: Finish this method!
	 * @return array - $lines
	 */
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