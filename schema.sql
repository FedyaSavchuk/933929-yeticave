CREATE TABLE categories (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    category            CHAR(128)
);


CREATE TABLE lot (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    date_start          DATETIME,
    lot_name            CHAR(255),
    lot_description     TEXT,
    lot_img             CHAR(255),
    first_price         INT,
    date_finish         DATETIME,
    bid_step            INT
);


CREATE TABLE bid (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    bid_date            DATETIME,
    sum                 INT
);


CREATE TABLE user (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    registration_date   DATETIME,
    email               CHAR(255) UNIQUE,
    user_name           CHAR(255) UNIQUE,
    password            CHAR(64),
    avatar              CHAR(255),
    contact             CHAR(255)
);
