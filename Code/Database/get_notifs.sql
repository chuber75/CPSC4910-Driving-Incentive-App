CREATE PROCEDURE `get_notifs` (in user_id int)
BEGIN
	DECLARE ownBy varchar(250);
	SET ownBY = (SELECT email FROM users WHERE user_id = user_id);
    
	SELECT * FROM messages 
		WHERE recipient = ownBy
		ORDER BY sent_date DESC;
END
