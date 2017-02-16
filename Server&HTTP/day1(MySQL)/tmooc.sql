/*SHOW DATABASES;*/
#show databases;
#Show DataBAses;
/*每条语句都必须以分号结尾*/

#SERVER -> DATABASE -> TABLE  -> ROW  -> COLUMN
#试着删除指定的数据库(如果存在的话)
DROP DATABASE IF EXISTS tmooc;
#重新创建数据库，指定字符集
CREATE DATABASE tmooc CHARSET=UTF8;   #UTF-8必须写作UTF8
#查看所有的数据库
SHOW DATABASES;