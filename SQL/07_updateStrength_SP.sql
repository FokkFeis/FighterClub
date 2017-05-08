# Author: Sigurdur Baldvin Fridriksson
# Name: putInLeague
# Objective: Update MMR / Strength of a fighter
# Varibles: takes in New MMR / Strength and the fighter ID

USE fightersClub;
DELIMITER $$
DROP PROCEDURE IF EXISTS updateStrength $$

CREATE PROCEDURE updateStrength
(
	MMR INT(11),
    fighterid INT(11)
)
BEGIN
	UPDATE fighters SET strength = MMR WHERE ID = fighterid;
END $$

DELIMITER ;
