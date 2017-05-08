USE fightersclub;
DELIMITER $$
DROP PROCEDURE IF EXISTS updateEmail $$
CREATE PROCEDURE updateEmail
(
	ID INT(11),
    new_email VARCHAR(255)
)
BEGIN
	UPDATE users SET email = new_email WHERE users.ID = ID;
END $$
DELIMITER ;
