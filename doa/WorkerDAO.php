<?php declare(strict_types=1);
require_once 'DataConnection.php';

/**
 * <br/>
 * CLASS DESCRIPTION: <br/>
 * A Data Access Object (DAO) class for handling and managing <br\>
 * event related data requested, updated, and processed in the <br\>
 * application and maintained in the database. The interface <br\>
 * between the application and event data persisting in the <br\>
 * database. <br/>
 *
 * @author Roody Audain
 *
 */
class WorkerDAO {

	/**
	 * @return Workers for one page
	 *
	 */
	function getWorkers($page):iterable {
			
		$decrementPage = 899;
		$minimum = 101;
		$nextRoom = $this->getNextRoom();
		$maximum = $nextRoom;
		$position = 0;
		$connection = DataConnection::createConnection();
		$offset1 = 802;
		$offset2 = 803;
		$offset3 = 705;
		$workerList = [];
		try {
			switch ($page) {
				case 1:
					$minimum = (int) $nextRoom - $decrementPage;
					break;
				case 2:
					$minimum = (int) $nextRoom - ($decrementPage * 2);
					$maximum = (int) $nextRoom - ($decrementPage + 1);
					break;
				case 3:
					$minimum =
						(int) $nextRoom - (($decrementPage * 3) - 97);
					$maximum = (int) $nextRoom - (($decrementPage * 2) + 1);
				  	break;
				case 4:
					$minimum =
						(int) $nextRoom - (($decrementPage * 3) + $offset1);
					$maximum =
						(int) $nextRoom - ($decrementPage * 3) + 1;
					break;
				case 5:
					$minimum =
						(int) $nextRoom - (($decrementPage * 4) + $offset1);
					$maximum =
						(int) $nextRoom - (($decrementPage * 3) + $offset2);
					break;
				case 6:
					$minimum =
						(int) $nextRoom - (($decrementPage * 5) + $offset1);
					$maximum =
						(int) $nextRoom - (($decrementPage * 4) + $offset2);
				  	break;
				case 7:
					$minimum =
						(int) $nextRoom - (($decrementPage * 6) + $offset3);
					$maximum =
						(int) $nextRoom - (($decrementPage * 5) + $offset2);
			      	break;
				case 8:
					$maximum =
						(int) $nextRoom - (($decrementPage * 6) + $offset3 + 1);
						break;
				case 11:
					$position = 1;
			    	break;
				case 12:
					$position = 2;
					break;
				case 13:
					$position = 3;
					break;
				default:
					$minimum = $nextRoom;
					$maximum = 0;
			}
			$selectStatement = null;
			if ($page > 9) {
				$minimum = 0;
				$maximum = $nextRoom;
				if ($page < 14) {
					$selectStatement = 
						"SELECT Room
						,      	Name
						,      	ProfessionName
						,     	EnduranceName
						,     	Cost
						FROM vw_worker_by_room
						WHERE 1 = 1
						AND Room BETWEEN :minimum AND :maximum
						AND RIGHT(Room, 1) = :position;";
				}
				else
					$selectStatement = 
						"SELECT Room
						,      Name
						,      ProfessionName
						,      EnduranceName
						,      Cost
						FROM vw_worker_by_cost
						WHERE Room BETWEEN :minimum AND :maximum;";
			}
			else {
				$selectStatement = 
						"SELECT Room
						,      Name
						,      ProfessionName
						,      EnduranceName
						,      Cost
						FROM vw_worker_by_room
						WHERE Room BETWEEN :minimum AND :maximum;";

			}
			if ($selectStatement != null) {
				$preparedStatement = $connection->prepare($selectStatement);
				$preparedStatement->bindValue(':minimum', $minimum);
				$preparedStatement->bindValue(':maximum', $maximum);
				if ($position > 0) {
					$preparedStatement->bindParam(':position', $position);
				}
				$preparedStatement->execute();
				$preparedStatement->setFetchMode(PDO::FETCH_ASSOC);
				$workerList = $preparedStatement->fetchAll();
			}
		} catch(PDOException $exception) {
			echo $exception->getMessage();
			echo "<br>";
			echo $exception->getTraceAsString();
		 }
		$connection = null;
		return $workerList;
	}
	
