<?php

class SQLException extends Exception { }

class Database
{
	var $host;
	var $user;
	var $password;
	var $db_name;
	var $result;
	var $connection_string;
	var $connection;
	var $error;
	static $numQueries;

	function Database($my_db_name = 'adamhers_campustidedb', $my_user = 'adamhers_campustide', $my_password = 'n1nt3nd0w11', $my_host = 'localhost')
	{
		$this->db_name = $my_db_name;
		$this->user = $my_user;
		$this->password = $my_password;
		$this->host = $my_host;

		$this->connection_string = $this->getConnectionString();

		$this->open();
		
		$this->numQueries = 0;
	}

	function getConnectionString()
	{
		return 'host='. $this->host .' dbname='. $this->db_name .' user='. $this->user .' password='. $this->password;
	}

	function open()
	{
		$this->connection = pg_connect($this->connection_string) or die();
	}

	function close()
	{
		return pg_close($this->connection);
	}

	function query($query, $parameters = array())
	{
		$this->error = "";
		$this->result = @pg_prepare($this->connection, "", $query) or $this->error = pg_last_error($this->connection); // or trigger_error(pg_last_error($this->connection));
		$this->result = @pg_execute($this->connection, "", $parameters) or $this->error = pg_last_error($this->connection); // or trigger_error(pg_last_error($this->connection));
		$this->numQueries++;
		if ($this->error != "") throw new SQLException($this->error);
		return $this->result;
	}

//	// FUNCTION TO BE USED FOR insert STATEMENTS. RETURNS THE ID# ASSIGNED
//	function insert($query)
//	{
//		mysql_query($query) or die(mysql_error());
//		return mysql_insert_id();
//	}

	function rows()
	{
		return pg_num_rows($this->result);
	}
	
	function fetch()
	{
		return pg_fetch_assoc($this->result);
	}
	
	function getNumQueries()
	{
		return $this->numQueries;
	}
}
?>
