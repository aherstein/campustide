<?

class Database
{
	var $host;
	var $user;
	var $password;
	var $db_name;
	var $result;

	function Database($my_db_name, $my_user = 'mysql', $my_password = 'nintendo', $my_host = 'localhost')
	{
		$this->db_name = $my_db_name;
		$this->user = $my_user;
		$this->password = $my_password;
		$this->host = $my_host;

		$this->open();
	}

	function open()
	{
		mysql_connect($this->host, $this->user, $this->password) or die(mysql_error());
		mysql_select_db($this->db_name);
	}

	function close()
	{
		mysql_close();
	}

	function query($query)
	{
		$this->result = mysql_query($query) or die(mysql_error());
		return $this->result;
	}

	// FUNCTION TO BE USED FOR insert STATEMENTS. RETURNS THE ID# ASSIGNED
	function insert($query)
	{
		mysql_query($query) or die(mysql_error());
		return mysql_insert_id();
	}

	function rows()
	{
		return mysql_num_rows($this->result);
	}
}
?>
