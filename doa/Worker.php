<?php
class Worker {
    
    private $room;
    private $name;
    private $profession;
    private $endurance;
    private $cost;


    /**
     * @return the room
     */
    function getRoom() {

        return $this->room;
    }


	/**
     * @param room the room to set
     */
    function setRoom($room) {

        $this->room = $room;
    }

    /**
     * @return the name
     */
    function getName() {

        return $this->name;
    }

    /**
     * @param name the name to set
     */
    function setName($name) {

        $this->name = $name;
    }

    /**
     * @return the profession
     */
    function getProfession() {

        return $this->profession;
    }

    /**
     * @param profession the profession to set
     */
    function setProfession($profession) {

        $this->profession = $profession;
    }

    /**
     * @return the endurance
     */
    function getEndurance() {

        return $this->endurance;
    }

    /**
     * @param endurance the endurance to set
     */
    function setEndurance($endurance) {

        $this->endurance = $endurance;
    }

    /**
     * @return the cost
     */
    function getCost() {

        return $this->cost;
    }

    /**
     * @param cost the cost to set
     */
    function setCost($cost) {

        $this->cost = $cost;
    }
}
?>
