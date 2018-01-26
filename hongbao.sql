/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : hongbao

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-09 15:50:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hb_admin
-- ----------------------------
DROP TABLE IF EXISTS `hb_admin`;
CREATE TABLE `hb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hb_detail
-- ----------------------------
DROP TABLE IF EXISTS `hb_detail`;
CREATE TABLE `hb_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '抢红包记录',
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `jine` varchar(255) DEFAULT NULL COMMENT '红包金额',
  `time` varchar(255) DEFAULT NULL COMMENT '抢红包时间',
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `types` varchar(255) DEFAULT NULL COMMENT '类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hb_power
-- ----------------------------
DROP TABLE IF EXISTS `hb_power`;
CREATE TABLE `hb_power` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '上帝',
  `max` varchar(255) DEFAULT NULL,
  `min` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hb_sharetitle
-- ----------------------------
DROP TABLE IF EXISTS `hb_sharetitle`;
CREATE TABLE `hb_sharetitle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hb_submit
-- ----------------------------
DROP TABLE IF EXISTS `hb_submit`;
CREATE TABLE `hb_submit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gl_id` int(11) DEFAULT NULL COMMENT '关联id',
  `names` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `content` text,
  `stage` varchar(255) DEFAULT NULL COMMENT '状态',
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hb_users
-- ----------------------------
DROP TABLE IF EXISTS `hb_users`;
CREATE TABLE `hb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户表',
  `openid` varchar(255) DEFAULT NULL COMMENT 'openid',
  `wx_photo` varchar(255) DEFAULT NULL COMMENT '头像',
  `wx_name` varchar(255) DEFAULT NULL COMMENT '名称',
  `datetime` datetime DEFAULT NULL COMMENT '添加时间',
  `add_time` varchar(255) DEFAULT NULL COMMENT '添加时间',
  `share_time` varchar(255) DEFAULT NULL COMMENT '分享时间',
  `invitation` varchar(255) DEFAULT NULL COMMENT '邀请码',
  `money` float(65,1) DEFAULT '0.0' COMMENT '红包金额',
  `fl_jine` float DEFAULT '0' COMMENT '返利金额',
  `share_num` int(11) DEFAULT '0' COMMENT '分享次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
