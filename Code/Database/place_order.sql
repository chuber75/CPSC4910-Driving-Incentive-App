CREATE DEFINER=`admin`@`%` PROCEDURE `place_order`(in user_id int, in org varchar(500), in items varchar(2500))
BEGIN
    /* Input values will be preconcatenated strings in certain order i.e. purchases => ([org(1),items(details)], [org(3),items(details), [org(1),items(details)])
	INSERT INTO orders(user_id, org_id, items) 
		VALUES(user_id, org, items);
END