DELIMITER $$
DROP PROCEDURE IF EXISTS updateUsername $$
CREATE PROCEDURE updateUsername 
(
	ID INT(11),
    new_username VARCHAR(255)
)
BEGIN
	UPDATE users SET name = new_username WHERE users.ID = ID;
END $$
DELIMITER ;