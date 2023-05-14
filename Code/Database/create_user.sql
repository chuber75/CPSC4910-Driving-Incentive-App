CREATE DEFINER=`admin`@`%` PROCEDURE `create_user`(in E_mail varchar(255),in pw varchar(255),in my_role varchar(255),in stat tinyint,
									in q1 varchar(255),in ans1 varchar(255),in q2 varchar(255),in ans2 varchar(255),in q3 varchar(255),
                                    in ans3 varchar(255),in fName varchar(255),in lName varchar(255),in locke tinyint)
BEGIN
	DECLARE total_users int;
    -- Add new account to users table
	INSERT INTO users (email, password, role, active, security_question1, security_answer1, security_question2, security_answer2,
					security_question3, security_answer3, first_name, last_name, locked)
				VALUES (E_mail, pw, my_role, stat, q1, ans1, q2, ans2, q3, ans3, fName, lName, locke);
		
    -- To find last AI insert to Users table
	SET total_users = (SELECT max(user_id) FROM users);
    
    -- Initial password history upon user acc. creation
	INSERT INTO password_history(pass_id, u_id, password, is_current)
		VALUES(0, total_users, pw, 1);
	
    -- Inserts user information to table respective of their role
	IF (my_role LIKE 'driver') THEN
		INSERT INTO drivers(driver_id, email, password, first_name, last_name, address, curr_status)
				VALUES (u_id, E_mail, pw, fName, lName, '', stat);
	ELSEIF (my_role LIKE 'sponsor') THEN
		INSERT INTO sponsors(sponsor_id, org_id, email, password, first_name, last_name)
				VALUES (total_users, org_id, E_mail, pw, fName, lName);
	ELSEIF (my_role LIKE 'admin') THEN
		INSERT INTO admins(admin_id, email, password, first_name, last_name)
				VALUES (total_users, E_mail, pw, fName, lName);
	END IF;
END