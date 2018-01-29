<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 25/01/2018
 * Time: 11:52
 */

class Gateau
{

    private $_sucre;
    private $_farine;
    private $_oeuf;

    /**
     * Gateau constructor.
     * @param $_sucre
     * @param $_farine
     * @param $_oeuf
     */
    public function __construct($_sucre, $_farine, $_oeuf)
    {
        $this->_sucre = $_sucre;
        $this->_farine = $_farine;
        $this->_oeuf = $_oeuf;
    }


    /**
     * @return mixed
     */
    public function getSucre()
    {
        return $this->_sucre;
    }

    /**
     * @param mixed $sucre
     */
    public function setSucre($sucre)
    {
        $this->_sucre = $sucre;
    }

    /**
     * @return mixed
     */
    public function getFarine()
    {
        return $this->_farine;
    }

    /**
     * @param mixed $farine
     */
    public function setFarine($farine)
    {
        $this->_farine = $farine;
    }

    /**
     * @return mixed
     */
    public function getOeuf()
    {
        return $this->_oeuf;
    }

    /**
     * @param mixed $oeuf
     */
    public function setOeuf($oeuf)
    {
        $this->_oeuf = $oeuf;
    }


}

$quart = new Gateau(10, 200, 2);

echo $quart->getFarine().' grammes';

//$quart->getOeuf();
