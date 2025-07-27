<?php

/**
 * A class that extends from Dbh (database-connection), which 
 * handles the connection with the database.
 * 
 * This class is used for inserting post data, such as title, post
 * and id to the database, with mysqli connecting from Dbh.
 * 
 * @param string $title, title that the users inputs into the form.
 * @param string $post, cotains the content of the post
 * @param int $id, the user id of the author.
 * 
 * @return bool, TRUE or false, false if they're is any errors.
 * 
 */

class PostToDbh extends Dbh
{

    private $title;
    private $post;
    private $id;

    public function __construct($title, $post, $id)
    {
        $this->title = $title;
        $this->post = $post;
        $this->id = $id;
    }
    public function insertPost()
    {
        $title = $this->title;
        $post = $this->post;
        $id = $this->id;

        $db = parent::connect();
        $query = "INSERT INTO posts (title, post, user_id) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ssi', $title, $post, $id);

        if ($stmt->execute()) {
            return TRUE;
        }
        return NULL;
    }
}
