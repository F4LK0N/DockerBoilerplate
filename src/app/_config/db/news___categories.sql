CREATE TABLE `news___categories` (
    `id`
        BIGINT
        NOT NULL
        AUTO_INCREMENT,

    `id_news`
        BIGINT
        NOT NULL,

    `id_categories`
        BIGINT
        NOT NULL,

    PRIMARY KEY (`id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
