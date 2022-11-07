<?php
 //Ejemplo de enlace no estático.
class Mascota
{
    public static function getName ()
    {
        echo 'Soy una mascota';
    }
    public static function whoami ()
    {
        self::getName();
    }
}
class Perro extends Mascota
{
    public static function getName ()
      {
        echo 'Soy un perro';
      }
}
Perro::whoami ();
 ?>
