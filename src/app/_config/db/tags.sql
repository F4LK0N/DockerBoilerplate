CREATE TABLE `tags` (
    `id`
        bigint
        NOT NULL
        AUTO_INCREMENT,
    
    `name`
        VARCHAR(255)
        NOT NULL,

    PRIMARY KEY (`id`),

    UNIQUE KEY `UK_NAME` (`name`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
