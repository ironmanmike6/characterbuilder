<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 3/15/2015
 * Time: 9:16 PM
 */

/**
 * Manage users in our system.
 */
class Users extends Table {

    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "user");
    }

    /**
     * Test for a valid login.
     * @param $user User id or email
     * @param $password Password credential
     * @returns User object if successful, null otherwise.
     */
    public function login($user, $password) {
        $sql =<<<SQL
SELECT * from $this->tableName
where userid=? or email=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($user, $user));
        if($statement->rowCount() === 0) {
            return null;
        }

        $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Get the encrypted password and salt from the record
        $hash = $row['password'];
        $salt = $row['salt'];

        // Ensure it is correct
        if($hash !== hash("sha256", $password . $salt)) {
            return null;
        }

        return new User($row);
    }

    /**
     * Get a user based on the id
     * @param $id ID of the user
     * @returns User object if successful, null otherwise.
     */
    public function get($id) {
                $sql =<<<SQL
SELECT * from $this->tableName
where id=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));

        if($statement->rowCount() === 0) {
            return null;
        }

        return new User($statement->fetch(PDO::FETCH_ASSOC));
    }

    /**
     * Determine if a user exists in the system.
     * @param $user A user ID or a email address.
     * @returns true if $user is an existing user ID or email address
     */
    public function exists($user) {
        $sql =<<<SQL
SELECT * from $this->tableName
where userid=? or email=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($user, $user));

        return $statement->rowCount() !== 0;

    }


    /**
     * Add a user to the site
     * @param $user An array of user information containing keys for:
     * userid, name, email, password, salt, and joined.
     */
    public function add($user) {
        $sql = <<<SQL
INSERT INTO $this->tableName(userid, name, email, password, salt, joined, role)
values(?, ?, ?, ?, ?, ?, ?)
SQL;
        $userid = $user['userid'];
        $name = $user['name'];
        $email = $user['email'];
        $password = $user['password'];
        $joined = $user['joined'];
        $salt = $user['salt'];
        $role = 1;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userid, $name, $email, $password, $salt, $joined, $role));
    }

    public function getUserByNameOrEmail($username) {
        $sql =<<<SQL
SELECT * from $this->tableName
where userid=? or email=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($username, $username));

        if($statement->rowCount() === 0) {
            return null;
        }
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return new User($row);

    }

    public function updatePassword($user) {
        $sql = <<<SQL
UPDATE $this->tableName
SET password=?, salt=?
WHERE id=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($user['password'], $user['salt'], $user['userid']));
    }
}