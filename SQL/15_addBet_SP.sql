USE fightersClub;
DELIMITER $$
DROP PROCEDURE IF EXISTS addBet $$
CREATE PROCEDURE addBet
(
    new_user_id INT(11),
    new_fight_id INT(11),
    bet_amount INT(11),
    won_char char(1),
    coins_id INT(11)
)
BEGIN
	DECLARE new_bet_id INT(11);

    START TRANSACTION;

    INSERT INTO bets(amount,won,fight_id)
    VALUE(bet_amount,won_char,new_fight_id);

    SET new_bet_id = last_insert_id();

    INSERT INTO user_has_bets(user_id,bet_id)
    VALUES(new_user_id, new_bet_id);

    IF(won_char = 1) THEN
		UPDATE coins SET coins.coins = coins.coins + bet_amount WHERE coins.ID = coins_id;
	END IF;

    IF(won_char = 0) THEN
		UPDATE coins set coins.coins = coins.coins - bet_amount WHERE coins.ID = coins_id;
	END IF ;
  COMMIT;
END $$
DELIMITER ;
