CREATE SCHEMA sorveteria;
USE sorveteria;

CREATE TABLE users(
id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
user_name VARCHAR(20) NOT NULL,
password VARCHAR(20) NOT NULL,
status TINYINT NOT NULL DEFAULT 1
);