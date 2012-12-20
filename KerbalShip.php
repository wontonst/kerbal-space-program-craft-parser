<?php
class KerbalShip{

/**
@param string string input
@param if load == true the string is a file name, otherwise we assume it is the ship
*/
public function __construct($string,$load = false)
{
preg_match('/{.+}/',$string,$array);
var_dump($array);
}


}

?>