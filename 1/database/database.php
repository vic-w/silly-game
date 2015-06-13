<?PHP

include_once("sql.php");

class Database
{
    function create_table_access_keys($wechat_app_id, $wechat_app_secret, $server_access_token)
    {
        $db = MYSQL_CONNECT_V();
    
        //Create the access_keys table
        $sql = "CREATE TABLE  `access_keys` 
        (
            `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `wechat_app_id` TEXT NOT NULL ,
            `wechat_app_secret` TEXT NOT NULL ,
            `wechat_access_token` TEXT NOT NULL,
            `wechat_access_token_expire_time` INT NOT NULL,
            `server_access_token` TEXT NOT NULL
        ) ENGINE = MYISAM ;";
        
        MYSQL_QUERY_WR_V($sql, $db);
        
        //Insert the items
        $sql = "INSERT INTO  `access_keys` 
        (
            `id` ,
            `wechat_app_id` ,
            `wechat_app_secret` ,
            `wechat_access_token` ,
            `wechat_access_token_expire_time`,
            `server_access_token`
        )
        VALUES 
        (
            1 ,  
            '$wechat_app_id',  
            '$wechat_app_secret',  
            '',  
            0,
            '$server_access_token'
        );";
        MYSQL_QUERY_WR_V($sql, $db);
    }
    
    function delete_table_access_keys()
    {
        $sql = "DROP TABLE  `access_keys`";
        
        $db = MYSQL_CONNECT_V();
        MYSQL_QUERY_WR_V($sql, $db);
    }
    
    function update_wechat_access_token($token, $expire_time)
    {
        $sql = "UPDATE  
        			`access_keys` 
        		SET  
                	`wechat_access_token` =  '$token',
                    `wechat_access_token_expire_time` = '$expire_time'
                WHERE  `access_keys`.`id` =1;";
        $db = MYSQL_CONNECT_V();
        MYSQL_QUERY_WR_V($sql, $db);
    }
    
    function get_wechat_app_id()
    {
        $sql = "SELECT `wechat_app_id` FROM `access_keys` WHERE `id` =1";
        $db = MYSQL_CONNECT_V();
        $result = MYSQL_QUERY_RD_V($sql, $db);
        return $result[0][wechat_app_id];
    }
        
    function get_wechat_app_secret()
    {
        $sql = "SELECT `wechat_app_secret` FROM `access_keys` WHERE `id` =1";
        $db = MYSQL_CONNECT_V();
        $result = MYSQL_QUERY_RD_V($sql, $db);
        return $result[0][wechat_app_secret];
    }
        
}

?>
















