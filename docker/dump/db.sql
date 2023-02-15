CREATE TABLE `user` (
                        `id` int(20) NOT NULL AUTO_INCREMENT,
                        `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `email` (
                         `id` int(20) NOT NULL AUTO_INCREMENT,
                         `subject` varchar(255) COLLATE utf8mb4_unicode_ci NULL,
                         `message` varchar(255) COLLATE utf8mb4_unicode_ci NULL,
                         `status` varchar(32) COLLATE utf8mb4_unicode_ci NULL,
                         `user_id` INT DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         FOREIGN KEY (user_id)
                             REFERENCES user(id)
                             ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;