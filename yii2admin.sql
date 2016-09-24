/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : yii2admin

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2016-09-24 12:47:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yii2_ad`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_ad`;
CREATE TABLE `yii2_ad` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) NOT NULL COMMENT '类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `image` varchar(255) NOT NULL COMMENT '图片路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转地址',
  `sort` int(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='图片广告';

-- ----------------------------
-- Records of yii2_ad
-- ----------------------------
INSERT INTO `yii2_ad` VALUES ('1', '1', '测试广告1', '/upload/image/201608/1472644398807.jpg', 'http://www.imhaigui.com', '1', '1');

-- ----------------------------
-- Table structure for `yii2_admin`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_admin`;
CREATE TABLE `yii2_admin` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(16) NOT NULL COMMENT '用户名',
  `password` char(60) NOT NULL COMMENT '密码',
  `salt` char(32) NOT NULL COMMENT '密码干扰字符',
  `email` char(32) NOT NULL COMMENT '用户邮箱',
  `mobile` char(15) NOT NULL DEFAULT '' COMMENT '用户手机',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态 1正常 0禁用',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of yii2_admin
-- ----------------------------
INSERT INTO `yii2_admin` VALUES ('1', 'admin', '$2y$13$YHruPeQ9VhT5LjuglzimHOqYyJf8SJitk80ADzshTjCzsb4yWcqCm', 'JSCZQ2Oh4FrAOEyPjJgIUdfbXklO6kve', 'phphome111@qq.com', '13565231111', '1457922160', '2130706433', '1457922174', '2130706433', '1472817209', '1');
INSERT INTO `yii2_admin` VALUES ('2', 'feifei', '$2y$13$jqWGlVo8T3qtnWUX0kTX/ON5ctvokzkQ7RAvKuNRjN.WvxgBlFK4u', 'tzDsmCSLbtktnvbgn1YeEqslYOBo1Cn9', 'php11111@qq.com', '13631568985', '1458028401', '2130706433', '1458028401', '2130706433', '1468230085', '1');
INSERT INTO `yii2_admin` VALUES ('4', 'testuser', '$2y$13$fac8CDeuFI7rm318MKULLexCKrk1r4jsr56MNiVshvtnZLQYBQ0dq', '30O_rRLz-fNKULFrc0OH4osPhuIzikwT', 'php2222@qq.com', '12345651111', '1459934783', '2130706433', '0', '2130706433', '1460032029', '1');

-- ----------------------------
-- Table structure for `yii2_article`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_article`;
CREATE TABLE `yii2_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `category_id` int(10) unsigned NOT NULL COMMENT '所属分类',
  `name` char(40) NOT NULL DEFAULT '' COMMENT '标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '标题',
  `cover` varchar(255) NOT NULL DEFAULT '' COMMENT '封面',
  `description` char(140) NOT NULL DEFAULT '' COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  `extend` text COMMENT '扩展内容array',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '内容类型',
  `position` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位',
  `link` varchar(255) NOT NULL DEFAULT '' COMMENT '外链',
  `sort` int(4) NOT NULL DEFAULT '0' COMMENT '排序值',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '数据状态',
  PRIMARY KEY (`id`),
  KEY `idx_category_status` (`category_id`,`status`),
  KEY `idx_status_type_pid` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of yii2_article
-- ----------------------------
INSERT INTO `yii2_article` VALUES ('3', '1', 'jieshao', '帆海汇介绍', '', '帆海汇介绍', '<p><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &#39;Lucida Console&#39;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">帆海汇介绍</span></p>', '', '2', '0', '', '0', '1473606822', '0', '1');
INSERT INTO `yii2_article` VALUES ('2', '1', 'aboutus', '关于我们', '/upload/image/201609/1473606655946.png', '关于我们', '<p>这里是关于我们的内容</p>', 'a:4:{i:1;s:3:\"222\";i:3;s:4:\"3434\";i:6;s:5:\"sdfsa\";s:1:\"s\";s:4:\"sdsf\";}', '2', '0', '', '0', '1472611249', '1473606779', '1');
INSERT INTO `yii2_article` VALUES ('4', '1', 'julebu', '帆船俱乐部', '', '帆船俱乐部', '<p>帆船俱乐部帆船俱乐部帆船俱乐部帆船俱乐部帆船俱乐部帆船俱乐部帆船俱乐部</p>', '', '2', '0', '', '0', '1473606857', '0', '1');
INSERT INTO `yii2_article` VALUES ('5', '1', 'peixun', '培训中心', '', '培训中心', '<p>培训中心培训中心培训中心培训中心培训中心培训中心培训中心培训中心培训中心培训中心培训中心</p>', '', '2', '0', '', '0', '1473606890', '0', '1');
INSERT INTO `yii2_article` VALUES ('6', '1', 'lianxi', '联系我们', '', '联系我们', '<p>联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们</p>', '', '2', '0', '', '0', '1473606916', '0', '1');
INSERT INTO `yii2_article` VALUES ('7', '1', 'hezuo', '合作伙伴', '', '合作伙伴', '<p>合作伙伴合作伙伴合作伙伴合作伙伴合作伙伴合作伙伴合作伙伴合作伙伴合作伙伴合作伙伴合作伙伴合作伙伴合作伙伴合作伙伴</p>', '', '2', '0', '', '0', '1473606940', '0', '1');
INSERT INTO `yii2_article` VALUES ('8', '3', '', '活动内容1111111', '', '活动内容1111111', '<p>活动内容1111111活动内容1111111活动内容1111111活动内容1111111活动内容1111111活动内容1111111活动内容1111111活动内容1111111</p>', '', '2', '0', '', '0', '1473607011', '1473608688', '1');
INSERT INTO `yii2_article` VALUES ('9', '3', '', '活动内容222222', '', '活动内容222222', '<p>活动内容222222活动内容222222活动内容222222活动内容222222活动内容222222活动内容222222活动内容222222活动内容222222活动内容222222活动内容222222活动内容222222</p>', '', '2', '0', '', '0', '1473607032', '1473608697', '1');
INSERT INTO `yii2_article` VALUES ('10', '3', '', '活动内容333333', '', '活动内容333333', '<p>活动内容333333活动内容333333活动内容333333活动内容333333活动内容333333活动内容333333活动内容333333活动内容333333活动内容333333活动内容333333活动内容333333活动内容333333</p>', '', '2', '0', '', '0', '1473607048', '1473608706', '1');

-- ----------------------------
-- Table structure for `yii2_auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_auth_assignment`;
CREATE TABLE `yii2_auth_assignment` (
  `item_name` varchar(64) NOT NULL COMMENT '角色名称 role',
  `user_id` varchar(64) NOT NULL COMMENT '用户ID',
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `yii2_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `yii2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of yii2_auth_assignment
-- ----------------------------
INSERT INTO `yii2_auth_assignment` VALUES ('administrator', '2', '1545254525');
INSERT INTO `yii2_auth_assignment` VALUES ('administrator', '4', '1460012730');
INSERT INTO `yii2_auth_assignment` VALUES ('editor', '1', '1472525903');

-- ----------------------------
-- Table structure for `yii2_auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_auth_item`;
CREATE TABLE `yii2_auth_item` (
  `name` varchar(64) NOT NULL COMMENT '角色或权限名称',
  `type` int(11) NOT NULL COMMENT '1角色 2权限',
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of yii2_auth_item
-- ----------------------------
INSERT INTO `yii2_auth_item` VALUES ('action/actionlog', '2', '', 'action/actionlog', '', '1460031880', '1460031880');
INSERT INTO `yii2_auth_item` VALUES ('action/edit', '2', '', 'action/edit', '', '1460031880', '1460031880');
INSERT INTO `yii2_auth_item` VALUES ('Addons/addHook', '2', null, 'Addons/addHook', null, '1472528088', '1472528088');
INSERT INTO `yii2_auth_item` VALUES ('Addons/adminList', '2', null, 'Addons/adminList', null, '1472528088', '1472528088');
INSERT INTO `yii2_auth_item` VALUES ('Addons/edithook', '2', null, 'Addons/edithook', null, '1472528088', '1472528088');
INSERT INTO `yii2_auth_item` VALUES ('Addons/execute', '2', null, 'Addons/execute', null, '1472528088', '1472528088');
INSERT INTO `yii2_auth_item` VALUES ('Addons/hooks', '2', null, 'Addons/hooks', null, '1472528088', '1472528088');
INSERT INTO `yii2_auth_item` VALUES ('Addons/index', '2', '', 'Addons/index', '', '1460030539', '1460030539');
INSERT INTO `yii2_auth_item` VALUES ('admin/add', '2', null, 'admin/add', null, '1472528089', '1472528089');
INSERT INTO `yii2_auth_item` VALUES ('admin/auth', '2', null, 'admin/auth', null, '1472528089', '1472528089');
INSERT INTO `yii2_auth_item` VALUES ('admin/edit', '2', null, 'admin/edit', null, '1472528089', '1472528089');
INSERT INTO `yii2_auth_item` VALUES ('admin/index', '2', null, 'admin/index', null, '1472528089', '1472528089');
INSERT INTO `yii2_auth_item` VALUES ('administrator', '1', 'administrator角色12', '', '', '1465352150', '1460005083');
INSERT INTO `yii2_auth_item` VALUES ('article/add', '2', '', 'article/add', '', '1460027926', '1460027926');
INSERT INTO `yii2_auth_item` VALUES ('article/autoSave', '2', '', 'article/autoSave', '', '1460027926', '1460027926');
INSERT INTO `yii2_auth_item` VALUES ('article/batchOperate', '2', '', 'article/batchOperate', '', '1460027926', '1460027926');
INSERT INTO `yii2_auth_item` VALUES ('article/clear', '2', '', 'article/clear', '', '1460027927', '1460027927');
INSERT INTO `yii2_auth_item` VALUES ('article/copy', '2', '', 'article/copy', '', '1460027926', '1460027926');
INSERT INTO `yii2_auth_item` VALUES ('article/edit', '2', '', 'article/edit', '', '1460027926', '1460027926');
INSERT INTO `yii2_auth_item` VALUES ('Article/examine', '2', '', 'Article/examine', '', '1460027927', '1460027927');
INSERT INTO `yii2_auth_item` VALUES ('article/index', '2', '', 'article/index', '', '1460027926', '1460027926');
INSERT INTO `yii2_auth_item` VALUES ('article/move', '2', '', 'article/move', '', '1460027926', '1460027926');
INSERT INTO `yii2_auth_item` VALUES ('article/paste', '2', '', 'article/paste', '', '1460027926', '1460027926');
INSERT INTO `yii2_auth_item` VALUES ('article/permit', '2', '', 'article/permit', '', '1460027927', '1460027927');
INSERT INTO `yii2_auth_item` VALUES ('article/recycle', '2', '', 'article/recycle', '', '1460027927', '1460027927');
INSERT INTO `yii2_auth_item` VALUES ('article/setStatus', '2', '', 'article/setStatus', '', '1460027926', '1460027926');
INSERT INTO `yii2_auth_item` VALUES ('Article/sort', '2', '', 'Article/sort', '', '1460027927', '1460027927');
INSERT INTO `yii2_auth_item` VALUES ('article/update', '2', '', 'article/update', '', '1460027926', '1460027926');
INSERT INTO `yii2_auth_item` VALUES ('attribute/add', '2', '', 'attribute/add', '', '1460031881', '1460031881');
INSERT INTO `yii2_auth_item` VALUES ('attribute/edit', '2', '', 'attribute/edit', '', '1460031881', '1460031881');
INSERT INTO `yii2_auth_item` VALUES ('attribute/index1', '2', '', 'attribute/index1', '', '1460031881', '1460031881');
INSERT INTO `yii2_auth_item` VALUES ('attribute/setStatus', '2', '', 'attribute/setStatus', '', '1460031881', '1460031881');
INSERT INTO `yii2_auth_item` VALUES ('attribute/update', '2', '', 'attribute/update', '', '1460031881', '1460031881');
INSERT INTO `yii2_auth_item` VALUES ('auth/access', '2', '', 'auth/access', '', '1460031879', '1460031879');
INSERT INTO `yii2_auth_item` VALUES ('auth/add', '2', null, 'auth/add', null, '1472528089', '1472528089');
INSERT INTO `yii2_auth_item` VALUES ('auth/addToCategory', '2', '', 'auth/addToCategory', '', '1460031880', '1460031880');
INSERT INTO `yii2_auth_item` VALUES ('auth/addToGroup', '2', '', 'auth/addToGroup', '', '1460031880', '1460031880');
INSERT INTO `yii2_auth_item` VALUES ('auth/addToModel', '2', '', 'auth/addToModel', '', '1460031880', '1460031880');
INSERT INTO `yii2_auth_item` VALUES ('auth/auth', '2', '', 'auth/auth', '', '1460031879', '1460031879');
INSERT INTO `yii2_auth_item` VALUES ('auth/category', '2', '', 'auth/category', '', '1460031880', '1460031880');
INSERT INTO `yii2_auth_item` VALUES ('auth/changeStatus?method=deleteGroup', '2', '', 'auth/changeStatus?method=deleteGroup', '', '1460031879', '1460031879');
INSERT INTO `yii2_auth_item` VALUES ('auth/changeStatus?method=forbidGroup', '2', '', 'auth/changeStatus?method=forbidGroup', '', '1460031879', '1460031879');
INSERT INTO `yii2_auth_item` VALUES ('auth/changeStatus?method=resumeGroup', '2', '', 'auth/changeStatus?method=resumeGroup', '', '1460031879', '1460031879');
INSERT INTO `yii2_auth_item` VALUES ('auth/createGroup', '2', '', 'auth/createGroup', '', '1460031879', '1460031879');
INSERT INTO `yii2_auth_item` VALUES ('auth/delete', '2', null, 'auth/delete', null, '1472528089', '1472528089');
INSERT INTO `yii2_auth_item` VALUES ('auth/edit', '2', null, 'auth/edit', null, '1472528089', '1472528089');
INSERT INTO `yii2_auth_item` VALUES ('auth/editGroup', '2', '', 'auth/editGroup', '', '1460031879', '1460031879');
INSERT INTO `yii2_auth_item` VALUES ('auth/index', '2', '', 'auth/index', '', '1200000000', '1300000000');
INSERT INTO `yii2_auth_item` VALUES ('auth/modelauth', '2', '', 'auth/modelauth', '', '1460031880', '1460031880');
INSERT INTO `yii2_auth_item` VALUES ('auth/removeFromGroup', '2', '', 'auth/removeFromGroup', '', '1460031880', '1460031880');
INSERT INTO `yii2_auth_item` VALUES ('auth/user', '2', '', 'auth/user', '', '1460031880', '1460031880');
INSERT INTO `yii2_auth_item` VALUES ('auth/writeGroup', '2', '', 'auth/writeGroup', '', '1460031879', '1460031879');
INSERT INTO `yii2_auth_item` VALUES ('category/add', '2', '', 'category/add', '', '1460031882', '1460031882');
INSERT INTO `yii2_auth_item` VALUES ('category/edit', '2', '', 'category/edit', '', '1460031882', '1460031882');
INSERT INTO `yii2_auth_item` VALUES ('category/index', '2', '', 'category/index', '', '1460031882', '1460031882');
INSERT INTO `yii2_auth_item` VALUES ('category/operate/type/merge', '2', '', 'category/operate/type/merge', '', '1460031882', '1460031882');
INSERT INTO `yii2_auth_item` VALUES ('category/operate/type/move', '2', '', 'category/operate/type/move', '', '1460031882', '1460031882');
INSERT INTO `yii2_auth_item` VALUES ('category/remove', '2', '', 'category/remove', '', '1460031882', '1460031882');
INSERT INTO `yii2_auth_item` VALUES ('channel/add', '2', '', 'channel/add', '', '1460031884', '1460031884');
INSERT INTO `yii2_auth_item` VALUES ('channel/del', '2', '', 'channel/del', '', '1460031885', '1460031885');
INSERT INTO `yii2_auth_item` VALUES ('channel/edit', '2', '', 'channel/edit', '', '1460031884', '1460031884');
INSERT INTO `yii2_auth_item` VALUES ('channel/index', '2', '', 'channel/index', '', '1460031884', '1460031884');
INSERT INTO `yii2_auth_item` VALUES ('config/add', '2', '', 'config/add', '', '1460031883', '1460031883');
INSERT INTO `yii2_auth_item` VALUES ('config/del', '2', '', 'config/del', '', '1460031883', '1460031883');
INSERT INTO `yii2_auth_item` VALUES ('config/edit', '2', '', 'config/edit', '', '1460031883', '1460031883');
INSERT INTO `yii2_auth_item` VALUES ('config/group', '2', '', 'config/group', '', '1452653200', '1452653210');
INSERT INTO `yii2_auth_item` VALUES ('config/index', '2', '', 'config/index', '', '1452653200', '1452653210');
INSERT INTO `yii2_auth_item` VALUES ('config/save', '2', '', 'config/save', '', '1460031883', '1460031883');
INSERT INTO `yii2_auth_item` VALUES ('Config/sort', '2', '', 'Config/sort', '', '1460031884', '1460031884');
INSERT INTO `yii2_auth_item` VALUES ('database/del', '2', '', 'database/del', '', '1460031882', '1460031882');
INSERT INTO `yii2_auth_item` VALUES ('database/export', '2', '', 'database/export', '', '1460031881', '1460031881');
INSERT INTO `yii2_auth_item` VALUES ('database/import', '2', '', 'database/import', '', '1460031882', '1460031882');
INSERT INTO `yii2_auth_item` VALUES ('database/index?type=export', '2', '数据库导出', 'database/index?type=export', '', '120000000', '130000000');
INSERT INTO `yii2_auth_item` VALUES ('database/index?type=import', '2', '数据库导入', 'database/index?type=import', '', '1200000000', '1300000000');
INSERT INTO `yii2_auth_item` VALUES ('database/optimize', '2', '', 'database/optimize', '', '1460031881', '1460031881');
INSERT INTO `yii2_auth_item` VALUES ('database/repair', '2', '', 'database/repair', '', '1460031881', '1460031881');
INSERT INTO `yii2_auth_item` VALUES ('editor', '1', 'editor 网站编辑角色', '', '', '1356232000', '1400000000');
INSERT INTO `yii2_auth_item` VALUES ('index/index', '2', '', 'index/index', '', '1356542542', '1425652320');
INSERT INTO `yii2_auth_item` VALUES ('log/index', '2', null, 'log/index', null, '1472528090', '1472528090');
INSERT INTO `yii2_auth_item` VALUES ('log/view', '2', null, 'log/view', null, '1472528090', '1472528090');
INSERT INTO `yii2_auth_item` VALUES ('login/logout', '2', '', 'login/logout', '', '1356565230', '1452653210');
INSERT INTO `yii2_auth_item` VALUES ('menu/add', '2', '', 'menu/add', '', '1460031884', '1460031884');
INSERT INTO `yii2_auth_item` VALUES ('menu/edit', '2', '', 'menu/edit', '', '1460031884', '1460031884');
INSERT INTO `yii2_auth_item` VALUES ('Menu/import', '2', '', 'Menu/import', '', '1460031884', '1460031884');
INSERT INTO `yii2_auth_item` VALUES ('menu/index', '2', '', 'menu/index', '', '1452653200', '1452653210');
INSERT INTO `yii2_auth_item` VALUES ('Menu/sort', '2', '', 'Menu/sort', '', '1460031884', '1460031884');
INSERT INTO `yii2_auth_item` VALUES ('model/add', '2', '', 'model/add', '', '1460031882', '1460031882');
INSERT INTO `yii2_auth_item` VALUES ('model/edit', '2', '', 'model/edit', '', '1460031883', '1460031883');
INSERT INTO `yii2_auth_item` VALUES ('Model/generate', '2', '', 'Model/generate', '', '1460031019', '1460031019');
INSERT INTO `yii2_auth_item` VALUES ('Model/index', '2', '', 'Model/index', '', '1460031882', '1460031882');
INSERT INTO `yii2_auth_item` VALUES ('model/setStatus', '2', '', 'model/setStatus', '', '1460031883', '1460031883');
INSERT INTO `yii2_auth_item` VALUES ('model/update', '2', '', 'model/update', '', '1460031883', '1460031883');
INSERT INTO `yii2_auth_item` VALUES ('order/index', '2', null, 'order/index', null, '1472528088', '1472528088');
INSERT INTO `yii2_auth_item` VALUES ('other', '2', null, 'other', null, '1472528090', '1472528090');
INSERT INTO `yii2_auth_item` VALUES ('shop/group', '2', null, 'shop/group', null, '1472528088', '1472528088');
INSERT INTO `yii2_auth_item` VALUES ('shop/index&type=1', '2', null, 'shop/index&type=1', null, '1472528087', '1472528087');
INSERT INTO `yii2_auth_item` VALUES ('shop/index&type=2', '2', null, 'shop/index&type=2', null, '1472528087', '1472528087');
INSERT INTO `yii2_auth_item` VALUES ('shop/index&type=3', '2', null, 'shop/index&type=3', null, '1472528087', '1472528087');
INSERT INTO `yii2_auth_item` VALUES ('shop/index&type=4', '2', null, 'shop/index&type=4', null, '1472528088', '1472528088');
INSERT INTO `yii2_auth_item` VALUES ('think/add', '2', '', 'think/add', '', '1460031883', '1460031883');
INSERT INTO `yii2_auth_item` VALUES ('think/edit', '2', '', 'think/edit', '', '1460031019', '1460031019');
INSERT INTO `yii2_auth_item` VALUES ('think/lists', '2', '', 'think/lists', '', '1460031020', '1460031020');
INSERT INTO `yii2_auth_item` VALUES ('train/index', '2', null, 'train/index', null, '1472528088', '1472528088');
INSERT INTO `yii2_auth_item` VALUES ('user/action', '2', '', 'user/action', '', '1460031878', '1460031878');
INSERT INTO `yii2_auth_item` VALUES ('user/add', '2', '', 'user/add', '', '1460031878', '1460031878');
INSERT INTO `yii2_auth_item` VALUES ('user/addaction', '2', '', 'user/addaction', '', '1460031878', '1460031878');
INSERT INTO `yii2_auth_item` VALUES ('user/auth', '2', '', 'user/auth', '', '1460031878', '1460031878');
INSERT INTO `yii2_auth_item` VALUES ('User/changeStatus?method=deleteUser', '2', '', 'User/changeStatus?method=deleteUser', '', '1460031879', '1460031879');
INSERT INTO `yii2_auth_item` VALUES ('user/changeStatus?method=forbidUser', '2', '', 'user/changeStatus?method=forbidUser', '', '1460031878', '1460031878');
INSERT INTO `yii2_auth_item` VALUES ('user/changeStatus?method=resumeUser', '2', '', 'user/changeStatus?method=resumeUser', '', '1460031878', '1460031878');
INSERT INTO `yii2_auth_item` VALUES ('user/editaction', '2', '', 'user/editaction', '', '1460031878', '1460031878');
INSERT INTO `yii2_auth_item` VALUES ('user/index', '2', '', 'user/index', '', '1200000000', '1230000000');
INSERT INTO `yii2_auth_item` VALUES ('user/saveAction', '2', '', 'user/saveAction', '', '1460031878', '1460031878');
INSERT INTO `yii2_auth_item` VALUES ('user/setStatus', '2', '', 'user/setStatus', '', '1460031878', '1460031878');
INSERT INTO `yii2_auth_item` VALUES ('user/updateNickname', '2', '', 'user/updateNickname', '', '1460031881', '1460031881');
INSERT INTO `yii2_auth_item` VALUES ('user/updatePassword', '2', '', 'user/updatePassword', '', '1460031881', '1460031881');

-- ----------------------------
-- Table structure for `yii2_auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_auth_item_child`;
CREATE TABLE `yii2_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `yii2_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `yii2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yii2_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `yii2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of yii2_auth_item_child
-- ----------------------------
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'Addons/addHook');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'Addons/adminList');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'Addons/edithook');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'Addons/execute');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'Addons/hooks');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'admin/add');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'admin/auth');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'admin/edit');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'admin/index');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'article/add');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'article/autoSave');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'article/clear');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'article/edit');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'article/index');
INSERT INTO `yii2_auth_item_child` VALUES ('editor', 'article/index');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'article/move');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'article/permit');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'article/recycle');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'article/setStatus');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'article/update');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'attribute/add');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'attribute/edit');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'attribute/index1');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'attribute/setStatus');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'attribute/update');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'auth/access');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'auth/add');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'auth/auth');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'auth/delete');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'auth/edit');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'auth/index');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'auth/user');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'category/add');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'category/edit');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'category/index');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'category/operate/type/merge');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'category/operate/type/move');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'category/remove');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'config/add');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'config/del');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'config/edit');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'config/group');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'config/index');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'config/save');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'Config/sort');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'database/del');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'database/export');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'database/import');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'database/index?type=export');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'database/index?type=import');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'database/optimize');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'database/repair');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'index/index');
INSERT INTO `yii2_auth_item_child` VALUES ('editor', 'index/index');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'log/index');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'log/view');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'menu/add');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'menu/edit');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'Menu/import');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'menu/index');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'Menu/sort');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'order/index');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'other');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'shop/group');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'shop/index&type=1');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'shop/index&type=2');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'shop/index&type=3');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'shop/index&type=4');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'train/index');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'user/index');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'user/updateNickname');
INSERT INTO `yii2_auth_item_child` VALUES ('administrator', 'user/updatePassword');

-- ----------------------------
-- Table structure for `yii2_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_auth_rule`;
CREATE TABLE `yii2_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text COMMENT 'serialize后的rule对象',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of yii2_auth_rule
-- ----------------------------
INSERT INTO `yii2_auth_rule` VALUES ('action/actionlog', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:16:\"action/actionlog\";s:9:\"createdAt\";i:1460031880;s:9:\"updatedAt\";i:1460031880;}', '1460031880', '1460031880');
INSERT INTO `yii2_auth_rule` VALUES ('action/edit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"action/edit\";s:9:\"createdAt\";i:1460031880;s:9:\"updatedAt\";i:1460031880;}', '1460031880', '1460031880');
INSERT INTO `yii2_auth_rule` VALUES ('Addons/addHook', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:14:\"Addons/addHook\";s:9:\"createdAt\";i:1472528088;s:9:\"updatedAt\";i:1472528088;}', '1472528088', '1472528088');
INSERT INTO `yii2_auth_rule` VALUES ('Addons/adminList', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:16:\"Addons/adminList\";s:9:\"createdAt\";i:1472528088;s:9:\"updatedAt\";i:1472528088;}', '1472528088', '1472528088');
INSERT INTO `yii2_auth_rule` VALUES ('Addons/edithook', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"Addons/edithook\";s:9:\"createdAt\";i:1472528088;s:9:\"updatedAt\";i:1472528088;}', '1472528088', '1472528088');
INSERT INTO `yii2_auth_rule` VALUES ('Addons/execute', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:14:\"Addons/execute\";s:9:\"createdAt\";i:1472528088;s:9:\"updatedAt\";i:1472528088;}', '1472528088', '1472528088');
INSERT INTO `yii2_auth_rule` VALUES ('Addons/hooks', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"Addons/hooks\";s:9:\"createdAt\";i:1472528088;s:9:\"updatedAt\";i:1472528088;}', '1472528088', '1472528088');
INSERT INTO `yii2_auth_rule` VALUES ('Addons/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"Addons/index\";s:9:\"createdAt\";i:1460030539;s:9:\"updatedAt\";i:1460030539;}', '1460030539', '1460030539');
INSERT INTO `yii2_auth_rule` VALUES ('admin/add', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:9:\"admin/add\";s:9:\"createdAt\";i:1472528089;s:9:\"updatedAt\";i:1472528089;}', '1472528089', '1472528089');
INSERT INTO `yii2_auth_rule` VALUES ('admin/auth', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:10:\"admin/auth\";s:9:\"createdAt\";i:1472528089;s:9:\"updatedAt\";i:1472528089;}', '1472528089', '1472528089');
INSERT INTO `yii2_auth_rule` VALUES ('admin/edit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:10:\"admin/edit\";s:9:\"createdAt\";i:1472528089;s:9:\"updatedAt\";i:1472528089;}', '1472528089', '1472528089');
INSERT INTO `yii2_auth_rule` VALUES ('admin/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"admin/index\";s:9:\"createdAt\";i:1472528089;s:9:\"updatedAt\";i:1472528089;}', '1472528089', '1472528089');
INSERT INTO `yii2_auth_rule` VALUES ('article/add', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"article/add\";s:9:\"createdAt\";i:1460027926;s:9:\"updatedAt\";i:1460027926;}', '1460027926', '1460027926');
INSERT INTO `yii2_auth_rule` VALUES ('article/autoSave', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:16:\"article/autoSave\";s:9:\"createdAt\";i:1460027926;s:9:\"updatedAt\";i:1460027926;}', '1460027926', '1460027926');
INSERT INTO `yii2_auth_rule` VALUES ('article/batchOperate', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:20:\"article/batchOperate\";s:9:\"createdAt\";i:1460027926;s:9:\"updatedAt\";i:1460027926;}', '1460027926', '1460027926');
INSERT INTO `yii2_auth_rule` VALUES ('article/clear', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:13:\"article/clear\";s:9:\"createdAt\";i:1460027927;s:9:\"updatedAt\";i:1460027927;}', '1460027927', '1460027927');
INSERT INTO `yii2_auth_rule` VALUES ('article/copy', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"article/copy\";s:9:\"createdAt\";i:1460027926;s:9:\"updatedAt\";i:1460027926;}', '1460027926', '1460027926');
INSERT INTO `yii2_auth_rule` VALUES ('article/edit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"article/edit\";s:9:\"createdAt\";i:1460027926;s:9:\"updatedAt\";i:1460027926;}', '1460027926', '1460027926');
INSERT INTO `yii2_auth_rule` VALUES ('Article/examine', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"Article/examine\";s:9:\"createdAt\";i:1460027927;s:9:\"updatedAt\";i:1460027927;}', '1460027927', '1460027927');
INSERT INTO `yii2_auth_rule` VALUES ('article/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:13:\"article/index\";s:9:\"createdAt\";i:1460027926;s:9:\"updatedAt\";i:1460027926;}', '1460027926', '1460027926');
INSERT INTO `yii2_auth_rule` VALUES ('article/move', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"article/move\";s:9:\"createdAt\";i:1460027926;s:9:\"updatedAt\";i:1460027926;}', '1460027926', '1460027926');
INSERT INTO `yii2_auth_rule` VALUES ('article/paste', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:13:\"article/paste\";s:9:\"createdAt\";i:1460027926;s:9:\"updatedAt\";i:1460027926;}', '1460027926', '1460027926');
INSERT INTO `yii2_auth_rule` VALUES ('article/permit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:14:\"article/permit\";s:9:\"createdAt\";i:1460027927;s:9:\"updatedAt\";i:1460027927;}', '1460027927', '1460027927');
INSERT INTO `yii2_auth_rule` VALUES ('article/recycle', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"article/recycle\";s:9:\"createdAt\";i:1460027927;s:9:\"updatedAt\";i:1460027927;}', '1460027927', '1460027927');
INSERT INTO `yii2_auth_rule` VALUES ('article/setStatus', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:17:\"article/setStatus\";s:9:\"createdAt\";i:1460027926;s:9:\"updatedAt\";i:1460027926;}', '1460027926', '1460027926');
INSERT INTO `yii2_auth_rule` VALUES ('Article/sort', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"Article/sort\";s:9:\"createdAt\";i:1460027927;s:9:\"updatedAt\";i:1460027927;}', '1460027927', '1460027927');
INSERT INTO `yii2_auth_rule` VALUES ('article/update', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:14:\"article/update\";s:9:\"createdAt\";i:1460027926;s:9:\"updatedAt\";i:1460027926;}', '1460027926', '1460027926');
INSERT INTO `yii2_auth_rule` VALUES ('attribute/add', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:13:\"attribute/add\";s:9:\"createdAt\";i:1460031881;s:9:\"updatedAt\";i:1460031881;}', '1460031881', '1460031881');
INSERT INTO `yii2_auth_rule` VALUES ('attribute/edit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:14:\"attribute/edit\";s:9:\"createdAt\";i:1460031881;s:9:\"updatedAt\";i:1460031881;}', '1460031881', '1460031881');
INSERT INTO `yii2_auth_rule` VALUES ('attribute/index1', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:16:\"attribute/index1\";s:9:\"createdAt\";i:1460031881;s:9:\"updatedAt\";i:1460031881;}', '1460031881', '1460031881');
INSERT INTO `yii2_auth_rule` VALUES ('attribute/setStatus', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:19:\"attribute/setStatus\";s:9:\"createdAt\";i:1460031881;s:9:\"updatedAt\";i:1460031881;}', '1460031881', '1460031881');
INSERT INTO `yii2_auth_rule` VALUES ('attribute/update', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:16:\"attribute/update\";s:9:\"createdAt\";i:1460031881;s:9:\"updatedAt\";i:1460031881;}', '1460031881', '1460031881');
INSERT INTO `yii2_auth_rule` VALUES ('auth/access', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"auth/access\";s:9:\"createdAt\";i:1460031879;s:9:\"updatedAt\";i:1460031879;}', '1460031879', '1460031879');
INSERT INTO `yii2_auth_rule` VALUES ('auth/add', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:8:\"auth/add\";s:9:\"createdAt\";i:1472528089;s:9:\"updatedAt\";i:1472528089;}', '1472528089', '1472528089');
INSERT INTO `yii2_auth_rule` VALUES ('auth/addToCategory', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:18:\"auth/addToCategory\";s:9:\"createdAt\";i:1460031880;s:9:\"updatedAt\";i:1460031880;}', '1460031880', '1460031880');
INSERT INTO `yii2_auth_rule` VALUES ('auth/addToGroup', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"auth/addToGroup\";s:9:\"createdAt\";i:1460031880;s:9:\"updatedAt\";i:1460031880;}', '1460031880', '1460031880');
INSERT INTO `yii2_auth_rule` VALUES ('auth/addToModel', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"auth/addToModel\";s:9:\"createdAt\";i:1460031880;s:9:\"updatedAt\";i:1460031880;}', '1460031880', '1460031880');
INSERT INTO `yii2_auth_rule` VALUES ('auth/auth', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:9:\"auth/auth\";s:9:\"createdAt\";i:1460031879;s:9:\"updatedAt\";i:1460031879;}', '1460031879', '1460031879');
INSERT INTO `yii2_auth_rule` VALUES ('auth/category', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:13:\"auth/category\";s:9:\"createdAt\";i:1460031880;s:9:\"updatedAt\";i:1460031880;}', '1460031880', '1460031880');
INSERT INTO `yii2_auth_rule` VALUES ('auth/changeStatus?method=deleteGroup', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:36:\"auth/changeStatus?method=deleteGroup\";s:9:\"createdAt\";i:1460031879;s:9:\"updatedAt\";i:1460031879;}', '1460031879', '1460031879');
INSERT INTO `yii2_auth_rule` VALUES ('auth/changeStatus?method=forbidGroup', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:36:\"auth/changeStatus?method=forbidGroup\";s:9:\"createdAt\";i:1460031879;s:9:\"updatedAt\";i:1460031879;}', '1460031879', '1460031879');
INSERT INTO `yii2_auth_rule` VALUES ('auth/changeStatus?method=resumeGroup', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:36:\"auth/changeStatus?method=resumeGroup\";s:9:\"createdAt\";i:1460031879;s:9:\"updatedAt\";i:1460031879;}', '1460031879', '1460031879');
INSERT INTO `yii2_auth_rule` VALUES ('auth/createGroup', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:16:\"auth/createGroup\";s:9:\"createdAt\";i:1460031879;s:9:\"updatedAt\";i:1460031879;}', '1460031879', '1460031879');
INSERT INTO `yii2_auth_rule` VALUES ('auth/delete', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"auth/delete\";s:9:\"createdAt\";i:1472528089;s:9:\"updatedAt\";i:1472528089;}', '1472528089', '1472528089');
INSERT INTO `yii2_auth_rule` VALUES ('auth/edit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:9:\"auth/edit\";s:9:\"createdAt\";i:1472528089;s:9:\"updatedAt\";i:1472528089;}', '1472528089', '1472528089');
INSERT INTO `yii2_auth_rule` VALUES ('auth/editGroup', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:14:\"auth/editGroup\";s:9:\"createdAt\";i:1460031879;s:9:\"updatedAt\";i:1460031879;}', '1460031879', '1460031879');
INSERT INTO `yii2_auth_rule` VALUES ('auth/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:10:\"auth/index\";s:9:\"createdAt\";i:1459148617;s:9:\"updatedAt\";i:1459148627;}', '1456542110', '1456542120');
INSERT INTO `yii2_auth_rule` VALUES ('auth/modelauth', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:14:\"auth/modelauth\";s:9:\"createdAt\";i:1460031880;s:9:\"updatedAt\";i:1460031880;}', '1460031880', '1460031880');
INSERT INTO `yii2_auth_rule` VALUES ('auth/removeFromGroup', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:20:\"auth/removeFromGroup\";s:9:\"createdAt\";i:1460031880;s:9:\"updatedAt\";i:1460031880;}', '1460031880', '1460031880');
INSERT INTO `yii2_auth_rule` VALUES ('auth/user', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:9:\"auth/user\";s:9:\"createdAt\";i:1460031880;s:9:\"updatedAt\";i:1460031880;}', '1460031880', '1460031880');
INSERT INTO `yii2_auth_rule` VALUES ('auth/writeGroup', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"auth/writeGroup\";s:9:\"createdAt\";i:1460031879;s:9:\"updatedAt\";i:1460031879;}', '1460031879', '1460031879');
INSERT INTO `yii2_auth_rule` VALUES ('category/add', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"category/add\";s:9:\"createdAt\";i:1460031882;s:9:\"updatedAt\";i:1460031882;}', '1460031882', '1460031882');
INSERT INTO `yii2_auth_rule` VALUES ('category/edit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:13:\"category/edit\";s:9:\"createdAt\";i:1460031882;s:9:\"updatedAt\";i:1460031882;}', '1460031882', '1460031882');
INSERT INTO `yii2_auth_rule` VALUES ('category/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:14:\"category/index\";s:9:\"createdAt\";i:1460031882;s:9:\"updatedAt\";i:1460031882;}', '1460031882', '1460031882');
INSERT INTO `yii2_auth_rule` VALUES ('category/operate/type/merge', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:27:\"category/operate/type/merge\";s:9:\"createdAt\";i:1460031882;s:9:\"updatedAt\";i:1460031882;}', '1460031882', '1460031882');
INSERT INTO `yii2_auth_rule` VALUES ('category/operate/type/move', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:26:\"category/operate/type/move\";s:9:\"createdAt\";i:1460031882;s:9:\"updatedAt\";i:1460031882;}', '1460031882', '1460031882');
INSERT INTO `yii2_auth_rule` VALUES ('category/remove', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"category/remove\";s:9:\"createdAt\";i:1460031882;s:9:\"updatedAt\";i:1460031882;}', '1460031882', '1460031882');
INSERT INTO `yii2_auth_rule` VALUES ('channel/add', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"channel/add\";s:9:\"createdAt\";i:1460031884;s:9:\"updatedAt\";i:1460031884;}', '1460031884', '1460031884');
INSERT INTO `yii2_auth_rule` VALUES ('channel/del', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"channel/del\";s:9:\"createdAt\";i:1460031884;s:9:\"updatedAt\";i:1460031884;}', '1460031884', '1460031884');
INSERT INTO `yii2_auth_rule` VALUES ('channel/edit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"channel/edit\";s:9:\"createdAt\";i:1460031884;s:9:\"updatedAt\";i:1460031884;}', '1460031884', '1460031884');
INSERT INTO `yii2_auth_rule` VALUES ('channel/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:13:\"channel/index\";s:9:\"createdAt\";i:1460031884;s:9:\"updatedAt\";i:1460031884;}', '1460031884', '1460031884');
INSERT INTO `yii2_auth_rule` VALUES ('config/add', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:10:\"config/add\";s:9:\"createdAt\";i:1460031883;s:9:\"updatedAt\";i:1460031883;}', '1460031883', '1460031883');
INSERT INTO `yii2_auth_rule` VALUES ('config/del', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:10:\"config/del\";s:9:\"createdAt\";i:1460031883;s:9:\"updatedAt\";i:1460031883;}', '1460031883', '1460031883');
INSERT INTO `yii2_auth_rule` VALUES ('config/edit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"config/edit\";s:9:\"createdAt\";i:1460031883;s:9:\"updatedAt\";i:1460031883;}', '1460031883', '1460031883');
INSERT INTO `yii2_auth_rule` VALUES ('config/group', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"config/group\";s:9:\"createdAt\";i:1459148617;s:9:\"updatedAt\";i:1459148627;}', '1200000000', '1300000000');
INSERT INTO `yii2_auth_rule` VALUES ('config/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"config/index\";s:9:\"createdAt\";i:1459148617;s:9:\"updatedAt\";i:1459148627;}', '1200000000', '1300000000');
INSERT INTO `yii2_auth_rule` VALUES ('config/save', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"config/save\";s:9:\"createdAt\";i:1460031883;s:9:\"updatedAt\";i:1460031883;}', '1460031883', '1460031883');
INSERT INTO `yii2_auth_rule` VALUES ('Config/sort', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"Config/sort\";s:9:\"createdAt\";i:1460031884;s:9:\"updatedAt\";i:1460031884;}', '1460031884', '1460031884');
INSERT INTO `yii2_auth_rule` VALUES ('database/del', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"database/del\";s:9:\"createdAt\";i:1460031882;s:9:\"updatedAt\";i:1460031882;}', '1460031882', '1460031882');
INSERT INTO `yii2_auth_rule` VALUES ('database/export', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"database/export\";s:9:\"createdAt\";i:1460031881;s:9:\"updatedAt\";i:1460031881;}', '1460031881', '1460031881');
INSERT INTO `yii2_auth_rule` VALUES ('database/import', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"database/import\";s:9:\"createdAt\";i:1460031882;s:9:\"updatedAt\";i:1460031882;}', '1460031882', '1460031882');
INSERT INTO `yii2_auth_rule` VALUES ('database/index?type=export', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:26:\"database/index?type=export\";s:9:\"createdAt\";i:1459148617;s:9:\"updatedAt\";i:1459148627;}', '1456542110', '1456542120');
INSERT INTO `yii2_auth_rule` VALUES ('database/index?type=import', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:26:\"database/index?type=import\";s:9:\"createdAt\";i:1459148617;s:9:\"updatedAt\";i:1459148627;}', '1456542110', '1456542120');
INSERT INTO `yii2_auth_rule` VALUES ('database/optimize', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:17:\"database/optimize\";s:9:\"createdAt\";i:1460031881;s:9:\"updatedAt\";i:1460031881;}', '1460031881', '1460031881');
INSERT INTO `yii2_auth_rule` VALUES ('database/repair', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"database/repair\";s:9:\"createdAt\";i:1460031881;s:9:\"updatedAt\";i:1460031881;}', '1460031881', '1460031881');
INSERT INTO `yii2_auth_rule` VALUES ('index/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"index/index\";s:9:\"createdAt\";i:1459148617;s:9:\"updatedAt\";i:1459148627;}', '1456542110', '1456542120');
INSERT INTO `yii2_auth_rule` VALUES ('log/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:9:\"log/index\";s:9:\"createdAt\";i:1472528090;s:9:\"updatedAt\";i:1472528090;}', '1472528090', '1472528090');
INSERT INTO `yii2_auth_rule` VALUES ('log/view', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:8:\"log/view\";s:9:\"createdAt\";i:1472528090;s:9:\"updatedAt\";i:1472528090;}', '1472528090', '1472528090');
INSERT INTO `yii2_auth_rule` VALUES ('login/logout', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"login/logout\";s:9:\"createdAt\";i:1459148665;s:9:\"updatedAt\";i:1459148675;}', '1456542110', '1456542120');
INSERT INTO `yii2_auth_rule` VALUES ('menu/add', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:8:\"menu/add\";s:9:\"createdAt\";i:1460031884;s:9:\"updatedAt\";i:1460031884;}', '1460031884', '1460031884');
INSERT INTO `yii2_auth_rule` VALUES ('menu/edit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:9:\"menu/edit\";s:9:\"createdAt\";i:1460031884;s:9:\"updatedAt\";i:1460031884;}', '1460031884', '1460031884');
INSERT INTO `yii2_auth_rule` VALUES ('Menu/import', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"Menu/import\";s:9:\"createdAt\";i:1460031884;s:9:\"updatedAt\";i:1460031884;}', '1460031884', '1460031884');
INSERT INTO `yii2_auth_rule` VALUES ('menu/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:10:\"menu/index\";s:9:\"createdAt\";i:1459148617;s:9:\"updatedAt\";i:1459148627;}', '1200000000', '1300000000');
INSERT INTO `yii2_auth_rule` VALUES ('Menu/sort', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:9:\"Menu/sort\";s:9:\"createdAt\";i:1460031884;s:9:\"updatedAt\";i:1460031884;}', '1460031884', '1460031884');
INSERT INTO `yii2_auth_rule` VALUES ('model/add', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:9:\"model/add\";s:9:\"createdAt\";i:1460031882;s:9:\"updatedAt\";i:1460031882;}', '1460031882', '1460031882');
INSERT INTO `yii2_auth_rule` VALUES ('model/edit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:10:\"model/edit\";s:9:\"createdAt\";i:1460031883;s:9:\"updatedAt\";i:1460031883;}', '1460031883', '1460031883');
INSERT INTO `yii2_auth_rule` VALUES ('Model/generate', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:14:\"Model/generate\";s:9:\"createdAt\";i:1460031019;s:9:\"updatedAt\";i:1460031019;}', '1460031019', '1460031019');
INSERT INTO `yii2_auth_rule` VALUES ('Model/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"Model/index\";s:9:\"createdAt\";i:1460031882;s:9:\"updatedAt\";i:1460031882;}', '1460031882', '1460031882');
INSERT INTO `yii2_auth_rule` VALUES ('model/setStatus', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"model/setStatus\";s:9:\"createdAt\";i:1460031883;s:9:\"updatedAt\";i:1460031883;}', '1460031883', '1460031883');
INSERT INTO `yii2_auth_rule` VALUES ('model/update', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:12:\"model/update\";s:9:\"createdAt\";i:1460031883;s:9:\"updatedAt\";i:1460031883;}', '1460031883', '1460031883');
INSERT INTO `yii2_auth_rule` VALUES ('order/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"order/index\";s:9:\"createdAt\";i:1472528088;s:9:\"updatedAt\";i:1472528088;}', '1472528088', '1472528088');
INSERT INTO `yii2_auth_rule` VALUES ('other', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:5:\"other\";s:9:\"createdAt\";i:1472528090;s:9:\"updatedAt\";i:1472528090;}', '1472528090', '1472528090');
INSERT INTO `yii2_auth_rule` VALUES ('shop/group', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:10:\"shop/group\";s:9:\"createdAt\";i:1472528088;s:9:\"updatedAt\";i:1472528088;}', '1472528088', '1472528088');
INSERT INTO `yii2_auth_rule` VALUES ('shop/index&type=1', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:17:\"shop/index&type=1\";s:9:\"createdAt\";i:1472528087;s:9:\"updatedAt\";i:1472528087;}', '1472528087', '1472528087');
INSERT INTO `yii2_auth_rule` VALUES ('shop/index&type=2', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:17:\"shop/index&type=2\";s:9:\"createdAt\";i:1472528087;s:9:\"updatedAt\";i:1472528087;}', '1472528087', '1472528087');
INSERT INTO `yii2_auth_rule` VALUES ('shop/index&type=3', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:17:\"shop/index&type=3\";s:9:\"createdAt\";i:1472528087;s:9:\"updatedAt\";i:1472528087;}', '1472528087', '1472528087');
INSERT INTO `yii2_auth_rule` VALUES ('shop/index&type=4', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:17:\"shop/index&type=4\";s:9:\"createdAt\";i:1472528088;s:9:\"updatedAt\";i:1472528088;}', '1472528088', '1472528088');
INSERT INTO `yii2_auth_rule` VALUES ('think/add', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:9:\"think/add\";s:9:\"createdAt\";i:1460031883;s:9:\"updatedAt\";i:1460031883;}', '1460031883', '1460031883');
INSERT INTO `yii2_auth_rule` VALUES ('think/edit', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:10:\"think/edit\";s:9:\"createdAt\";i:1460031019;s:9:\"updatedAt\";i:1460031019;}', '1460031019', '1460031019');
INSERT INTO `yii2_auth_rule` VALUES ('think/lists', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"think/lists\";s:9:\"createdAt\";i:1460031020;s:9:\"updatedAt\";i:1460031020;}', '1460031020', '1460031020');
INSERT INTO `yii2_auth_rule` VALUES ('train/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"train/index\";s:9:\"createdAt\";i:1472528088;s:9:\"updatedAt\";i:1472528088;}', '1472528088', '1472528088');
INSERT INTO `yii2_auth_rule` VALUES ('user/action', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:11:\"user/action\";s:9:\"createdAt\";i:1460031878;s:9:\"updatedAt\";i:1460031878;}', '1460031878', '1460031878');
INSERT INTO `yii2_auth_rule` VALUES ('user/add', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:8:\"user/add\";s:9:\"createdAt\";i:1460031877;s:9:\"updatedAt\";i:1460031877;}', '1460031877', '1460031877');
INSERT INTO `yii2_auth_rule` VALUES ('user/addaction', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:14:\"user/addaction\";s:9:\"createdAt\";i:1460031878;s:9:\"updatedAt\";i:1460031878;}', '1460031878', '1460031878');
INSERT INTO `yii2_auth_rule` VALUES ('user/auth', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:9:\"user/auth\";s:9:\"createdAt\";i:1460031878;s:9:\"updatedAt\";i:1460031878;}', '1460031878', '1460031878');
INSERT INTO `yii2_auth_rule` VALUES ('User/changeStatus?method=deleteUser', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:35:\"User/changeStatus?method=deleteUser\";s:9:\"createdAt\";i:1460031879;s:9:\"updatedAt\";i:1460031879;}', '1460031879', '1460031879');
INSERT INTO `yii2_auth_rule` VALUES ('user/changeStatus?method=forbidUser', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:35:\"user/changeStatus?method=forbidUser\";s:9:\"createdAt\";i:1460031878;s:9:\"updatedAt\";i:1460031878;}', '1460031878', '1460031878');
INSERT INTO `yii2_auth_rule` VALUES ('user/changeStatus?method=resumeUser', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:35:\"user/changeStatus?method=resumeUser\";s:9:\"createdAt\";i:1460031878;s:9:\"updatedAt\";i:1460031878;}', '1460031878', '1460031878');
INSERT INTO `yii2_auth_rule` VALUES ('user/editaction', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"user/editaction\";s:9:\"createdAt\";i:1460031878;s:9:\"updatedAt\";i:1460031878;}', '1460031878', '1460031878');
INSERT INTO `yii2_auth_rule` VALUES ('user/index', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:10:\"user/index\";s:9:\"createdAt\";i:1459148617;s:9:\"updatedAt\";i:1459148627;}', '1456542110', '1456542120');
INSERT INTO `yii2_auth_rule` VALUES ('user/saveAction', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:15:\"user/saveAction\";s:9:\"createdAt\";i:1460031878;s:9:\"updatedAt\";i:1460031878;}', '1460031878', '1460031878');
INSERT INTO `yii2_auth_rule` VALUES ('user/setStatus', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:14:\"user/setStatus\";s:9:\"createdAt\";i:1460031878;s:9:\"updatedAt\";i:1460031878;}', '1460031878', '1460031878');
INSERT INTO `yii2_auth_rule` VALUES ('user/updateNickname', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:19:\"user/updateNickname\";s:9:\"createdAt\";i:1460031881;s:9:\"updatedAt\";i:1460031881;}', '1460031881', '1460031881');
INSERT INTO `yii2_auth_rule` VALUES ('user/updatePassword', 'O:21:\"common\\core\\rbac\\Rule\":3:{s:4:\"name\";s:19:\"user/updatePassword\";s:9:\"createdAt\";i:1460031880;s:9:\"updatedAt\";i:1460031880;}', '1460031880', '1460031880');

-- ----------------------------
-- Table structure for `yii2_captcha`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_captcha`;
CREATE TABLE `yii2_captcha` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip` char(15) NOT NULL DEFAULT '0.0.0.0' COMMENT 'IP地址',
  `mobile` char(20) NOT NULL COMMENT '手机号',
  `captcha` char(6) NOT NULL COMMENT '验证码',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='验证码表';

-- ----------------------------
-- Records of yii2_captcha
-- ----------------------------
INSERT INTO `yii2_captcha` VALUES ('1', '127.0.0.1', '13631539420', '7978', '1474196824');
INSERT INTO `yii2_captcha` VALUES ('2', '127.0.0.1', '13631639420', '6743', '1474197192');
INSERT INTO `yii2_captcha` VALUES ('3', '59.40.134.141', '13631539420', '8879', '1474199719');
INSERT INTO `yii2_captcha` VALUES ('4', '59.40.134.141', '13631639420', '1111', '1474206930');
INSERT INTO `yii2_captcha` VALUES ('5', '113.116.72.128', '13631539420', '2216', '1474278556');
INSERT INTO `yii2_captcha` VALUES ('6', '113.116.72.128', '13631539420', '6349', '1474279293');
INSERT INTO `yii2_captcha` VALUES ('7', '113.116.72.128', '13631539420', '8966', '1474279946');
INSERT INTO `yii2_captcha` VALUES ('8', '14.154.236.128', '13631539420', '4171', '1474281062');
INSERT INTO `yii2_captcha` VALUES ('9', '14.154.236.128', '13631539420', '3651', '1474281145');
INSERT INTO `yii2_captcha` VALUES ('10', '116.6.88.148', '18665354960', '8448', '1474334541');
INSERT INTO `yii2_captcha` VALUES ('11', '113.104.231.102', '13421839870', '3321', '1474365606');
INSERT INTO `yii2_captcha` VALUES ('12', '113.104.231.102', '13421839870', '8593', '1474378859');
INSERT INTO `yii2_captcha` VALUES ('13', '113.104.231.102', '13421839870', '6249', '1474380034');
INSERT INTO `yii2_captcha` VALUES ('14', '113.104.231.102', '13421839870', '9893', '1474380089');
INSERT INTO `yii2_captcha` VALUES ('15', '113.104.231.102', '13316922246', '9521', '1474380153');
INSERT INTO `yii2_captcha` VALUES ('16', '113.104.231.115', '13421839870', '1606', '1474443343');
INSERT INTO `yii2_captcha` VALUES ('17', '113.104.231.115', '13421839870', '9673', '1474443423');
INSERT INTO `yii2_captcha` VALUES ('18', '113.104.231.115', '13421839870', '3285', '1474443621');
INSERT INTO `yii2_captcha` VALUES ('19', '183.11.157.104', '13631539420', '6292', '1474444126');
INSERT INTO `yii2_captcha` VALUES ('20', '183.11.157.104', '13631539420', '3221', '1474444208');
INSERT INTO `yii2_captcha` VALUES ('21', '113.104.231.115', '13421839870', '9664', '1474444261');
INSERT INTO `yii2_captcha` VALUES ('22', '113.104.231.115', '13421839870', '6477', '1474444479');
INSERT INTO `yii2_captcha` VALUES ('23', '120.234.16.114', '13316922246', '2312', '1474612724');
INSERT INTO `yii2_captcha` VALUES ('24', '113.116.77.160', '13313622246', '6904', '1474633947');

-- ----------------------------
-- Table structure for `yii2_category`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_category`;
CREATE TABLE `yii2_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `name` varchar(30) NOT NULL COMMENT '标志',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `link` varchar(250) DEFAULT '' COMMENT '外链',
  `extend` text COMMENT '扩展设置',
  `meta_title` varchar(50) DEFAULT '' COMMENT 'SEO的网页标题',
  `keywords` varchar(255) DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT '' COMMENT '描述',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '数据状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of yii2_category
-- ----------------------------
INSERT INTO `yii2_category` VALUES ('1', '0', 'about', '关于我们', '0', '', '', '', '', '1379474947', '1473604610', '0', '1');
INSERT INTO `yii2_category` VALUES ('3', '0', 'event', '活动', '', 'a:2:{s:2:\"sd\";s:2:\"11\";s:4:\"sdfs\";s:3:\"222\";}', '测试标题', '测试seo关键词', '测试描述', '1471947194', '1473604631', '1', '1');

-- ----------------------------
-- Table structure for `yii2_config`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_config`;
CREATE TABLE `yii2_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `value` text COMMENT '配置值',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `group` (`group`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii2_config
-- ----------------------------
INSERT INTO `yii2_config` VALUES ('1', 'WEB_SITE_TITLE', '网站标题', '1', '1', '内容管理框架', '', '网站标题前台显示标题', '1378898976', '1472528403', '0', '1');
INSERT INTO `yii2_config` VALUES ('2', 'WEB_SITE_DESCRIPTION', '网站描述', '1', '2', '内容管理框架', '', '网站搜索引擎描述', '1378898976', '1472528403', '1', '1');
INSERT INTO `yii2_config` VALUES ('3', 'WEB_SITE_KEYWORD', '网站关键字', '1', '2', '黄龙飞11', '', '网站搜索引擎关键字', '1378898976', '1472528403', '8', '1');
INSERT INTO `yii2_config` VALUES ('4', 'WEB_SITE_CLOSE', '关闭站点', '4', '4', '1', '0:关闭,1:开启', '站点关闭后其他用户不能访问，管理员可以正常访问', '1378898976', '1463024280', '1', '0');
INSERT INTO `yii2_config` VALUES ('9', 'CONFIG_TYPE_LIST', '配置类型列表', '3', '3', '0:数字\r\n1:字符\r\n2:文本\r\n3:数组\r\n4:枚举', '', '主要用于数据解析和页面表单的生成', '1378898976', '1463024244', '2', '1');
INSERT INTO `yii2_config` VALUES ('10', 'WEB_SITE_ICP', '网站备案号', '1', '1', '沪ICP备12007941号-2', '', '设置在网站底部显示的备案号，如“沪ICP备12007941号-2', '1378900335', '1472528403', '9', '1');
INSERT INTO `yii2_config` VALUES ('11', 'DATA_BACKUP_PATH', '数据库备份路径', '4', '1', './data/', '', '路径必须以 / 结尾', '1379053380', '1469071721', '3', '1');
INSERT INTO `yii2_config` VALUES ('12', 'DOCUMENT_DISPLAY', '文档可见性', '2', '3', '0:所有人可见\r\n1:仅注册会员可见\r\n2:仅管理员可见', '', '文章可见性仅影响前台显示，后台不收影响', '1379056370', '1463041605', '4', '1');
INSERT INTO `yii2_config` VALUES ('13', 'COLOR_STYLE', '后台色系', '1', '4', 'default_color', 'default_color:默认\r\nblue_color:紫罗兰', '后台颜色风格', '1379122533', '1472528403', '10', '1');

-- ----------------------------
-- Table structure for `yii2_log`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_log`;
CREATE TABLE `yii2_log` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) NOT NULL COMMENT '用户uid',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `controller` varchar(50) NOT NULL COMMENT '控制器',
  `action` varchar(50) NOT NULL COMMENT '动作',
  `querystring` varchar(255) NOT NULL COMMENT '查询字符串',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `ip` varchar(15) NOT NULL DEFAULT '0.0.0.0' COMMENT 'IP',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台日志';

-- ----------------------------
-- Records of yii2_log
-- ----------------------------
INSERT INTO `yii2_log` VALUES ('1', '2', '修改菜单', 'menu', 'index', '/admin.php/menu/index?id=4', '用户修改了菜单', '192.168.0.101', '1435658950', '1');

-- ----------------------------
-- Table structure for `yii2_menu`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_menu`;
CREATE TABLE `yii2_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `group` varchar(50) DEFAULT '' COMMENT '分组',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii2_menu
-- ----------------------------
INSERT INTO `yii2_menu` VALUES ('1', '首页', '0', '1', 'index/index', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('2', '内容', '0', '2', 'article/index', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('3', '文章管理', '2', '1', 'article/index', '0', '文章管理|icon-edit', '1');
INSERT INTO `yii2_menu` VALUES ('4', '新增', '3', '0', 'article/add', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('5', '编辑', '3', '0', 'article/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('6', '改变状态', '3', '0', 'article/setStatus', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('7', '保存', '3', '0', 'article/update', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('8', '保存草稿', '3', '0', 'article/autoSave', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('9', '移动', '3', '0', 'article/move', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('139', '潜水管理', '2', '22', 'shop/index?type=3', '0', '商城管理|icon-glass', '1');
INSERT INTO `yii2_menu` VALUES ('13', '回收站', '2', '99', 'article/recycle', '1', '内容', '1');
INSERT INTO `yii2_menu` VALUES ('14', '还原', '13', '0', 'article/permit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('15', '清空', '13', '0', 'article/clear', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('16', '用户', '0', '4', 'admin/index', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('17', '用户信息', '16', '1', 'admin/index', '0', '后台用户|icon-user', '1');
INSERT INTO `yii2_menu` VALUES ('18', '新增用户', '17', '0', 'admin/add', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('137', '更新', '17', '0', 'admin/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('144', '商城套餐', '2', '29', 'group/index', '0', '商城管理|icon-glass', '1');
INSERT INTO `yii2_menu` VALUES ('155', '删除', '144', '0', 'group/delete', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('156', '添加培训', '2', '0', 'train/add', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('157', '编辑培训', '2', '0', 'train/edit', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('27', '权限管理', '16', '2', 'auth/index', '0', '后台用户|icon-user', '1');
INSERT INTO `yii2_menu` VALUES ('28', '删除', '27', '0', 'auth/delete', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('29', '编辑', '27', '0', 'auth/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('30', '恢复', '27', '0', 'auth/add', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('154', '编辑', '144', '0', 'group/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('153', '添加', '144', '0', 'group/add', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('152', '删除商品', '2', '0', 'shop/delete', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('34', '授权', '27', '0', 'auth/auth', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('35', '访问授权', '27', '0', 'auth/access', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('36', '成员授权', '27', '0', 'auth/user', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('145', '添加', '142', '0', 'user/add', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('146', '编辑', '142', '0', 'user/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('147', '删除', '142', '0', 'user/delete', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('150', '添加商品', '2', '0', 'shop/add', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('151', '编辑商品', '2', '0', 'shop/edit', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('43', '订单', '0', '3', 'order/index', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('44', '订单列表', '43', '1', 'order/index', '0', '订单管理|icon-cny', '1');
INSERT INTO `yii2_menu` VALUES ('143', '海钓管理', '2', '23', 'shop/index?type=4', '0', '商城管理|icon-glass', '1');
INSERT INTO `yii2_menu` VALUES ('142', '前台用户', '16', '20', 'user/index', '0', '前台用户|icon-user-md', '1');
INSERT INTO `yii2_menu` VALUES ('141', '帆船管理', '2', '21', 'shop/index?type=2', '0', '商城管理|icon-glass', '1');
INSERT INTO `yii2_menu` VALUES ('55', '添加', '44', '0', 'order/add', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('56', '编辑', '44', '0', 'order/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('148', '删除', '44', '0', 'order/delete', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('63', '属性管理', '68', '0', 'attribute/index1', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('64', '新增', '63', '0', 'attribute/add', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('65', '编辑', '63', '0', 'attribute/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('66', '改变状态', '63', '0', 'attribute/setStatus', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('67', '保存数据', '63', '0', 'attribute/update', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('68', '系统', '0', '5', 'config/group', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('69', '网站设置', '68', '1', 'config/group', '0', '系统设置|icon-legal', '1');
INSERT INTO `yii2_menu` VALUES ('70', '配置管理', '68', '1', 'config/index', '0', '系统设置|icon-legal', '1');
INSERT INTO `yii2_menu` VALUES ('71', '编辑', '70', '0', 'config/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('72', '删除', '70', '0', 'config/del', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('73', '新增', '70', '0', 'config/add', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('74', '保存', '70', '0', 'config/save', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('75', '菜单管理', '68', '5', 'menu/index', '0', '系统设置|icon-legal', '1');
INSERT INTO `yii2_menu` VALUES ('80', '分类管理', '2', '2', 'category/index', '0', '文章管理|icon-edit', '1');
INSERT INTO `yii2_menu` VALUES ('81', '编辑', '80', '0', 'category/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('82', '新增', '80', '0', 'category/add', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('83', '删除', '80', '0', 'category/remove', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('84', '移动', '80', '0', 'category/operate/type/move', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('85', '合并', '80', '0', 'category/operate/type/merge', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('86', '备份数据库', '68', '10', 'database/index?type=export', '0', '数据备份|icon-apple', '1');
INSERT INTO `yii2_menu` VALUES ('87', '备份', '86', '0', 'database/export', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('88', '优化表', '86', '0', 'database/optimize', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('89', '修复表', '86', '0', 'database/repair', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('90', '还原数据库', '68', '11', 'database/index?type=import', '0', '数据备份|icon-apple', '1');
INSERT INTO `yii2_menu` VALUES ('91', '恢复', '90', '0', 'database/import', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('92', '删除', '90', '0', 'database/del', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('93', '其他栏目', '0', '5', 'other', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('96', '新增', '75', '0', 'menu/add', '0', '系统设置|icon-legal', '1');
INSERT INTO `yii2_menu` VALUES ('98', '编辑', '75', '0', 'menu/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('106', '行为日志', '16', '30', 'log/index', '0', '用户日志|icon-check', '1');
INSERT INTO `yii2_menu` VALUES ('108', '修改密码', '16', '0', 'user/updatePassword', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('109', '修改昵称', '16', '0', 'user/updateNickname', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('110', '查看行为日志', '106', '0', 'log/view', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('114', '导入', '75', '0', 'Menu/import', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('149', '培训课程', '2', '51', 'train/index', '0', '培训管理|icon-headphones', '1');
INSERT INTO `yii2_menu` VALUES ('138', '酒店管理', '2', '20', 'shop/index?type=1', '0', '商城管理|icon-glass', '1');
INSERT INTO `yii2_menu` VALUES ('119', '排序', '70', '0', 'Config/sort', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('120', '排序', '75', '0', 'Menu/sort', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('129', '用户授权', '17', '0', 'admin/auth', '0', '', '0');
INSERT INTO `yii2_menu` VALUES ('131', '待完成任务', '1', '0', 'index/index', '0', '任务列表', '0');
INSERT INTO `yii2_menu` VALUES ('158', '删除培训', '2', '0', 'train/delete', '1', '', '1');
INSERT INTO `yii2_menu` VALUES ('159', '广告管理', '2', '0', 'ad/index', '0', '广告管理|icon-comment', '1');
INSERT INTO `yii2_menu` VALUES ('160', '添加', '159', '0', 'ad/add', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('161', '编辑', '159', '0', 'ad/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('162', '删除', '159', '0', 'ad/delete', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('163', '证书管理', '2', '0', 'certificate/index', '0', '培训管理|icon-headphones', '1');
INSERT INTO `yii2_menu` VALUES ('164', '添加/修改证书', '163', '0', 'certificate/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('165', '删除证书', '163', '0', 'certificate/delete', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('166', '培训类型', '2', '0', 'traintype/index', '0', '培训管理|icon-headphones', '1');
INSERT INTO `yii2_menu` VALUES ('167', '添加/修改类型', '166', '0', 'traintype/edit', '0', '', '1');
INSERT INTO `yii2_menu` VALUES ('168', '删除类型', '166', '0', 'traintype/delete', '0', '', '1');

-- ----------------------------
-- Table structure for `yii2_order`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_order`;
CREATE TABLE `yii2_order` (
  `order_id` int(8) NOT NULL AUTO_INCREMENT,
  `order_sn` char(10) NOT NULL COMMENT '订单号',
  `uid` int(8) DEFAULT '0' COMMENT '用户id',
  `name` char(30) DEFAULT '' COMMENT '姓名',
  `tel` char(20) DEFAULT '' COMMENT '电话',
  `sfz` char(20) DEFAULT '' COMMENT '身份证号',
  `type` char(10) NOT NULL COMMENT '订单类型 shop或train',
  `taocan` int(5) DEFAULT '0' COMMENT '套餐ID',
  `aid` int(8) NOT NULL COMMENT '商品或培训ID',
  `title` varchar(100) NOT NULL COMMENT '商品名称',
  `start_time` int(10) NOT NULL COMMENT '起租时间',
  `end_time` int(10) NOT NULL COMMENT '退租时间',
  `num` int(4) NOT NULL DEFAULT '1' COMMENT '数量',
  `total` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '总价格',
  `pay_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '支付状态 0未支付 1已支付',
  `pay_time` int(10) NOT NULL COMMENT '支付时间',
  `pay_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '支付类型 1微信 2支付宝 3银联',
  `pay_source` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '支付途径 1网站 2微信 3后台',
  `create_time` int(10) NOT NULL COMMENT '订单创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of yii2_order
-- ----------------------------
INSERT INTO `yii2_order` VALUES ('1', '135555111', '6', '', '', '', 'shop', '0', '1', '商品名称', '1345678940', '1481472000', '1', '0.00', '0', '1345668940', '1', '1', '1345678940', '1');
INSERT INTO `yii2_order` VALUES ('2', '135555111', '7', '', '', '', 'shop', '0', '1', '商品名称1111', '1345678940', '1481472000', '1', '0.00', '1', '1365668940', '2', '2', '1365678940', '1');
INSERT INTO `yii2_order` VALUES ('3', '1473787901', '0', '', '', '', 'shop', '0', '1', '大床双人房特价', '1473811200', '1474416000', '1', '0.00', '1', '1473787901', '1', '1', '1473787924', '1');
INSERT INTO `yii2_order` VALUES ('4', '1473788097', '0', '龙凤', '15956985698', '', 'train', '0', '3', '帆船培训2', '1473811200', '1474416000', '1', '0.00', '0', '1473788097', '1', '1', '1473788126', '1');
INSERT INTO `yii2_order` VALUES ('5', '1474094023', '0', '', '', '', 'shop', '0', '1', '大床双人房特价', '1473345000', '0', '1', '0.00', '0', '1474094023', '4', '3', '1474094061', '1');
INSERT INTO `yii2_order` VALUES ('6', '1474667334', '6', '撒旦法师', '1356464646', '', 'shop', '0', '1', '大床双人房特价', '1474675200', '1475020800', '3', '0.00', '0', '0', '1', '1', '1474667334', '1');
INSERT INTO `yii2_order` VALUES ('7', '1474667510', '13', '', '', '', 'shop', '0', '3', '测试酒店1', '1474675200', '1474848000', '1', '0.00', '0', '0', '1', '1', '1474667510', '1');
INSERT INTO `yii2_order` VALUES ('8', '1474670405', '6', 'feifeife', '136565656565', '1323656589898562', 'shop', '0', '1', '大床双人房特价', '1474675200', '1474934400', '1', '1560.36', '0', '0', '1', '1', '1474670405', '1');
INSERT INTO `yii2_order` VALUES ('9', '1474670405', '6', 'feifeife', '136565656565', '1323656589898562', 'shop', '0', '3', '测试酒店1', '1474675200', '1475020800', '1', '1680.92', '0', '0', '1', '1', '1474670405', '1');
INSERT INTO `yii2_order` VALUES ('14', '1474672573', '6', 'sdafasfa', '13632565235', '146464634643132', 'shop', '5', '1', '大床双人房特价[套餐(1474672573|5)]', '1474675200', '1474848000', '2', '1250.00', '0', '0', '1', '1', '1474672573', '1');
INSERT INTO `yii2_order` VALUES ('15', '1474672573', '6', 'sdafasfa', '13632565235', '146464634643132', 'shop', '5', '4', '测试帆船标题[套餐(1474672573|5)]', '1474758000', '1474761600', '2', '0.00', '0', '0', '1', '1', '1474672573', '1');

-- ----------------------------
-- Table structure for `yii2_picture`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_picture`;
CREATE TABLE `yii2_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id自增',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片链接',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii2_picture
-- ----------------------------

-- ----------------------------
-- Table structure for `yii2_shop`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_shop`;
CREATE TABLE `yii2_shop` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(4) NOT NULL COMMENT '房间类型',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `cover` varchar(255) NOT NULL DEFAULT '' COMMENT '封面图',
  `images` text NOT NULL COMMENT '图组',
  `num` int(3) NOT NULL COMMENT '房间总数量',
  `price` decimal(8,2) NOT NULL COMMENT '通常价格，格式231.02',
  `extend` text COMMENT '扩展数据',
  `sort` int(4) NOT NULL DEFAULT '0' COMMENT '排序值',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='酒店表';

-- ----------------------------
-- Records of yii2_shop
-- ----------------------------
INSERT INTO `yii2_shop` VALUES ('1', '1', '大床双人房特价', '111111', '/upload/image/201609/1473947300137.jpg', '/upload/image/201608/1472638058196.jpg,/upload/image/201608/1472638060470.jpg', '111', '520.12', 'a:3:{i:111;s:3:\"111\";i:222;s:3:\"222\";i:333;s:3:\"333\";}', '1', '1472638475', '1473947302', '1');
INSERT INTO `yii2_shop` VALUES ('2', '4', '海钓管理测试测试测试', '测试测试测试', '', '/upload/image/201608/1472639208479.jpg,/upload/image/201608/1472639210113.jpg', '133', '421.00', 'a:3:{i:11;s:2:\"11\";i:22;s:2:\"22\";i:33;s:2:\"33\";}', '3', '1472639234', null, '1');
INSERT INTO `yii2_shop` VALUES ('3', '1', '测试酒店1', '测试酒店1', '/upload/image/201609/1473947265806.jpg', '/upload/image/201609/1473947288984.jpg,/upload/image/201609/1473947290715.jpg', '4', '420.23', 'a:1:{s:3:\"sss\";s:5:\"sadfa\";}', '0', '1473835350', '1473947292', '1');
INSERT INTO `yii2_shop` VALUES ('4', '2', '测试帆船标题', '测试商品描述测试商品描述测试商品描述测试商品描述测试商品描述', '/upload/image/201609/1474176209742.jpg', '/upload/image/201609/1474176211761.jpg,/upload/image/201609/1474176213249.jpg,/upload/image/201609/1474176215379.jpg', '111', '333.00', 'a:1:{i:0;s:0:\"\";}', '0', '1474176248', null, '1');
INSERT INTO `yii2_shop` VALUES ('5', '3', '测试潜水标题', '商品描述商品描述商品描述商品描述商品描述商品描述商品描述商品描述商品描述商品描述', '/upload/image/201609/1474176263443.jpg', '/upload/image/201609/1474176285287.jpg,/upload/image/201609/1474176289221.jpg,/upload/image/201609/1474176293497.jpg,/upload/image/201609/1474176299382.jpg', '200', '900.00', 'a:1:{i:0;s:0:\"\";}', '0', '1474176308', null, '1');
INSERT INTO `yii2_shop` VALUES ('6', '1', '666666', '666666666666', '/upload/image/201609/1474213186190.png', '/upload/image/201609/1474213195722.jpg', '6', '2288.00', 'a:1:{i:0;s:15:\"dssdfsfsdfdsfsa\";}', '1', '1474213219', '1474213264', '0');

-- ----------------------------
-- Table structure for `yii2_shop_group`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_shop_group`;
CREATE TABLE `yii2_shop_group` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '套餐标题',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `cover` varchar(255) NOT NULL DEFAULT '' COMMENT '封面图',
  `images` text NOT NULL COMMENT '图集',
  `groups` text NOT NULL COMMENT '商品组合，数字逗号分隔',
  `price` decimal(8,2) NOT NULL COMMENT '套餐价格',
  `total` decimal(8,2) DEFAULT '0.00' COMMENT '原价',
  `sort` int(4) NOT NULL DEFAULT '0' COMMENT '排序值',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='套餐设置';

-- ----------------------------
-- Records of yii2_shop_group
-- ----------------------------
INSERT INTO `yii2_shop_group` VALUES ('2', '阿斯顿发顺丰', '沙发沙发啊 沙发阿斯顿发是放大师傅', '/upload/image/201609/1474656443824.jpg', '/upload/image/201609/1474685974797.jpg,/upload/image/201609/1474686306625.jpg,/upload/image/201609/1474687094803.jpg,/upload/image/201609/1474687096783.jpg,/upload/image/201609/1474687098718.jpg', 'a:1:{i:1;a:1:{i:3;a:3:{s:4:\"days\";s:1:\"6\";s:3:\"num\";s:1:\"6\";s:2:\"id\";s:1:\"3\";}}}', '600.00', '15128.28', '0', '1');
INSERT INTO `yii2_shop_group` VALUES ('4', '房1天2人潜水1天2人', '房1天2人潜水1天2人', '/upload/image/201609/1474656279610.jpg', '', 'a:2:{i:1;a:1:{i:1;a:3:{s:4:\"days\";s:1:\"1\";s:3:\"num\";s:1:\"2\";s:2:\"id\";s:1:\"1\";}}i:3;a:1:{i:5;a:3:{s:4:\"days\";s:1:\"1\";s:3:\"num\";s:1:\"2\";s:2:\"id\";s:1:\"5\";}}}', '998.00', '2840.24', '0', '1');
INSERT INTO `yii2_shop_group` VALUES ('5', '节日特惠套餐', '测试酒店1,2天2人；帆船1天2人', '/upload/image/201609/1474656422700.jpg', '', 'a:2:{i:1;a:1:{i:1;a:3:{s:4:\"days\";s:1:\"2\";s:3:\"num\";s:1:\"2\";s:2:\"id\";s:1:\"1\";}}i:2;a:1:{i:4;a:3:{s:4:\"days\";s:1:\"1\";s:3:\"num\";s:1:\"2\";s:2:\"id\";s:1:\"4\";}}}', '1250.00', '2746.48', '0', '1');
INSERT INTO `yii2_shop_group` VALUES ('6', '666666房3天2间；海钓4小时2人', '666666房3天2间；海钓4小时2人', '/upload/image/201609/1474656433378.jpg', '', 'a:2:{i:1;a:1:{i:6;a:3:{s:4:\"days\";s:1:\"3\";s:3:\"num\";s:1:\"2\";s:2:\"id\";s:1:\"6\";}}i:4;a:1:{i:2;a:3:{s:4:\"days\";s:1:\"4\";s:3:\"num\";s:1:\"2\";s:2:\"id\";s:1:\"2\";}}}', '5000.00', '17096.00', '0', '1');

-- ----------------------------
-- Table structure for `yii2_shop_price`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_shop_price`;
CREATE TABLE `yii2_shop_price` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `shop_id` int(8) NOT NULL,
  `day` int(10) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='每日价格列表';

-- ----------------------------
-- Records of yii2_shop_price
-- ----------------------------

-- ----------------------------
-- Table structure for `yii2_shop_type`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_shop_type`;
CREATE TABLE `yii2_shop_type` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='房间类型表';

-- ----------------------------
-- Records of yii2_shop_type
-- ----------------------------
INSERT INTO `yii2_shop_type` VALUES ('1', '房间');
INSERT INTO `yii2_shop_type` VALUES ('2', '帆船');
INSERT INTO `yii2_shop_type` VALUES ('3', '潜水');
INSERT INTO `yii2_shop_type` VALUES ('4', '海钓');

-- ----------------------------
-- Table structure for `yii2_train`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_train`;
CREATE TABLE `yii2_train` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL COMMENT '培训类型',
  `title` varchar(100) NOT NULL COMMENT '排序标题',
  `description` varchar(255) NOT NULL COMMENT '描述',
  `price` decimal(8,2) NOT NULL COMMENT '价格',
  `num` tinyint(3) NOT NULL DEFAULT '1' COMMENT '最少人数',
  `sort` int(4) NOT NULL DEFAULT '0' COMMENT '排序值',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `cover` varchar(255) NOT NULL COMMENT '封面',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='培训表';

-- ----------------------------
-- Records of yii2_train
-- ----------------------------
INSERT INTO `yii2_train` VALUES ('1', '1', '测试培训标题1', '测试培训标题1：\r\n\r\n帆海汇码头里停泊着单体竞赛帆船TEN，龙骨帆船DC22，丁级帆船DC15，\r\n双体帆船JE28，三体帆船JE27。无论您是出海游玩钓鱼，海上派对，\r\n\r\n还是商务洽谈等都可以满足您的需要。\r\n帆海汇培训中心室内拥有设施齐全的超大会议室，可以满足不同公司组织的业内会议\r\n或不同领域的年度盛会。帆海汇培训中心为美国ASA权威帆船培训体系授权分校，\r\n将为帆船运动爱好者提供专业的帆船培训，并颁发美国ASA帆船驾驶证书。 ', '523.23', '127', '0', '1472643081', '1474529276', '1', '/upload/image/201609/1474529272105.jpg');
INSERT INTO `yii2_train` VALUES ('2', '2', '测试培训标题', '帆海汇码头里停泊着单体竞赛帆船TEN，龙骨帆船DC22，丁级帆船DC15，\r\n双体帆船JE28，三体帆船JE27。无论您是出海游玩钓鱼，海上派对，\r\n\r\n还是商务洽谈等都可以满足您的需要。\r\n帆海汇培训中心室内拥有设施齐全的超大会议室，可以满足不同公司组织的业内会议\r\n或不同领域的年度盛会。帆海汇培训中心为美国ASA权威帆船培训体系授权分校，\r\n将为帆船运动爱好者提供专业的帆船培训，并颁发美国ASA帆船驾驶证书。 ', '231.12', '100', '1', '1472643186', '1474529429', '1', '/upload/image/201609/1474529428934.jpg');
INSERT INTO `yii2_train` VALUES ('3', '1', '帆船培训2', '帆海汇码头里停泊着单体竞赛帆船TEN，龙骨帆船DC22，丁级帆船DC15，\r\n双体帆船JE28，三体帆船JE27。无论您是出海游玩钓鱼，海上派对，\r\n\r\n还是商务洽谈等都可以满足您的需要。\r\n帆海汇培训中心室内拥有设施齐全的超大会议室，可以满足不同公司组织的业内会议\r\n或不同领域的年度盛会。帆海汇培训中心为美国ASA权威帆船培训体系授权分校，\r\n将为帆船运动爱好者提供专业的帆船培训，并颁发美国ASA帆船驾驶证书。 ', '322.20', '1', '0', '1473611927', '1474529318', '1', '/upload/image/201609/1474529316531.jpg');
INSERT INTO `yii2_train` VALUES ('4', '1', '帆船培训3', '帆海汇码头里停泊着单体竞赛帆船TEN，龙骨帆船DC22，丁级帆船DC15，\r\n双体帆船JE28，三体帆船JE27。无论您是出海游玩钓鱼，海上派对，\r\n\r\n还是商务洽谈等都可以满足您的需要。\r\n帆海汇培训中心室内拥有设施齐全的超大会议室，可以满足不同公司组织的业内会议\r\n或不同领域的年度盛会。帆海汇培训中心为美国ASA权威帆船培训体系授权分校，\r\n将为帆船运动爱好者提供专业的帆船培训，并颁发美国ASA帆船驾驶证书。 ', '222.22', '122', '0', '1473611964', '1474529341', '1', '/upload/image/201609/1474529339380.jpg');
INSERT INTO `yii2_train` VALUES ('5', '2', '潜水培训2', '帆海汇码头里停泊着单体竞赛帆船TEN，龙骨帆船DC22，丁级帆船DC15，\r\n双体帆船JE28，三体帆船JE27。无论您是出海游玩钓鱼，海上派对，\r\n\r\n还是商务洽谈等都可以满足您的需要。\r\n帆海汇培训中心室内拥有设施齐全的超大会议室，可以满足不同公司组织的业内会议\r\n或不同领域的年度盛会。帆海汇培训中心为美国ASA权威帆船培训体系授权分校，\r\n将为帆船运动爱好者提供专业的帆船培训，并颁发美国ASA帆船驾驶证书。 ', '100.02', '100', '0', '1473612010', '1474529378', '1', '/upload/image/201609/147452937679.jpg');
INSERT INTO `yii2_train` VALUES ('6', '2', '潜水培训3', '帆海汇码头里停泊着单体竞赛帆船TEN，龙骨帆船DC22，丁级帆船DC15，\r\n双体帆船JE28，三体帆船JE27。无论您是出海游玩钓鱼，海上派对，\r\n\r\n还是商务洽谈等都可以满足您的需要。\r\n帆海汇培训中心室内拥有设施齐全的超大会议室，可以满足不同公司组织的业内会议\r\n或不同领域的年度盛会。帆海汇培训中心为美国ASA权威帆船培训体系授权分校，\r\n将为帆船运动爱好者提供专业的帆船培训，并颁发美国ASA帆船驾驶证书。 ', '123.23', '100', '0', '1473612026', '1474529403', '1', '/upload/image/201609/1474529402375.jpg');

-- ----------------------------
-- Table structure for `yii2_train_certificate`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_train_certificate`;
CREATE TABLE `yii2_train_certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '证书名',
  `cover` varchar(255) NOT NULL DEFAULT '' COMMENT '证书图片',
  `description` varchar(1000) NOT NULL DEFAULT '' COMMENT '证书简介',
  `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='培训证书表';

-- ----------------------------
-- Records of yii2_train_certificate
-- ----------------------------
INSERT INTO `yii2_train_certificate` VALUES ('1', 'AAA认证证书', '/upload/image/201609/1474522625896.jpg', '证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明', '0');
INSERT INTO `yii2_train_certificate` VALUES ('2', 'BBB认证证书', '/upload/image/201609/147451603391.jpg', '证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明', '0');
INSERT INTO `yii2_train_certificate` VALUES ('3', 'CCC认证证书', '/upload/image/201609/1474516376670.jpg', '证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明证书说明 ', '0');

-- ----------------------------
-- Table structure for `yii2_train_price`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_train_price`;
CREATE TABLE `yii2_train_price` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `train_id` int(8) NOT NULL,
  `day` int(10) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`train_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='每日价格列表';

-- ----------------------------
-- Records of yii2_train_price
-- ----------------------------

-- ----------------------------
-- Table structure for `yii2_train_type`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_train_type`;
CREATE TABLE `yii2_train_type` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '类型名称',
  `cover` varchar(255) NOT NULL DEFAULT '' COMMENT '封面',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `certif_ids` varchar(100) NOT NULL DEFAULT '' COMMENT '证书id',
  `description` varchar(255) NOT NULL COMMENT '内容描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='房间类型表';

-- ----------------------------
-- Records of yii2_train_type
-- ----------------------------
INSERT INTO `yii2_train_type` VALUES ('1', '帆船', '/upload/image/201609/1474523626782.jpg', '0', '1,2,3', '阿迪法师打发多少阿斯顿发生的发生的发达asd');
INSERT INTO `yii2_train_type` VALUES ('2', '海钓', '/upload/image/201609/1474523644381.jpg', '0', '1,2,3', '阿斯顿法师打发规划法国恢复电话打工行');

-- ----------------------------
-- Table structure for `yii2_user`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_user`;
CREATE TABLE `yii2_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(16) NOT NULL COMMENT '用户名',
  `password` char(60) NOT NULL COMMENT '密码',
  `salt` char(32) NOT NULL COMMENT '密码干扰字符',
  `email` char(32) DEFAULT NULL COMMENT '用户邮箱',
  `mobile` char(15) NOT NULL DEFAULT '' COMMENT '用户手机',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `tuid` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '推荐人uid',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '头像路径',
  `score` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '当前积分',
  `score_all` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '总积分',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态 1正常 0禁用',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of yii2_user
-- ----------------------------
INSERT INTO `yii2_user` VALUES ('6', 'e282486518', '$2y$13$oO.xRlrKjMMF/bykb7476.zBIH2RkR6rtv8j5jrYgSxi71AvV3lFG', 'kXGkWeNSeoK7vakqRfUAviocq-5uy0cN', 'phphome@qq.com', '13656568989', '1456568652', '13654444444', '1456568652', '13556464888', '1473605683', '7', '/upload/image/201609/1473605673521.png', '10', '0', '1');
INSERT INTO `yii2_user` VALUES ('7', '282486518', '$2y$13$KIAenVWuR2Tgi1VCKiPegeVsQAHXyDcp9rUmzhqK6TNjL4Cqc3YPa', 'n9uguceYCqn_jQNd8F6-JRHOj21yltUo', 'phphome@qq.coms', '13645685421', '1472626509', '2130706433', '0', '2130706433', '1472626719', '0', '/upload/image/201608/1472626502486.jpg', '1', '1', '0');
INSERT INTO `yii2_user` VALUES ('8', '135232323232', '$2y$13$UVA5264Qic4g8BDl940x1e0ZefVI3QqpH8tH6bttL/cF8GcU1C7Rm', 'Dg36PS0QshZ-Y2zhQJa559RSKJULGO_8', null, '', '1474112224', '2130706433', '0', '2130706433', '0', '0', '', '0', '0', '0');
INSERT INTO `yii2_user` VALUES ('13', 'aabbcc', '$2y$13$46n16kagedYUXx6WXZ2QkuSGJKm3FDr6iI.KPNzAkHYRHmplqgAiC', 'OblZ1QuXGGGiXZWTPqfDrCoF_qXVIN3b', null, '13421839870', '1474114459', '2130706433', '0', '2130706433', '0', '0', '', '0', '0', '1');
INSERT INTO `yii2_user` VALUES ('14', 'bvbvbv', '$2y$13$Jm2bfhSnqcSMTaPxRRWiReqrclkApB1Dc20kLTxVNHAzl7J8DH60K', 'jrYKEga9jbp2H6bsdLjvnEd5mqsRgMMD', null, '13013013330', '1474115843', '2130706433', '0', '2130706433', '0', '0', '', '0', '0', '1');
INSERT INTO `yii2_user` VALUES ('15', 'hahaha', '$2y$13$NsuZra9Z/DBaRk3R7tzvnuYrbmV5mIAKTKoksFcYHu3wUyJDaLPz.', 'BsDuGjz20Uexw6Kq_iw-s8AiqNmtec2u', null, '13636363636', '1474192435', '2130706433', '0', '2130706433', '0', '13', '', '0', '0', '1');
INSERT INTO `yii2_user` VALUES ('16', 'huanglala', '$2y$13$FJGFsH1fls8m3DWuxUrN9eJcDQZScQLyYaQIXVeSPK0WMlpT1C.Ze', '7EpKjeEwVqYQS7oV0QW7-JNy-UFchvY1', null, '13631639420', '1474197294', '2130706433', '0', '2130706433', '0', '13', '', '0', '0', '1');
INSERT INTO `yii2_user` VALUES ('17', 'binbin', '$2y$13$fbFtBRQgoH2PZ3wfCG1KIu8qdXeah.4KFZWI7kAE.4fDxM4lMuJ4q', 'tjCK1O9VaCtnvlNzRobRlnNHmbADlXPM', null, '18665354960', '1474334566', '1946572948', '0', '1946572948', '0', '6', '', '0', '0', '1');
INSERT INTO `yii2_user` VALUES ('18', 'lasek001', '$2y$13$qMb7n1rslyltgaCDNvy/mOcBuTfOmidi8.zXvnURHMqKkVydCj3h2', 'Fx-LBkD34aXdGkYt8a2S_6Vq991TrW6S', null, '13316922246', '1474380169', '1902700390', '0', '1902700390', '0', '0', '', '0', '0', '1');
INSERT INTO `yii2_user` VALUES ('19', 'feifeifei', '$2y$13$MRvZElUImZ.8gMsNV5ZEKuIkdkEamyc1tw/FHoPgQdp5x.WIPOroi', 'KWzNd8A57uVSMeLpDUB_ol1egfLPJ58C', null, '13631539420', '1474444147', '3070991720', '0', '3070991720', '0', '0', '', '0', '0', '1');

-- ----------------------------
-- Table structure for `yii2_user_data`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_user_data`;
CREATE TABLE `yii2_user_data` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` tinyint(3) unsigned NOT NULL COMMENT '类型标识',
  `target_id` int(10) unsigned NOT NULL COMMENT '目标id',
  UNIQUE KEY `uid` (`uid`,`type`,`target_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii2_user_data
-- ----------------------------

-- ----------------------------
-- Table structure for `yii2_user_rank`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_user_rank`;
CREATE TABLE `yii2_user_rank` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL COMMENT '等级名称',
  `score` int(8) NOT NULL COMMENT '积分界限',
  `discount` decimal(6,2) NOT NULL DEFAULT '0.00' COMMENT '折扣百分比',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='会员等级配置';

-- ----------------------------
-- Records of yii2_user_rank
-- ----------------------------
INSERT INTO `yii2_user_rank` VALUES ('1', '普通会员', '0', '0.00', '1');
INSERT INTO `yii2_user_rank` VALUES ('2', '一级会员', '2000', '3.00', '1');
INSERT INTO `yii2_user_rank` VALUES ('3', '二级会员', '5000', '6.00', '1');
INSERT INTO `yii2_user_rank` VALUES ('4', 'VIP会员', '10000', '10.00', '1');
INSERT INTO `yii2_user_rank` VALUES ('5', '钻石会员', '100000', '20.00', '1');
