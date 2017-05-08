USE fightersClub;
DELIMITER $$
DROP PROCEDURE IF EXISTS updateWins $$

CREATE PROCEDURE updateWins
(
	fighter_id INT(11)
)
BEGIN
	UPDATE fighters SET wins = wins + 1 WHERE ID = fighter_id;
END $$
DELIMITER ;
