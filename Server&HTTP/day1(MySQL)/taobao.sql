/***
*SERVER -> DATABASE -> TABLE -> ROW -> COLUMN
****/

#1.设置下面所有的SQL语句的编码方式
SET NAMES UTF8;
#2.试着删除数据库taobao（如果存在的话）
DROP DATABASE IF EXISTS taobao;
#3.重新创建数据库taobao，指定保存数据所有字符集为UTF8
CREATE DATABASE taobao CHARSET=UTF8;
#查询出服务器当前已有的所有数据库
#SHOW DATABASES;
#4.开始使用指定的数据库/进入指定的数据库
USE taobao;


#5.创建保存用户信息的表(TABLE)
CREATE TABLE tb_user(
  uid INT PRIMARY KEY AUTO_INCREMENT, #用户编号，主键列(不允许出现重复值或NULL),自增列
  uname VARCHAR(6),  #variable character 
  upwd VARCHAR(32),  #用户密码
  pic VARCHAR(32),   #用户头像图片的路径
  score FLOAT(10,2), #用户积分99999999.99 
  regTime BIGINT     #注册时间，一般是大整数代替DATE/DATETIME表示日期时间
);

#向表中插入记录行(ROW)	
INSERT INTO tb_user VALUES(
  NULL,'tom','123456','img/101.jpg','111','1234567890125'
);
INSERT INTO tb_user VALUES(
  NULL,'mariab','123456','img/102.jpg','222','1434567890125'
);
INSERT INTO tb_user VALUES(
  NULL,'tomcruise','123456','img/103.jpg','333','1534567890125'
);
INSERT INTO tb_user VALUES(
  NULL,'唐牧','123456','img/201.jpg','111','1234567890125'
);
INSERT INTO tb_user VALUES(
  NULL,'超级玛丽噢哦','123456','img/202.jpg','222','1434567890125'
);
INSERT INTO tb_user VALUES(
  NULL,'一二三四五六七','123456','img/303.jpg','333','1534567890125'
);
#INSERT INTO tb_user VALUES(
#  101,'king','123456','img/999.jpg','333','1534567890125'
#);

#删除一行指定的记录
#DELETE FROM tb_user;  #删除表中所有的记录行
#DELETE FROM tb_user WHERE uid===1; 语法错误
#DELETE FROM tb_user WHERE uid==1;  语法错误
DELETE FROM tb_user WHERE uid=1;

#修改一行指定的记录 —— 很容易忘记！
#UPDATE tb_user SET uname='马丽亚',upwd='456789';  修改所有的记录行
UPDATE tb_user SET uname='马丽亚',upwd='456789'
WHERE uid=2;

#查询出表中的数据
#SELECT uid,uname,upwd,pic,score,regTime 
#FROM tb_user;

SELECT  *  FROM tb_user WHERE uid=2;
