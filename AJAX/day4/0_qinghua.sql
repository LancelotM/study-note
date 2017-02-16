SET NAMES UTF8;
DROP DATABASE IF EXISTS qinghua;
CREATE DATABASE qinghua CHARSET=UTF8;
USE qinghua;

CREATE TABLE qh_class(
  cid INT PRIMARY  KEY,
  cname VARCHAR(32),
  count INT
);
INSERT INTO qh_class VALUES
(10, '软件0801班', 2),
(20, '计科0802班', 4),
(30, '工商0803班', 3);

CREATE TABLE qh_student(
  sid INT PRIMARY  KEY AUTO_INCREMENT,
  sname VARCHAR(32),
  score FLOAT(4, 1) ,
  classId INT
);
INSERT INTO qh_student VALUES
(NULL, 'Tom', '600', 10),
(NULL, 'Mary', '601', 10),
(NULL, 'John', '602', 20),
(NULL, 'King', '603', 20),
(NULL, 'Smith', '604', 20),
(NULL, 'Joe', '605', 20),
(NULL, 'Jerry', '606', 30),
(NULL, 'Scott', '607', 30),
(NULL, 'Tiger', '608', 30);



CREATE TABLE qh_type(
  tid INT PRIMARY KEY,
  tname VARCHAR(32)
);
INSERT INTO qh_type VALUES
(10, '相机'),
(20, '洗衣机'),
(30, '手机');

CREATE TABLE qh_producer(
  pid INT PRIMARY KEY,
  pname VARCHAR(32),
  typeId INT
);
INSERT INTO qh_producer VALUES
(101, '尼康', 10),
(102, '索尼', 10),
(103, '佳能', 10),
(201, '小天鹅', 20),
(202, '海尔', 20),
(203, '三星', 20),
(301, '小米', 30),
(302, '苹果', 30),
(303, '华为', 30);


CREATE TABLE qh_user(
  uid INT PRIMARY KEY AUTO_INCREMENT,
  uname VARCHAR(32),
  upwd VARCHAR(32)
);
INSERT INTO qh_user VALUES
(NULL, 'tom', '123'),
(NULL, 'mary', '123');
