ph<?php
load(__DIR__.'/.env');
$servername = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

if(check_connection($servername, $username, $password)) {
    drop_database($servername, $username, $password, $database);
    create_database($servername, $username, $password, $database);
}

function check_connection($servername, $username, $password)
{
    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn = null;
        echo "Server connected successfully";
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function drop_database($servername, $username, $password, $database)
{
    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DROP DATABASE " . $database;
        $conn->exec($sql);
        echo "\nDatabase dropped successfully";
    } catch (PDOException $e) {
        echo "\n" . $sql . $e->getMessage();
    }
    $conn = null;
}

function create_database($servername, $username, $password, $database)
{
    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE " . $database;
        $conn->exec($sql);
        echo "\nDatabase created successfully";
    } catch (PDOException $e) {
        echo $sql . $e->getMessage();
    }
    $conn = null;
}

function load($path)
{
    if (!file_exists($path)) {
        throw new \InvalidArgumentException(sprintf('%s does not exist', $path));
    } else {
        if (!is_readable($path)) {
            throw new \RuntimeException(sprintf('%s file is not readable', $path));
        }
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}

