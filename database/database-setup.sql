CREATE TABLE categories (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE teams (
    id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    _category INT NOT NULL,
    ground VARCHAR(50) NOT NULL,
    points INT NOT NULL DEFAULT 0,
    wins INT NOT NULL DEFAULT 0,
    draws INT NOT NULL DEFAULT 0,
    defeats INT NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    FOREIGN KEY (_category) REFERENCES categories(id)
);

CREATE TABLE events (
    id INT NOT NULL AUTO_INCREMENT,
    _category INT NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    _hometeam INT NOT NULL,
    _awayteam INT NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (_category) REFERENCES categories(id),
    FOREIGN KEY (_hometeam) REFERENCES teams(id),
    FOREIGN KEY (_awayteam) REFERENCES teams(id)
);