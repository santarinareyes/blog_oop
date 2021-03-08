**HOW TO START**:
* Step 1. Go to app > config > config.php
* Step 2. Change accordingly
* Step 3. Create the database (Found below **THE DATABASE**)
* Step 4. Login to website using admin
```
Username: Admin
Password: Admin123
```
* Step 5. Create categories
* Step 6. Create posts

**THE DATABASE**:
```
DROP TABLE IF EXISTS users; 
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS comments;

CREATE TABLE users (
user_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
username VARCHAR(50) NOT NULL UNIQUE,
user_email VARCHAR(255) NOT NULL UNIQUE,
user_pass VARCHAR(255) NOT NULL,
user_created DATETIME DEFAULT CURRENT_TIMESTAMP,
user_status VARCHAR(50)
)
Engine = InnoDb;

INSERT INTO users (username, user_email, user_pass, user_status)
VALUES
("Admin","Admin@admin.admin","Admin123","Admin");

CREATE TABLE categories (
cat_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
cat_title VARCHAR(255)
)
Engine = InnoDb;

CREATE TABLE posts (
post_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
post_user_id INT,
post_cat_id INT,
post_title VARCHAR(255),
post_image VARCHAR(255),
post_content TEXT,
post_tags VARCHAR(255),
post_status VARCHAR(255),
post_created DATETIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (post_user_id) REFERENCES users(user_id),
FOREIGN KEY (post_cat_id) REFERENCES categories(cat_id)
)
Engine = InnoDb;

CREATE TABLE comments (
comment_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
comment_user_id INT,
comment_post_id INT,
comment_content TEXT,
comment_created DATETIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (comment_user_id) REFERENCES users(user_id),
FOREIGN KEY (comment_post_id) REFERENCES posts(post_id)
)
Engine = InnoDb;
```
