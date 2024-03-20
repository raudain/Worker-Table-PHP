<?php declare(strict_types=1);

class Worker {
    
    private int $room;
    private String $name;
    private int $profession;
    private int $endurance;
    private int $cost;

    function __construct(array $workerArray) {
        $this->room = (int) $workerArray["Room"];
        $this->name = $workerArray["Name"];
        $this->profession = (int) $workerArray["Profession"];
        $this->endurance = (int) $workerArray["Endurance"];
        $this->cost = (int) $workerArray["Cost"];
    }

    /**
     * @return the room
     */
    function getRoom() : int {

        return $this->room;
    }


	/**
     * @param room the room to set
     */
    function setRoom(string $room) : void {

        $this->room = $room;
    }

    /**
     * @return the name
     */
    function getName() : String {

        return $this->name;
    }

    /**
     * @param name the name to set
     */
    function setName($name) : void {

        $this->name = $name;
    }

    /**
     * @return the profession
     */
    function getProfession() : int {

        return $this->profession;
    }

    /**
     * @param profession the profession to set
     */
    function setProfession($profession) : void {

        $this->profession = $profession;
    }

    /**
     * @return the endurance
     */
    function getEndurance() : int {

        return $this->endurance;
    }

    /**
     * @param endurance the endurance to set
     */
    function setEndurance($endurance) : void {

        $this->endurance = $endurance;
    }

    /**
     * @return the cost
     */
    function getCost() : int {

        return $this->cost;
    }

    /**
     * @param cost the cost to set
     */
    function setCost($cost) : void {

        $this->cost = $cost;
    }

    function toString(): String {
		return $this->room . ", " . $this->name . ", " . $this->profession . ", " . $this->endurance
				. ", " . $this->cost;
	}
}
?>
