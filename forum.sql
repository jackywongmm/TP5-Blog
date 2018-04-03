# Host: localhost  (Version: 5.5.40)
# Date: 2018-03-23 16:17:00
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "cms_article"
#

DROP TABLE IF EXISTS `cms_article`;
CREATE TABLE `cms_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `name` varchar(20) DEFAULT NULL COMMENT '发布人',
  `fid` int(2) DEFAULT NULL COMMENT '分类id',
  `abstract` varchar(500) DEFAULT NULL COMMENT '摘要',
  `content` longtext COMMENT '内容',
  `createTime` datetime DEFAULT NULL COMMENT '创建时间',
  `reading` int(11) DEFAULT '0' COMMENT '阅读量',
  `status` int(2) DEFAULT '0' COMMENT '状态 0.正常   1.删到回收站',
  `deleteTime` datetime DEFAULT NULL COMMENT '删除到回收站时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='文章';

#
# Data for table "cms_article"
#

/*!40000 ALTER TABLE `cms_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_article` ENABLE KEYS */;

#
# Structure for table "cms_classification"
#

DROP TABLE IF EXISTS `cms_classification`;
CREATE TABLE `cms_classification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='分类';

#
# Data for table "cms_classification"
#

/*!40000 ALTER TABLE `cms_classification` DISABLE KEYS */;
INSERT INTO `cms_classification` VALUES (1,'人妖类'),(2,'傻瓜类'),(3,'不要脸类');
/*!40000 ALTER TABLE `cms_classification` ENABLE KEYS */;

#
# Structure for table "cms_comment"
#

DROP TABLE IF EXISTS `cms_comment`;
CREATE TABLE `cms_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL COMMENT '文章id',
  `comment` varchar(100) DEFAULT NULL COMMENT '评语',
  `createTime` datetime DEFAULT NULL COMMENT '评论时间',
  `name` varchar(20) DEFAULT NULL COMMENT '评论人',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='评论表';

#
# Data for table "cms_comment"
#

/*!40000 ALTER TABLE `cms_comment` DISABLE KEYS */;
INSERT INTO `cms_comment` VALUES (1,1,'很好','2018-03-23 14:54:22','李四','123456789@qq.com');
/*!40000 ALTER TABLE `cms_comment` ENABLE KEYS */;

#
# Structure for table "cms_leaving_message"
#

DROP TABLE IF EXISTS `cms_leaving_message`;
CREATE TABLE `cms_leaving_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL COMMENT '留言人',
  `email` varchar(50) DEFAULT NULL COMMENT 'Email',
  `comment` varchar(255) DEFAULT NULL COMMENT '留言内容',
  `createTime` datetime DEFAULT NULL COMMENT '留言时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='留言';

#
# Data for table "cms_leaving_message"
#

/*!40000 ALTER TABLE `cms_leaving_message` DISABLE KEYS */;
INSERT INTO `cms_leaving_message` VALUES (1,'王五','123456789@qq.com','今天天气很好','2018-03-23 14:58:22');
/*!40000 ALTER TABLE `cms_leaving_message` ENABLE KEYS */;

#
# Structure for table "cms_link"
#

DROP TABLE IF EXISTS `cms_link`;
CREATE TABLE `cms_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `url` varchar(100) DEFAULT NULL COMMENT '链接地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='链接';

#
# Data for table "cms_link"
#

/*!40000 ALTER TABLE `cms_link` DISABLE KEYS */;
INSERT INTO `cms_link` VALUES (1,'百度','www.baidu.com');
/*!40000 ALTER TABLE `cms_link` ENABLE KEYS */;

#
# Structure for table "cms_message"
#

DROP TABLE IF EXISTS `cms_message`;
CREATE TABLE `cms_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL COMMENT '登录id',
  `key` varchar(50) DEFAULT NULL COMMENT '键',
  `value` varchar(50) DEFAULT NULL COMMENT '值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员信息表';

#
# Data for table "cms_message"
#

/*!40000 ALTER TABLE `cms_message` DISABLE KEYS */;
INSERT INTO `cms_message` VALUES (1,'1','姓名','张珊'),(2,'1','身高','180cm');
/*!40000 ALTER TABLE `cms_message` ENABLE KEYS */;

#
# Structure for table "cms_user"
#

DROP TABLE IF EXISTS `cms_user`;
CREATE TABLE `cms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `nickName` varchar(50) DEFAULT NULL COMMENT '昵称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

#
# Data for table "cms_user"
#

/*!40000 ALTER TABLE `cms_user` DISABLE KEYS */;
INSERT INTO `cms_user` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',NULL);
/*!40000 ALTER TABLE `cms_user` ENABLE KEYS */;
