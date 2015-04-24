<?php
/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(Site $site) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');

    $site->setEmail('chouin24@msu.edu');
    $site->setRoot('/~chouin24/honors');
    $site->dbConfigure('mysql:host=104.131.75.65;dbname=dnd',
        'root',       // Database user
        'ValunaVaryncia',     // Database password
        'test_');            // Table prefix
};