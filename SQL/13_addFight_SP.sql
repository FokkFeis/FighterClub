DELIMITER $$
DROP PROCEDURE IF EXISTS addFight $$
CREATE PROCEDURE addFight
(
	fighter1_ID INT(11),
    fighter2_ID INT(11),
    new_result CHAR(1)
)
BEGIN
	DECLARE fight_id INT(11);
    DECLARE msg VARCHAR(255);
    if(fighter1_ID = fighter2_ID) THEN
		SET msg = 'Cannot be same fighter';
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
    END IF;
    IF(fighter1_ID != fighter2_ID)THEN

		START TRANSACTION;
		INSERT INTO fights(result,startTime)
		VALUES(new_result,current_timestamp());

		SET fight_id = last_insert_id();
		CALL addFighterToAFight(fighter1_ID,fighter2_ID,fight_id);
		COMMIT;
	END IF;

END $$
DELIMITER ;
