-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 15. Nov 2018 um 22:03
-- Server-Version: 5.7.24-0ubuntu0.16.04.1
-- PHP-Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `papi`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `advertisements`
--

CREATE TABLE `advertisements` (
  `ad_id` int(11) NOT NULL,
  `adfromaccount` int(11) NOT NULL,
  `adfromdate` date NOT NULL,
  `adfromtime` text NOT NULL,
  `adtodate` date NOT NULL,
  `adtotime` text NOT NULL,
  `adtitle` text NOT NULL,
  `adtext` text NOT NULL,
  `adpicture` text NOT NULL,
  `adrunning` int(11) NOT NULL,
  `adfinished` int(11) NOT NULL,
  `addeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `excerp` text NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `author` text NOT NULL,
  `datapath` text NOT NULL,
  `filename` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `department` text NOT NULL,
  `leading_user` text NOT NULL,
  `finish_date` date NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `finish_time` text NOT NULL,
  `create_time` text NOT NULL,
  `update_time` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_by` int(11) NOT NULL,
  `description` text NOT NULL,
  `deleted` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `file_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth`
--

CREATE TABLE `auth` (
  `auth_id` int(11) NOT NULL,
  `page` text NOT NULL,
  `authlevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `auth`
--

INSERT INTO `auth` (`auth_id`, `page`, `authlevel`) VALUES
(1, 'index.php', 0),
(2, 'accounts.php', 1),
(3, 'announcements.php', 0),
(4, 'events.php', 0),
(5, 'file-manager.php', 0),
(6, 'matches.php', 0),
(7, 'player-database.php', 0),
(8, 'press-releases.php', 0),
(9, 'profile.php', 0),
(10, 'blank.php', 3),
(11, 'settings.php', 2),
(12, 'tasks.php', 0),
(13, 'teams.php', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `member` text NOT NULL,
  `description` text NOT NULL,
  `removed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `game` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `link` text NOT NULL,
  `logo` text NOT NULL,
  `todate` date NOT NULL,
  `totime` text NOT NULL,
  `display` int(11) NOT NULL,
  `finished` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fm_files`
--

CREATE TABLE `fm_files` (
  `fileid` int(11) NOT NULL,
  `filename` text NOT NULL,
  `path` text NOT NULL,
  `size` text NOT NULL,
  `uploaddate` date NOT NULL,
  `uploadtime` text NOT NULL,
  `uploadfrom` text NOT NULL,
  `infolder` int(11) NOT NULL,
  `filetype` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fm_folder`
--

CREATE TABLE `fm_folder` (
  `folderid` int(11) NOT NULL,
  `foldername` text NOT NULL,
  `folderisinfolderid` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fm_sp_files`
--

CREATE TABLE `fm_sp_files` (
  `fileid` int(11) NOT NULL,
  `filename` text NOT NULL,
  `path` text NOT NULL,
  `size` text NOT NULL,
  `uploaddate` date NOT NULL,
  `uploadtime` text NOT NULL,
  `uploadfrom` text NOT NULL,
  `infolder` int(11) NOT NULL,
  `filetype` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fm_sp_folder`
--

CREATE TABLE `fm_sp_folder` (
  `folderid` int(11) NOT NULL,
  `foldername` text NOT NULL,
  `folderisinfolderid` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `identifier` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `company` text NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `status` int(11) NOT NULL,
  `saveurl` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `game` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `team1` text NOT NULL,
  `team2` text NOT NULL,
  `score1` int(11) NOT NULL,
  `score2` int(11) NOT NULL,
  `league` text NOT NULL,
  `link` text NOT NULL,
  `streamlink` text NOT NULL,
  `deleted` int(11) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `member`
--

CREATE TABLE `member` (
  `mem_id` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `nickname` text NOT NULL,
  `phoneno` text NOT NULL,
  `city` text NOT NULL,
  `plz` int(11) NOT NULL,
  `street` text NOT NULL,
  `streetno` int(11) DEFAULT NULL,
  `country` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL,
  `avatar` text NOT NULL,
  `xing` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `department` text NOT NULL,
  `deleted` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `activitydate_at` date DEFAULT NULL,
  `activitytime_at` text,
  `salt` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `member`
--

INSERT INTO `member` (`mem_id`, `username`, `lastname`, `firstname`, `nickname`, `phoneno`, `city`, `plz`, `street`, `streetno`, `country`, `email`, `password`, `role`, `avatar`, `xing`, `facebook`, `twitter`, `department`, `deleted`, `deletedby`, `created_at`, `updated_at`, `birthday`, `activitydate_at`, `activitytime_at`, `salt`) VALUES
(10001, 'admin', 'Mustermann', 'Max', 'admin', '', '', 99999, '', 99, '', 'admin@test.com', '0192023a7bbd73250516f069df18b500', 5, '../images/no-avatar.jpg', '', '', '', '', 0, 0, '2018-11-01', NULL, '2018-11-01', '2018-11-15', '20:59', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `option_url` text NOT NULL,
  `option_name` text NOT NULL,
  `option_logolarge` text NOT NULL,
  `option_logocompact` text NOT NULL,
  `option_favicon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `options`
--

INSERT INTO `options` (`option_id`, `option_url`, `option_name`, `option_logolarge`, `option_logocompact`, `option_favicon`) VALUES
(1, 'app.yoap.de', 'YOAP', '', 'https://app.yoap.de/plugins/images/admin-logo-dark.png', 'https://app.yoap.de/plugins/images/favicon.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `players`
--

CREATE TABLE `players` (
  `pl_id` int(11) NOT NULL,
  `nickname` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `phoneno` text NOT NULL,
  `birthday` date NOT NULL,
  `city` text NOT NULL,
  `plz` int(11) NOT NULL,
  `street` text NOT NULL,
  `streetno` int(11) NOT NULL,
  `country` text NOT NULL,
  `email` text NOT NULL,
  `avatar` text NOT NULL,
  `clothing_size` text NOT NULL,
  `notes` text NOT NULL,
  `twitter` text NOT NULL,
  `facebook` text NOT NULL,
  `department` text NOT NULL,
  `created_at` date NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `press_releases`
--

CREATE TABLE `press_releases` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `date` date NOT NULL,
  `title` text NOT NULL,
  `area` text NOT NULL,
  `excerp` text NOT NULL,
  `url` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reportings`
--

CREATE TABLE `reportings` (
  `id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `title` text NOT NULL,
  `author` int(11) NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `type` int(11) NOT NULL,
  `saveurl` text NOT NULL,
  `text` text NOT NULL,
  `event` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sm_database`
--

CREATE TABLE `sm_database` (
  `sm_id` int(11) NOT NULL,
  `t_access_token` text NOT NULL,
  `t_access_token_secret` text NOT NULL,
  `t_consumer_key` text NOT NULL,
  `t_consumer_secret` text NOT NULL,
  `t_name` text NOT NULL,
  `f_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `sm_database`
--

INSERT INTO `sm_database` (`sm_id`, `t_access_token`, `t_access_token_secret`, `t_consumer_key`, `t_consumer_secret`, `t_name`, `f_name`) VALUES
(1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sponsors`
--

CREATE TABLE `sponsors` (
  `sp_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text NOT NULL,
  `rootdir` int(11) NOT NULL,
  `ad_count` int(11) NOT NULL,
  `ad_time` text NOT NULL,
  `ad_running` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stats_twitter`
--

CREATE TABLE `stats_twitter` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `follower` int(11) NOT NULL,
  `tweets` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `friends` int(11) NOT NULL,
  `timestamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `stats_twitter`
--

INSERT INTO `stats_twitter` (`id`, `date`, `follower`, `tweets`, `likes`, `friends`, `timestamp`) VALUES
(1, '2018-11-15', 3439, 1699, 1477, 45, '20:41');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `fromuser` int(11) NOT NULL,
  `touser` text NOT NULL,
  `assigneduser` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `fromtime` text NOT NULL,
  `totime` text NOT NULL,
  `importance` int(11) NOT NULL,
  `finished` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `identifier` text NOT NULL,
  `logo` text NOT NULL,
  `country` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indizes für die Tabelle `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indizes für die Tabelle `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `fm_files`
--
ALTER TABLE `fm_files`
  ADD PRIMARY KEY (`fileid`);

--
-- Indizes für die Tabelle `fm_folder`
--
ALTER TABLE `fm_folder`
  ADD PRIMARY KEY (`folderid`);

--
-- Indizes für die Tabelle `fm_sp_files`
--
ALTER TABLE `fm_sp_files`
  ADD PRIMARY KEY (`fileid`),
  ADD UNIQUE KEY `fileid` (`fileid`);

--
-- Indizes für die Tabelle `fm_sp_folder`
--
ALTER TABLE `fm_sp_folder`
  ADD PRIMARY KEY (`folderid`);

--
-- Indizes für die Tabelle `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indizes für die Tabelle `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indizes für die Tabelle `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indizes für die Tabelle `press_releases`
--
ALTER TABLE `press_releases`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `reportings`
--
ALTER TABLE `reportings`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `sm_database`
--
ALTER TABLE `sm_database`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indizes für die Tabelle `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indizes für die Tabelle `stats_twitter`
--
ALTER TABLE `stats_twitter`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `auth`
--
ALTER TABLE `auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT für Tabelle `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `fm_files`
--
ALTER TABLE `fm_files`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `fm_folder`
--
ALTER TABLE `fm_folder`
  MODIFY `folderid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `fm_sp_files`
--
ALTER TABLE `fm_sp_files`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `fm_sp_folder`
--
ALTER TABLE `fm_sp_folder`
  MODIFY `folderid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
--
-- AUTO_INCREMENT für Tabelle `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `players`
--
ALTER TABLE `players`
  MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `press_releases`
--
ALTER TABLE `press_releases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `reportings`
--
ALTER TABLE `reportings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `sm_database`
--
ALTER TABLE `sm_database`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `stats_twitter`
--
ALTER TABLE `stats_twitter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
