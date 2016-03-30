<?php
class profileController {
	public function __construct()
	{
		
	}

	public function view()
	{
		session_start();

		include('models/searchModel.php');
		include('views/profile.php');
	}
}