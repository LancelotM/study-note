#1.设置下面的SQL语句所有字符编码为UTF8
SET NAMES UTF8;
#2.删除数据库danei(如果存在的话)
DROP DATABASE IF EXISTS danei;
#3.创建数据库danei，保存数据时所用字符编码为UTF8
CREATE DATABASE danei CHARSET=UTF8;
#4.进入数据库danei
USE danei;

#5.创建保存部门信息的表 dept(did,dname,location)
CREATE TABLE dept(
  did INT PRIMARY KEY,
  dname VARCHAR(32),
  location VARCHAR(32)
);
#6.向部门表中插入三行记录(三个部门的信息)
INSERT INTO dept VALUES
('10', '研发部', '北京'),
('20', '市场部', '上海'),
('30', '研发部', '上海');

#7.创建保存员工信息的表 
#emp(eid,ename,sex,birthday,salary,deptId)
CREATE TABLE emp(
  eid INT PRIMARY KEY AUTO_INCREMENT,
  ename VARCHAR(32),
  sex VARCHAR(1),
  birthday BIGINT,
  salary FLOAT(8,2),   #999999.99
  deptId INT     #外键列，值可以重复，但取值范围必须在另一个表的主键取值范围内
);
#8.向员工表中插入9行记录(每个部门各有三个员工)
INSERT INTO emp VALUES
(NULL,'Tom','M','1234567890123','5000','10'),
(NULL,'Mary','F','1234567890123','6000','10'),
(NULL,'Joe','M','1234567890123','7000','10'),
(NULL,'King','M','1234567890123','8000','20'),
(NULL,'Smith','M','1234567890123','9000','20'),
(NULL,'Kate','F','1234567890123','5500','20'),
(NULL,'Lily','F','1234567890123','5600','30'),
(NULL,'Helen','F','1234567890123','5700','30'),
(NULL,'Scott','M','1234567890123','5800','30');

#9.删除10号部门及该部门下所有员工
#DELETE FROM dept WHERE did=10;
#DELETE FROM emp WHERE deptId=10;

#10.修改20号部门的编号为200，同时修改该部门对应的员工的部门编号
UPDATE dept SET did=200 WHERE did=20;
UPDATE emp SET deptId=200 WHERE deptId=20;

#11.查询出所有的部门信息
#SELECT did,dname,location FROM dept;
#12.查询出所有的员工信息
#SELECT * FROM emp;

#13.查询出30号部门所有的员工
#SELECT eid,ename FROM emp WHERE deptId=30;

#14.查询出研发部所有员工的信息—— 子查询   
#思路：先根据部门名称查询部门编号；再根据部门编号查询员工信息
/*SELECT * FROM emp WHERE deptId=(
  SELECT did FROM dept WHERE dname='研发部'
);*/

#IN 表示在某个范围内取值
SELECT * FROM emp WHERE deptId  IN (
  SELECT did FROM dept WHERE dname='研发部'
);