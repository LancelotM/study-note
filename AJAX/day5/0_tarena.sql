SET NAMES UTF8;
DROP DATABASE IF EXISTS tarena;
CREATE DATABASE tarena;
USE tarena;

CREATE TABLE student(
  sid INT PRIMARY KEY AUTO_INCREMENT,
  sname VARCHAR(32),
  pic VARCHAR(32),
  scoreGrade VARCHAR(1)
);
INSERT INTO student VALUES
(NULL, 'Tom', 'img/1.jpg', 'A'),
(NULL, 'Mary', 'img/2.jpg', 'A'),
(NULL, 'John', 'img/3.jpg', 'A'),
(NULL, 'Jerry', 'img/4.jpg', 'B'),
(NULL, 'Tina', 'img/5.jpg', 'B'),
(NULL, 'Maria', 'img/6.jpg', 'B'),
(NULL, 'Lily', 'img/7.jpg', 'C'),
(NULL, 'Kate', 'img/8.jpg', 'C'),
(NULL, 'King', 'img/9.jpg', 'C'),
(NULL, 'Scott', 'img/3.jpg', 'D'),
(NULL, 'Smith', 'img/5.jpg', 'D'),
(NULL, 'Tina', 'img/8.jpg', 'D');


SELECT * FROM student WHERE scoreGrade='b';