<?php
class ReviewModel {

    public function __construct()
    {
        
    }
	
	public function getAllReviewsOf($reviewee) {
        $query = "SELECT * FROM review WHERE reviewee = '$reviewee' ORDER BY created_at DESC";
        $result = pg_query($query);
        return $result;
    }

    public function addNewReview($reviewer, $reviewee, $content, $isPositive) {
        $query = "INSERT INTO review VALUES('$reviewer', '$reviewee', '$content', '$isPositive')";
        $result = pg_query($query);
        return $result;
    }

    public function getTotalReviews() {
        $query = "SELECT * FROM review";
		$result = pg_query($query);
		return pg_num_rows($result);
    }
}