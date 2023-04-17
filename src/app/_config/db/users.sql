CREATE TABLE `users` (
    `id`
        bigint
        NOT NULL
        AUTO_INCREMENT,
    
    `access_type`
        ENUM(
            'DEV',
            'MASTER',
            'ADMIN',
            'MANAGER',
            'EDITOR',
            'READER'
        ) 
        NOT NULL
        DEFAULT 'READER',
    
    `email`
        VARCHAR(255)
        NOT NULL,
    
    `pass`
        TEXT
        NOT NULL,
    
    `name`
        VARCHAR(255)
        NOT NULL,

    `surname`
        VARCHAR(255)
        NOT NULL
        DEFAULT '',

    PRIMARY KEY (`id`),

    UNIQUE KEY `UK_EMAIL` (`email`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
