create database assignment_db;

use assignment_db;

CREATE TABLE `tbl_options` (
    `option_id` int(11) NOT NULL auto_increment,
    `option_name` varchar(100) NOT NULL,
    `option_description` varchar(500) NOT NULL,
  PRIMARY KEY  (`option_id`)
);

CREATE TABLE `tbl_corps` (
    `corps_id` int(11) NOT NULL auto_increment,
    `corps_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`corps_id`)
);

CREATE TABLE `tbl_corps_options` (
    `id` int(11) NOT NULL auto_increment,
    `corps_id` int(11) NOT NULL,
    `option_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
);