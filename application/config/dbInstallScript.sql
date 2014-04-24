CREATE TABLE sunglasses (
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	model varchar(100),
	color varchar(100),
	price int(4),
	img_path varchar(200),
	mini_img_path varchar(200)
);

-- set price after glasses where created
UPDATE sunglasses SET price=280 WHERE model='Flynn';
UPDATE sunglasses SET price=150 WHERE model='Ken Block Helm';

