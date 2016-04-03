<?php

class timestampParser {
    
    public function __construct()
	{
		
	}
    
    public function getDateFromTimestamp($timestamp) {
        $timestampArray = explode(" ", $timestamp); // [0] contains date, [1] contains time
        $dateArray = explode("-", $timestampArray[0]); // [0] contains year, [1] contains month, [2] contains day
        return $dateArray[2] . "/" . $dateArray[1] . "/" . $dateArray[0]; // append into DD/MM/YYYY
    }
    
}

?>