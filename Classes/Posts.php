<?php

/**
 * A class that extends from Dbh (database-connection), which 
 * handles the connection with the database.
 */

class Posts extends Dbh
{
    /**
     * Retrives all posts along with the usernames of their authors.
     * Prepares a musqli request for getting everything from the
     * posts tabel and username from the tabel users, in descending 
     * order by date.
     * 
     * @return associative array, includes all the information 
     * about the posts in the database and their authors. 
     */
    public function showAllPosts()
    {
        $db = parent::connect();
        $query = "SELECT posts.*, users.username FROM posts, users WHERE posts.user_id=users.user_id ORDER BY post_date DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $post = $stmt->get_result();
        if (!$post) die("Fatal error");

        if ($post->num_rows) {
            while ($row = $post->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return NULL;
    }

    /**
     * Retrives a speicific post based on the given posts_id. 
     * 
     * @param int $posts_id, value of the chosen post.
     * 
     * @return  associative array, includes all the information 
     * about the specified post.
     */
    public function showOnePost($posts_id)
    {
        $id =  $posts_id;
        $query = "
            SELECT posts.*, 
                (SELECT username FROM users WHERE users.user_id = posts.user_id) AS username
            FROM posts 
            WHERE posts.posts_id = ?
        ";
        $db = parent::connect();
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result) die("Fatal error");

        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return NULL;
    }
}
