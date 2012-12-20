<?php
class KerbalShip {
    private $ship;
    private $version;
    private $type;

    /**
    @param string string input
    @param if load == true the string is a file name, otherwise we assume it is the ship
    */
    public function __construct($string,$load = false) {
        if($load)
            $string = KerbalShip::loadFile($string);
        $this->load($string);
    }
    public static function loadFile($fname) {
        $f = fopen($fname,'r');
        return fread($f,9999999999);
    }
    public function __get($name) {
        return $this->$$name;
    }
    public function load($string) {
        $this->loadMeta($string);
        preg_match('//',$string,$array);
        var_dump($array);

    }
    public function loadMeta(&$string) {
        $arr = explode("\n",$string);
        //      var_dump($arr[0]);
        preg_match('/(\w+) = ([\w\W]+)/',$arr[0],$match);
        $this->ship = $match[2];
        preg_match('/(\w+) = ([\.\d]+)/',$arr[1],$match);
//var_dump($match);
        $this->version = $match[2];
        preg_match('/(\w+) = ([\w]+)/',$arr[2],$match);
//var_dump($match);
        $this->type = $match[2];
        echo $this;
        for($i = 0; $i != 3; $i++)
            unset($arr[0]);
        return implode("\n",$arr);
    }
    public function __toString() {
        return $this->ship.' '.$this->version.' '.$this->type;
    }
}

?>