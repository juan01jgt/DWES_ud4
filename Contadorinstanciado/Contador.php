<?php
class Contador
{
    private $_num = 0;
    private static $numcont =0;

    public function __construct()
    {
        self::$numcont++;
    }
    

    public function incremento()
    {
        $this->_num++;
    }
    public function mostrar()
    {
        return $this->_num;
    }

    public function contadores()
    {
        return self::$numcont;
    }

}
?>