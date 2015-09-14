-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 14-Set-2015 às 14:54
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `314`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `id_code` int(11) NOT NULL,
  `title` varchar(233) NOT NULL,
  `author` varchar(233) NOT NULL,
  `content` text NOT NULL,
  `description` text NOT NULL,
  `img` varchar(233) NOT NULL,
  `hank` int(11) NOT NULL,
  `author_version` varchar(233) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `code`
--

INSERT INTO `code` (`id_code`, `title`, `author`, `content`, `description`, `img`, `hank`, `author_version`) VALUES
(2, 'Notification.js\n    ', '', '\n\n$(function(){\n    $(''body'').prepend(''<!-- div de notificaÃ§Ãµes --><div class="alert alert-success alert-dismissable notification"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">Ã—</button><strong></strong></div><!-- /div de notificaÃ§Ãµes -->'');\n});\nvar notification = {\n    "ok": function(sms){\n        $(''.notification'').css({backgroundColor: ''#b9df90'', color: ''white''}).fadeIn(''slow'');\n        $(''.notification strong'').html(sms);\n\n        setTimeout(function(){\n            $(''.notification'').fadeOut();\n        }, 5000);\n    },\n    "error": function(sms){\n        $(''.notification'').css({backgroundColor: ''#F44336'', color: ''white''}).fadeIn(''slow'');\n        $(''.notification strong'').html(sms);\n\n        setTimeout(function(){\n            $(''.notification'').fadeOut();\n        }, 5000);\n    },\n    "loading": function(sms){\n        $(''.notification'').css({backgroundColor: ''#FFEB3B'', color: ''#1c1c1c''}).fadeIn(''slow'');\n        $(''.notification strong'').html(sms);\n\n        setTimeout(function(){\n            $(''.notification'').fadeOut();\n        }, 5000);\n    }\n};\n', 'este api Ã© responsavel por fazer chamadas de notificaÃ§Ãµes como alertas, success, error ... ele necessita de um trecho em html para funcionar \n', '', 0, ''),
(3, 'joerver show\n ', '', '\n\n$(function(){\n    setInterval(function(){\n        alert(''show'');\n    },100);\n});', 'joerver show dfasd asd sd asdasd asdsd ', '', 0, ''),
(4, 'joerver show\n ', '', '\n\n$(function(){\n    setInterval(function(){\n        alert(''show'');\n    },100);\n});', 'joerver show dfasd asd sd asdasd asdsd ', '', 0, ''),
(5, 'joerver show\n ', '', '\n\n$(function(){\n    setInterval(function(){\n        alert(''show'');\n    },100);\n});', 'joerver show dfasd asd sd asdasd asdsd ', '', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `code_versioning`
--

CREATE TABLE IF NOT EXISTS `code_versioning` (
  `id_code_vers` int(11) NOT NULL,
  `author_version` varchar(233) NOT NULL,
  `content` text NOT NULL,
  `dt_versioning` date NOT NULL,
  `fk_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id_links` int(11) NOT NULL,
  `title` varchar(233) NOT NULL,
  `description` varchar(233) NOT NULL,
  `url` varchar(233) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `links`
--

INSERT INTO `links` (`id_links`, `title`, `description`, `url`) VALUES
(1, 'material icons', 'esse site tem varios icons usado no material desiner da google Ã© bem legal', 'https://www.google.com/design/icons/'),
(2, 'Gerador de QR code', 'tem tbm api sobre qr code, ale de read, and create of qr code', 'http://goqr.me/'),
(3, 'plugin para criaÃ§Ã£o de tutorial de sistemas e site ', 'muito bom, legal e facil de usar, ele Ã© basicamente para ensinar oq cada coisa no site/sistema faz', 'http://eragonj.github.io/Trip.js/'),
(4, 'Ideia minha', 'que tal fazer um ssitema que pode olhar uma imagem de alguem e depois ele gera um bonequinho semelhante a desse link, tipo ele sÃ³ vai olhar as caracteristicas e depois montar o personagem.. tipo a pessoa na foto tem tal cor, tem big', 'http://musicemojis.tumblr.com/'),
(5, 'Gostei geral da ideia do site', '', 'http://www.jonikorpi.com/'),
(6, 'Linguagem C', 'Apostilas e varias coisas relacionadas a linguagem C', 'http://equipe.nce.ufrj.br/adriano/c/apostila/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL,
  `url` varchar(233) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `slider`
--

INSERT INTO `slider` (`id_slider`, `url`) VALUES
(1, 'tumblr_nugarh0Kql1ti4wako1_540.gif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `id_tipo` int(11) NOT NULL,
  `name_cat` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `name_cat`) VALUES
(0, 'Administrador'),
(1, 'Artigos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(234) NOT NULL,
  `email` varchar(234) NOT NULL,
  `pass` varchar(234) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `pass`, `id_tipo`) VALUES
(1, 'joe', 'joe@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id_code`);

--
-- Indexes for table `code_versioning`
--
ALTER TABLE `code_versioning`
  ADD PRIMARY KEY (`id_code_vers`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id_links`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `code_versioning`
--
ALTER TABLE `code_versioning`
  MODIFY `id_code_vers` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id_links` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
