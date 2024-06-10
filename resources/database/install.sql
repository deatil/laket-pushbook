DROP TABLE IF EXISTS `pre__pushbook`;
CREATE TABLE `pre__pushbook` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '日志ID',
  `title` varchar(250) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '标题',
  `content` text CHARACTER SET utf8mb4 NOT NULL COMMENT '内容',
  `contact` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '联系方式',
  `contact_type` varchar(10) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '联系方式类型',
  `type` varchar(10) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '类型',
  `add_time` int(10) DEFAULT '0' COMMENT '添加时间',
  `add_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '添加IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='表单提交';
