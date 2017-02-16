SET NAMES UTF8;
DROP DATABASE IF EXISTS tarena;
CREATE DATABASE tarena CHARSET=UTF8;
USE tarena;
CREATE TABLE emp(
    eid INT PRIMARY KEY AUTO_INCREMENT,
    ename VARCHAR(16),
    pic VARCHAR(16),
    salary FLOAT(10,2),
    deptID INT
);
INSERT INTO emp VALUES
(null,'tom','img/1.jpg','5000','10'),
(null,'tom','img/2.jpg','5000','10'),
(null,'tom','img/3.jpg','5000','10'),
(null,'allice','img/4.jpg','10000','20'),
(null,'allice','img/5.jpg','10000','20'),
(null,'allice','img/6.jpg','10000','20'),
(null,'mike','img/7.jpg','20000','30'),
(null,'mike','img/8.jpg','20000','30'),
(null,'mike','img/9.jpg','20000','30');
SELECT * FROM emp;