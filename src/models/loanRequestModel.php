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
    
    public function getTotalLoanRequests() {
        $query = "SELECT * FROM loan_request";
    $result = pg_query($query);
    return pg_num_rows($result);
    }
    
    public function getTotalSuccessfulLoanRequests() {
        $query = "SELECT * FROM loan_request WHERE status = 'accepted'";
    $result = pg_query($query);
    return pg_num_rows($result);
    }
    
    public function getTotalPendingLoanRequests() {
        $query = "SELECT * FROM loan_request WHERE status = 'pending'";
    $result = pg_query($query);
    return pg_num_rows($result);
    }
    
    public function getTotalDeclinedLoanRequests() {
        $query = "SELECT * FROM loan_request WHERE status = 'declined'";
    $result = pg_query($query);
    return pg_num_rows($result);
    }
    
    public function getTotalLoanRequestsPastWeek() {
        $query = "SELECT * FROM loan_request WHERE created_at > NOW() - INTERVAL '7 days'";
    $result = pg_query($query);
    return pg_num_rows($result);
    }
    
    public function getTotalLoanRequestsPastMonth() {
        $query = "SELECT * FROM loan_request WHERE created_at > NOW() - INTERVAL '30 days'";
    $result = pg_query($query);
    return pg_num_rows($result);
    }
    
    public function getTotalLoanRequestsPastYear() {
        $query = "SELECT * FROM loan_request WHERE created_at > NOW() - INTERVAL '365 days'";
        $result = pg_query($query);
        return pg_num_rows($result);
    }

    public function getAllAcceptedByItem($item_name, $owner) {
        $query = "SELECT * FROM loan_request l WHERE 
                    l.item_name like '$item_name' AND l.owner like '$owner' AND l.status like 'accepted'";
        
        return pg_query($query);
    }

    public function getLoanRequestByOwnerItemBorrower($owner, $item_name, $borrower) {
        $query = "SELECT *
                  FROM loan_request 
                  WHERE item_name = '$item_name'
                  AND owner = '$owner'
                  AND borrower = '$borrower'";
        $result = pg_query($query);
        return $result;
    }

    public function acceptLoanRequest($item_name, $owner, $borrower, $date_start) {
        $query = "UPDATE loan_request
                  SET status = 'accepted'
                  WHERE item_name = '$item_name'
                  AND owner = '$owner'
                  AND borrower = '$borrower'
                  AND date_start = '$date_start' ";
        $result = pg_query($query);
        return $result;
    }

    public function rejectLoanRequest($item_name, $owner, $borrower, $date_start) {
        $query = "UPDATE loan_request
                  SET status = 'declined'
                  WHERE item_name = '$item_name'
                  AND owner = '$owner'
                  AND borrower = '$borrower'
                  AND date_start = '$date_start' ";
        $result = pg_query($query);
        return $result;
}
