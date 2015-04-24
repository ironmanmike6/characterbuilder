<?php
require 'lib/dnd.inc.php';
require 'format.inc.php';
$view = new CharacterView($user->getCurrentCharacter(), $site);
$char = $user->getCurrentCharacter();
$prof = $char->getProficiencyBonus();
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/builder.js"></script>
    <meta charset="UTF-8">
    <title>5e Character Builder</title>
    <link href="dnd.css" type="text/css" rel="stylesheet">
</head>
<body>

<script>
    $(document).ready(function() {
        var prof =  <?php echo json_encode($prof); ?>;
        setProficiency(prof);
        setup();
    });

</script>

<?php echo createHeader() ?>
<p>
<div class="main">
    <div id="testthing"></div>

    <?php echo $view->presentStats();
          echo $view->presentInfo();
    ?>


    <div class="cube">
        <div class="options">
            <div class="form">
                <h2>Features and Traits</h2>
                <form>
                    <p> Hello </p>


                </form>
            </div>
        </div>
    </div>

    <div class="cube">
        <div class="options">
            <div class="form">
                <h2>Spells</h2>
                <form>
                    <table>
                        <tr>
                            <th><a href="#">Spell</a></th> <th><a href="#">Level</a></th><th><a href="#">Range</a></th>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Fireball</a></td><td>4th</td><td>60ft</td>
                        </tr>
                        <tr>
                            <td><a href="#">Make Sandwich</a></td><td>9th</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Blade Ward</a></td><td>Cantrip</td><td>Self</td>
                        </tr>
                        <tr>
                            <td><a href="#">Mordenkainen's Magnificient Mansion</a></td><td>7th</td><td>300ft</td>
                        </tr>

                    </table>

                    <div class="spelllink"><a  href="spells.php">All Spells</a></div>
                </form>
            </div>
        </div>
    </div>


</div>
</p>
<?php echo footer() ?>
</body>
</html>