<?php

require 'classes/Database.php';

$database = new Database;

if ($database->isConnected()) {
    echo "Connected";
} else {
    echo "Failed to connect. Error";
}