CREATE TABLE Inventory (
 InventroyNr INT NOT NULL,
 Name CHAR(10) NOT NULL,
 Description CHAR(10)
);

ALTER TABLE Inventory ADD CONSTRAINT PK_Inventory PRIMARY KEY (InventroyNr);


CREATE TABLE Productgroup (
 ProdgrNr INT NOT NULL,
 Name CHAR(30) NOT NULL,
 Description VARCHAR(10),
 NameShort CHAR(4),
 IconName VARCHAR(30),
 IconExtension VARCHAR(10)
);

ALTER TABLE Productgroup ADD CONSTRAINT PK_Productgroup PRIMARY KEY (ProdgrNr);


CREATE TABLE User (
 UserNr INT NOT NULL,
 Name CHAR(30) NOT NULL,
 Password CHAR(30) NOT NULL,
 Age INT,
 Sex CHAR(5),
 MemberSince DATE NOT NULL
);

ALTER TABLE User ADD CONSTRAINT PK_User PRIMARY KEY (UserNr);


CREATE TABLE Product (
 ProductNr INT NOT NULL,
 ProdgrNr INT NOT NULL,
 Name CHAR(30) NOT NULL,
 Description VARCHAR(1000),
 Unit CHAR(10),
 ImageName VARCHAR(10),
 ImageExtension VARCHAR(10)
);

ALTER TABLE Product ADD CONSTRAINT PK_Product PRIMARY KEY (ProductNr,ProdgrNr);


CREATE TABLE InventoryList (
 InventoryListNr INT NOT NULL,
 UserNr INT NOT NULL,
 ProductNr INT NOT NULL,
 InventroyNr INT NOT NULL,
 ProdgrNr INT NOT NULL,
 Amount INT,
 ExpiringDate DATE WITH TIME ZONE,
 BuyingDate DATE WITH TIME ZONE,
 Status CHAR(5)
);

ALTER TABLE InventoryList ADD CONSTRAINT PK_InventoryList PRIMARY KEY (InventoryListNr,UserNr,ProductNr,InventroyNr,ProdgrNr);


ALTER TABLE Product ADD CONSTRAINT FK_Product_0 FOREIGN KEY (ProdgrNr) REFERENCES Productgroup (ProdgrNr);


ALTER TABLE InventoryList ADD CONSTRAINT FK_InventoryList_0 FOREIGN KEY (UserNr) REFERENCES User (UserNr);
ALTER TABLE InventoryList ADD CONSTRAINT FK_InventoryList_1 FOREIGN KEY (ProductNr,ProdgrNr) REFERENCES Product (ProductNr,ProdgrNr);
ALTER TABLE InventoryList ADD CONSTRAINT FK_InventoryList_2 FOREIGN KEY (InventroyNr) REFERENCES Inventory (InventroyNr);


