CREATE DATABASE my_car_mods;

use my_car_mods;

CREATE TABLE projects (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	projectname VARCHAR(100) NOT NULL,
	projectdescription VARCHAR(6000) NOT NULL,
	projectstatus VARCHAR(30),
    projecttype VARCHAR(30),
	imagelocation VARCHAR(255),
	userid VARCHAR(11),
	date TIMESTAMP
);

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(70) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);