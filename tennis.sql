-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2026-10-01 00:46:24
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `tennis`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `bbs`
--

CREATE TABLE `bbs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `body` text COLLATE utf8mb4_bin NOT NULL,
  `date` datetime NOT NULL,
  `pass` char(4) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `bbs`
--

INSERT INTO `bbs` (`id`, `name`, `title`, `body`, `date`, `pass`) VALUES
(1, 'すだ', 'aaa', 'ええ', '2026-07-10 11:17:38', '1111'),
(2, '須田圭一', NULL, '', '2026-07-10 02:19:13', ''),
(3, 'A', NULL, '', '2026-07-10 02:20:07', ''),
(4, 'B', NULL, '', '2026-07-10 02:20:15', ''),
(5, 'C', NULL, '', '2026-07-10 02:20:23', ''),
(6, 'すだ', 'ああ', 'ああ', '2026-07-24 12:07:11', '3333'),
(7, 'aa', 'aa', 'aa', '2026-07-24 12:19:46', '4444'),
(8, '5555', '4444', '5555', '2026-07-24 12:19:59', '5555'),
(9, '666', '6666', '666', '2026-07-24 12:20:06', '6666'),
(10, '777', '7777', '777', '2026-07-24 12:20:14', '7777'),
(11, '888', '8888', '888', '2026-07-24 12:20:23', '8888');

-- --------------------------------------------------------

--
-- テーブルの構造 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `newsdate` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `gidai` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `bikou` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `news`
--

INSERT INTO `news` (`id`, `title`, `newsdate`, `place`, `gidai`, `bikou`) VALUES
(6, 'お知らせ', 'あ', '', '', ''),
(7, 'title', 'news', 'place', 'a', 'a'),
(8, '', '', '', '', '');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `bbs`
--
ALTER TABLE `bbs`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `bbs`
--
ALTER TABLE `bbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