	/**
	 * @return All workers
	 *
	 */
	function getAllWorkers():iterable {
		
		$connection = DataConnection::createConnection();
		try {
			$selectStatement =
				"SELECT Room
				 ,      Name
				 ,      Profession
				 ,      Endurance
				 ,      Cost
				 FROM worker";
			$preparedStatement = 
					$connection->prepare($selectStatement);
			$preparedStatement->execute();
			$preparedStatement->setFetchMode(PDO::FETCH_ASSOC);
			$workerList = $preparedStatement->fetchAll();
		} catch (PDOException $exception) {
			echo $exception->getMessage();
			echo $exception->getTraceAsString();
		}
		$connection = null;
		return $workerList;
	}
	
	/**
	 * <br/>
	 * Collect worker data from the result
	 * 
	 * @return ArrayList<Worker>
	 *
	 */
	private function getWorkerList(array $resultSet):iterable {

		$workerList = [];
		try {
			foreach ($resultSet as $w) {
				$worker = new Worker($resultSet);
				$workerList = $worker;
			}
		} catch (PDOException $exception) {
			echo $exception->getMessage();
			echo $exception->getTraceAsString();
		}
		return $workerList;
	}
	
	/**
	 *
	 * @return The number of the next available room for a new worker
	 *
	 */
	function getNextRoom() {
			
		$lastRoom = -1;
		
		$connection = DataConnection::createConnection();	
		$selectStatement =
			"SELECT Max(Room) AS LastRoom
			FROM worker;";
		$statement = $this->getStatement($connection, $selectStatement);
		$resultSet =
				$this->getResultSet($statement);
		$result = $resultSet[0];
		try {
			$lastRoom = $result["LastRoom"];
		} catch (PDOException $exception) {
			echo $exception->getMessage();
			echo $exception->getTraceAsString();
		}
		if ($lastRoom % 10 < 3) {
			return $lastRoom + 1;
		}
		else {
			return $lastRoom + 98;
		}
	}
	
	private function getStatement($connection, $selectStatement) {
		
		$statement = null;
		try {
			$statement = $connection->prepare($selectStatement);
		} catch (PDOException $exception) {
			echo $exception->getMessage();
			echo $exception->getTraceAsString();
		}
		return $statement;
	}
	
	private function getResultSet($statement) {
		
		$resultSet = null;
		try {
			$statement->execute();
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$resultSet = $statement->fetchAll();
		} catch (PDOException $exception) {
			echo $exception->getMessage();
			echo $exception->getTraceAsString();
		}
		return $resultSet;
	}

	/**
	 * <br/>
	 * METHOD DESCRIPTION: <br/>
	 * DAO for inserting a new worker into the worker table in <br\>
	 * the Database <br/>
	 *
	 * @return void
	 * 
	 */
	function insertWorker(Worker $worker) {
		
		$connection = DataConnection::createConnection();
		$insertSqlStatement =
			"INSERT INTO worker
			(
				Room
			,	Name
			,	Profession
			,	Endurance
			,	Cost
			)
		VALUES (:Room, :Name, :Profession, :Endurance, :Cost);";
		try {
			$preparedStatement = 
				$connection->prepare($insertSqlStatement);

			$this->bindWorker($worker, $preparedStatement);
	
			$preparedStatement->execute();
		} catch (PDOException $exception) {
			echo $exception->getMessage();
			echo $exception->getTraceAsString();
		}
		$connection = null;
	}
	
	/**
	 * <br/>
	 * * METHOD DESCRIPTION: <br/>
	 * This method updates a worker in the worker table in the <br\>
	 * database <br/>
	 *
	 * @param A worker that need to be updated
	 * @return void
	 */
	function updateWorker($worker) {

		// Create a new connection to the database
		$connection = DataConnection::createConnection();
		$updateStatement =
			"UPDATE worker
			SET Name = :Name
			,   Profession = :Profession
			,   Endurance = :Endurance
			,   Cost = :Cost
			WHERE (Room = :Room);";
		try {
			$preparedStatement = 
				$connection->prepare($updateStatement);
			
			$this->bindWorker($worker, $preparedStatement);
			
			$preparedStatement->execute();
		} catch (PDOException $exception) {
			echo $exception->getMessage();
			echo $exception->getTraceAsString();
		}
		$connection = null;
	}

	private function bindWorker($worker, $preparedStatement) {

		$room = $worker->getRoom();
		$preparedStatement->bindValue(':Room', $room);
		$name = $worker->getName();
		$preparedStatement->bindValue(':Name', $name);
		$profession = $worker->getProfession();
		$preparedStatement->bindValue(':Profession', $profession);
		$endurance = $worker->getEndurance();
		$preparedStatement->bindValue(':Endurance', $endurance);
		$cost = $worker->getCost();
		$preparedStatement->bindValue(':Cost', $cost);
	}
}
