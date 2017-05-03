
DELIMITER $$
DROP PROCEDURE IF EXISTS addFighterToAFight $$
CREATE PROCEDURE addFighterToAFight
(
	fighter1_ID INT(11),
    fighter2_ID INT(11),
    new_fight_ID INT(11)
)
BEGIN

		INSERT INTO fight_has_fighters(fight_id,fighter_id)
        VALUES(new_fight_ID,fighter1_ID);
		INSERT INTO fight_has_fighters(fight_id,fighter_id)
        VALUES(new_fight_ID,fighter2_ID);

END $$
DELIMITER ;
