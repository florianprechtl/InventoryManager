INSERT INTO `inventory` (`InventoryNr`, `Name`, `Description`) VALUES
(1, 'Test Inventory', 'that\'S just a test inventory'),
(2, 'Second Test', 'u,imznthbrgcdw'),
(3, 'Third Test', 'u,imznthbrgcdw'),
(8, 'test', 'test'),
(9, 'Another fridge', 'just another fridge');


-- --------------------------------------------------------


INSERT INTO `product` (`ProdNr`, `ProdgrNr`, `Name`, `Description`, `Image`) VALUES
(42, NULL, 'Tomato', 'The tomato (see pronunciation) is the edible, often red, berry of the nightshade Solanum lycopersicum, commonly known as a tomato plant', '1541151151.png'),
(43, NULL, 'Leek', 'The leek is a vegetable, a cultivar of Allium ampeloprasum, the broadleaf wild leek', '1541151195.png'),
(44, NULL, 'Banana', 'An elongated curved tropical fruit that grows in bunches and has a creamy flesh and a smooth skin', '1541151231.png'),
(45, NULL, 'Meat', 'Meat is animal flesh that is eaten as food. Humans have hunted and killed animals for meat since prehistoric times', '1541151264.png'),
(46, NULL, 'Aple', 'An apple is a sweet, edible fruit produced by an apple tree (Malus pumila). Apple trees are cultivated worldwide, and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today', '1541151295.png'),
(47, NULL, 'Butter', 'Butter is a dairy product containing up to 80% butterfat (in commercial products) which is solid when chilled and at room temperature in some regions, and liquid when warmed. It is made by churning fresh or fermented cream or milk to separate the butterfat from the buttermilk. It is generally used as a spread on plain or toasted bread products and a condiment on cooked vegetables, as well as in cooking, such as baking, sauce making, and pan frying.', '1541151362.png'),
(48, NULL, 'Toast', 'Toast is sliced bread that has been browned by exposure to radiant heat. This browning is the result of a Maillard reaction altering the flavor of the bread and making it firmer so that it is easier to spread toppings on it. Toasting is a common method of making stale bread more palatable. Bread is often toasted using a toaster, but toaster ovens are also used. ', '1541151418.png'),
(49, NULL, 'Fleischpflanzl', 'Zur Zubereitung wird zuerst Hackfleisch (in der Regel gemischtes aus Rind und Schwein) mit Ei und gehackten und eventuell auch vorgedünsteten Zwiebeln vermengt. Altbackene Brötchen oder Toastscheiben werden in Wasser, Milch oder Sahne eingeweicht und anschließend ausgepresst und in die Fleischmasse geknetet. Teilweise wird auch statt dessen Paniermehl verwendet. Danach werden je nach Geschmacksrichtung verschiedene Gewürze wie Salz, Pfeffer, Petersilie, Majoran und evtl. Muskat untergemengt.', '1541151580.png'),
(50, NULL, 'Tea', 'Tea is an aromatic beverage commonly prepared by pouring hot or boiling water over cured leaves of the Camellia sinensis, an evergreen shrub (bush) native to Asia. After water, it is the most widely consumed drink in the world. There are many different types of tea; some, like Darjeeling and Chinese greens, have a cooling, slightly bitter, and astringent flavour, while others have vastly different profiles that include sweet, nutty, floral or grassy notes. ', '1541151656.png'),
(57, NULL, 'Bread', 'Bread is a staple food prepared from a dough of flour and water, usually by baking. Throughout recorded history it has been a prominent food in large parts of the world and is one of the oldest man-made foods, having been of significant importance since the dawn of agriculture.  Bread may be leavened by processes such as reliance on naturally occurring sourdough microbes, chemicals, industrially produced yeast, or high-pressure aeration. Commercial bread commonly contains additives to improve flavor, texture, color, shelf life, nutrition, and ease of manufacturing. ', '1541430140.png'),
(81, NULL, 'Milk', 'Milk is a nutrient-rich, white liquid food produced by the mammary glands of mammals. It is the primary source of nutrition for infant mammals (including humans who are breastfed) before they are able to digest other types of food. Early-lactation milk contains colostrum, which carries the mother\'s antibodies to its young and can reduce the risk of many diseases. It contains many other nutrients including protein and lactose. Interspecies consumption of milk is not uncommon, particularly among humans, many of whom consume the milk of other mammals.', '1543476789.png');

-- --------------------------------------------------------


INSERT INTO `user` (`UserNr`, `Username`, `Firstname`, `Lastname`, `Password`, `Age`, `Sex`, `MemberSince`) VALUES
(1, 'Flo', 'Florian', 'Prechtl', '$2y$10$BLmHPuKU0POLHtb57v58OegXXYtP.W5uT3ZL3X4DVqHb4AlRIxKRK', 21, 'm', '2018-10-18'),
(2, 'Jix', 'Jean-Alix', 'Poylo', '$2y$10$zqe2sMhXc/ryE0sTkNARaOR2HRx4meBuDMM1kkGa8wnzn9/qIgE9q', 21, 'm', '2018-10-18'),
(15, 'Maria', 'Maria', 'Prechtl', '$2y$10$BLmHPuKU0POLHtb57v58OegXXYtP.W5uT3ZL3X4DVqHb4AlRIxKRK', 49, 'f', '2018-11-02'),
(18, 'Peter', 'Peter', 'Peter', '$2y$10$t8/d7bpWElgoGlPa/jAZXu6k2nPOprojikGAlMNixPC2KN/3E15d.', 45, 'm', '2018-11-06');

-- --------------------------------------------------------


INSERT INTO `inventoryentry` (`InventoryEntryNr`, `InventoryNr`, `ProductNr`, `UserNr`, `Amount`, `Unit`, `BuyingDate`, `ExpiringDate`, `Status`) VALUES
(8, 1, 47, 1, 2000, 'g', '2018-11-24', '2035-12-28', NULL),
(10, 3, 49, 1, 4, 'g', '2018-11-02', '2018-11-15', NULL),
(11, 2, 50, 1, 1, 'g', '2018-11-02', '2018-11-23', NULL),
(12, 2, 47, 2, 34, 'g', '2018-12-01', '2018-11-26', 0),
(15, 3, 50, 2, 34, 'g', '2018-11-13', '2018-11-29', 1),
(35, 3, 43, 1, 45, 'g', '2018-11-22', '2018-11-29', NULL),
(39, 3, 42, 1, 1, 'g', '2018-11-10', '2018-11-30', NULL),
(40, 1, 42, 1, 345, 'Kl', '2018-11-23', '2018-12-01', NULL),
(43, 8, 44, 1, 5, 'pcs', '2018-11-30', '2018-11-24', NULL),
(45, 1, 57, 1, 4, 'g', '2018-11-23', '2018-11-29', NULL),
(52, 8, 44, 1, 28, 'kg', '2018-11-22', '2018-11-22', NULL),
(92, 1, 81, 1, 4, 'g', NULL, NULL, NULL),
(93, 2, 48, 1, 19, 'pcs', '2018-11-29', '2018-11-29', NULL),
(94, 2, 49, 1, 500, 'g', NULL, NULL, NULL),
(106, 2, 46, 1, 1, 'kg', '2018-11-29', '2018-11-29', NULL),
(114, 2, 42, 1, 0, 'g', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------


INSERT INTO `inventoryusermatrix` (`MatrixNr`, `InventoryNr`, `UserNr`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 2),
(6, 3, 15),
(7, 2, 15),
(11, 8, 1),
(12, 9, 1);