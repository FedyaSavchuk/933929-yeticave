-- Запросы для добавления информации в БД:
INSERT INTO categories (category) VALUES ('Доски и лыжи'), ('Крепления'), ('Ботинки'), ('Одежда'), ('Инструменты'), ('Разное');

INSERT INTO user SET email = 'fedyasavchuk@gmail.com', user_name = 'FedyaSavchuk', password = 'fedyaSecret';
INSERT INTO user SET email = 'victoria@gmail.com', user_name = 'victoria', password = 'victoriaSecret';

INSERT INTO lot (lot_name, category_id, first_price, lot_img)
VALUES
('2014 Rossignol District Snowboard', 1, 10999, 'img/lot-1.jpg'),
('DC Ply Mens 2016/2017 Snowboard', 1, 159999, 'img/lot-2.jpg'),
('Крепления Union Contact Pro 2015 года размер L/XL', 2, 8000, 'img/lot-3.jpg'),
('Ботинки для сноуборда DC Mutiny Charocal', 3, 10999, 'img/lot-4.jpg'),
('Куртка для сноуборда DC Mutiny Charocal', 4, 7500, 'img/lot-5.jpg'),
('Маска Oakley Canopy', 6, 5400, 'img/lot-6.jpg');

INSERT INTO bid (sum, user_id, lot_id)
VALUES
(11000, 1, 1),
(12000, 2, 1);


-- Получить все категории:
SELECT * FROM categories;


-- Получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, название категории:
SELECT lot_name, first_price, lot_img, bid_step, category_id FROM lot
WHERE date_finish > NOW()
ORDER BY date_start ASC;


-- Показать лот по его id. Получите также название категории, к которой принадлежит лот:
SELECT * FROM lot LEFT JOIN category
ON lot.category_id = category.category_id
WHERE lot_id = 2;


-- Обновить название лота по его идентификатору:
UPDATE lot
SET lot_name = 'Новый лот'
WHERE lot_id = 2;


-- Получить список (10) самых свежих ставок для лота по его идентификатору;
SELECT sum FROM bid
ORDER BY bid_date DESC
WHERE lot_id = 1
LIMIT 10;
