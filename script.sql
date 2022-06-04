DROP SCHEMA IF EXISTS sorveteria;

CREATE SCHEMA sorveteria;
USE sorveteria;

CREATE TABLE users(
id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
address VARCHAR(100) NOT NULL,
cellphone VARCHAR(20) NOT NULL,
user_name VARCHAR(20) NOT NULL,
password VARCHAR(20) NOT NULL,
status TINYINT NOT NULL DEFAULT 1
);

CREATE TABLE category(
id_category TINYINT NOT NULL PRIMARY KEY,
description VARCHAR(20) NOT NULL,
path VARCHAR(100) NULL
);

INSERT INTO category (id_category, description, path) VALUES 
(1, 'Açais', 'acai.png'),
(2, 'Sorvetes', 'sorvetes.png'),
(3, 'Raspadinhas', 'raspadinhas.png'),
(4, 'Sucos', 'sucos.png'),
(5, 'Potes', 'potes.png'),
(6, 'Milk Shakes', 'milk_shake.png');