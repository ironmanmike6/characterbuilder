<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 3/27/2015
 * Time: 6:02 PM
 */

class LostPasswords extends Table {
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "lostpassword");
    }

    public function newLostPassword($username, $password1, $password2, Email $mailer) {
        // Ensure the passwords are valid and equal
        if(strlen($password1) < 8) {
            return "Passwords must be at least 8 characters long";
        }

        if($password1 !== $password2) {
            return "Passwords are not equal";
        }

        // Ensure we have no duplicate user ID or email address
        $users = new Users($this->site);
        if(!$users->exists($username)) {
            return "User ID or email does not exist.";
        }
        $user = $users->getUserByNameOrEmail($username);
        $id = $user->getId();
        $email = $user->getEmail();
        $userid = $user->getUserid();

        // Create a validator key
        $validator = $this->createValidator();

        // Create salt and encrypted password
        $salt = self::random_salt();
        $hash = hash("sha256", $password1 . $salt);

        // Add a record to the newuser table
        $sql = <<<SQL
REPLACE INTO $this->tableName(userid, password, salt, validator)
values(?, ?, ?, ?)
SQL;


        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($id, $hash, $salt, $validator));

        // Send email with the validator in it
        $link = "http://webdev.cse.msu.edu"  . $this->site->getRoot() . '/lostpassword-validate.php?v=' . $validator;

        $from = $this->site->getEmail();

        $subject = "Reset your password";
        $message = <<<MSG
<html>
<p>Greetings, $username,</p>

<p>It seems you've forgotten your password, click the link
below to reset your password to the new one.</p>

<p><a href="$link">$link</a></p>
</html>
MSG;
        $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso=8859-1\r\nFrom: $from\r\n";
        $mailer->mail($email, $subject, $message, $headers);
    }

    /**
     * @brief Generate a random validator string of characters
     * @param $len Length to generate, default is 32
     * @returns Validator string
     */
    private function createValidator($len = 32) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $l = strlen($chars) - 1;
        $str = '';
        for ($i = 0; $i < $len; ++$i) {
            $str .= $chars[rand(0, $l)];
        }
        return $str;
    }

    /**
     * @brief Generate a random salt string of characters for password salting
     * @param $len Length to generate, default is 16
     * @returns Salt string
     */
    public static function random_salt($len = 16) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789`~!@#$%^&*()-=_+';
        $l = strlen($chars) - 1;
        $str = '';
        for ($i = 0; $i < $len; ++$i) {
            $str .= $chars[rand(0, $l)];
        }
        return $str;
    }

    public function removeLostPassword($validator) {
        $sql = <<<SQL
SELECT * from $this->tableName
WHERE validator=?
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(Array($validator));

        if($statement->rowCount() === 0) {
            return null;
        }
        $user = $statement->fetch(PDO::FETCH_ASSOC);


        $sql = <<<SQL
DELETE FROM $this->tableName
WHERE validator = ?
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(Array($validator));

        return $user;
    }

}