<?php
error_reporting(-1);

include "connect.php";

//USERS TABLE CREATION

$user = "CREATE TABLE IF NOT EXISTS users (
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    first VARCHAR(500) NOT NULL,
    last VARCHAR(500) NOT NULL,
    email VARCHAR(800) NOT NULL,
    display VARCHAR(300) NOT NULL,
    location VARCHAR(300) NOT NULL,
    password VARCHAR(500) NOT NULL,
    updated VARCHAR(50) NOT NULL)";

mysqli_query($conn, $user);

if(mysqli_query($conn, $user)){
    echo "Table 1 created successfully</br>";
} else {
    die(mysqli_error());
}

//PROFILE TABLE CREATION

$profile = "CREATE TABLE IF NOT EXISTS profile (
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(600) NOT NULL,
    dob VARCHAR(500) NOT NULL,
    gender VARCHAR(300) NOT NULL,
    age VARCHAR(500) NOT NULL,
    purpose VARCHAR(500) NOT NULL,
    dp VARCHAR(800) NOT NULL,
    photo1 VARCHAR(600) NOT NULL,
    photo2 VARCHAR(600) NOT NULL,
    status VARCHAR(300) NOT NULL,
    bio TEXT NOT NULL,
    about TEXT NOT NULL)";

mysqli_query($conn, $profile);

if(mysqli_query($conn, $profile)){
    echo "Table 2 created successfully</br>";
} else {
    die(mysqli_error());
}

//TABLE FOR LIKED ACCOUNTS

$love = "CREATE TABLE IF NOT EXISTS love (
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(600) NOT NULL,
    user VARCHAR(500) NOT NULL)";

mysqli_query($conn, $love);

if(mysqli_query($conn, $love)){
    echo "Table LOVE created successfully</br>";
} else {
    die(mysqli_error());
}

//TABLE FOR CHATS

$chat = "CREATE TABLE IF NOT EXISTS chat (
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(800) NOT NULL,
    receiver VARCHAR(800) NOT NULL,
    content TEXT NOT NULL)";

mysqli_query($conn, $chat);

if(mysqli_query($conn, $chat)){
    echo "Table CHAT created successfully</br>";
} else {
    die(mysqli_error());
}

//TABLE FOR BLOCKED ACCOUNTS

$block = "CREATE TABLE IF NOT EXISTS blocked (
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    display VARCHAR(800) NOT NULL,
    user VARCHAR(800) NOT NULL)";

mysqli_query($conn, $block);

if(mysqli_query($conn, $block)){
    echo "Table BLOCKED created successfully</br>";
} else {
    die(mysqli_error());
}

$alter1 = "ALTER TABLE profile ADD body_type VARCHAR(200)";
mysqli_query($conn, $alter1);

$alter2 = "ALTER TABLE profile ADD occupation VARCHAR(200)";
mysqli_query($conn, $alter2);

$alter3 = "ALTER TABLE users ADD phone VARCHAR(200)";
mysqli_query($conn, $alter3);

$alter4 = "ALTER TABLE profile ADD religion VARCHAR(200)";
mysqli_query($conn, $alter4);

$alter5 = "ALTER TABLE profile ADD height VARCHAR(200)";
mysqli_query($conn, $alter5);

$alter6 = "ALTER TABLE profile ADD education VARCHAR(200)";
mysqli_query($conn, $alter6);

$alter7 = "ALTER TABLE profile ADD children VARCHAR(200)";
mysqli_query($conn, $alter7);

$alter8 = "ALTER TABLE profile ADD genotype VARCHAR(200)";
mysqli_query($conn, $alter8);

//TABLE FOR BLOCKED ACCOUNTS

$report = "CREATE TABLE IF NOT EXISTS report (
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(800) NOT NULL,
    user VARCHAR(800) NOT NULL,
    report TEXT NOT NULL,
    image VARCHAR(800) NOT NULL,
    resolved VARCHAR(800) NOT NULL)";

mysqli_query($conn, $report);


$alter9 = "ALTER TABLE chat ADD status VARCHAR(200)";
mysqli_query($conn, $alter9);

$alter10 = "ALTER TABLE chat ADD time VARCHAR(200)";
mysqli_query($conn, $alter10);

$alter11 = "ALTER TABLE chat ADD date VARCHAR(200)";
mysqli_query($conn, $alter11);

//TABLE FOR CHAT LIST

$list = "CREATE TABLE IF NOT EXISTS chat_list (
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    user1 VARCHAR(800) NOT NULL,
    user2 VARCHAR(800) NOT NULL)";

mysqli_query($conn, $list);
?>