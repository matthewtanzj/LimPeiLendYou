<?php
class CommentModel {

    public function __construct()
    {
        
    }

    public function getCommentsByItemKey($owner, $item_name)
    {
        $query = "SELECT *, extract(epoch from c.created_at) as timestamp
                FROM comment c
                WHERE c.item_name = '$item_name'
                AND c.owner = '$owner'
                ORDER BY c.created_at DESC
                ";
                
        return pg_query($query);
    }

   public function addComment($item_name, $owner, $commenter, $content)
    {
        $query = "INSERT INTO comment
                    VALUES('$item_name', '$owner', '$commenter', '$content')";

        return pg_query($query);
    }
}