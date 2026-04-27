CREATE DATABASE alupeoutpatient;
CREATE TABLE `alupeoutpatient`.`login` 
	( `userid` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	 `firstname` VARCHAR(50) NOT NULL ,
	  `lastname` VARCHAR(50) NOT NULL ,
	   `email` VARCHAR(50) NOT NULL ,
	     `secret` VARCHAR(150) NOT NULL ,
	  `password` VARCHAR(200) NOT NULL ,
	    `registration_date` DATETIME NOT NULL ,
	     `user_level` TINYINT(1) NOT NULL ,
	    PRIMARY KEY (`userid`)) ENGINE = InnoDB;
		
	CREATE TABLE `alupeoutpatient`.`reply` 
	( `reply_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	   `email` VARCHAR(50) NOT NULL ,
	     `message` VARCHAR(200) NOT NULL ,
		 	    `post_date` DATETIME NOT NULL ,
		 	   `adminstrator` VARCHAR(50) NOT NULL ,
	   `response` VARCHAR(250) NOT NULL ,
	    `reply_date` DATETIME NOT NULL ,
	    PRIMARY KEY (`reply_id`)) ENGINE = InnoDB;
		CREATE TABLE `alupeoutpatient`.`contactus` 
	( `message_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	   `email` VARCHAR(50) NOT NULL ,
	  `mobile_number` Text(150) NOT NULL ,
	     `message` VARCHAR(200) NOT NULL ,
	    `post_date` DATETIME NOT NULL ,
	    PRIMARY KEY (`message_id`)) ENGINE = InnoDB;
		CREATE TABLE `alupeoutpatient`.`queue` 
	( `patient_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	 `firstname` VARCHAR(50) NOT NULL ,
	  `lastname` VARCHAR(50) NOT NULL ,
	   `email` VARCHAR(50) NOT NULL ,
	    `date` DATETIME NOT NULL ,
	    PRIMARY KEY (`patient_id`)) ENGINE = InnoDB;
		CREATE TABLE `alupeoutpatient`.`disease_details` 
	( `disease_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	 `firstname` VARCHAR(50) NOT NULL ,
	  `lastname` VARCHAR(50) NOT NULL ,
	   `email` VARCHAR(50) NOT NULL ,
	   	   `disease_name` VARCHAR(50) NOT NULL ,
	   	   `disease_information` VARCHAR(50) NOT NULL ,
	    `date` DATETIME NOT NULL ,
	    PRIMARY KEY (`disease_id`)) ENGINE = InnoDB;
		CREATE TABLE `alupeoutpatient`.`patient_details` 
		( `service_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	 `firstname` VARCHAR(50) NOT NULL ,
	  `lastname` VARCHAR(50) NOT NULL ,
	   `email` VARCHAR(50) NOT NULL ,
	   	  `age` INT(5) NOT NULL ,
	  	  `mobile_number` Text(150) NOT NULL ,
	   `gender` VARCHAR(50) NOT NULL ,
	   `address` VARCHAR(50) NOT NULL ,
	    `date` DATETIME NOT NULL ,
	    PRIMARY KEY (`service_id`)) ENGINE = InnoDB;
		CREATE TABLE `alupeoutpatient`.`medicine_details` 
	( `medicine_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	 `firstname` VARCHAR(50) NOT NULL ,
	  `lastname` VARCHAR(50) NOT NULL ,
	   `email` VARCHAR(50) NOT NULL ,
	   	   `drug_name` VARCHAR(50) NOT NULL ,
	   	   `purpose` VARCHAR(50) NOT NULL ,
		   	   	  `quantity` INT(5) NOT NULL ,
	    `date` DATETIME NOT NULL ,
	    PRIMARY KEY (`medicine_id`)) ENGINE = InnoDB;
			CREATE TABLE `alupeoutpatient`.`consultation_details` 
	( `consultation_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	 `firstname` VARCHAR(50) NOT NULL ,
	  `lastname` VARCHAR(50) NOT NULL ,
	   `email` VARCHAR(50) NOT NULL ,
	   	   `diagnostic` VARCHAR(50) NOT NULL ,
	   	   `treatment` VARCHAR(50) NOT NULL ,
		   	   	   `blood_pressure` VARCHAR(50) NOT NULL ,
	   	   `weight` VARCHAR(50) NOT NULL ,
	   	   `doctor_name` VARCHAR(50) NOT NULL ,
	    `date` DATETIME NOT NULL ,
	    PRIMARY KEY (`consultation_id`)) ENGINE = InnoDB;
			
CREATE TABLE `alupeoutpatient`.`medicine_bills` 
	( `bill_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	 `firstname` VARCHAR(50) NOT NULL ,
	  `lastname` VARCHAR(50) NOT NULL ,
	   `email` VARCHAR(50) NOT NULL ,
	   	   `medicine` VARCHAR(50) NOT NULL ,
				  		   	   	  `amount` INT(5) NOT NULL ,
	    `date` DATETIME NOT NULL ,
	    PRIMARY KEY (`bill_id`)) ENGINE = InnoDB;
		CREATE TABLE `alupeoutpatient`.`lab_details` 
	( `test_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	 `firstname` VARCHAR(50) NOT NULL ,
	  `lastname` VARCHAR(50) NOT NULL ,
	   `email` VARCHAR(50) NOT NULL ,
	   	   `test_name` VARCHAR(50) NOT NULL ,
				  		   	   `results` VARCHAR(50) NOT NULL ,
	    `date` DATETIME NOT NULL ,
	    PRIMARY KEY (`test_id`)) ENGINE = InnoDB;
		CREATE TABLE `alupeoutpatient`.`payment_details` 
	( `payment_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	 `firstname` VARCHAR(50) NOT NULL ,
	  `lastname` VARCHAR(50) NOT NULL ,
	   `email` VARCHAR(50) NOT NULL ,
	   	   	   `medicine` VARCHAR(50) NOT NULL ,
	   	   `payment_method` VARCHAR(50) NOT NULL ,
				  		   	   	  `amount` INT(5) NOT NULL ,
	    `date` DATETIME NOT NULL ,
	    PRIMARY KEY (`payment_id`)) ENGINE = InnoDB;
		CREATE TABLE `alupeoutpatient`.`dispersion_details` 
	( `dispersion_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
	 `firstname` VARCHAR(50) NOT NULL ,
	  `lastname` VARCHAR(50) NOT NULL ,
	   `email` VARCHAR(50) NOT NULL ,
	   	   	   `medicine` VARCHAR(50) NOT NULL ,
	   	   `payment_method` VARCHAR(50) NOT NULL ,
				  		   	   	  `amount` INT(5) NOT NULL ,
								  	   	   	   `status` VARCHAR(50) NOT NULL ,

	    `date` DATETIME NOT NULL ,
	    PRIMARY KEY (`dispersion_id`)) ENGINE = InnoDB;