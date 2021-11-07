-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Dim 18 Octobre 2009 à 10:23
-- Version du serveur: 5.0.45
-- Version de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de données: `site`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `admins`
-- 

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  `level` int(11) NOT NULL default '0',
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Contenu de la table `admins`
-- 

INSERT INTO `admins` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `banners`
-- 

CREATE TABLE `banners` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(225) NOT NULL default '',
  `link` text NOT NULL,
  `photo` text NOT NULL,
  `type` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Contenu de la table `banners`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `catagories`
-- 

CREATE TABLE `catagories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(225) NOT NULL default '',
  `level` int(11) NOT NULL default '0',
  `main_catagory` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Contenu de la table `catagories`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `config`
-- 

CREATE TABLE `config` (
  `id` int(2) NOT NULL auto_increment,
  `sitename` varchar(225) NOT NULL default '',
  `siteurl` text NOT NULL,
  `forum` text NOT NULL,
  `keywords` text NOT NULL,
  `notes` text NOT NULL,
  `visits` int(20) NOT NULL default '0',
  `pagesnum` int(255) NOT NULL,
  `style` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Contenu de la table `config`
-- 

INSERT INTO `config` VALUES (1, 'Ø´Ø±ÙƒØ© Ø§Ù„Ø¹Ø¯Ù„', 'http://www.wadi-mousa.net', 'http://www.wadi-mousa.net/vb', '  ', 'www.wadi-mousa.net', 47, 21, 'blue');

-- --------------------------------------------------------

-- 
-- Structure de la table `online`
-- 

CREATE TABLE `online` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `ip` varchar(15) character set latin1 collate latin1_general_ci NOT NULL default '',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Contenu de la table `online`
-- 

INSERT INTO `online` VALUES (1, '127.0.0.1', '0000-00-00 00:00:00');
INSERT INTO `online` VALUES (2, '62.231.203.233', '2012-01-13 19:35:00');

-- --------------------------------------------------------

-- 
-- Structure de la table `products`
-- 

CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `photo` text NOT NULL,
  `date` int(20) NOT NULL default '0',
  `words` text NOT NULL,
  `vb` varchar(255) NOT NULL,
  `shortdes` text NOT NULL,
  `visits` int(11) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  `valid` int(2) NOT NULL default '1',
  `sticky` int(2) NOT NULL default '2',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Contenu de la table `products`
-- 

