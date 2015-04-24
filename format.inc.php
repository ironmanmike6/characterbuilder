<?php
function createHeader() {
    return <<<HTML

<header>
<nav><a href="index.php">Main</a> <a href="login.php">Login</a> <a href="post/logout-post.php">Logout</a></nav>
<h1>Dungeons and Dragons 5th Edition Character Builder</h1>

</header>

HTML;
}

function footer() {
    return <<<HTML
<footer>
<p>Copywrite 2015 Michael Chouinard</p>
<p>Dungeons and Dragons is a registered trademark of Wizards of the Coast</p>
</footer>
HTML;

}

?>