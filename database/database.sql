CREATE TABLE `Users`(
    `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `full_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `phone_number` INT NOT NULL,
    `ID` VARCHAR(255) NOT NULL COMMENT 'student registration ID or employee ID likewise',
    `role_id` INT NOT NULL,
    `section_id` INT NULL,
    `created_at` TIMESTAMP NOT NULL
);
ALTER TABLE
    `Users` ADD UNIQUE `users_email_unique`(`email`);
ALTER TABLE
    `Users` ADD UNIQUE `users_phone_number_unique`(`phone_number`);
ALTER TABLE
    `Users` ADD UNIQUE `users_id_unique`(`ID`);
CREATE TABLE `Issues`(
    `issue_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `evidence` BLOB NOT NULL,
    `location` VARCHAR(255) NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `assigned_to_user_id` INT NULL,
    `reported_by_user_id` INT NOT NULL,
    `reported_at` TIMESTAMP NOT NULL,
    `resolved_at` TIMESTAMP NULL,
    `upVotes` INT NULL
);
CREATE TABLE `Roles`(
    `role_id` INT UNSIGNED NOT NULL,
    `role_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`role_id`)
);
CREATE TABLE `Section`(
    `section_id` INT UNSIGNED NOT NULL,
    `section_name` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    PRIMARY KEY(`section_id`)
);
CREATE TABLE `Issue_Updates`(
    `update_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `issue_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    `comment` TEXT NOT NULL,
    `new_status` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL
);
CREATE TABLE `Issue_Upvote`(
    `upvote_id` INT NOT NULL,
    `issue_id` VARCHAR(255) NOT NULL,
    `user_id` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`upvote_id`)
);
CREATE TABLE `Notifications`(
    `notific_id` INT NOT NULL,
    `notific_type` VARCHAR(255) NOT NULL COMMENT 'e.g: \'ISSUE_ASSIGNED\', \'STATUS_UPDATED\' , \'Announcement\'',
    `notific_head` VARCHAR(255) NOT NULL,
    `notific_body` TEXT NULL,
    PRIMARY KEY(`notific_id`)
);
CREATE TABLE `Notify`(
    `notific_log` INT NOT NULL,
    `notific_id` INT NOT NULL,
    `receiver_id` INT NOT NULL,
    `notific_sent_time` TIMESTAMP NOT NULL,
    `notific_seen_time` TIMESTAMP NULL,
    PRIMARY KEY(`notific_log`)
);
ALTER TABLE
    `Issues` ADD CONSTRAINT `issues_assigned_to_user_id_foreign` FOREIGN KEY(`assigned_to_user_id`) REFERENCES `Users`(`user_id`);
ALTER TABLE
    `Issue_Updates` ADD CONSTRAINT `issue_updates_issue_id_foreign` FOREIGN KEY(`issue_id`) REFERENCES `Issues`(`issue_id`);
ALTER TABLE
    `Users` ADD CONSTRAINT `users_section_id_foreign` FOREIGN KEY(`section_id`) REFERENCES `Section`(`section_id`);
ALTER TABLE
    `Issues` ADD CONSTRAINT `issues_reported_by_user_id_foreign` FOREIGN KEY(`reported_by_user_id`) REFERENCES `Users`(`user_id`);
ALTER TABLE
    `Notify` ADD CONSTRAINT `notify_notific_id_foreign` FOREIGN KEY(`notific_id`) REFERENCES `Notifications`(`notific_id`);
ALTER TABLE
    `Notify` ADD CONSTRAINT `notify_receiver_id_foreign` FOREIGN KEY(`receiver_id`) REFERENCES `Users`(`user_id`);
ALTER TABLE
    `Issue_Upvote` ADD CONSTRAINT `issue_upvote_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `Users`(`user_id`);
ALTER TABLE
    `Issue_Updates` ADD CONSTRAINT `issue_updates_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `Users`(`user_id`);
ALTER TABLE
    `Users` ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY(`role_id`) REFERENCES `Roles`(`role_id`);
ALTER TABLE
    `Issue_Upvote` ADD CONSTRAINT `issue_upvote_issue_id_foreign` FOREIGN KEY(`issue_id`) REFERENCES `Issues`(`issue_id`);