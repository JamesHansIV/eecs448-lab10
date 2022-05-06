CREATE TABLE Users (
    user_id varchar(255) NOT NULL,
    PRIMARY KEY(user_id),
    UNIQUE(user_id)
) ENGINE=INNODB;

CREATE TABLE Posts (
    post_id int NOT NULL AUTO_INCREMENT,
    content text,
    author_id varchar(255) NOT NULL,
    PRIMARY KEY (post_id),
    FOREIGN KEY (author_id) REFERENCES Users(user_id)
) ENGINE=INNOBD;