<?php
class Contador
{
    private $_num = 0;

    public function __construct()
    {

    }
    public function __construct2($valor)
    {
        $this->_num = $valor;
    }

    public function incremento()
    {
        $this->_num++;
    }
    public function mostrar()
    {
        return $this->_num;
    }

}
?>