DROP VIEW IF EXISTS showmyuser;
CREATE VIEW showMyUser as SELECT bets.id as ID, users.name as Username, users.email as Email, coins.coins as Coins, users.isAdmin as AdminStatus, bets.amount as Amount, bets.won as Won
FROM fights
INNER JOIN bets ON fights.ID = bets.fight_id
INNER JOIN user_has_bets ON bets.ID = user_has_bets.bet_id
INNER JOIN users ON user_has_bets.user_id = users.ID
INNER JOIN user_has_coins ON users.ID = user_has_coins.user_id
INNER JOIN coins ON user_has_coins.coins_id = coins.ID

