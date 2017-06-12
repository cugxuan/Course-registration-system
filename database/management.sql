SET FOREIGN_KEY_CHECKS=0;
use management;
CREATE TABLE `student` (
  `id` bigint(32) NOT NULL  COMMENT '考生号',
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `credit_card` varchar(200) DEFAULT NULL COMMENT '身份证号',
  `phone` int(11) DEFAULT NULL COMMENT '手机号',
  `local`varchar(200) DEFAULT NULL COMMENT '所在地',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `student` VALUES ('20171003152', '14e1b600b1fd579f47433b88e8d85291', 'Xuan', '326515199420158951', '13578945641','湖北');
INSERT INTO `student` VALUES ('20173256485', '14e1b600b1fd579f47433b88e8d85291', 'Jiemy', '562632199532145698', '15236654925','江西');


CREATE TABLE `exam` (
  `id` int(8) NOT NULL COMMENT '考试编号',
  `subject` varchar(50) DEFAULT NULL COMMENT '科目',
  `start_time` varchar(50) DEFAULT NULL COMMENT '起始时间',
  `deadline` varchar(50) DEFAULT NULL COMMENT '终止时间',
  `location`varchar(200) DEFAULT NULL COMMENT '地点',
  `capacity` int(8) DEFAULT NULL COMMENT '人数容量',
  `number` int(8) DEFAULT NULL COMMENT '已选人数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `exam` VALUES ('20170001', '英语四级', '2017.03.21', '2017.06.05', '地大','5000','2300');
INSERT INTO `exam` VALUES ('20170002', '英语六级', '2017.03.21', '2017.06.05', '地大','5000','2100');

CREATE TABLE `student_exam` (
  `id` bigint(32) NOT NULL COMMENT '考生号',
  `exam_id` int(8) DEFAULT NULL COMMENT '考试编号'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `student_exam` VALUES ('20171003152', '20170001');
INSERT INTO `student_exam` VALUES ('20171003152', '20170002');
INSERT INTO `student_exam` VALUES ('20173256485', '20170001');
INSERT INTO `student_exam` VALUES ('20173256485', '20170002');


CREATE TABLE `admin_core` (
  `id` int(4) NOT NULL COMMENT '管理员编码',
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `statement`int(10) DEFAULT NULL COMMENT '0 超级管理员，1招生人员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `admin_core` VALUES ('0001', '14e1b600b1fd579f47433b88e8d85291','超级管理员','0');
INSERT INTO `admin_core` VALUES ('0002', '14e1b600b1fd579f47433b88e8d85291','招生人员','1');



