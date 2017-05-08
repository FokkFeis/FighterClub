USE fightersClub;
DELIMITER $$
DROP PROCEDURE IF EXISTS updatePassword $$
CREATE PROCEDURE updatePassword
(
	ID INT(11),
    new_password VARCHAR(255)
)
BEGIN
	UPDATE users SET password = new_password WHERE users.ID = ID;
END $$
DELIMITER ;
