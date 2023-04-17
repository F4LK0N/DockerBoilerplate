CREATE TABLE `users` (
    `id`        bigint NOT NULL AUTO_INCREMENT,
    `email`     text NULL,
    `password`  text NULL,
    `name`      text NULL,

    PRIMARY KEY (`id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
