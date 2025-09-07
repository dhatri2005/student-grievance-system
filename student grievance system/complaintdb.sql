
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `ad_name` varchar(255) NOT NULL,
  `adminno` int(10) NOT NULL,
  `cred_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `complaints` (
  `comp_id` int(10) NOT NULL,
  `comp_cat` varchar(255) NOT NULL,
  `comp_loct` varchar(255) NOT NULL,
  `comp_desc` varchar(255) NOT NULL,
  `comp_date` date NOT NULL,
  `comp_status` int(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL,

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `credentials` (
  `cred_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `officers` (
  `officer_id` int(10) NOT NULL,
  `off_name` varchar(255) NOT NULL,
  `offno` int(10) NOT NULL,
  `cred_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `telno` int(20) NOT NULL,
  `studno` int(10) DEFAULT NULL,
  `staffno` int(10) DEFAULT NULL,
  `cred_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `credadmin_fk` (`cred_id`);


ALTER TABLE `complaints`
  ADD PRIMARY KEY (`comp_id`),

  ADD KEY `userid_fk` (`user_id`);


ALTER TABLE `credentials`
  ADD PRIMARY KEY (`cred_id`);


ALTER TABLE `officers`
  ADD PRIMARY KEY (`officer_id`),
  ADD KEY `credoff_fk` (`cred_id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `creduser_fk` (`cred_id`);


ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `complaints`
  MODIFY `comp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `credentials`
  MODIFY `cred_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;


ALTER TABLE `officers`
  MODIFY `officer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `admins`
  ADD CONSTRAINT `credadmin_fk` FOREIGN KEY (`cred_id`) REFERENCES `credentials` (`cred_id`);


ALTER TABLE `complaints`
 
  ADD CONSTRAINT `userid_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);


ALTER TABLE `officers`
  ADD CONSTRAINT `credoff_fk` FOREIGN KEY (`cred_id`) REFERENCES `credentials` (`cred_id`);


ALTER TABLE `users`
  ADD CONSTRAINT `creduser_fk` FOREIGN KEY (`cred_id`) REFERENCES `credentials` (`cred_id`);
COMMIT;

