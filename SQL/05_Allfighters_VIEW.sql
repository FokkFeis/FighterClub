USE fightersClub;
DROP VIEW IF EXISTS Allfighters;
CREATE VIEW Allfighters as SELECT fighters.ID as ID, fighters.name as FighterName , fighters.strength, fighters.wins, leagues.name as League
FROM fighters
INNER JOIN fighter_has_leagues ON fighters.ID = fighter_has_leagues.fighter_id
INNER JOIN leagues ON fighter_has_leagues.league_id = leagues.ID;
