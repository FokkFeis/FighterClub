DROP DATABASE IF EXISTS fightersclub;
CREATE DATABASE fightersclub;
USE fightersclub;


DROP TABLE IF EXISTS users;
CREATE TABLE users
(
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255),
  email VARCHAR(255),
  isAdmin CHAR(1) DEFAULT '0',
  password VARCHAR(255),
  CONSTRAINT user_id_pk PRIMARY KEY (ID)
);

DROP TABLE IF EXISTS fighters;
CREATE TABLE fighters
(
	ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255),
  strength INT(11) DEFAULT 500,
  wins INT(11) DEFAULT 0,
  CONSTRAINT fighter_id_pk PRIMARY KEY (ID)
);

DROP TABLE IF EXISTS bets;
CREATE TABLE bets
(
  ID INT(11) NOT NULL AUTO_INCREMENT,
  amount INT(11),
  won char(1),
  fighter_id INT(11),
  CONSTRAINT bets_id_pk PRIMARY KEY (ID),
  CONSTRAINT bets_fighter_fk FOREIGN KEY (fighter_id) REFERENCES fighters(ID)
);

DROP TABLE IF EXISTS user_has_bets;
CREATE TABLE user_has_bets
(
  user_id INT(11),
  bet_id INT(11),
  CONSTRAINT userHasBets_user_fk FOREIGN KEY (user_id) REFERENCES users(ID),
  CONSTRAINT userHasBets_bet_fk FOREIGN KEY (bet_id) REFERENCES bets(ID)
);

DROP TABLE IF EXISTS leagues;
CREATE TABLE leagues
(
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255),
  CONSTRAINT leagues_id_pk PRIMARY KEY (ID)
);

DROP TABLE IF EXISTS fighter_has_leagues;
CREATE TABLE fighter_has_leagues
(
  league_id INT(11),
  fighter_id INT(11),
  CONSTRAINT fighterHasLeagues_league_fk FOREIGN KEY (league_id) REFERENCES leagues(ID),
  CONSTRAINT fighterHasLeagues_fighter_fk FOREIGN KEY (fighter_id) REFERENCES fighters(ID)
);

DROP TABLE IF EXISTS coins;
CREATE TABLE coins
(
  ID INT(11) NOT NULL AUTO_INCREMENT,
  coins INT(11),
  CONSTRAINT coins_id_pk PRIMARY KEY (ID)
);

DROP TABLE IF EXISTS user_has_coins;
CREATE TABLE user_has_coins
(
  user_id INT(11),
  coins_id INT(11),
  CONSTRAINT userHasCoins_user_fk FOREIGN KEY (user_id) REFERENCES users(ID),
  CONSTRAINT userHasCoins_coins_fk FOREIGN KEY (coins_id) REFERENCES coins(ID)
);

DROP TABLE IF EXISTS fights;
CREATE TABLE fights
(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    result CHAR(1),
    status VARCHAR(255),
    startTime TIMESTAMP,
    CONSTRAINT fights_id_pk PRIMARY KEY (ID)
);

DROP TABLE IF EXISTS fight_has_fighters;
CREATE TABLE fight_has_fighters
(
  fight_id INT(11),
  fighter_id INT(11),
  CONSTRAINT fightHasFighters_fight_fk FOREIGN KEY (fight_id) REFERENCES fights(ID),
  CONSTRAINT fightHasFighters_fighter_fk FOREIGN KEY (fighter_id) REFERENCES fighters(ID)
);
