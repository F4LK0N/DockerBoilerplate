CREATE TABLE `news` (
    `id`
        bigint
        NOT NULL
        AUTO_INCREMENT,

    `status`
        TINYINT(1)
        NOT NULL
        DEFAULT '1',

    `published`
        TINYINT(1)
        NOT NULL
        DEFAULT '0',

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
        NULL,

    `ts_created`
        TIMESTAMP
        NOT NULL
        DEFAULT CURRENT_TIMESTAMP,

    `ts_modified`
        TIMESTAMP
        NOT NULL
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    `ts_deleted`
        TIMESTAMP
        NULL,

    PRIMARY KEY (`id`),

    KEY `IK_STATUS` (`status`),

    KEY `IK_PUBLISHED` (`published`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
