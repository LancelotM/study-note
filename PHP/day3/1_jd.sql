SET NAMES UTF8;
DROP DATABASE IF EXISTS jd;
CREATE DATABASE jd CHARSET=UTF8;
USE jd;

CREATE TABLE udisk(
  uid INT PRIMARY KEY AUTO_INCREMENT,
  pic VARCHAR(32),
  uname VARCHAR(32),
  price FLOAT(5,2),
  addedTime BIGINT
);
INSERT INTO udisk VALUES
(NULL, 'img/1.jpg','三星','35.5','1234567890123'),
(NULL, 'img/2.jpg','威刚','36.5','1244567890123'),
(NULL, 'img/3.jpg','创建','37.5','1254567890123'),
(NULL, 'img/4.jpg','爱国者','38.5','1264567890123');