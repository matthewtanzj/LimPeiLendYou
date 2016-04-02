<?php
class ReviewModel {

    public function __construct()
    {
        
    }
	
	public function getAllReviewsOf($reviewee) {
        $query = "SELECT * FROM review WHERE reviewee = '$reviewee'";
        $result = pg_query($query);
        return $result;
    }

    public function addNewReview($reviewer, $reviewee, $content, $isPositive) {
        $query = "INSERT INTO review VALUES('$reviewer', '$reviewee', '$content', '$isPositive')";
        $result = pg_query($query);
        return $result;
    }

}