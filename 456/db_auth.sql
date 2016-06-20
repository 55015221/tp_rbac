/*
Navicat MySQL Data Transfer

Source Server         : 1111111111111
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : auth

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2015-11-27 15:45:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `db_admin`
-- ----------------------------
DROP TABLE IF EXISTS `db_admin`;
CREATE TABLE `db_admin` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `account` varchar(32) DEFAULT NULL COMMENT '管理员账号',
  `password` varchar(36) DEFAULT NULL COMMENT '管理员密码',
  `login_time` int(11) DEFAULT NULL COMMENT '最后登录时间',
  `login_count` mediumint(8) NOT NULL COMMENT '登录次数',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '账户状态，禁用为0   启用为1',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_admin
-- ----------------------------
INSERT INTO `db_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1448606155', '335', '1', '1437979578');

-- ----------------------------
-- Table structure for `db_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `db_auth_group`;
CREATE TABLE `db_auth_group` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_auth_group
-- ----------------------------
INSERT INTO `db_auth_group` VALUES ('30', '超级管理组', '1', '1,2,3,14,15,16,17,18,19,21,25,4,5,6,9,11,24,35,36,37,38,12,13,22,23', '1445158837');

-- ----------------------------
-- Table structure for `db_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `db_auth_group_access`;
CREATE TABLE `db_auth_group_access` (
  `uid` smallint(5) unsigned NOT NULL,
  `group_id` smallint(5) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_auth_group_access
-- ----------------------------
INSERT INTO `db_auth_group_access` VALUES ('1', '30');
INSERT INTO `db_auth_group_access` VALUES ('2', '31');
INSERT INTO `db_auth_group_access` VALUES ('3', '33');
INSERT INTO `db_auth_group_access` VALUES ('4', '31');
INSERT INTO `db_auth_group_access` VALUES ('5', '31');

-- ----------------------------
-- Table structure for `db_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `db_auth_rule`;
CREATE TABLE `db_auth_rule` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL DEFAULT '',
  `title` varchar(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` smallint(5) NOT NULL COMMENT '父级ID',
  `sort` tinyint(4) NOT NULL DEFAULT '50' COMMENT '排序',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_auth_rule
-- ----------------------------
INSERT INTO `db_auth_rule` VALUES ('36', 'Admin/admin_list', '管理员列表', '1', '1', '', '35', '50', '1444546437');
INSERT INTO `db_auth_rule` VALUES ('35', 'Admin/index', '系统管理', '1', '1', '', '0', '50', '1444582187');
INSERT INTO `db_auth_rule` VALUES ('37', 'Admin/auth_group', '用户组', '1', '1', '', '35', '50', '1445439984');
INSERT INTO `db_auth_rule` VALUES ('38', 'Admin/auth_rule', '权限菜单', '1', '1', '', '35', '50', '1445439984');
