/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : handgame

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-14 01:44:16
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
  `created_at` time DEFAULT NULL COMMENT '代理创建时间',
  `update_at` time DEFAULT NULL COMMENT '代理信息更新时间',
  `token` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` smallint(1) DEFAULT '1' COMMENT '状态 1为启用 2为禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='代理级别表 0为平台   0的子集为游戏  游戏下面是代理';

-- ----------------------------
-- Table structure for hand_agent_log
-- ----------------------------
DROP TABLE IF EXISTS `hand_agent_log`;
CREATE TABLE `hand_agent_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户日志',
  `agent_id` int(11) NOT NULL COMMENT '用户id',
  `login_time` time DEFAULT NULL COMMENT '使用',
  `update_time` time DEFAULT NULL,
  `operation` varchar(255) CHARACTER SET utf8 DEFAULT '' COMMENT '完成的操作',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户日志表';

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
