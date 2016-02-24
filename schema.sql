CREATE TABLE member (
	id SERIAL PRIMARY KEY,
	username VARCHAR(64) NOT NULL UNIQUE,
	password VARCHAR(64) NOT NULL,
	email VARCHAR(64) NOT NULL UNIQUE,
	member_type VARCHAR(32) NOT NULL,
	is_valid SMALLINT DEFAULT 1 CHECK(is_valid = 1 OR is_valid = 0),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	CHECK (member_type = 'admin' OR member_type = 'member')
);

CREATE TABLE item (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	category VARCHAR(64) NOT NULL,
	price float NOT NULL,
	description VARCHAR(256),
	location VARCHAR(128) NOT NULL,
	member_id INT,
	is_valid SMALLINT DEFAULT 1,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (member_id) REFERENCES member(id) ON DELETE CASCADE,
	CHECK (is_valid = 1 OR is_valid = 0)
);

CREATE TABLE item_image (
	id SERIAL PRIMARY KEY,
	item_id INT,
	image_url VARCHAR(256),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (item_id) REFERENCES item(id) ON DELETE CASCADE,
);

CREATE TABLE item_availability (
	id SERIAL PRIMARY KEY,
	item_id INT,
	date_start DATE NOT NULL,
	date_end DATE NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (item_id) REFERENCES item(id) ON DELETE CASCADE,
	CHECK (date_start <= date_end)
);

CREATE TABLE review (
	id SERIAL PRIMARY KEY,
	content VARCHAR(256) NOT NULL,
	has_like SMALLINT NOT NULL CHECK(has_like = 1 OR has_like = 0),
	reviewer_id INT,
	reviewee_id INT,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (reviewer_id) REFERENCES member(id),
	FOREIGN KEY (reviewee_id) REFERENCES member(id) ON DELETE CASCADE,
	CHECK (reviewer_id != reviewee_id)	
);

CREATE TABLE message (
	id SERIAL PRIMARY KEY,
	item_id INT NOT NULL REFERENCES item(id) ON DELETE CASCADE,
	content VARCHAR(256) NOT NULL,
	sender_id INT,
	receiver_id INT,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (sender_id) REFERENCES member(id),
	FOREIGN KEY (receiver_id) REFERENCES member(id),
	CHECK (sender_id != receiver_id)
);
