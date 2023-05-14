CREATE DEFINER=`admin`@`%` PROCEDURE `messaged`(in sender varchar(255), in recip varchar(255), in heading varchar(255), in content varchar(255))
BEGIN
    DECLARE msg varchar(2000);
    SET msg = " ";
    /*DECLARE recipient varchar(255);
    SET recipient = (SELECT email FROM users WHERE user_id = u_id);*/
    /*** System Password changed message ***/
    IF (heading = "Password Changed") THEN
		SET msg = "Your password has been changed.";
		INSERT INTO messages(sender, recipient, heading, content)
			VALUES("System", recip, heading, msg);
	ELSEIF (heading = "Order Placed") THEN
		SET msg = "Your order has been placed.";
        /*Content pertains to listing of items ordered*/
		INSERT INTO messages(sender, recipient, heading, content)
			VALUES("System", recip, heading, msg);
	END IF;
END