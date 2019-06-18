/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-23 11:42:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '题目id',
  `Tid` int(255) NOT NULL COMMENT '试卷id',
  `Typeid` int(255) NOT NULL COMMENT '1:单选题；2：判断题；3：多选题；4：填空题',
  `score` varchar(255) CHARACTER SET utf8 NOT NULL,
  `question` varchar(255) CHARACTER SET utf8 NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 NOT NULL,
  `options` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('1', '1', '1', '5', '下列选项中，不是URL地址中所包含的信息是（ ）。', 'D', '主机名;端口号;网络协议;软件版本');
INSERT INTO `test` VALUES ('2', '1', '1', '5', 'PHP是一种（ ）的编程语言。', 'A', '解释型;编译型;两者都是;两者都不是');
INSERT INTO `test` VALUES ('3', '1', '2', '5', '使用PHP写好的程序，在Linux和Windows平台上都可以运行。', 'yes', 'yes;no');
INSERT INTO `test` VALUES ('4', '1', '2', '5', 'PHP可以支持MySQL数据库，但不支持其它的数据库。', 'no', 'yes;no');
INSERT INTO `test` VALUES ('5', '1', '3', '10', '下列选项中，关于数据类型的说法描述正确的是（ ）。', 'B;D', '浮点数指的是数学中的小数，不能保存整数;在双引号内的变量会被解析，而单引号内的变量会被原样输出;布尔类型只有true和false两个值，且区分大小写;对于整数59可以使用十六进制数0x3b进行表示');
INSERT INTO `test` VALUES ('6', '1', '4', '15', 'Apache的httpd服务程序默认使用的是____端口。', '80', null);
INSERT INTO `test` VALUES ('7', '2', '1', '15', '下列选项中，不是URL地址中所包含的信息是（ ）。', 'D', '主机名;端口号;网络协议;软件版本');
INSERT INTO `test` VALUES ('8', '2', '1', '15', 'PHP是一种（ ）的编程语言。', 'A', '解释型;编译型;两者都是;两者都不是');
INSERT INTO `test` VALUES ('9', '2', '2', '15', '使用PHP写好的程序，在Linux和Windows平台上都可以运行。', 'yes', 'yes;no');
INSERT INTO `test` VALUES ('10', '2', '2', '15', 'PHP可以支持MySQL数据库，但不支持其它的数据库。', 'no', 'yes;no');
INSERT INTO `test` VALUES ('11', '2', '3', '20', '下列选项中，关于数据类型的说法描述正确的是（ ）。', 'B;D', '浮点数指的是数学中的小数，不能保存整数;在双引号内的变量会被解析，而单引号内的变量会被原样输出;布尔类型只有true和false两个值，且区分大小写;对于整数59可以使用十六进制数0x3b进行表示');
INSERT INTO `test` VALUES ('12', '2', '4', '25', 'C#是一种（ ）的编程语言。', '编译型', null);
INSERT INTO `test` VALUES ('13', '3', '1', '10', '111111', 'A', '1;2;3;4');
INSERT INTO `test` VALUES ('14', '3', '2', '20', '222222', 'yes', 'yes;no');
INSERT INTO `test` VALUES ('15', '3', '3', '25', '333333', 'B;D', 'jj;yy;tt;ee');

-- ----------------------------
-- Table structure for testlist
-- ----------------------------
DROP TABLE IF EXISTS `testlist`;
CREATE TABLE `testlist` (
  `id` int(32) NOT NULL AUTO_INCREMENT COMMENT '试卷id',
  `title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '试卷名称',
  `timeout` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '考试时间',
  `testType` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '1：单选题；2：判断题；3：多选题；4：填空题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of testlist
-- ----------------------------
INSERT INTO `testlist` VALUES ('1', 'php试题', '1800', '1;2;3;4');
INSERT INTO `testlist` VALUES ('2', 'c#课堂练习题', '600', '1;2;3;4');
INSERT INTO `testlist` VALUES ('3', 'C课堂考试', '1800', '2');
