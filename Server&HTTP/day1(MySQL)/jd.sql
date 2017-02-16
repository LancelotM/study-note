SET NAMES UTF8;
DROP DATABASE IF EXISTS jd;
CREATE DATABASE jd CHARSET=UTF8;
USE jd;
CREATE TABLE product(
	pid INT PRIMARY KEY AUTO_INCREMENT,
	pname VARCHAR(12),
	price FLOAT(10,2),
	isOnSale boolean,
	pic VARCHAR(32)
);
INSERT INTO product VALUES
(null,'pen','7000',1,'dasdas'),
(null,'pencel','3000',0,'tyu'),
(null,'parper','500',1,'rtbnm');
CREATE TABLE comment(
	cid INT PRIMARY KEY AUTO_INCREMENT,
	userName VARCHAR(12),
	phone VARCHAR(16),
	content VARCHAR(100),
	pubTime BIGINT,
	productId INT
);
INSERT INTO comment VALUES
(null,'Tom','13154879541','dasdashdlkasjdlksa','1234567890123','1'),
(null,'Tony','1786879541','dadasdksa','1238767890123','1'),
(null,'Allice','131688779541','dasdasrsa','1894567890123','2'),
(null,'Alick','131548779541','dasdsadasd','7894890123','2'),
(null,'Mike','131587879541','dasdashdassaksa','2134567890123','3'),
(null,'Mical','132154879541','dasdashdreyreyksa','3234567890123','3');
SELECT * FROM product;
SELECT pid,pname,price FROM product WHERE price>1000 AND price<5000;
SELECT * FROM comment;
SELECT * FROM comment WHERE productId=1;
DELETE FROM product WHERE pid=1;
DELETE FROM comment WHERE productId=1;
UPDATE product SET pid='200' WHERE pid=2;
UPDATE comment SET productId='200' WHERE productId=2;
SELECT * FROM product;
SELECT * FROM comment;