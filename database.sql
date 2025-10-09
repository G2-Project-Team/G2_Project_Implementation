CREATE TABLE `Users` (
  `UserID` int PRIMARY KEY AUTO_INCREMENT,
  `Username` varchar(255) UNIQUE NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) UNIQUE NOT NULL,
  `Type` varchar(255) COMMENT 'Can be ''Land Manager'', ''Developer'', or ''Admin''',
  `Description` varchar(255),
  `SavedListingID` int
);

CREATE TABLE `GridData` (
  `GridID` int PRIMARY KEY AUTO_INCREMENT,
  `CoordinateX` int NOT NULL,
  `CoordinateY` int NOT NULL,
  `AvgSunlight` decimal(3,2),
  `AvgWindSpeed` decimal(3,2),
  `HasWater` boolean NOT NULL DEFAULT false,
  `IsFarmland` boolean NOT NULL DEFAULT false,
  `IsResidential` boolean NOT NULL DEFAULT false
);

CREATE TABLE `LandListings` (
  `ListingID` int PRIMARY KEY AUTO_INCREMENT,
  `GridSquareID` int NOT NULL,
  `TimeCreated` timestamp DEFAULT (now()),
  `TimeUpdated` timestamp,
  `UserID` int NOT NULL
);

CREATE TABLE `Documents` (
  `DocuID` int PRIMARY KEY AUTO_INCREMENT,
  `ListingID` int NOT NULL,
  `DocuLink` varchar(255) NOT NULL
);

CREATE TABLE `ListingSave` (
  `SaveID` int PRIMARY KEY AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `ListingID` int NOT NULL
);

ALTER TABLE `LandListings` ADD FOREIGN KEY (`GridSquareID`) REFERENCES `GridData` (`GridID`);

ALTER TABLE `Documents` ADD FOREIGN KEY (`ListingID`) REFERENCES `LandListings` (`ListingID`);

ALTER TABLE `LandListings` ADD FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`);

ALTER TABLE `ListingSave` ADD FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`);

ALTER TABLE `ListingSave` ADD FOREIGN KEY (`ListingID`) REFERENCES `LandListings` (`ListingID`);
