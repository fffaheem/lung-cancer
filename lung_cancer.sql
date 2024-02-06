create table `users`(
  `s_no` integer primary key  AUTO_INCREMENT,
  `email` varchar(256) unique,
  `password` text,
  `time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB ;