-- Table structure for table `inventory`
CREATE TABLE `inventory` (
  `InventoryNr` int(11) NOT NULL,
  `Name` char(20) NOT NULL,
  `Description` char(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Table structure for table `inventoryentry`
CREATE TABLE `inventoryentry` (
  `InventoryEntryNr` int(11) NOT NULL,
  `InventoryNr` int(11) NOT NULL,
  `ProductNr` int(11) NOT NULL,
  `UserNr` int(11) NOT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Unit` varchar(10) DEFAULT NULL,
  `BuyingDate` date DEFAULT NULL,
  `ExpiringDate` date DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Table structure for table `inventoryusermatrix`
CREATE TABLE `inventoryusermatrix` (
  `MatrixNr` int(11) NOT NULL,
  `InventoryNr` int(11) NOT NULL,
  `UserNr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Table structure for table `product`
CREATE TABLE `product` (
  `ProdNr` int(11) NOT NULL,
  `ProdgrNr` int(11) DEFAULT NULL,
  `Name` char(30) NOT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Table structure for table `productgroup`
CREATE TABLE `productgroup` (
  `ProdgrNr` int(11) NOT NULL,
  `Name` char(30) NOT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `NameShort` char(4) DEFAULT NULL,
  `IconName` varchar(30) DEFAULT NULL,
  `IconExtension` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Table structure for table `user`
CREATE TABLE `user` (
  `UserNr` int(11) NOT NULL,
  `Username` char(30) NOT NULL,
  `Firstname` char(30) NOT NULL,
  `Lastname` char(30) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Sex` char(1) DEFAULT NULL,
  `MemberSince` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- -------------------------------------------------------------------------------------
-- Primary and foreign keys

-- Indexes for table `inventory`
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`InventoryNr`);

-- Indexes for table `inventoryentry`
ALTER TABLE `inventoryentry`
  ADD PRIMARY KEY (`InventoryEntryNr`),
  ADD KEY `FK_InventoryNr` (`InventoryNr`),
  ADD KEY `FK_ProductNr` (`ProductNr`),
  ADD KEY `FK_UserNr` (`UserNr`);

-- Indexes for table `inventoryusermatrix`
ALTER TABLE `inventoryusermatrix`
  ADD PRIMARY KEY (`MatrixNr`),
  ADD KEY `FK_Inventory` (`InventoryNr`),
  ADD KEY `FK_User` (`UserNr`);

-- Indexes for table `product`
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProdNr`),
  ADD KEY `FK_ProdgrNr` (`ProdgrNr`);

-- Indexes for table `productgroup`
ALTER TABLE `productgroup`
  ADD PRIMARY KEY (`ProdgrNr`);

-- Indexes for table `user`
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserNr`),
  ADD UNIQUE KEY `Name` (`Username`);
  
  
  
-- -------------------------------------------------------------------------------------
-- Auto increments for tables

-- AUTO_INCREMENT for table `inventory`
ALTER TABLE `inventory`
  MODIFY `InventoryNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
  
  
-- AUTO_INCREMENT for table `inventoryentry`
ALTER TABLE `inventoryentry`
  MODIFY `InventoryEntryNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
  
  
-- AUTO_INCREMENT for table `inventoryusermatrix`
ALTER TABLE `inventoryusermatrix`
  MODIFY `MatrixNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
  
  
-- AUTO_INCREMENT for table `product`
ALTER TABLE `product`
  MODIFY `ProdNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
  
  
-- AUTO_INCREMENT for table `productgroup`
ALTER TABLE `productgroup`
  MODIFY `ProdgrNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
  
  
-- AUTO_INCREMENT for table `user`
ALTER TABLE `user`
  MODIFY `UserNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;



-- -------------------------------------------------------------------------------------
-- Contraints for tables

-- Constraints for table `inventoryentry`
ALTER TABLE `inventoryentry`
  ADD CONSTRAINT `FK_InventoryNr` FOREIGN KEY (`InventoryNr`) REFERENCES `inventory` (`InventoryNr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ProductNr` FOREIGN KEY (`ProductNr`) REFERENCES `product` (`ProdNr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UserNr` FOREIGN KEY (`UserNr`) REFERENCES `user` (`UserNr`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Constraints for table `inventoryusermatrix`
ALTER TABLE `inventoryusermatrix`
  ADD CONSTRAINT `FK_Inventory` FOREIGN KEY (`InventoryNr`) REFERENCES `inventory` (`InventoryNr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_User` FOREIGN KEY (`UserNr`) REFERENCES `user` (`UserNr`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Constraints for table `product`
ALTER TABLE `product`
  ADD CONSTRAINT `FK_ProdgrNr` FOREIGN KEY (`ProdgrNr`) REFERENCES `productgroup` (`ProdgrNr`) ON DELETE NO ACTION ON UPDATE CASCADE;

