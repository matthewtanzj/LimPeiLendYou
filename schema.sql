CREATE TABLE member (
	username VARCHAR(32) PRIMARY KEY,
	password VARCHAR(32) NOT NULL,
	salt CHAR(240) NOT NULL,
	email VARCHAR(64) NOT NULL UNIQUE,
	user_info VARCHAR(1000) NOT NULL DEFAULT 'Hi! Welcome to my profile.',
	display_pic VARCHAR(32) NOT NULL DEFAULT 'display_picture_default.png',
	account_type VARCHAR(6) NOT NULL,
	last_logged_in TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	CHECK (account_type = 'admin' OR account_type = 'member')
);

CREATE TABLE item (
	item_name VARCHAR(64) NOT NULL,
	owner VARCHAR(32) REFERENCES member(username) ON DELETE CASCADE,
	category VARCHAR(64) NOT NULL,
	price FLOAT NOT NULL,
	description VARCHAR(256),
	location VARCHAR(128) NOT NULL,
	is_valid SMALLINT DEFAULT 1,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (owner, item_name),
	CHECK (is_valid = 1 OR is_valid = 0)
);

CREATE TABLE item_image (
	item_name VARCHAR(64),
	owner VARCHAR(32),
	image_url VARCHAR(256) NOT NULL,
	FOREIGN KEY (owner, item_name) REFERENCES item(owner, item_name) ON DELETE CASCADE,
	PRIMARY KEY (item_name, owner, image_url)
);

CREATE TABLE item_availability (
	item_name VARCHAR(64),
	owner VARCHAR(32),
	date_start DATE NOT NULL,
	date_end DATE NOT NULL,
	FOREIGN KEY (owner, item_name) REFERENCES item(owner, item_name) ON DELETE CASCADE,
	PRIMARY KEY (owner, item_name, date_start, date_end),
	CHECK (date_start <= date_end)
);

CREATE TABLE loan_request (
	item_name VARCHAR(64),
	owner VARCHAR(32),
	borrower VARCHAR(32) REFERENCES member(username) ON DELETE CASCADE,
	date_start DATE NOT NULL,
	date_end DATE NOT NULL,
	status VARCHAR(32) NOT NULL,
	price_offer FLOAT NOT NULL,
	is_valid SMALLINT DEFAULT 1,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (owner, item_name) REFERENCES item(owner, item_name) ON DELETE CASCADE,
	PRIMARY KEY (owner, item_name, borrower, date_start),
	CHECK (date_start <= date_end),
	CHECK (status = 'accepted' OR status = 'declined' OR status = 'pending')
);

CREATE TABLE comment (
	item_name VARCHAR(64),
	owner VARCHAR(32),
	commenter VARCHAR (32) REFERENCES member(username) ON DELETE CASCADE,
	content VARCHAR (256) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (owner, item_name) REFERENCES item(owner, item_name) ON DELETE CASCADE,
	PRIMARY KEY (owner, item_name, commenter, created_at)
);

CREATE TABLE review (
	reviewer VARCHAR(32),
	reviewee VARCHAR(32),
	content VARCHAR(256) NOT NULL,
	has_like SMALLINT NOT NULL CHECK (has_like = 1 OR has_like = 0),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
	FOREIGN KEY (reviewer) REFERENCES member(username) ON DELETE CASCADE,
	FOREIGN KEY (reviewee) REFERENCES member(username) ON DELETE CASCADE,
	PRIMARY KEY (reviewer, reviewee, created_at),
	CHECK (reviewer != reviewee)
);

CREATE TABLE message (
	item_name VARCHAR(64),
	item_owner VARCHAR(32),
	sender VARCHAR(32),
	receiver VARCHAR(32),
	content VARCHAR(256) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
	FOREIGN KEY (item_name, item_owner) REFERENCES item(item_name, owner) ON DELETE CASCADE,
	FOREIGN KEY (sender) REFERENCES member(username) ON DELETE CASCADE,
	FOREIGN KEY (receiver) REFERENCES member(username) ON DELETE CASCADE,
	PRIMARY KEY (item_name, item_owner, sender, receiver, created_at),
	CHECK (sender != receiver)
);

CREATE OR REPLACE FUNCTION trg_request_msg() RETURNS TRIGGER AS
$BODY$
BEGIN
    INSERT INTO
        message(item_name,item_owner,sender,receiver,content)
        VALUES(new.item_name,new.owner,new.borrower,new.owner,'I would like to borrow your ' || new.item_name || ' from ' || new.date_start || ' to ' || new.date_end || ' for $' || trunc(new.price_offer::numeric, 2) || '.');

           RETURN new;
END;
$BODY$
language plpgsql;

CREATE TRIGGER request_msg_trigger
     AFTER INSERT ON loan_request
     FOR EACH ROW
     EXECUTE PROCEDURE trg_request_msg();