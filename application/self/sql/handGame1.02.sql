/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : handgame

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-21 23:34:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hand_agent
-- ----------------------------
DROP TABLE IF EXISTS `hand_agent`;
CREATE TABLE `hand_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '代理商id',
  `account` varchar(225) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '代理商账号',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级id\n多级分类0为平台-平台下级为游戏--游戏下级为代理',
  `password` varchar(225) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '代理账号密码',
  `card_num` int(11) NOT NULL DEFAULT '0' COMMENT '代理房卡 0为无限张',
  `created_at` varchar(225) CHARACTER SET utf8 DEFAULT '' COMMENT '代理创建时间',
  `update_at` varchar(225) CHARACTER SET utf8 DEFAULT '' COMMENT '代理信息更新时间',
  `token` varchar(225) COLLATE utf8_unicode_ci NOT NULL DEFAULT '123456789',
  `status` smallint(1) DEFAULT '1' COMMENT '状态 1为启用 2为禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='代理级别表 0为平台   0的子集为游戏  游戏下面是代理';

-- ----------------------------
-- Records of hand_agent
-- ----------------------------
INSERT INTO `hand_agent` VALUES ('10', '666666', '0', 'e10adc3949ba59abbe56e057f20f883e', '0', '', '', '123456789', '1');
INSERT INTO `hand_agent` VALUES ('11', '888888', '10', 'e10adc3949ba59abbe56e057f20f883e', '2270', '', '1526915483', '123456789', '1');
INSERT INTO `hand_agent` VALUES ('21', '15278945612', '1', 'e10adc3949ba59abbe56e057f20f883e', '900', '1526886997', '1526887107', '123456789', '1');
INSERT INTO `hand_agent` VALUES ('22', '13991972740', '1', 'e10adc3949ba59abbe56e057f20f883e', '40', '1526887290', '1526887363', '123456789', '1');
INSERT INTO `hand_agent` VALUES ('23', '1', '1', 'e10adc3949ba59abbe56e057f20f883e', '9700', '1526888578', '1526893682', '123456789', '1');
INSERT INTO `hand_agent` VALUES ('24', '18963585852', '1', '61d1386488d9981ceab385336cad26ad', '10', '1526892520', '1526892569', '123456789', '1');

-- ----------------------------
-- Table structure for hand_agent_card
-- ----------------------------
DROP TABLE IF EXISTS `hand_agent_card`;
CREATE TABLE `hand_agent_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房卡信息id',
  `agent_id` int(11) NOT NULL COMMENT '代理id',
  `card_num` int(11) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '1为加卡记录 2为减卡 记录',
  `created_at` varchar(225) NOT NULL DEFAULT '' COMMENT '房卡信息变更时间',
  `user_account` varchar(225) DEFAULT '' COMMENT '购买房卡账号   （代理)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COMMENT='代理房卡信息';

-- ----------------------------
-- Records of hand_agent_card
-- ----------------------------
INSERT INTO `hand_agent_card` VALUES ('102', '21', '100', '1', '1526887107', '10002079');
INSERT INTO `hand_agent_card` VALUES ('103', '22', '10', '1', '1526887363', '10002079');
INSERT INTO `hand_agent_card` VALUES ('104', '23', '100', '1', '1526888883', '10002140');
INSERT INTO `hand_agent_card` VALUES ('105', '23', '100', '1', '1526893682', '10002124');
INSERT INTO `hand_agent_card` VALUES ('106', '23', '100', '1', '1526893682', '10002124');
INSERT INTO `hand_agent_card` VALUES ('107', '11', '12', '1', '1526915096', '10002142');
INSERT INTO `hand_agent_card` VALUES ('108', '11', '1', '1', '1526915458', '10002142');
INSERT INTO `hand_agent_card` VALUES ('109', '11', '12', '1', '1526915483', '10002142');

-- ----------------------------
-- Table structure for hand_agent_log
-- ----------------------------
DROP TABLE IF EXISTS `hand_agent_log`;
CREATE TABLE `hand_agent_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户日志',
  `agent_id` int(11) NOT NULL COMMENT '用户id',
  `login_time` varchar(225) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '使用',
  `update_time` varchar(225) CHARACTER SET utf8 DEFAULT '' COMMENT '更新时间',
  `operation` varchar(255) CHARACTER SET utf8 DEFAULT '' COMMENT '完成的操作',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户日志表';

-- ----------------------------
-- Records of hand_agent_log
-- ----------------------------
INSERT INTO `hand_agent_log` VALUES ('82', '10', '1526886970', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('83', '21', '1526887051', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('84', '22', '1526887301', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('85', '22', '1526887972', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('86', '22', '1526888077', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('87', '22', '1526888097', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('88', '11', '1526888414', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('89', '10', '1526888434', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('90', '23', '1526888845', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('91', '10', '1526892446', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('92', '10', '1526892554', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('93', '11', '1526892581', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('94', '11', '1526893178', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('95', '23', '1526893634', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('96', '10', '1526904743', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('97', '10', '1526905054', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('98', '10', '1526905867', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('99', '10', '1526905910', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('100', '11', '1526906048', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('101', '11', '1526909483', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('102', '11', '1526912229', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('103', '11', '1526915723', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('104', '11', '1526915827', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('105', '11', '1526916279', '', '用户登录');

-- ----------------------------
-- Table structure for hand_plat_card
-- ----------------------------
DROP TABLE IF EXISTS `hand_plat_card`;
CREATE TABLE `hand_plat_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房卡信息id',
  `plat_id` int(11) NOT NULL COMMENT '平台当前操作用户id',
  `card_num` int(11) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '预留',
  `agent_account` varchar(225) NOT NULL COMMENT '代理账号（平台给房卡账号）',
  `created_at` varchar(225) NOT NULL DEFAULT '' COMMENT '房卡信息变更时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8 COMMENT='代理房卡信息';

-- ----------------------------
-- Records of hand_plat_card
-- ----------------------------
INSERT INTO `hand_plat_card` VALUES ('88', '10', '1000', '1', '15278945612', '1526887009');
INSERT INTO `hand_plat_card` VALUES ('89', '10', '50', '1', '13991972740', '1526887330');
INSERT INTO `hand_plat_card` VALUES ('90', '10', '10000', '1', '1', '1526888601');
INSERT INTO `hand_plat_card` VALUES ('91', '10', '10', '1', '18963585852', '1526892569');

-- ----------------------------
-- Table structure for hand_use_card
-- ----------------------------
DROP TABLE IF EXISTS `hand_use_card`;
CREATE TABLE `hand_use_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房卡信息id',
  `agent_id` int(11) NOT NULL COMMENT '代理id',
  `card_num` int(11) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '房卡更新类型 1为增加 2为消耗',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `created_at` time NOT NULL COMMENT '房卡信息变更时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='代理房卡信息';

-- ----------------------------
-- Records of hand_use_card
-- ----------------------------
