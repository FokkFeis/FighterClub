DROP VIEW IF EXISTS showAllUsers;
CREATE VIEW showAllUsers AS SELECT users.id as ID, users.name as Username, users.email as Email, coins.coins as Coins, users.isAdmin as AdminStatus
FROM users
INNER JOIN user_has_coins ON users.ID = user_has_coins.user_id
INNER JOIN coins ON user_has_coins.coins_id = coins.ID