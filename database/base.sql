-- This is the schema used for the restaurant reviews application

-- Create users table
DROP TABLE if EXISTS `users`;
CREATE TABLE `users` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `firstname` varchar(50) NOT NULL,
    `middlename` varchar(50) default NULL,
    `lastname` varchar(50) NOT NULL,
    `country` varchar(3) default NULL,
    `created` timestamp NOT NULL DEFAULT 0,
    `modified` timestamp NOT NULL DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insert some default data
INSERT INTO `users` (`email`, `firstname`, `lastname`, `country`) VALUES ('sitokgs@gmail.com', 'Kevin', 'Sito', 'CA');


-- Create restaurants table
DROP TABLE if EXISTS `restaurants`;
CREATE TABLE `restaurants` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    `description` varchar(300) default NULL,
    `country` varchar(3) default NULL,
    `state` varchar(50) default NULL,
    `zip` varchar(50) default NULL,
    `city` varchar(50) default NULL,
    `address` varchar(200) default NULL,
    `phone` varchar(20) default NULL,
    `cuisine` varchar(50) default NULL,
--     `reviews` int(10) unsigned,
--     `rating` tinyint unsigned,
    `created` timestamp NOT NULL DEFAULT 0,
    `modified` timestamp NOT NULL DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insert some default data
INSERT INTO `restaurants` (`name`, `country`, `state`, `zip`, `city`, `address`, `phone`, `cuisine`) VALUES ('My First Restaurant', 'CA', 'Ontario', 'A1B3C4', 'Toronto', '123 Fake St.', '416-225-1971', 'Canadian');


-- Create reviews table
DROP TABLE if EXISTS `reviews`;
CREATE TABLE `reviews` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `user_id` int(10) unsigned NOT NULL,
    `restaurant_id` int(10) unsigned NOT NULL,
    `comment` varchar(300) NOT NULL,
    `rating` tinyint unsigned NOT NULL,
    `created` timestamp NOT NULL DEFAULT 0,
    `modified` timestamp NOT NULL DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_reviews_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_reviews_restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insert some default data
