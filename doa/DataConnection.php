<?php
require_once 'DatabaseCredentials.php';

/**
 * <br/>
 * CLASS DESCRIPTION: <br/>
 * 
 * A helper class that centralizes the management of data connections in the
 * underlying database. <br/>
 * 
 * @author krishna.kishore, Roody Audain
 * 
 */
class DataConnection {

	// New instance of Connection
	private $connection = null;

	/**
	 * <br/>
	 * METHOD DESCRIPTION: <br/>
	 * 
	 * Open connection to access the underlying database. <br/>
	 * 
	 * @return Connection
	 * 
	 * @throws ClassNotFoundException
	 * @throws SQLException
	 * 
	 */
	public static function createConnection() {
		
        $servername = DatabaseCredentials::getHost();
        $dbname = DatabaseCredentials::getName();
        $username = DatabaseCredentials::getUser();
        $password = DatabaseCredentials::getPassword();
        try {
            $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $exception) {
			echo $exception->getMessage();
			echo "<br>";
			echo $exception->getTraceAsString();
          }
		return $connection;
	}
}
?>
