<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> 
</head>
<body>
Setting up the DBs.

<?php
include 'config.inc';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
mysql_query("DROP DATABASE " . $dbname,$conn);
echo mysql_error($conn);
mysql_query("CREATE DATABASE " . $dbname,$conn);
echo mysql_error($conn);
include 'opendb.inc';
$query = 'CREATE TABLE blogs_table( '.
		 'cid INT NOT NULL AUTO_INCREMENT, '.
         'blogger_name TEXT, '.
         'comment TEXT, '.
		 'date DATETIME, '.
		 'PRIMARY KEY(cid))';	
$result = mysql_query($query);
echo mysql_error($conn );

$query = 'CREATE TABLE accounts( '.
		 'cid INT NOT NULL AUTO_INCREMENT, '.
         'username TEXT, '.
         'password TEXT, '.
		 'mysignature TEXT, '.
		 'PRIMARY KEY(cid))';
$result = mysql_query($query);
echo mysql_error($conn );

$query = 'CREATE TABLE hitlog( '.
		 'cid INT NOT NULL AUTO_INCREMENT, '.
         'hostname TEXT, '.
         'ip TEXT, '.
		 'browser TEXT, '.
		 'referer TEXT, '.
		 'date DATETIME, '.
		 'PRIMARY KEY(cid))';		 
$result = mysql_query($query);
echo mysql_error($conn );

$query = "INSERT INTO accounts (username, password, mysignature) VALUES
	('admin', 'admin', 'Monkey!!!'),
	('user', 'user', 'User Account'),
	('adrian', 'somepassword', 'Zombie Films Rock!!!'),
	('john', 'monkey', 'I like the smell of confunk'),
	('ed', 'pentest', 'Commandline KungFu anyone?')";
//echo $query;
$result = mysql_query($query);
echo mysql_error($conn );

$query ="INSERT INTO `blogs_table` (`cid`, `blogger_name`, `comment`, `date`) VALUES
	(1, 'adrian', 'Well, I''ve been working on this for a bit. Welcome to my crappy blog software. :)', '2009-03-01 22:26:12'),
	(2, 'adrian', 'Looks like I got a lot more work to do. Fun, Fun, Fun!!!', '2009-03-01 22:26:54'),
	(3, 'anonymous', 'An anonymous blog? Huh? ', '2009-03-01 22:27:11'),
	(4, 'ed', 'I love me some Netcat!!!', '2009-03-01 22:27:48'),
	(5, 'john', 'Listen to Pauldotcom!', '2009-03-01 22:29:04'),
	(6, 'john', 'Why give users the ability to get to the unfiltered Internet? It''s just asking for trouble. ', '2009-03-01 22:29:49'),
	(7, 'john', 'Chocolate is GOOD!!!', '2009-03-01 22:30:06'),
	(8, 'admin', 'Fear me, for I am ROOT!', '2009-03-01 22:31:13'),
	(9, 'user', 'User blog post', '2010-03-23 22:31:13')";
//echo $query;
$result = mysql_query($query);
echo mysql_error($conn );


echo "<p>If you see no errors above, it should be done. <a href=\"index.php\">Continue back to the frontpage.</a>";
?>
</body>
</html>
