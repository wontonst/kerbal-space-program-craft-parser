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
        var_dump($arr[0]);
        preg_match('/\s+ = (\s+)/',$arr[0],$match);
        var_dump($match);
        for($i = 0; $i != 3; $i++)
            unset($arr[0]);
        return implode("\n",$arr);
    }
}

?>