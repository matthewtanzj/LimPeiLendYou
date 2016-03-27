<?php
class LoanRequestModel {

    public function __construct()
    {
        
    }

    public function addLoanRequest($item_name, $owner, $borrower, $date_start, $date_end, $price_offer)
    {

		$query = "INSERT INTO loan_request (item_name, owner, borrower, date_start, date_end, status, price_offer, is_valid)
					VALUES('$item_name', '$owner', '$borrower', '$date_start', '$date_end', 'pending', '$price_offer', 1)";

		$result = pg_query($query);
		return $result; // true if successfully inserted, false otherwise
    }

}