CREATE TABLE `categories` (
    `id`
        BIGINT
        NOT NULL
        AUTO_INCREMENT,

    `status`
        TINYINT(1)
        NOT NULL
        DEFAULT '1',
    
    `name`
        VARCHAR(255)
        NOT NULL,

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

    UNIQUE KEY `UK_NAME` (`name`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
