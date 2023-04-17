CREATE TABLE `categories` (
    `id`
        bigint
        NOT NULL
        AUTO_INCREMENT,
    

    `short_title`
        VARCHAR(255)
        NOT NULL
        DEFAULT '',

    `short_description`
        VARCHAR(255)
        NOT NULL
        DEFAULT '',


    `title`
        VARCHAR(255)
        NOT NULL
        DEFAULT '',

    `content`
        TEXT
        NOT NULL
        DEFAULT '',


    PRIMARY KEY (`id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
