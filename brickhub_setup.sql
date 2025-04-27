CREATE TABLE `articles` (
  `id` int(11) PRIMARY KEY,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT null,
  `content` text NOT NULL,
  `game_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT (current_timestamp()),
  `updated_at` timestamp NOT NULL DEFAULT (current_timestamp())
);

CREATE TABLE `faqs` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT (current_timestamp()),
  `updated_at` timestamp NOT NULL DEFAULT (current_timestamp())
);

CREATE TABLE `games` (
  `id` int(11) PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `exe_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) DEFAULT null,
  `release_date` datetime NOT NULL,
  `download_link` varchar(255) DEFAULT null,
  `short_desc` varchar(35) DEFAULT null,
  `developer_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT (current_timestamp()),
  `updated_at` timestamp NOT NULL DEFAULT (current_timestamp())
);

CREATE TABLE `game_genres` (
  `game_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`, `genre_id`)
);

CREATE TABLE `genres` (
  `id` int(11) PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
);

CREATE TABLE `members` (
  `id` int(11) PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `git_url` varchar(255) DEFAULT null,
  `linkedin_url` varchar(255) DEFAULT null,
  `image` varchar(255) DEFAULT null,
  `created_at` timestamp NOT NULL DEFAULT (current_timestamp()),
  `updated_at` timestamp NOT NULL DEFAULT (current_timestamp())
);

CREATE TABLE `migrations` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
);

CREATE TABLE `pages` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT null,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT (current_timestamp()),
  `updated_at` timestamp NOT NULL DEFAULT (current_timestamp())
);

CREATE TABLE `playtime` (
  `id` int(11) PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `playtime_minutes` int(11) DEFAULT 0,
  `last_played` timestamp NOT NULL DEFAULT (current_timestamp())
);

CREATE TABLE `reviews` (
  `id` int(11) PRIMARY KEY,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review_title` varchar(255) NOT NULL,
  `review_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT (current_timestamp()),
  `updated_at` timestamp NOT NULL DEFAULT (current_timestamp())
);

CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT("USER"),
  `created_at` timestamp NOT NULL DEFAULT (current_timestamp()),
  `updated_at` timestamp NOT NULL DEFAULT (current_timestamp())
);

CREATE TABLE `tokens` (
  `id` int(11) PRIMARY KEY,
  `device` boolean NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT (current_timestamp()),
  `expiry_date` datetime NOT NULL
);

ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `playtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `playtime` ADD UNIQUE KEY (`user_id`, `game_id`);


ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`developer_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `games_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `members` (`id`);

ALTER TABLE `game_genres`
  ADD CONSTRAINT `game_genres_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `game_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

ALTER TABLE `playtime`
  ADD CONSTRAINT `playtime_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `playtime_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

COMMIT;