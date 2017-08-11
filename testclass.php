<?php

abstract class Continent
{
    public $name = ''; // name of the Continent

    public $length = ''; // length of the Continent
    public $width = ''; // width of the Continent
    public $population = '';

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        return $this->name = $name;
    }

    abstract public function getFootage ($length, $width); // Footage is length * width
    abstract public function setPopulation ($population); // sets population in mln
}

class Country extends Continent
{
    public $capital = 'not set capital'; // Only in Countries

    public function getCapital(){
        return $this->capital;
    }

    public function setCapital($capital){
        return $this->capital = $capital;
    }

    function __construct($population)
    {
        $this->population = $population;
    }

    public function getFootage ($length, $width) {
        return $length * $width; // from Continents
    }
    public function setPopulation ($population) {
        $this->population = $population;
    }
}

    $australia = new Country(24);
    $australia->capital = 'Canberra';
    echo $australia->getCapital() . '<hr>';
    echo $australia->population . '<hr>';

    $australia->setCapital('Dnipro');
    echo $australia->getCapital();
    echo '<hr>';
    echo $australia->getFootage(100, 200);


