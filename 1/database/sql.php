<?php
	function MYSQL_CONNECT_V()
	{
		return new SaeMysql();//返回的直接是数据库
	}
	
	function MYSQL_QUERY_RD_V($sql, $mysql)
	{
		return $mysql->getData( $sql );//返回的是Array
	}
	
	function MYSQL_QUERY_WR_V($sql, $mysql)
	{
		return $mysql->runSql( $sql );//返回的是Array
	}
?>
