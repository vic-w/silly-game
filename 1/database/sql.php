<?php
	function MYSQL_CONNECT_V()
	{
		return new SaeMysql();//返回的直接是数据库
	}
	
	function MYSQL_QUERY_RD_V($sql, $db)
	{
		return $db->getData( $sql );//返回的是Array
	}
	
	function MYSQL_QUERY_WR_V($sql, $db)
	{
		return $db->runSql( $sql );//返回的是Array
	}
?>
