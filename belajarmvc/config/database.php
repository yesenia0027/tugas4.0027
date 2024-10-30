<?php
function getDBConnection(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=db_mvc','root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e){
        echo 'Connection failed: ' . $e->getMessage();
    }
}

?>