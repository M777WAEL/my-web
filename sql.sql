-- my-web


CREATE TABLE
    `users` (
        `Id` int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `firstName` varchar(50) DEFAULT NULL,
        `lastName` varchar(50) DEFAULT NULL,
        `email` varchar(50) DEFAULT NULL,
        `password` varchar(50) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE
    `cart` (
        `id` int (100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `user_id` int (100) NOT NULL,
        `name` varchar(100) NOT NULL,
        `price` varchar(100) NOT NULL,
        `image` varchar(100) NOT NULL,
        `quantity` int (100) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;