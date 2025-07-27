<?php

/**
 * A class that extends from Dbh (database-connection), which 
 * handles the connection with the database.
 * 
 * @param string $username, username input from user.
 * @param string $password, password input from user.
 * 
 * __construct, places the input values into private variables.
 * 
 * This class is used for controlling if the users username exists 
 * in the database and then controls of the users input password 
 * matches with the hashed password in the database.
 * 
 * @return int, returns the the users_id or NULL, if the users was 
 * not found.
 * 
 */

class Login extends Dbh
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    public function loginUser()
    {
        $username = $this->username;
        $password = $this->password;
        $query = "SELECT * FROM users WHERE username=?";

        $db = parent::connect();
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $results = $stmt->get_result();

        while ($result = $results->fetch_object()){
            if ($result && password_verify($password, $result->password)){
                return $result->user_id;
            }
        }
        return NULL;
    }
}
