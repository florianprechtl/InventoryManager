

INSERT INTO `user` (`UserNr`, `Username`, `Firstname`, `Lastname`, `Password`, `Age`, `Sex`, `MemberSince`) VALUES
(1, 'Pierro', 'Pierre', 'Presi', 'pi', 31, 'm', '2018-03-13'),
(2, 'Juju', 'Julia', 'Martoc', 'maju', 21, 'm', '2018-06-16'),
(3, 'Jacky', 'Jack', 'Lefeu', 'jackychan', 22, 'f', '2018-02-17'),
(4, 'Bobby', 'Bob', 'Chocoty', 'chocolate', 25, 'm', '2018-03-23'),
(5, 'Mama', 'Marie', 'Candola', 'mamamia', 45, 'm', '2018-01-01'),
(6, 'Hub', 'Hubert', 'Poutru', 'boat', 79, 'm', '2018-05-07'),

INSERT INTO `product` (`ProdNr`, `ProdgrNr`, `Name`, `Description`, `Unit`, `Image`) VALUES
(1, NULL, 'Cheese', 'Nice taste', 'g', '1541101204.png'),
(2, NULL, 'Tomato', 'Superb', 'g', '1541151151.png'),
(3, NULL, 'Leek', 'I love those leeks', 'g', '1541151195.png'),
(4, NULL, 'Banana', 'good', 'g', '1541151231.png'),
(5, NULL, 'Meat', 'proteins', 'kg', '1541151264.png'),
(6, NULL, 'Apple', 'good', 'g', '1541151295.png'),
(7, NULL, 'Butter', 'important', 'g', '1541151362.png'),
(8, NULL, 'Strawberries', 'My favorite fruit', 'g', '1541151418.png'),
(9, NULL, 'Pineapple', 'For pizza', 'st', '1541151580.png'),
(10, NULL, 'Eggs', 'I discern those by boxes', 'box of 6', '1541151656.png'),
(11, NULL, 'Yogurt', 'nature yogurts', 'pot', '1541430140.png'),
(12, NULL, 'Ham', 'no comment', 'g', '1541700292.png');
(13, NULL, 'Milk', 'semi', 'l', '1541700292.png');

INSERT INTO `inventory` (`InventoryNr`, `Name`, `Description`) VALUES
(1, 'First Inventory', 'This is the first'),
(2, 'Second Inventory', 'This is the second'),
(3, 'Third Inventory', 'This is the third');


INSERT INTO `inventoryentry` (`InventoryEntryNr`, `InventoryNr`, `ProductNr`, `UserNr`, `Amount`, `BuyingDate`, `ExpiringDate`, `Status`) VALUES
(1, 1, 6, 1, 10, '2018-10-22', '2018-11-03', 0),
(2, 1, 4, 1, 3, '2018-01-12', '2018-01-16', 1),
(3, 1, 7, 1, 12, '2018-03-03', '2018-03-12', NULL),
(4, 3, 9, 1, 4, '2018-06-01', '2018-06-15', NULL),
(5, 2, 5, 1, 1, '2018-07-07', '2018-07-21', 1),
(6, 2, 1, 2, 5, '2018-11-13', '2018-11-29', 0),
(7, 2, 8, 3, 2, '2018-11-15', '2018-11-22', 0),
(8, 3, 2, 2, 3, '2018-10-16', '2018-11-09', 1),
(9, 3, 3, 1, 6, '2018-09-12', '2018-10-29', NULL),
(10, 1, 11, 1, 11, '2018-09-08', '2018-11-05', NULL);

