CREATE DEFINER=`admin`@`%` PROCEDURE `password_changed`(in email varchar(255), in new_password varchar(2000))
BEGIN
	DECLARE id int;
    DECLARE times_changed int;
    SET id = (SELECT user_id FROM users WHERE email = email);
    SET times_changed = (SELECT COUNT(*) FROM password_history WHERE u_id = id);
    
    -- Update current password within password history for specific user
	UPDATE password_history
    SET is_current = 0
    WHERE is_current = 1 AND u_id = id;
    
    INSERT INTO password_history(pass_id, u_id, password, is_current)
		VALUES(times_changed+1, id, new_password, 1); 
END