CREATE TABLE `auth` (
    `email`
        VARCHAR(128)
        NOT NULL,
    
    `pass`
        VARCHAR(128)
        NOT NULL,

    PRIMARY KEY (`email`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
