<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 25/01/2018
 * Time: 11:05
 */

require ('EtreVivant.php');


class Personnage extends EtreVivant
{
    private $_bras;
    private $_jambes;
    private $_tete;
    private $_age;

    const JEUNE = 20;
    const ADULTE = 30;
    const VIEILLARD = 60;

    /**
     * Personnage constructor.
     * @param $_bras
     * @param $_jambes
     * @param $_tete
     * @param $_age
     */
    public function __construct($_bras, $_jambes, $_tete, $_age)
    {
        $this->_bras = $_bras;
        $this->_jambes = $_jambes;
        $this->_tete = $_tete;
        $this->_age = $_age;

        $this->marcherEtre();

    }





    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }






    public function get_bras() {
        return $this->_bras;
    }

    public function get_tete() {
        return $this->_tete;
    }

    public function get_jambes() {
        return $this->_jambes;
    }

    public function set_bras($valeur) {
        $this->_bras = $valeur;
    }

    public function set_tete($valeur) {
        $this->_tete = $valeur;
    }

    public function set_jambes($valeur) {
        $this->_jambes = $valeur;
    }





/*
    public function marcher()
    {
        echo 'je marches';
    }

    public function lire()
    {
        echo 'je lis';
    }

    public function manger()
    {
        echo 'je mange';
    }

    public function dormir()
    {
        echo 'je dors';
    }

    public function afficher_bras()
    {
        echo $this->_bras;
    }
    public function definir_nb_tete($nb_tete){
        $this->_tete = $nb_tete;
    }

    public function afficher_tete(){
        echo '<br/>j\'ai '.$this->_tete.' tête(s)';
    }

    public function attaquer(Personnage $personnage) {
        $personnage->_pv = $personnage->_pv-1;
    }

    public function afficher_pv(){
        echo $this->_pv;
    }
*/


}



$jessy = new Personnage(2,2,1,Personnage::JEUNE);
$adrien = new Personnage(3,3,4,Personnage::ADULTE);


/*
echo $jessy->get_bras();
echo '<br />';
echo $jessy->get_jambes();
echo '<br />';
echo $jessy->get_tete();


echo '<br />';
echo '<br />';



echo $adrien->get_bras();
echo '<br />';
echo $adrien->get_jambes();
echo '<br />';
echo $adrien->get_tete();
*/


/*
$jessy->afficher_pv();
echo '<br/>';
$adrien->afficher_pv();

$adrien->attaquer($jessy);
echo '<br/>';
echo '<br/>';
$jessy->afficher_pv();
echo '<br/>';
$adrien->afficher_pv();
*/

//$jessy->manger();
//$jessy->dors();

//$jessy->afficher_bras();
//$jessy->definir_nb_tete(3);
//$jessy->afficher_tete();



