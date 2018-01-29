<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 25/01/2018
 * Time: 12:31
 */

class EtreVivant
{

    private $_membre_supp;
    private $_membre_inf;

    /**
     * EtreVivant constructor.
     * @param $_membre_supp
     * @param $_membre_inf
     */
    public function __construct($_membre_supp, $_membre_inf)
    {
        $this->_membre_supp = $_membre_supp;
        $this->_membre_inf = $_membre_inf;
    }


    /**
     * @return mixed
     */
    public function getMembreSupp()
    {
        return $this->_membre_supp;
    }

    /**
     * @param mixed $membre_supp
     */
    public function setMembreSupp($membre_supp)
    {
        $this->_membre_supp = $membre_supp;
    }

    /**
     * @return mixed
     */
    public function getMembreInf()
    {
        return $this->_membre_inf;
    }

    /**
     * @param mixed $membre_inf
     */
    public function setMembreInf($membre_inf)
    {
        $this->_membre_inf = $membre_inf;
    }


    protected function marcherEtre() {
        echo 'je marche';
    }



}