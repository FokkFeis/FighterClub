DELIMITER $$
DROP PROCEDURE IF EXISTS showBets $$
CREATE PROCEDURE showBets
(
	new_user_id INT(11)
)
BEGIN
	SELECT bets.amount as Amount, bets.won AS Won
	FROM bets
	INNER JOIN user_has_bets ON bets.ID = user_has_bets.bet_id
	WHERE user_id = new_user_id;
END $$
DELIMITER ;
