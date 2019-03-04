-- Создаю таблицы
CREATE TABLE categories (
    category_id         INT AUTO_INCREMENT PRIMARY KEY,
    category            CHAR(128) UNIQUE
);


CREATE TABLE lot (
    lot_id              INT AUTO_INCREMENT PRIMARY KEY,
    date_start          DATETIME,
    lot_name            CHAR(255),
    lot_description     TEXT,
    lot_img             CHAR(255),
    first_price         INT,
    date_finish         DATETIME,
    bid_step            INT,
    user_id             INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    category_id         INT,
    FOREIGN KEY (category_id) REFERENCES user(category_id);
    winner_id           INT
    -- Вот тут не знаю... У нас эе user_id уже есть.

);


CREATE TABLE bid (
    bid_id              INT AUTO_INCREMENT PRIMARY KEY,
    bid_date            DATETIME,
    sum                 INT,
    user_id             INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    lot_id              INT,
    FOREIGN KEY (lot_id) REFERENCES user(lot_id)
);


CREATE TABLE user (
    user_id             INT AUTO_INCREMENT PRIMARY KEY, --Внешний ключ для creator_id
    registration_date   DATETIME,
    email               CHAR(255) UNIQUE,
    user_name           CHAR(255),
    password            CHAR(64),
    avatar              CHAR(255),
    contact             CHAR(255) UNIQUE
    lot_id              INT,
    FOREIGN KEY (lot_id) REFERENCES user(lot_id),
    bid_id              INT,
    FOREIGN KEY (bid_id) REFERENCES user(bid_id)
);


-- Пишу индексы для часто искомых столбцов
CREATE INDEX date_start ON lot(date_start);
CREATE INDEX lot_name ON lot(lot_name);
CREATE INDEX date_finish ON lot(date_finish);

CREATE INDEX sum ON bid(sum);
