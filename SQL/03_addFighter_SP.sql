USE fightersClub;
DELIMITER $$
DROP PROCEDURE IF EXISTS addFighter $$

CREATE PROCEDURE addFighter
(
	fighter_name VARCHAR(255)
)
BEGIN
	DECLARE fighter_id INT(11);
    DECLARE strengthMMR INT(11);
    START TRANSACTION;
		INSERT INTO fighters(name)
		VALUES(fighter_name);

		SET fighter_id = last_insert_id();
		SET strengthMMR = (SELECT fighters.strength FROM fighters WHERE ID = fighter_id);



    COMMIT;
	IF(strengthMMR <999) THEN
		INSERT INTO fighter_has_leagues(fighter_has_leagues.league_id, fighter_has_leagues.fighter_id)
        VALUES(5, fighter_id);
     END IF;
    IF(strengthMMR >1000 AND strengthMMR < 1999) THEN
		INSERT INTO fighter_has_leagues(fighter_has_leagues.league_id, fighter_has_leagues.fighter_id)
        VALUES(4, fighter_id);
      END IF;
	IF(strengthMMR >2000 AND strengthMMR <2999) THEN
		INSERT INTO fighter_has_leagues(fighter_has_leagues.league_id, fighter_has_leagues.fighter_id)
        VALUES(3, fighter_id);
      END IF;
	IF(strengthMMR >3000) THEN
		INSERT INTO fighter_has_leagues(fighter_has_leagues.league_id, fighter_has_leagues.fighter_id)
        VALUES(2,fighter_id);
	END IF;
END $$
DELIMITER ;
