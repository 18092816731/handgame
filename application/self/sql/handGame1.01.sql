/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : handgame

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-15 20:06:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hand_agent
-- ----------------------------
DROP TABLE IF EXISTS `hand_agent`;
CREATE TABLE `hand_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '代理商id',
  `account` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '代理商账号',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级id\n多级分类0为平台-平台下级为游戏--游戏下级为代理',
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '代理账号密码',
  `card_num` int(11) NOT NULL DEFAULT '0' COMMENT '代理房卡 0为无限张',
  `created_at` varchar(45) CHARACTER SET utf8 DEFAULT '' COMMENT '代理创建时间',
  `update_at` varchar(45) CHARACTER SET utf8 DEFAULT '' COMMENT '代理信息更新时间',
  `token` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` smallint(1) DEFAULT '1' COMMENT '状态 1为启用 2为禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='代理级别表 0为平台   0的子集为游戏  游戏下面是代理';

-- ----------------------------
-- Records of hand_agent
-- ----------------------------
INSERT INTO `hand_agent` VALUES ('4', '666666  ', '0', 'e10adc3949ba59abbe56e057f20f883e', '0', '', null, '', '1');
INSERT INTO `hand_agent` VALUES ('5', '888888 ', '4', 'fcea920f7412b5da7be0cf42b8c93759', '0', '', '1526364346', '', '1');
INSERT INTO `hand_agent` VALUES ('6', '223456', '4', 'e10adc3949ba59abbe56e057f20f883e', '0', '1526350490', '', '', '1');
INSERT INTO `hand_agent` VALUES ('8', '666888', '4', 'e10adc3949ba59abbe56e057f20f883e', '0', '1526362876', '', '', '1');

-- ----------------------------
-- Table structure for hand_agent_card
-- ----------------------------
DROP TABLE IF EXISTS `hand_agent_card`;
CREATE TABLE `hand_agent_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房卡信息id',
  `agent_id` int(11) NOT NULL COMMENT '代理id',
  `card_num` int(11) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '1为加卡记录 2为减卡 记录',
  `user_id` varchar(11) NOT NULL DEFAULT '' COMMENT '用户id',
  `created_at` varchar(45) NOT NULL DEFAULT '' COMMENT '房卡信息变更时间',
  `user_account` varchar(45) DEFAULT '' COMMENT '购买房卡账号   （代理)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='代理房卡信息';

-- ----------------------------
-- Records of hand_agent_card
-- ----------------------------
INSERT INTO `hand_agent_card` VALUES ('1', '4', '5', '1', '5', '838:59:59', '');
INSERT INTO `hand_agent_card` VALUES ('2', '4', '5', '1', '5', '838:59:59', '');
INSERT INTO `hand_agent_card` VALUES ('3', '4', '5', '1', '5', '838:59:59', '');
INSERT INTO `hand_agent_card` VALUES ('4', '4', '5', '1', '5', '838:59:59', '');
INSERT INTO `hand_agent_card` VALUES ('5', '4', '5', '1', '5', '838:59:59', '');
INSERT INTO `hand_agent_card` VALUES ('6', '4', '5', '1', '5', '00:00:00', '');
INSERT INTO `hand_agent_card` VALUES ('7', '5', '5', '1', 'ID1245789', '00:00:00', '');
INSERT INTO `hand_agent_card` VALUES ('8', '5', '5', '1', 'ID1245789', '1526318115', '');
INSERT INTO `hand_agent_card` VALUES ('9', '5', '5', '1', 'ID1245789', '1526318129', '');
INSERT INTO `hand_agent_card` VALUES ('10', '5', '5', '1', 'ID1245789', '1526318130', '');
INSERT INTO `hand_agent_card` VALUES ('11', '5', '5', '1', 'ID1245789', '1526318130', '');
INSERT INTO `hand_agent_card` VALUES ('12', '5', '5', '1', 'ID1245789', '1526318131', '');
INSERT INTO `hand_agent_card` VALUES ('13', '5', '5', '1', 'ID1245789', '1526318131', '');
INSERT INTO `hand_agent_card` VALUES ('14', '5', '5', '1', 'ID1245789', '1526352071', 'ID1245789');
INSERT INTO `hand_agent_card` VALUES ('15', '5', '5', '1', 'ID1245789', '1526352081', 'ID1245789');
INSERT INTO `hand_agent_card` VALUES ('16', '5', '5', '1', 'ID1245789', '1526352082', 'ID1245789');
INSERT INTO `hand_agent_card` VALUES ('17', '5', '5', '1', 'ID1245789', '1526352961', 'ID1245789');
INSERT INTO `hand_agent_card` VALUES ('18', '5', '20', '1', 'ID564823', '1526364331', 'ID564823');
INSERT INTO `hand_agent_card` VALUES ('19', '5', '20', '1', 'ID564823', '1526364346', 'ID564823');

-- ----------------------------
-- Table structure for hand_agent_log
-- ----------------------------
DROP TABLE IF EXISTS `hand_agent_log`;
CREATE TABLE `hand_agent_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户日志',
  `agent_id` int(11) NOT NULL COMMENT '用户id',
  `login_time` varchar(45) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '使用',
  `update_time` varchar(45) CHARACTER SET utf8 DEFAULT '' COMMENT '更新时间',
  `operation` varchar(255) CHARACTER SET utf8 DEFAULT '' COMMENT '完成的操作',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户日志表';

