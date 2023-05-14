CREATE DEFINER=`admin`@`%` PROCEDURE `update_profile`(in e_mail varchar(255),in sec_A1 varchar(255), in sec_A2 varchar(255), in sec_A3 varchar(255),
                                    in fName varchar(255), in lName varchar(255))
BEGIN	
    DECLARE perm_level varchar(255);
    -- SET id = (SELECT user_id FROM users WHERE email = e_mail);
    SET SQL_SAFE_UPDATES=0;
	UPDATE users
    SET -- security_question1 = sec_Q1,
        security_answer1 = sec_A1,
        -- security_question2 = sec_Q2,
        security_answer2 = sec_A2,
        -- security_question3 = sec_Q3,
        security_answer3 = sec_A3,
        first_name = fName,
        last_name = lName
	WHERE email = e_mail;

    SET perm_level = (SELECT role FROM users WHERE email = e_mail);
    
    IF (perm_level LIKE 'driver') THEN
		UPDATE drivers
		SET first_name = fName,
			last_name = lName
		WHERE email = e_mail;
	ELSEIF (perm_level LIKE 'sponsor') THEN
		UPDATE sponsors
        SET first_name = fName,
			last_name = lName
		WHERE email = e_mail;
	ELSEIF (perm_level LIKE 'admin') THEN
		UPDATE admins
        SET first_name = fName,
			last_name = lName
		WHERE email = e_mail;
    END IF;
END