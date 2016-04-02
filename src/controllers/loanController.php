<?php
class loanController {
	public function __construct()
	{
		
	}

		public function view()
	{
      	session_start();

		// load view
		include('views/loan.php');
	}
}
?>