-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `php-final`
--

-- --------------------------------------------------------

--
-- 資料表結構 `animate`
--

CREATE TABLE `animate` (
  `animate_id` int(11) NOT NULL,
  `animate_name` varchar(20) NOT NULL,
  `animate_price` int(8) NOT NULL,
  `animate_photo` varchar(30) NOT NULL,
  `animate_director` varchar(20) NOT NULL,
  `animate_company` varchar(20) NOT NULL,
  `animate_description` varchar(1000) NOT NULL,
  `animate_episode` int(8) NOT NULL,
  `animate_click` int(8) NOT NULL,
  `animate_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `animate`
--

INSERT INTO `animate` (`animate_id`, `animate_name`, `animate_price`, `animate_photo`, `animate_director`, `animate_company`, `animate_description`, `animate_episode`, `animate_click`, `animate_time`) VALUES
(4, '我的英雄學院 第一季', 150, 'image/animate-我的英雄學院 第一季.jpg', '堀越耕平', 'BONES', '這個世界從某一天開始，新生的人們突然開始展現出名為「個性」的特殊能力，本該只出現在架空故事中的超能力者成為現實的存在，讓整個人類社會陷入變化與動盪。在一片混亂之際，心懷邪念的人開始以「個性」為非作歹，而就在政府對這些突如其來的災禍束手無策之際，身負力量與正義感的人開始如同超人漫畫般的揭竿而起，展現正義的「英雄」也相繼而生。現今，有五分之四的人都擁有「個性」的超人社會儼然成形，為了對抗濫用「個性」於犯罪用途的罪犯，政府將英雄定位為特殊的公務職員，依其功績給予報酬。豐厚的報酬與體現正義的榮耀，加上享有民眾的聲援與支持，英雄成為所有人嚮往的最棒職業。\r\n\r\n主角綠谷出久是個沒有個性的少年，但他仍憧憬並渴望成為一位英雄，也期望自己能進入培育英雄的菁英學校雄英高校就讀。但周圍的人都不看好沒有個性的他能成為英雄，讓他總是在他人的嘲笑與輕視中度過。直到他遇上了自己最仰慕的英雄，被人稱為「和平的象徵」的歐爾麥特，他的夢想將因此獲得會化為現實的可能性。', 13, 71, '06-11-17-20'),
(5, '航海王 第一季', 200, 'image/animate-航海王 第一季.jpg', '尾田榮一郎', '集英社', '有財富、名聲、勢力、擁有世界上的一切的「 海賊王 」哥爾·D·羅傑在即將遭到處刑前說了一段話：「 想要我的財寶嗎？想要的話可以全部給你。去找吧！我把所有的財寶都放在那裡！ 」後來世界上的人們將這個寶藏稱作「大秘寶」（ONE PIECE），為了爭奪大秘寶「ONE PIECE」，而先後爭相出海成為海賊，因此造就了「大海賊時代」。主角蒙其·D·魯夫為了要實現與「紅髮」傑克的約定而出海，在遙遠的路途上找尋著志同道合的夥伴，進入「偉大的航道」，目標是得到「ONE PIECE」與成為「海賊王」。\r\n\r\n本作品除了熱血的冒險故事以及戰鬥，背後也涵蓋許多反諷元素及現實觀點，包括「 戰爭的殘酷、種族歧視問題、政府的黑暗、人性善惡 」……等\r\n\r\n架空的故事世界，非常龐大豐富，含有許多童話、神話元素在其中：天空中夢幻的神域「空島」、充滿夢魘的「魔鬼三角地帶」、魚人及人魚的世界「魚人島」、動物王國「佐烏」、滿是甜食的國度「托特蘭王國」……等，大部分敵人設定性格殘忍，不擇手段。', 28, 43, '06-11-20-00'),
(6, '我的英雄學院 第二季', 250, 'image/animate-我的英雄學院 第二季.jpg', '堀越耕平', 'BONES', '這個世界從某一天開始，新生的人們突然開始展現出名為「個性」的特殊能力，本該只出現在架空故事中的超能力者成為現實的存在，讓整個人類社會陷入變化與動盪。在一片混亂之際，心懷邪念的人開始以「個性」為非作歹，而就在政府對這些突如其來的災禍束手無策之際，身負力量與正義感的人開始如同超人漫畫般的揭竿而起，展現正義的「英雄」也相繼而生。現今，有五分之四的人都擁有「個性」的超人社會儼然成形，為了對抗濫用「個性」於犯罪用途的罪犯，政府將英雄定位為特殊的公務職員，依其功績給予報酬。豐厚的報酬與體現正義的榮耀，加上享有民眾的聲援與支持，英雄成為所有人嚮往的最棒職業。\r\n\r\n主角綠谷出久是個沒有個性的少年，但他仍憧憬並渴望成為一位英雄，也期望自己能進入培育英雄的菁英學校雄英高校就讀。但周圍的人都不看好沒有個性的他能成為英雄，讓他總是在他人的嘲笑與輕視中度過。直到他遇上了自己最仰慕的英雄，被人稱為「和平的象徵」的歐爾麥特，他的夢想將因此獲得會化為現實的可能性。', 25, 42, '06-13-17-38'),
(7, '進擊的巨人 第一季', 200, 'image/animate-進擊的巨人 第一季.jpg', '諫山創', 'WIT STUDIO', '在故事開始前的一百年，巨大的類人生物「巨人」突然出現，毫無理由地消滅大半人類。殘餘的人類建造了三道同心圓高牆，最外圍的是「瑪利亞之牆」（ウォール・マリア）、中間是「羅塞之牆」（ウォール・ローゼ）、最內側是「席納之牆」（ウォール・シーナ），人類懷抱著搖搖欲墜的和平居住在牆內百年之久，許多人在牆內出生長大、不曾見過巨人。這一切在某一天起了變化，一個六十公尺的超大型巨人突襲了瑪利亞之牆、而另一個全身裝甲的盔甲巨人打碎了瑪利亞之牆通往牆外的城門，讓其它較小的巨人得以進入該區。人類放棄了瑪利亞之牆和羅塞之牆間的土地，撤離到內部區域，導致人口變得密集，產生動亂和饑荒。\r\n\r\n巨人是巨大的人型生物，身高通常在3至15公尺之間，他們的外觀看似成年男性，不過都沒有生殖器。他們似乎不需要食物，但會本能地捕吃人類，卻不會襲擊人類以外的其他生物。巨人沒有消化系統，他們吞掉人類後，體內的黏液會將之包裹為黏糊糊的球吐出。巨人的皮膚堅硬，能迅速再生，除了後頸這個唯一的弱點以外都難以造成永久傷害。\r\n\r\n人類為了對抗巨人而招募了三支兵團：故事的核心放在調查兵團（調査兵団），他們會策馬出擊，對充滿巨人的牆外世界進行調查，試圖奪回土地。由於調查兵團的傷亡率極高，但卻又鮮能勘查到實質有用的情報，所以經常受到民眾無情的嘲諷；第二支是人數最多的駐紮兵團（駐屯兵団），他們守衛牆內人民的和平；第三支部隊是憲兵團（憲兵団），他們負責守衛王室，由於工作相對輕鬆及安全性較高，導致了腐敗和許多政治弊病。士兵使用立體機動裝置（立体機動装置）作為武器，這是一個綁在腰上的多功能裝置，能發射鉤繩以便在樹木、屋頂和牆壁間移動，腰間有鞘放置雙刀，可以與巨人戰鬥。這項工具不利於在平坦土地上使用。', 25, 20, '06-13-20-08');

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(8) NOT NULL,
  `user_id` int(8) DEFAULT NULL,
  `animate_id` int(8) DEFAULT NULL,
  `cart_time` varchar(20) DEFAULT NULL,
  `cart_purchased` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `animate_id`, `cart_time`, `cart_purchased`) VALUES
(3, 1, 7, '06-14-16-45', 1),
(4, 1, 5, '06-15-17-56', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `feature`
--

CREATE TABLE `feature` (
  `feature_id` int(11) NOT NULL,
  `feature_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `feature`
--

INSERT INTO `feature` (`feature_id`, `feature_name`) VALUES
(1, '熱血'),
(2, '校園'),
(3, '奇幻'),
(4, '搞笑'),
(5, '日常'),
(6, '愛情');

-- --------------------------------------------------------

--
-- 資料表結構 `feature_detail`
--

CREATE TABLE `feature_detail` (
  `featureD_id` int(8) NOT NULL,
  `feature_id` int(8) DEFAULT NULL,
  `animate_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `feature_detail`
--

INSERT INTO `feature_detail` (`featureD_id`, `feature_id`, `animate_id`) VALUES
(5, 1, 5),
(6, 4, 5),
(16, 1, 4),
(17, 2, 4),
(18, 4, 4),
(19, 1, 6),
(20, 2, 6),
(21, 4, 6),
(22, 1, 7),
(23, 3, 7);

-- --------------------------------------------------------

--
-- 資料表結構 `love`
--

CREATE TABLE `love` (
  `love_id` int(8) NOT NULL,
  `user_id` int(8) DEFAULT NULL,
  `animate_id` int(8) DEFAULT NULL,
  `love_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `love`
--

INSERT INTO `love` (`love_id`, `user_id`, `animate_id`, `love_time`) VALUES
(22, 2, 5, '06-14-17-23'),
(23, 2, 6, '06-14-17-23'),
(36, 1, 6, '06-15-11-08'),
(37, 1, 4, '06-15-11-08'),
(38, 1, 5, '06-15-11-08');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` int(8) NOT NULL,
  `user_account` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_photo` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_money` int(8) NOT NULL,
  `user_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_password`, `user_photo`, `user_email`, `user_money`, `user_time`) VALUES
(1, 'root', 'admin', 'image/user-root.jpg', 's59654655@gmail.com', 10088, '06-11-14-21'),
(2, 'test', '123', 'image/user-test.jpg', 'adel.pasztor@gmail.com', 354, '06-11-14-27'),
(3, 'Kaguya0316', 'ndsbill0228', 'image/user-Kaguya0316.jpg', '', 999, '06-11-15-23'),
(4, 'mike', '1207', 'image/user-mike.jpg', '', 9500, '06-14-17-37');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `animate`
--
ALTER TABLE `animate`
  ADD PRIMARY KEY (`animate_id`);

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `animate_id` (`animate_id`);

--
-- 資料表索引 `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`feature_id`);

--
-- 資料表索引 `feature_detail`
--
ALTER TABLE `feature_detail`
  ADD PRIMARY KEY (`featureD_id`),
  ADD KEY `feature_id` (`feature_id`),
  ADD KEY `animate_id` (`animate_id`);

--
-- 資料表索引 `love`
--
ALTER TABLE `love`
  ADD PRIMARY KEY (`love_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `animate_id` (`animate_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `animate`
--
ALTER TABLE `animate`
  MODIFY `animate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `feature`
--
ALTER TABLE `feature`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `feature_detail`
--
ALTER TABLE `feature_detail`
  MODIFY `featureD_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- 使用資料表 AUTO_INCREMENT `love`
--
ALTER TABLE `love`
  MODIFY `love_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`animate_id`) REFERENCES `animate` (`animate_id`);

--
-- 資料表的 Constraints `feature_detail`
--
ALTER TABLE `feature_detail`
  ADD CONSTRAINT `feature_detail_ibfk_1` FOREIGN KEY (`feature_id`) REFERENCES `feature` (`feature_id`),
  ADD CONSTRAINT `feature_detail_ibfk_2` FOREIGN KEY (`animate_id`) REFERENCES `animate` (`animate_id`);

--
-- 資料表的 Constraints `love`
--
ALTER TABLE `love`
  ADD CONSTRAINT `love_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `love_ibfk_2` FOREIGN KEY (`animate_id`) REFERENCES `animate` (`animate_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