-- ----------------------------
-- Records of hand_agent_log
-- ----------------------------
INSERT INTO `hand_agent_log` VALUES ('1', '3', '838:59:59', null, '');
INSERT INTO `hand_agent_log` VALUES ('2', '3', '00:00:00', null, '');
INSERT INTO `hand_agent_log` VALUES ('3', '3', '838:59:59', null, '');
INSERT INTO `hand_agent_log` VALUES ('4', '3', '00:00:00', null, '');
INSERT INTO `hand_agent_log` VALUES ('5', '3', '838:59:59', null, '');
INSERT INTO `hand_agent_log` VALUES ('6', '3', '838:59:59', null, '用户登录');
INSERT INTO `hand_agent_log` VALUES ('7', '3', '838:59:59', null, '用户登录');
INSERT INTO `hand_agent_log` VALUES ('8', '3', '00:00:00', null, '用户登录');
INSERT INTO `hand_agent_log` VALUES ('9', '3', '00:00:00', null, '用户登录');
INSERT INTO `hand_agent_log` VALUES ('10', '4', '1526348013', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('11', '4', '1526350689', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('12', '4', '1526352438', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('13', '4', '1526352606', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('14', '4', '1526352608', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('15', '4', '1526352666', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('16', '5', '1526352930', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('17', '5', '1526354917', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('18', '4', '1526360963', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('19', '4', '1526362129', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('20', '4', '1526362373', '', '用户登录');
INSERT INTO `hand_agent_log` VALUES ('21', '5', '1526363763', '', '用户登录');

-- ----------------------------
-- Table structure for hand_plat_card
-- ----------------------------
DROP TABLE IF EXISTS `hand_plat_card`;
CREATE TABLE `hand_plat_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房卡信息id',
  `agent_id` int(11) NOT NULL COMMENT '代理id',
  `card_num` int(11) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '预留',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `created_at` varchar(45) NOT NULL DEFAULT '' COMMENT '房卡信息变更时间',
  `user_account` varchar(45) DEFAULT '' COMMENT '用户账号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='代理房卡信息';

-- ----------------------------
-- Records of hand_plat_card
-- ----------------------------
INSERT INTO `hand_plat_card` VALUES ('6', '4', '5', '1', '5', '00:00:00', '');
INSERT INTO `hand_plat_card` VALUES ('7', '4', '5', '1', '5', '00:00:00', '');
INSERT INTO `hand_plat_card` VALUES ('8', '4', '5', '1', '5', '1526351618', '123456');
INSERT INTO `hand_plat_card` VALUES ('9', '4', '5', '1', '5', '1526351949', '123456');
INSERT INTO `hand_plat_card` VALUES ('10', '4', '5', '1', '5', '1526351950', '123456');
INSERT INTO `hand_plat_card` VALUES ('11', '4', '5', '1', '5', '1526352244', '123456');
INSERT INTO `hand_plat_card` VALUES ('12', '123456', '20', '1', '888888', '1526362470', '888888 ');
INSERT INTO `hand_plat_card` VALUES ('13', '123456', '20', '1', '888888', '1526363875', '888888 ');
