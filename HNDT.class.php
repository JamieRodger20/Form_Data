<?php
class HNDT extends DateTime {
	
	/**
	* Accepts a date string, or DateTime object and sets the 
	* date of the current instance of HNDT to that date if it
	* is valid
	* @param string|DateTime $date 
	* @param string $format Option - Defaults to Y-m-d, eg 1990-01-01
	* @return bool Success flag
	**/
	public function setDOB(string|DateTime $date, string $format="Y-m-d") : bool {
		$success=true;
		if(!($date instanceof DateTime)) {
			if($this->validDate($date, $format)) {
				$d = DateTime::createFromFormat($format, $date);
			} else {
				$success=false;
			}
		} else {$d=$date;}
		$this->setDate($d->format("Y"),$d->format("m"),$d->format("d"));
		return $success;
	}
	
	/**
	* Validates a date String or DateTime object
	* @param string|DateTime $date String/DateTime - date to test
	* @param string $format Optional format string
	* @return bool Returns true if date is valid, false if not
	**/
	public function validDate($date, string $format="Y-m-d") : bool {
		$valid=false;
		if(!($date instanceof DateTime)) {
			$d = DateTime::createFromFormat($format, $date);
			if($d && $d->format($format) == $date) { $valid=true; }
		} else {
			$valid=true;
		}
		return $valid;
	}
	
	/**
	* Extends capability of diff method of DateTime to compare
	* DateTime and String input dates. Returns the difference between
	* the date parameter and the date stored in the current instance
	* of HNDT. Returns false if the date parameter is invalid.
	* @param string|DateTime $date String/DateTime - date to check difference
	* @param string $format Optional formate, defaults to Y-m-d
	* @return null|DateInterval object or null.
	* @link http://php.net/manual/en/datetime.diff.php for more
	**/
	public function difference($date, $format="Y-m-d") : ?DateInterval {
		if(!($date instanceof DateTime)) {
			$d=DateTime::createFromFormat($format, $date);
		} else {$d=$date;}
		if($this->validDate($d,$format)) {
			return $this->diff($d);
		} else {
      return null;
		}
	}
	
	/**
	* Calculates the age in years based upon the date stored
	* in the current instance of the HNDT class.
	* @return int - Age in years
	**/
	public function getAge() :int {
		$now= new DateTime();
		$diff=$this->diff($now);
		return (int)$diff->format("%y");
	}

  /**
	* There is no __toString Magic Method in the standard
  * DateTime class. This simply returns a formatted
  * YYYY-MM-DD string to reduce errors.
	* @return string Stringified HNDT class.
	**/
  public function __toString() {
    return $this->format("Y-m-d");
  }

}
