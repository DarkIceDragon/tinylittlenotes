
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- tln_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tln_category`;


CREATE TABLE `tln_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `tln_category_U_1` (`name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tln_person
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tln_person`;


CREATE TABLE `tln_person`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`first` VARCHAR(255),
	`last` VARCHAR(255),
	`nickname` VARCHAR(255),
	`image_name` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
