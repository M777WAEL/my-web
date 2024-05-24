CREATE TABLE
    `users` (
        `Id` int (11) NOT NULL AUTO_INCREMENT,
        `firstName` varchar(50),
        `lastName` varchar(50),
        `email` varchar(50),
        `password` varchar(50),
        PRIMARY KEY (`Id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE
    `cart` (
        `id` int (100) NOT NULL AUTO_INCREMENT,
        `user_id` int (100) NOT NULL,
        `name` varchar(100) NOT NULL,
        `price` varchar(100) NOT NULL,
        `image` varchar(100) NOT NULL,
        `quantity` int (100) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE
    `products` (
        `id` int (100) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `price` varchar(100) NOT NULL,
        `image` varchar(100) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;