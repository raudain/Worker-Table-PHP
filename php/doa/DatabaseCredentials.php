<?php

class DatabaseCredentials {
    //static String host = "jws-app-mysql"; // The standard name in Tomcat+ MySQL on openshift
    private $host = "localhost";

    private $name = "dbo";
    private $port = 3306; // This is for MySQL

    private $user = "user";
    private $password = "password";

    function getHost() {
        return $this->host;
    }

    function getName() {
        return $this->name;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

}
