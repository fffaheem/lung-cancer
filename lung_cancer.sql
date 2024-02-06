create table `users`(
  `s_no` integer primary key  AUTO_INCREMENT,
  `name` text,
  `email` varchar(256) unique,
  `password` text,
  `time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB ;


create table `records`(
  `s_no` integer primary key  AUTO_INCREMENT,
  `name` text,
  `email` varchar(256),
  `image` text,
  `diagnosis` text,
  `time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB ;