CREATE TABLE `muro` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `text` text,
  `insertdate` datetime default NULL,
  PRIMARY KEY  (`id`)
);
