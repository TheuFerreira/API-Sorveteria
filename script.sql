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

CREATE TABLE product(
id_product INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(100) NOT NULL,
description VARCHAR(150) NOT NULL,
price DECIMAL (10,2) NOT NULL,
path VARCHAR(50) NOT NULL,
status TINYINT NOT NULL DEFAULT 1
);

-- Açaís
INSERT INTO product (title, description, price, path) VALUES 
('Açaí com Nutella 200ml', 'Um delicioso açaí com nutella, este é um açaí para os amantes de nutella e açaí ao mesmo tempo, seu sabor é incomparável', 12, 'acai_com_nutella.png'),
('Açaí com Nutella 400ml', 'Um delicioso açaí com nutella, este é um açaí para os amantes de nutella e açaí ao mesmo tempo, seu sabor é incomparável', 14, 'acai_com_nutella.png'),
('Açaí Fitness 300ml', 'Um delicioso açaí fitness para aqueles que não querem engordar e se manterem na dieta, mas sem deixar de comer um deliciso açaí', 13, 'acai_fitness.png'),
('Açaí no copo 500ml', 'Um açaí que você pode comer em qualquer lugar, até mesmo ao ar livre, com uma grande variedade de opções', 16, 'acai_no_copo.png'),
('Açaí no copo com Morango 500ml', 'Um açai que você pode comer em qualquer e com ainda mais morangos, um verdadeiro morangolicia', 16.50, 'acai_copo_com_morango.png'),
('Açai puro 300ml', 'Um açai totalmente puro, sem coisas a mais, para aqueles que amam apenas o açaí', 12, 'acai_puro.png'),

-- Sorvetes
('Sorvete de Casquinha, sabor Chocolate', 'Um delicioso sorvete de casquinha no sabor chocolate', 6, 'casquinha_chocolate.png'),
('Pote de sorvete, sabor chocolate', 'Um mini pote de sorvete delicioso no sabor chocolate', 5, 'potinho_sorvete.png'),
('Sorvete encaracolado, sabor chocolate', 'Um delicioso sorvete de casquinha encaracolado', 6.50, 'sorvete_chique.png'),
('Sorvete de taça', 'Um delicioso sorvete em uma taça, com diversas frutas extras para você ser fitness e não deixar de comer um docinho', 8, 'sorvete_doido.png'),
('Sorvete no pote', 'Um delicioso sorvete com bolas de diferentes sabores', 10, 'sorvete_variado.png'),

-- Potes
('Pote de Sorvete Flocos 2L', 'Um delicioso sorvete de flocos de 2 litros', 22, 'pote_de_flocos.png'),
('Pote de Sorvete Leite Condensado 2L', 'Um delicioso sorvete de leite condensado de 2 litros', 22, 'pote_leite_condensado.png'),
('Pote de Sorvete Morango com Uva 2L', 'Um delicioso sorvete de morango com uva de 2 litros', 22, 'pote_morango_com_uva.png'),
('Pote de Sorvete Olho de Sogra', 'Um delicioso sorvete de olho de sogra de 2 litros', 22, 'pote_olho_de_sogra.png'),

-- Raspadinhas
('Raspadinha de sorvete sabor chocolate', 'Raspadinha deliciosa de sorvete', 4, 'raspadinha_generica.png'),
('Raspadinha de sorvete sabor morango', 'Raspadinha deliciosa de sorvete', 4, 'raspadinha_generica.png'),
('Raspadinha de sorvete sabor menta', 'Raspadinha deliciosa de sorvete', 4, 'raspadinha_generica.png'),

-- Sucos
('Copo de Suco', 'Um delicioso suco para te refrescar', 3, 'copo_de_suco.png'),
('Suco de Uva', 'Um delicioso suco para te refrescar', 3.5, 'suco_de_uva.png'),
('Suco de Laranja', 'Um delicioso suco para te refrescar', 3, 'suco_laranja.webp'),
('Suco de Laranja com Morango', 'Um delicioso suco para te refrescar', 3.5, 'suco_laranja_morango.png'),

-- Milk Shakes
('Milk Shake de Chocolate', 'Um delicioso milk shake par ate refrescar no dia a dia', 11, 'milk_shake_chocolate.webp'),
('Milk Shake de Morango', 'Um delicioso milk shake par ate refrescar no dia a dia', 11, 'milk_shake_morango.webp');

SELECT * FROM product;

CREATE TABLE category_product(
id_category TINYINT NOT NULL,
id_product INT NOT NULL,

PRIMARY KEY (id_category, id_product),
FOREIGN KEY (id_category) REFERENCES category (id_category),
FOREIGN KEY (id_product) REFERENCES product (id_product)
);

INSERT INTO category_product (id_category, id_product) VALUES 
-- Açais
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),

-- Sorvetes
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),

-- Pote
(5, 12),
(5, 13),
(5, 14),
(5, 15),

-- Raspadinha
(3, 16),
(3, 17),
(3, 18),

-- Sucos
(4, 19),
(4, 20),
(4, 21),
(4, 22),

-- Milk Shakes
(6, 23),
(6, 24);