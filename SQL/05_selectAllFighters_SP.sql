CREATE VIEW Allfighters as SELECT fighters.name as FighterName , fighters.strength, fighters.wins, leagues.name as League
FROM fighters
INNER JOIN fighter_has_leagues ON fighters.ID = fighter_has_leagues.fighter_id
INNER JOIN leagues ON fighter_has_leagues.league_id = leagues.ID;
