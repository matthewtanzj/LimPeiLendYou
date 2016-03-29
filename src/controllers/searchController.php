<?php
class SearchController {
	public function __construct()
	{
		
	}

	public function view()
	{
		session_start();


		include('views/search.php');

	}
}