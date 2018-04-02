#SET foreign_key_checks = 1;
#DROP TABLE individual;
#DROP TABLE club;
#DROP TABLE place;
#DROP TABLE reservation;
#DROP TABLE player;
CREATE TABLE club (
    club_id     INTEGER PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(100),
    init_date   DATETIME,
    admin_id    INTEGER
);

CREATE UNIQUE INDEX club__idx ON
    club ( admin_id ASC );

CREATE TABLE individual (
    individual_id   INTEGER PRIMARY KEY AUTO_INCREMENT,
    change_date     DATETIME,
    type            VARCHAR(40) NOT NULL,
    value           VARCHAR(100),
    club_id         INTEGER NOT NULL
);

CREATE TABLE place (
    place_id   INTEGER PRIMARY KEY AUTO_INCREMENT,
    name       VARCHAR(100),
    club_id    INTEGER NOT NULL
);

CREATE TABLE player (
    player_id   INTEGER PRIMARY KEY AUTO_INCREMENT,
    firstname   VARCHAR(40),
    lastname    VARCHAR(40),
    email       VARCHAR(150) NOT NULL,
    password    VARCHAR(100) NOT NULL,
    init_date   DATETIME,
    club_id     INTEGER NOT NULL
);

CREATE TABLE reservation (
    reservation_id   INTEGER PRIMARY KEY AUTO_INCREMENT,
    start          	 DATETIME NOT NULL,
    end              DATETIME NOT NULL,
    init_date        DATETIME,
    priority         INTEGER,
    player_id        INTEGER NOT NULL,
    place_id         INTEGER NOT NULL
);

ALTER TABLE club ADD CONSTRAINT club_player_fk FOREIGN KEY ( admin_id )
    REFERENCES player ( player_id );
ALTER TABLE individual ADD CONSTRAINT individual_club_fk FOREIGN KEY ( club_id )
    REFERENCES club ( club_id );
ALTER TABLE place ADD CONSTRAINT place_club_fk FOREIGN KEY ( club_id )
    REFERENCES club ( club_id );
ALTER TABLE player ADD CONSTRAINT player_club_fk FOREIGN KEY ( club_id )
    REFERENCES club ( club_id );
ALTER TABLE reservation ADD CONSTRAINT reservation_place_fk FOREIGN KEY ( place_id )
    REFERENCES place ( place_id );
ALTER TABLE reservation ADD CONSTRAINT reservation_player_fk FOREIGN KEY ( player_id )
    REFERENCES player ( player_id );
    
INSERT INTO club(name, init_Date) value('MusterStadt Tennisverein', now());
INSERT INTO player(firstname, lastname, email, password, init_Date, club_id) VALUES('Max', 'Mustermann', 'max.mustermann@asdf.de', '098f6bcd4621d373cade4e832627b4f6', now(), 1);
UPDATE club SET admin_id = 1 WHERE club_id = 1;
INSERT INTO player(firstname, lastname, email, password, init_Date, club_id) VALUES('Hubert', 'Mustermann', 'hubert.mustermann@asdf.de', '098f6bcd4621d373cade4e832627b4f6', now(), 1);
INSERT INTO player(firstname, lastname, email, password, init_Date, club_id) VALUES('Peter', 'Mustermann', 'peter.mustermann@asdf.de', '098f6bcd4621d373cade4e832627b4f6', now(), 1);
INSERT INTO player(firstname, lastname, email, password, init_Date, club_id) VALUES('Gerhard', 'Mustermann', 'gerhard.mustermann@asdf.de', '098f6bcd4621d373cade4e832627b4f6', now(), 1);
INSERT INTO player(firstname, lastname, email, password, init_Date, club_id) VALUES('Herbert', 'Mustermann', 'herbert.mustermann@asdf.de', '098f6bcd4621d373cade4e832627b4f6', now(), 1);
INSERT INTO player(firstname, lastname, email, password, init_Date, club_id) VALUES('Luis', 'Mustermann', 'luis.mustermann@asdf.de', '098f6bcd4621d373cade4e832627b4f6', now(), 1);