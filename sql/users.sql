

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫: `example`
--

-- --------------------------------------------------------

--
-- 資料庫新增 users 表格：使用者
--
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號 ( 流水號 )',
  `account` varchar(20) DEFAULT '' COMMENT '帳號',
  `password` varchar(50) DEFAULT '' COMMENT '密碼 ( 使用 MD5 加密 )',
  `name` varchar(255) DEFAULT '' COMMENT '姓名',
  `sex` char(1) DEFAULT '' COMMENT '性別 ( M.男 / F.女 )',
  `birthday` date DEFAULT '0000-00-00' COMMENT '生日',
  `email` varchar(255) DEFAULT '' COMMENT '信箱',
  `tel` varchar(10) DEFAULT '' COMMENT '電話',
  `phone` varchar(10) DEFAULT '' COMMENT '手機',
  `address` varchar(255) DEFAULT '' COMMENT '地址',
  `idCard` varchar(10) DEFAULT '' COMMENT '身份證',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='使用者';

--
-- 資料庫新增 users 資料
--
INSERT INTO users VALUES 
('1','admin','21232F297A57A5A743894A0E4A801FC3','陳先生','M','1963/10/21','jon@gmail.com','061234567','0912345678','台南市',''),
('2','account','E268443E43D93DAB7EBEF303BBE9642F','黃小姐','F','1959/02/20','amy@gmail.com','037654321','0987654321','台中市','');


