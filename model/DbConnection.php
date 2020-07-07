<?php
class model_DbConnection
{   /** MySQL database username $username*/
    private const USERNAME = 'root';

    /** MySQL database password $password*/
    private const PASSWORD = 'administrato';

    /** MySQL hostname $host*/
    private const HOST = 'localhost';

    /** The name of the database $database*/
    private const DATABASE = 'db_webonline';
    
	private const CHARSET = 'utf8';

    public static function make()
    {
        try {
            $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DATABASE . ';charset=' . self::CHARSET;
            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    
            return new PDO($dsn, self::USERNAME, self::PASSWORD, $options);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        }
    }
}
?>