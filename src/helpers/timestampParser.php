<?php

class timestampParser {
    
    public function __construct()
	{
		
	}
    
    public function getFormattedTimestampFromTimestamp($timestamp) {
        date_default_timezone_set("Asia/Singapore");
        $timestamp = strtotime($timestamp); // convert to unix timestamp
        return date('d/m/Y', $timestamp) . " " . date('g:i a', $timestamp);
    }
    
}