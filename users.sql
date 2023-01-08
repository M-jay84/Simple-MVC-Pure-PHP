CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  `secret` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(80) NOT NULL DEFAULT '',
  `status` enum('pending','confirmed') NOT NULL DEFAULT 'pending',
  `added` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status_added` (`status`,`added`)
) ENGINE=MyISAM;

INSERT INTO `users` (`id`, `username`, `password`, `secret`, `email`, `status`, `added`) VALUES
(1, 'M-jay', 'someencryptedpassword', 'Ji7zJthmkjJSXggZUWNz', 'some_eamil@yahoo.com', 'confirmed', '2018-05-04 15:22:50');