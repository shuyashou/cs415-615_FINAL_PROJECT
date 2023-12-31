LOAD DATA LOCAL INFILE '/users/sshou2/dataset/games.csv'
INTO TABLE games
FIELDS TERMINATED BY ',' 
OPTIONALLY ENCLOSED BY '"' 
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(GAME_DATE_EST, GAME_ID, GAME_STATUS_TEXT, HOME_TEAM_ID, VISITOR_TEAM_ID, SEASON, TEAM_ID_home, PTS_home, FG_PCT_home, FT_PCT_home, FG3_PCT_home, AST_home, REB_home, TEAM_ID_away, PTS_away, FG_PCT_away, FT_PCT_away, FG3_PCT_away, AST_away, REB_away, HOME_TEAM_WINS);


LOAD DATA LOCAL INFILE '/users/sshou2/dataset/games_details.csv'
INTO TABLE games_details
FIELDS TERMINATED BY ',' 
OPTIONALLY ENCLOSED BY '"' 
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(GAME_ID, TEAM_ID, TEAM_ABBREVIATION, TEAM_CITY, PLAYER_ID, PLAYER_NAME, NICKNAME, START_POSITION, COMMENT, MIN, FGM, FGA, FG_PCT, FG3M, FG3A, FG3_PCT, FTM, FTA, FT_PCT, OREB, DREB, REB, AST, STL, BLK, TOVR, PF, PTS, PLUS_MINUS);

LOAD DATA LOCAL INFILE '/users/sshou2/dataset/players.csv'
INTO TABLE players
FIELDS TERMINATED BY ',' 
OPTIONALLY ENCLOSED BY '"' 
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(PLAYER_NAME, TEAM_ID, PLAYER_ID, SEASON);

LOAD DATA LOCAL INFILE '/users/sshou2/dataset/ranking.csv'
INTO TABLE ranking
FIELDS TERMINATED BY ',' 
OPTIONALLY ENCLOSED BY '"' 
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(TEAM_ID, LEAGUE_ID, SEASON_ID, STANDINGSDATE, CONFERENCE, TEAM, G, W, L, W_PCT, HOME_RECORD, ROAD_RECORD, RETURNTOPLAY);

LOAD DATA LOCAL INFILE '/users/sshou2/dataset/teams.csv'
INTO TABLE teams
FIELDS TERMINATED BY ',' 
OPTIONALLY ENCLOSED BY '"' 
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(LEAGUE_ID, TEAM_ID, MIN_YEAR, MAX_YEAR, ABBREVIATION, NICKNAME, YEARFOUNDED, CITY, ARENA, ARENACAPACITY, TOWNER, GENERALMANAGER, HEADCOACH, DLEAGUEAFFILIATION);