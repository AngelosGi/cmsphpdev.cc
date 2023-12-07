<?php

require 'classes/Database.php';

$database = new Database;

if ($database->isConnected()) {
    echo '<i style="color:green;font-size:30px">
    Conected to Database </i> ';
} else {
    echo '<i style="color:red; font-size:30px">
    Failed to connect. Error </i>';
}