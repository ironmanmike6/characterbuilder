<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 3/25/2015
 * Time: 4:49 PM
 */

class Email {
    public function mail($to, $subject, $message, $headers) {
        mail($to, $subject, $message, $headers);
    }
}