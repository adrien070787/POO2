<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 28/01/2018
 * Time: 14:49
 */

class Customer //extends CustomerManager
{

    private $_id;
    private $_name;
    private $_firstname;
    private $_email;
    private $_age;
    private $_good;
    private $_password;
    private $_field2;
    private $_field3;
    private $_field4;

    /**
     * Customer constructor.
     * @param $_id
     * @param $_name
     * @param $_firstname
     * @param $_email
     * @param $_age
     * @param $_good
     * @param $_password
     * @param $_field2
     * @param $_field3
     * @param $_field4
     */
/*
        public function __construct($_id, $_name, $_firstname, $_email, $_age, $_good, $_password, $_field2, $_field3, $_field4)
        {
            $this->_id = $_id;
            $this->_name = $_name;
            $this->_firstname = $_firstname;
            $this->_email = $_email;
            $this->_age = $_age;
            $this->_good = $_good;
            $this->_password = $_password;
            $this->_field2 = $_field2;
            $this->_field3 = $_field3;
            $this->_field4 = $_field4;
        }
   */

/*
    public function __construct(Array $donnees)
    {

        $this->setId($donnees['id']);
        $this->setName($donnees['name']);
        $this->setFirstname($donnees['firstname']);
        $this->setEmail($donnees['email']);
        $this->setAge($donnees['age']);
        $this->setGood($donnees['good']);
        $this->setPassword($donnees['password']);
        $this->setField2($donnees['field2']);
        $this->setField3($donnees['field3']);
        $this->setField4($donnees['field4']);

    }
*/
/*
    public function __construct($_id, $_name, $_firstname, $_email, $_age, $_good, $_password, $_field2, $_field3, $_field4)
        $this->setId($_id);
        $this->setName($_name);
        $this->setFirstname($_firstname);
        $this->setEmail($_email);
        $this->setAge($_age);
        $this->setGood($_good);
        $this->setPassword($_password);
        $this->setField2($_field2);
        $this->setField3($_field3);
        $this->setField4($_field4);
    }
*/


    public function __construct(Array $donnees)
    {
        $this->hydrate($donnees);

    }





    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        if(is_int($id)) {
            $this->_id = $id;
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        if(is_string($name) && strlen($name)<= 255) {
            $this->_name = $name;
        }
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->_firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        if(is_string($firstname) && strlen($firstname)<= 255) {
            $this->_firstname = $firstname;
        }
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        if(is_string($email) && strlen($email)<= 255 && strstr($email, '@')) {
            $this->_email = $email;
        }
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
        if(is_int($age) && $age<= 999) {
            $this->_age = $age;
        }
    }

    /**
     * @return mixed
     */
    public function getGood()
    {
        return $this->_good;
    }

    /**
     * @param mixed $good
     */
    public function setGood($good)
    {
        if($good == 'oui' OR $good == 'non') {
            $this->_good = $good;
        }
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        if(is_string($password) && strlen($password)<= 255) {
            $this->_password = $password;
        }
    }

    /**
     * @return mixed
     */
    public function getField2()
    {
        return $this->_field2;
    }

    /**
     * @param mixed $field2
     */
    public function setField2($field2)
    {
        if(is_string($field2) && strlen($field2)<= 255) {
            $this->_field2 = $field2;
        }
    }

    /**
     * @return mixed
     */
    public function getField3()
    {
        return $this->_field3;
    }

    /**
     * @param mixed $field3
     */
    public function setField3($field3)
    {
        if(is_int($field3) && strlen($field3)<= 10) {
            $this->_field3 = $field3;
        }
    }

    /**
     * @return mixed
     */
    public function getField4()
    {
        return $this->_field4;
    }

    /**
     * @param mixed $field4
     */
    public function setField4($field4)
    {
        if(is_int($field4) && strlen($field4)<= 10) {
            $this->_field4 = $field4;
        }
    }


    public function test() {
        echo 'coucou';
    }

}


$bdd = new PDO('mysql:host=localhost;dbname=progobjet;charset=utf8', 'progobjet', 'progobjet');
$request = $bdd->query('SELECT `id`, `name`, `firstname`, `email`, `age`, `good`, `password`, `field2`, `field3`, `field4` FROM customer');

while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {

    // En utilisant un constructeur classique (sans hydratation)
    //$client = new Customer($donnees['id'], $donnees['name'], $donnees['firstname'], $donnees['email'], $donnees['age'], $donnees['good'], $donnees['password'], $donnees['field2'], $donnees['field3'], $donnees['field4']);

    //en utilisant un constructeur appelant la fonction d'hydratation
    $client = new Customer($donnees);
    echo $client->getName().' '.$client->getFirstname();
    echo '<br />';


    echo '<pre>';
    print_r($donnees);
    echo '</pre>';
}






