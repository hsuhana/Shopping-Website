CREATE DATABASE phpAssignment2;

USE phpAssignment2;

CREATE TABLE `accountInfo` (
 `userid` int(255) NOT NULL AUTO_INCREMENT,
 `fname` varchar(50) NOT NULL,
 `lname` varchar(50) NOT NULL,
 `username` varchar(255) NOT NULL,
 `phone` int(50) NOT NULL,
 `email` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 `role` varchar(50) NOT NULL,
 PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `cart` (
 `productID` int(50) NOT NULL,
 `userid` int(225) NOT NULL,
 `quantity` int(50) NOT NULL,
 KEY `userid` (`userid`),
 KEY `productID` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `product` (
 `proImage` varchar(255) NOT NULL,
 `productID` int(50) NOT NULL AUTO_INCREMENT,
 `proName` varchar(50) NOT NULL,
 `proDescribtion` varchar(255) NOT NULL,
 `proPrice` varchar(50) NOT NULL,
 `fortableuse` varchar(255) NOT NULL,
 PRIMARY KEY (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci