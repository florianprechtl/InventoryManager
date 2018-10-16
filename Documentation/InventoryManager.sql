CREATE TABLE `User` (
	`UserNr` DECIMAL NOT NULL AUTO_INCREMENT,
	`Name` VARCHAR(255) NOT NULL,
	`Password` varchar NOT NULL,
	`Age` DECIMAL NOT NULL,
	`Weight` FLOAT NOT NULL,
	`Sex` BINARY NOT NULL,
	`MemberSince` DATE NOT NULL,
	PRIMARY KEY (`UserNr`)
);

CREATE TABLE `InventoryList` (
	`InventoryEntryNr` DECIMAL NOT NULL AUTO_INCREMENT,
	`UserNr` DECIMAL NOT NULL,
	`InventoryNr` DECIMAL NOT NULL,
	`ProductNr` DECIMAL NOT NULL,
	`Amount` FLOAT NOT NULL,
	`ExpiringDate` DATE NOT NULL,
	`BuyingDate` DATE NOT NULL,
	`Status` varchar NOT NULL,
	PRIMARY KEY (`InventoryEntryNr`)
);

CREATE TABLE `Inventory` (
	`InventoryNr` DECIMAL NOT NULL AUTO_INCREMENT,
	`Name` VARCHAR(255) NOT NULL,
	`Description` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`InventoryNr`)
);

CREATE TABLE `Product` (
	`ProductNr` DECIMAL NOT NULL AUTO_INCREMENT,
	`Name` VARCHAR(255) NOT NULL,
	`Description` VARCHAR(255) NOT NULL,
	`Unit` varchar NOT NULL,
	`ImageName` varchar NOT NULL,
	`ProductgroupNr` DECIMAL NOT NULL,
	PRIMARY KEY (`ProductNr`)
);

CREATE TABLE `Productgroup` (
	`ProdgroupNr` DECIMAL NOT NULL AUTO_INCREMENT,
	`Name` VARCHAR(255) NOT NULL AUTO_INCREMENT,
	`Description` VARCHAR(255) NOT NULL AUTO_INCREMENT,
	`NameShort` VARCHAR(255) NOT NULL AUTO_INCREMENT,
	`IconName` VARCHAR(255) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`ProdgroupNr`)
);

ALTER TABLE `InventoryList` ADD CONSTRAINT `InventoryList_fk0` FOREIGN KEY (`UserNr`) REFERENCES `User`(`UserNr`);

ALTER TABLE `InventoryList` ADD CONSTRAINT `InventoryList_fk1` FOREIGN KEY (`InventoryNr`) REFERENCES `Inventory`(`InventoryNr`);

ALTER TABLE `InventoryList` ADD CONSTRAINT `InventoryList_fk2` FOREIGN KEY (`ProductNr`) REFERENCES `Product`(`ProductNr`);

ALTER TABLE `Product` ADD CONSTRAINT `Product_fk0` FOREIGN KEY (`ProductgroupNr`) REFERENCES `Productgroup`(`ProdgroupNr`);

