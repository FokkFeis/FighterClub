DELIMITER $$
DROP PROCEDURE IF EXISTS addUser $$
CREATE PROCEDURE addUser 
(
	user_name VARCHAR(255),
    user_email VARCHAR(255),
    user_password VARCHAR(255)
)
BEGIN
	DECLARE user_id INT(11);
    DECLARE coins_ID INT(11);
    START TRANSACTION;
		INSERT INTO users(users.name,users.email,users.password)
        VALUES(user_name, user_email, user_password);
        SET user_id = last_insert_id();
        INSERT INTO coins(coins)
        VALUES(50);
        SET coins_id = last_insert_id();
        INSERT INTO user_has_coins(user_has_coins.user_id, user_has_coins.coins_id)
        VALUES(user_id,coins_id);
    COMMIT;
END $$
DELIMITER ;