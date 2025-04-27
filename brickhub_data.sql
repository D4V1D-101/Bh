INSERT INTO `genres` (`id`, `name`, `slug`) VALUES
(1, 'FPS', 'fps'),
(2, 'Atmospheric', 'atmospheric'),
(3, 'Story Rich', 'story rich'),
(4, 'Action', 'action'),
(5, 'Horror', 'horror'),
(6, 'Challenging', 'challenging'),
(7, 'Rage', 'rage'),
(8, 'Remaster', 'remaster'),
(9, 'Stealth', 'stealth'),
(10, 'Sci-Fi', 'sci-fi'),
(11, 'Platformer', 'platformer');

INSERT INTO `members` (`id`, `name`, `designation`, `git_url`, `linkedin_url`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Team Bobr', 'Publisher', NULL, '', 'https://i.postimg.cc/13Jfctrn/bobr.png', '2025-03-16 12:45:41', '2025-03-16 12:45:41'),
(2, 'id Software', 'Developer', NULL, 'https://www.linkedin.com/company/id-software', 'https://i.postimg.cc/g2rhn83t/id.png', '2025-04-07 09:00:29', '2025-04-07 09:00:29'),
(3, 'Bethesda Softworks', 'Publisher', NULL, 'https://www.linkedin.com/company/bethesda-game-studios', 'https://i.postimg.cc/xjRN5tRF/bethesda.png', '2025-04-07 09:02:05', '2025-04-07 09:02:05');

INSERT INTO `games` (`id`, `name`, `exe_name`, `description`, `image_path`, `release_date`, `download_link`, `short_desc`, `developer_id`, `publisher_id`, `created_at`, `updated_at`) VALUES
(1, 'Campfire Quest', 'TopDownGame', 'Embark on a pixel-perfect adventure where brains and speed collide! In this retro-style puzzle game, you’ll explore vibrant villages and mysterious ruins as a clever hero with the power to dash, push boxes, and activate buttons that magically raise bridges from the water.\r\n\r\nUse quick reflexes and smart thinking to solve environmental puzzles, unlock hidden paths, and outwit tricky traps. Every level brings new surprises as you master the art of movement and manipulation in a beautifully crafted pixel world.\r\n\r\nCan you clear every challenge and uncover the secrets that lie beyond the bridges?', 'https://i.postimg.cc/VvsmG9Rj/campfire.png', '2024-12-04 12:00:00', 'https://www.dropbox.com/scl/fi/su1c1nzcwxet6iyms4ht4/TopDownGame.zip?rlkey=2g09d58y2544u95lcbg0srjx6&st=5xs8xo58&dl=1', 'Dash, Push & Puzzle the Land!', 1, 1, '2025-03-16 12:51:05', '2025-03-16 12:51:05'),
(2, 'Flappy Bird', 'FlappyBird', 'Players control a small bird, tapping the screen to make it \"flap\" and stay airborne. The objective is to navigate the bird through a series of green pipes without crashing into them. Each successful pass through a pipe earns the player a point. Despite its minimal design and easy controls, the game is notoriously difficult due to the tight spaces and the bird’s rapid descent when not flapping.', 'https://i.postimg.cc/q7gB0GVQ/flappy.png', '2023-11-15 12:00:00', 'https://www.dropbox.com/scl/fi/kvjwp2yqug2o106qgycnd/FlappyBird.zip?rlkey=5imschnd55ikcwsvj5e22g1er&st=pzrdpvk0&dl=1', 'Tap to flap and dodge the pipes!', 1, 1, '2025-03-16 13:14:37', '2025-03-16 13:14:37'),
(3, 'DOOM (2016)', 'doom', 'You’ve come here for a reason. The Union Aerospace Corporation’s massive research facility on Mars is overwhelmed by fierce and powerful demons, and only one person stands between their world and ours. As the lone DOOM Marine, you’ve been activated to do one thing – kill them all.', 'https://i.postimg.cc/pXt9chTR/doom2016.webp', '2016-05-13 12:00:00', NULL, 'Fast-paced demon-slaying shooter.', 2, 3, '2025-03-16 13:34:41', '2025-03-16 13:34:41'),
(4, 'Wall-E Adventure', 'WallE', 'Step into the rusted treads of Wall-E, the last robot left to clean a trash-covered Earth! In Wall-E Adventure, you’ll be guiding Wall-E on his mission to clean up the planet one piece of trash at a time. Navigate through obstacles, and use Wall-E’s compacting abilities to collect piles of garbage.\r\nCan you help Wall-E clean up the mess and bring hope back to Earth?', 'https://i.postimg.cc/VNHqL4SN/walle.png', '2024-12-20 12:00:00', 'https://www.dropbox.com/scl/fi/t4h9giv3te4p0nspuivwc/WallE.zip?rlkey=m5a0g1piz1y6ycc5c746b4dxb&st=u795dqjr&dl=1', 'Help Wall-E clean up Earth!', 1, 1, '2025-03-16 13:50:39', '2025-03-16 13:50:39');

INSERT INTO `game_genres` (`game_id`, `genre_id`) VALUES
(1, 2),
(1, 3),
(2, 4),
(2, 6),
(2, 7),
(3, 1),
(3, 2),
(3, 4),
(3, 10),
(4, 2),
(4, 10),
(4, 11);
;
INSERT INTO `articles` (`id`, `title`, `author`, `image`, `content`, `game_id`, `created_at`, `updated_at`) VALUES
(1, 'Campfire Quest: A Puzzle Adventure You Can’t Miss', 'Angel Batista', 'https://i.postimg.cc/VvsmG9Rj/campfire.png', '\"Campfire Quest\" is an immersive puzzle-platformer game where players embark on a thrilling journey to overcome challenging obstacles using wit and agility. As you move through a variety of beautifully designed levels, your main tools are your movement, dash, and the ability to manipulate boxes. But it doesn’t stop there – the game introduces creative mechanics like pressing buttons to raise bridges from the water, transforming your surroundings into walkable paths. Each level is designed to keep you thinking on your feet, providing both relaxation and mental stimulation.', 1, '2025-03-16 12:51:56', '2025-03-16 12:51:56'),
(2, 'Flappy Bird: The Ultimate Test of Timing and Patience', 'Dexter Morgan', 'https://i.postimg.cc/q7gB0GVQ/flappy-Bird-Cover.png', 'Flappy Bird is a straightforward, yet incredibly challenging arcade game that tests your reflexes and patience. You control a small bird as it attempts to navigate through an endless series of pipes. The objective is simple – tap the screen to keep the bird airborne and avoid hitting the pipes. Each tap makes the bird flap its wings and ascend a little, while gravity naturally pulls it down. As you progress, the pipes come faster and closer, making it an increasingly difficult challenge to stay alive.', 2, '2025-03-16 13:19:39', '2025-03-16 13:19:39'),
(3, 'DOOM (2016): A Modern Reboot of Brutality', 'James Doakes', 'https://i.postimg.cc/pXt9chTR/doom2016.webp', 'DOOM (2016) revitalized the classic franchise with fast-paced, visceral combat and a return to the franchise’s roots. Set on Mars, players control the Doom Slayer as they battle demons from Hell using an arsenal of powerful weapons. The game emphasizes speed, aggressive action, and movement, with no hiding behind cover. Featuring heavy metal music, brutal executions, and a focus on old-school gameplay, DOOM (2016) earned praise for its high-octane action and masterful balance between nostalgia and modern design, reestablishing the franchise as a force in gaming.', 3, '2025-03-16 13:37:47', '2025-03-16 13:37:47'),
(4, 'Wall-E’s Trash Collection Adventure', 'Vince Masuka', 'https://i.postimg.cc/VNHqL4SN/walle.png', 'In Wall-E’s Trash Collection Adventure, you play as the beloved robot Wall-E, on a mission to clean up a world full of discarded debris. Navigate through various environments, solving puzzles and overcoming obstacles as you collect trash and restore the planet to its former glory. With each level, new challenges arise, making it not just a fun, but also a thoughtful journey.\r\n\r\nThe game revolves around moving Wall-E around each level, collecting pieces of trash scattered across the environment. You must plan your route carefully, as some trash might be in hard-to-reach areas or hidden behind obstacles. ', 4, '2025-03-16 13:52:09', '2025-03-16 13:52:09');

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$8Lhw9V7rqjAY4zwEUW5QqQ$qLfY4sM3KDNSSgg6bFBwG4RGLjXXFWW/rg005hlq/M4', 'ADMIN', '2025-03-16 12:53:41', '2025-03-16 12:53:41'),
(2, 'gamer01', 'gamer01@example.com', '$argon2id$v=19$m=65536,t=4,p=1$U1VCT0tCd3RuQ0c3NkpoZg$P6c5Rmfmr3mU1ePbDrIGYjW4ZBz7mDCcNE1Z6LuNabM', 'USER', '2025-04-01 10:00:00', '2025-04-01 10:00:00'),
(3, 'player_two', 'player2@example.com', '$argon2id$v=19$m=65536,t=4,p=1$cmhDdml0M2xrOXNQbVJHcw$wUJJLQGVqBG2HP37Py4ic62vpxrHOnPLm95yCeE9xIs', 'USER', '2025-04-02 11:30:00', '2025-04-02 11:30:00'),
(4, 'shadowfox', 'shadowfox@example.com', '$argon2id$v=19$m=65536,t=4,p=1$QkpnZXVqRmlxaDdoMlpYTA$hP9Ky6lklcU3J3IYyPOz7C8xLVVmN1YyIGYqD7yR5VI', 'USER', '2025-04-03 14:15:00', '2025-04-03 14:15:00'),
(5, 'arcadia', 'arcadia@example.com', '$argon2id$v=19$m=65536,t=4,p=1$Mm1SRldCRldxN2RuNWZsYQ$xMDoj0ROHATFC5k7S2Qt1Ebx9jRNsTH4pRgVxEhhVzw', 'USER', '2025-04-04 09:45:00', '2025-04-04 09:45:00'),
(6, 'luna_chaser', 'luna@example.com', '$argon2id$v=19$m=65536,t=4,p=1$dkt5Q1l3d1loR0l3M0FwRA$zKD9DU1I6Fi0OXrpM0ro6f9PGFcNzzmW9kReRE9ktTw', 'USER', '2025-04-05 13:20:00', '2025-04-05 13:20:00');

INSERT INTO `reviews` (`id`, `game_id`, `user_id`, `rating`, `review_title`, `review_text`, `created_at`, `updated_at`) VALUES
-- Reviews for Campfire Quest
(1, 1, 1, 9, 'Charming and Clever!', 'Campfire Quest is a wonderful little puzzle game! The pixel art is beautiful and the challenges feel fair yet satisfying. Highly recommended for puzzle lovers.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(2, 1, 2, 8, 'Solid brain teaser', 'Really enjoyed solving the puzzles. Some levels were a bit too easy, but overall a relaxing and fun experience.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(3, 1, 3, 7, 'Fun, but needs more variety', 'Campfire Quest starts off great, but after a while the puzzles get a bit repetitive. Still, a great pixel art world!', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(4, 1, 4, 9, 'Loved every minute!', 'The dash mechanics feel so good! Super charming, with clever level design that keeps you engaged.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(5, 1, 5, 6, 'Pretty but short', 'Loved the art and music, but I wish it was a bit longer. Worth it for a weekend chill game.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(6, 1, 6, 8, 'A pixel-perfect journey', 'Cute and smart. Some puzzles were really challenging! Great little game for fans of retro styles.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),

-- Reviews for Flappy Bird
(7, 2, 1, 6, 'Frustrating but addictive', 'Simple concept, but so easy to mess up! I lost track of time playing this.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(8, 2, 2, 7, 'Classic rage game', 'One of those games you love and hate at the same time. Perfect for quick breaks.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(9, 2, 3, 5, 'Not my style', 'Found it more frustrating than fun after a few minutes, but I see the appeal for some.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(10, 2, 4, 8, 'Flap flap flap!', 'The pure simplicity is genius. Addictive and challenging. Gotta beat my high score!', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(11, 2, 5, 6, 'Quick fun', 'Good for a few laughs, but can get old pretty quickly. Great time killer though.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(12, 2, 6, 7, 'Infuriatingly fun', 'Simple graphics, simple controls, yet so brutally hard! Love-hate relationship.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),

-- Reviews for DOOM (2016)
(13, 3, 1, 10, 'An adrenaline rush', 'DOOM 2016 is pure chaos and carnage. Smooth gameplay, brutal action, and a fantastic soundtrack.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(14, 3, 2, 9, 'Intense and satisfying', 'The shooting feels perfect, and the pacing keeps you moving. A masterpiece of the genre.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(15, 3, 3, 8, 'Fast and furious', 'Great game if you love nonstop action. Some levels felt a bit long though.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(16, 3, 4, 10, 'Glory kills never get old', 'Absolutely loved every minute. Brutal, fast, and so satisfying.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(17, 3, 5, 7, 'Good, but not amazing', 'Enjoyed the combat, but after a while it felt repetitive. Still a solid shooter.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(18, 3, 6, 9, 'Demon-slaying bliss', 'Incredible level design, great weapons, and just pure fun. Highly recommended!', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),

-- Reviews for Wall-E Adventure
(19, 4, 1, 7, 'Cute and relaxing', 'Wall-E Adventure is charming! It’s a simple but enjoyable cleanup journey with a sweet message.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(20, 4, 2, 6, 'Nice idea, basic execution', 'Loved Wall-E, but the gameplay feels a bit repetitive after a while. Good for kids though.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(21, 4, 3, 8, 'Wall-E fans will love it', 'Heartwarming experience helping Wall-E save the Earth. Great vibes and simple fun.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(22, 4, 4, 7, 'Chill little adventure', 'Perfect game to unwind with. Could use more variety in levels, but Wall-E is adorable.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(23, 4, 5, 5, 'Gets boring fast', 'Nice graphics but shallow gameplay. Great for a young audience though.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(24, 4, 6, 7, 'Wholesome fun', 'Not the deepest game, but charming and relaxing. Worth a casual playthrough.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

INSERT INTO `playtime` (`id`, `user_id`, `game_id`, `playtime_minutes`, `last_played`) VALUES
-- Playtimes for Campfire Quest
(1, 1, 1, 320, CURRENT_TIMESTAMP), -- admin
(2, 2, 1, 250, CURRENT_TIMESTAMP), -- gamer01
(3, 3, 1, 180, CURRENT_TIMESTAMP), -- player_two
(4, 4, 1, 310, CURRENT_TIMESTAMP), -- shadowfox
(5, 5, 1, 150, CURRENT_TIMESTAMP), -- arcadia
(6, 6, 1, 200, CURRENT_TIMESTAMP), -- luna_chaser

-- Playtimes for Flappy Bird
(7, 1, 2, 45, CURRENT_TIMESTAMP),
(8, 2, 2, 60, CURRENT_TIMESTAMP),
(9, 3, 2, 30, CURRENT_TIMESTAMP),
(10, 4, 2, 70, CURRENT_TIMESTAMP),
(11, 5, 2, 25, CURRENT_TIMESTAMP),
(12, 6, 2, 55, CURRENT_TIMESTAMP),

-- Playtimes for DOOM (2016)
(13, 1, 3, 980, CURRENT_TIMESTAMP),
(14, 2, 3, 890, CURRENT_TIMESTAMP),
(15, 3, 3, 700, CURRENT_TIMESTAMP),
(16, 4, 3, 950, CURRENT_TIMESTAMP),
(17, 5, 3, 620, CURRENT_TIMESTAMP),
(18, 6, 3, 870, CURRENT_TIMESTAMP),

-- Playtimes for Wall-E Adventure
(19, 1, 4, 210, CURRENT_TIMESTAMP),
(20, 2, 4, 170, CURRENT_TIMESTAMP),
(21, 3, 4, 190, CURRENT_TIMESTAMP),
(22, 4, 4, 220, CURRENT_TIMESTAMP),
(23, 5, 4, 140, CURRENT_TIMESTAMP),
(24, 6, 4, 200, CURRENT_TIMESTAMP);


INSERT INTO `pages` (`id`, `title`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 'About us', 'https://i.postimg.cc/nhSxLqwm/brickhub-Logo.png', '<p>We are passionate developers dedicated to creating an engaging gaming experience.<br>Brickhub is not just a project-it’s a vision to bring gamers a seamless and enjoyable way to access their favorite games.<br>Icludes a game launcher&nbsp; and a companion website to enhance your gaming journey. Stay tuned for updates!&nbsp;</p><h2>Made by:<br>Major Levente Rigo David Istvan</h2>', '2025-03-31 06:45:31', '2025-03-31 06:46:42'),
(2, 'Privacy Policy', 'https://i.postimg.cc/sDWCXQ3K/image.png', '<h3><strong>1. Introduction</strong></h3><p>We respect your privacy and are committed to protecting your personal data. This policy explains how we collect, use, and protect your information.</p><h3><strong>2. Information We Collect</strong></h3><p>We may collect personal details (e.g., name, email) and usage data (e.g., IP address, browsing behavior).</p><h3><strong>3. How We Use Your Information</strong></h3><p>We use your data to provide services, improve our website, and communicate with you.</p><h3><strong>4. Data Sharing</strong></h3><p>We do not sell your data but may share it with service providers or authorities if required by law.</p><h3><strong>5. Security &amp; Your Rights</strong></h3><p>We protect your data and allow you to access, update, or delete it. You can also manage cookies via browser settings.</p><h3><strong>6. Changes &amp; Contact</strong></h3><p>We may update this policy. For inquiries, contact us at brickhubteam@gmail.com.</p>', '2025-03-31 06:55:32', '2025-03-31 07:01:27'),
(3, 'Terms & Conditions', 'https://i.postimg.cc/d1GSFd2T/image.png', '<h3><strong>1. Introduction</strong></h3><p>By using our services, you agree to these Terms &amp; Conditions. Please read them carefully.</p><h3><strong>2. Use of Services</strong></h3><p>You must use our services lawfully and not engage in any prohibited activities.</p><h3><strong>3. Account Responsibility</strong></h3><p>You are responsible for maintaining the confidentiality of your account information.</p><h3><strong>4. Limitations of Liability</strong></h3><p>We are not liable for any damages arising from the use of our services.</p><h3><strong>5. Changes to Terms</strong></h3><p>We may update these Terms at any time. Continued use of our services implies acceptance of any changes.</p><h3><strong>6. Contact</strong></h3><p>For questions, contact us at brickhubteam@gmail.com.</p>', '2025-03-31 07:01:14', '2025-03-31 07:01:14');

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'How to install our launcher?', '<p>In the home page you download, can download the launcher with the <em>\"Download\"</em> button.</p>', '2025-03-31 06:03:38', '2025-03-31 07:06:27');