<?php
/**
 * Connect to mysql server
 * @param bool
 * @return bool
 */
function dbConnect($close=true)
{
	if (!$close) {
		mysql_close($link);
		return true;
	}

	$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect to MySQL DB ') . mysql_error();
	if (!mysql_select_db(DB_NAME, $link))
		return false;
}

/**
 * email exist
 * @return bool | void
 * @param str
 */
function email_exist($email)
{
	$query = mysql_query(
		"SELECT * FROM users WHERE email = '{$email}'";

	if (mysql_num_rows($query) > 0)
		return true;
}

/**
 * insert new user
 * @return bool | void
 * @param str
 */
function inser_new_user $email
{
	$query = 
		"INSERT INTO users(email) VALUES '{$email}'";
	if (mysql_query($query))
		return true;
}

/**
 * Print json
 * @param str
 * @return void
 */
function json_status($status)
{
	echo json_encode(array('status' => $status));
}

?>