# Author: Sigurdur Baldvin Fridriksson
# Name: putInLeague
# Objective: Makes sure the fighters go into their apropriate League after an update



USE fightersclub;
DROP TRIGGER IF EXISTS putInLeague;

DELIMITER $$

CREATE TRIGGER putInLeague
AFTER UPDATE ON fighters
FOR EACH ROW
BEGIN
    IF(NEW.strength <999) THEN
		UPDATE fighter_has_leagues SET league_id = 5 WHERE fighter_id = new.ID;
	END IF;
    IF (NEW.strength >1000 AND NEW.strength < 1999 OR NEW.strength = 1000) THEN
      UPDATE fighter_has_leagues SET league_id = 4 WHERE fighter_id = new.ID;
	END IF;

    IF(NEW.strength >2000 AND NEW.strength <2999 OR NEW.strength = 2000) then
      UPDATE fighter_has_leagues SET league_id = 3 WHERE fighter_id = new.ID;
	END IF;
    IF(NEW.strength >3000 OR NEW.strength = 3000) THEN
      UPDATE fighter_has_leagues SET league_id = 2 WHERE fighter_id = new.ID;
	END IF;
END $$
DELIMITER ;
