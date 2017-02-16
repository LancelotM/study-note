SET NAMES UTF8;
DROP DATABASE IF EXISTS huimaiche;
CREATE DATABASE huimaiche CHARSET=UTF8;
USE huimaiche;

CREATE TABLE car(		
  cid INT PRIMARY KEY AUTO_INCREMENT,
  cname VARCHAR(32), 
  pic VARCHAR(32), 
  price FLOAT(10,2), 
  isonsale BOOLEAN, 
  birthday BIGINT 
);
INSERT INTO car VALUES
(NULL, '全新捷达','img/1.jpg','80000','1','1234567890123'),
(NULL, '景逸S3','img/2.jpg','60000','0','1334567890123'),
(NULL, 'New Polo','img/3.jpg','90000','1','1434567890123'),
(NULL, '本田思域','img/4.jpg','85000','0','1534567890123');


SELECT * FROM car;