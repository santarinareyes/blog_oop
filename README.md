**HOW TO START**:

- Step 1. Go to app > config > config.php
- Step 2. Change accordingly
- Step 3. Create the database (Found below **THE DATABASE**)
- Step 4. Go to the website and register. First registrered user will always be Admin.
- Step 5. Login
- Step 6. Create categories
- Step 7. Create posts

**THE DATABASE**:

```
CREATE DATABASE IF NOT EXISTS `blogoop`;
USE `blogoop`;

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

CREATE TABLE categories (
cat_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
cat_title VARCHAR(255)
)
Engine = InnoDb;

CREATE TABLE posts (
post_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
post_user_id INT,
post_category_id INT,
post_title VARCHAR(255),
post_image VARCHAR(255),
post_content TEXT,
post_tags VARCHAR(255),
post_status VARCHAR(255),
post_created DATETIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (post_category_id) REFERENCES categories(cat_id) ON DELETE SET NULL
)
Engine = InnoDb;

CREATE TABLE comments (
comment_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
comment_user_id INT,
comment_post_id INT,
comment_content TEXT,
comment_created DATETIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (comment_user_id) REFERENCES users(user_id) ON DELETE CASCADE,
FOREIGN KEY (comment_post_id) REFERENCES posts(post_id) ON DELETE CASCADE
)
Engine = InnoDb;
```
