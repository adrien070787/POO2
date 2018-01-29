<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 29/01/2018
 * Time: 08:48
 */

class CustomerManager
{

    private $_db; // Instance de PDO

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Customer $client)
    {
        $q = $this->_db->prepare('INSERT INTO customer(name, firstname, email, age, good, password, field2, field3, field4) VALUES(:name, :firstname, :email, :age, :good, :password, :field2, :field3, :field4)');

        $q->bindValue(':name', $client->getName(), PDO::PARAM_STR);
        $q->bindValue(':firstname', $client->getFirstname(), PDO::PARAM_STR);
        $q->bindValue(':email', $client->getEmail(), PDO::PARAM_STR);
        $q->bindValue(':age', $client->getAge(), PDO::PARAM_INT);
        $q->bindValue(':good', $client->getGood(), PDO::PARAM_STR);
        $q->bindValue(':password', $client->getPassword(), PDO::PARAM_STR);
        $q->bindValue(':field2', $client->getField2(), PDO::PARAM_STR);
        $q->bindValue(':field3', $client->getField3(), PDO::PARAM_INT);
        $q->bindValue(':field4', $client->getField4(), PDO::PARAM_INT);

        $q->execute();
    }

    public function delete(Customer $client)
    {
        $this->_db->exec('DELETE FROM customer WHERE id = '.$client->getId());
    }

    public function getById($id)
    {
        $id = (int) $id;

        $q = $this->_db->query('SELECT name, firstname, email, age, good, password, field2, field3, field4 FROM customer WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Customer($donnees);
    }

    public function getList()
    {
        $clients = [];

        $q = $this->_db->query('SELECT name, firstname, email, age, good, password, field2, field3, field4 FROM customer ORDER BY name');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $clients[] = new Customer($donnees);
        }

        return $clients;
    }

    public function update(Customer $client)
    {
        $q = $this->_db->prepare('UPDATE customer SET name= :name, firstname = :firstname, email = :email, age = :age, good = :good, password = :password, field2 = :field2, field3 = :field3, field4 = :field4 WHERE id = :id');

        $q->bindValue(':name', $client->getName(), PDO::PARAM_STR);
        $q->bindValue(':firstname', $client->getFirstname(), PDO::PARAM_STR);
        $q->bindValue(':email', $client->getEmail(), PDO::PARAM_STR);
        $q->bindValue(':age', $client->getAge(), PDO::PARAM_INT);
        $q->bindValue(':good', $client->getGood(), PDO::PARAM_STR);
        $q->bindValue(':password', $client->getPassword(), PDO::PARAM_STR);
        $q->bindValue(':field2', $client->getField2(), PDO::PARAM_STR);
        $q->bindValue(':field3', $client->getField3(), PDO::PARAM_INT);
        $q->bindValue(':field4', $client->getField4(), PDO::PARAM_INT);


        $q->execute();
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }


}

require_once ("Customer.php");

$client = new Customer([
    'id' => 10,
    'name' => 'HACCOUN',
    'firstname' => 'Eyal',
    'age' => 25,
    'good' => 'non',
    'password' => 'mdp',
    'field2' => 'test',
    'field3' => 0,
    'field4' => 0
]);

$bdd = new PDO('mysql:host=localhost;dbname=progobjet;charset=utf8', 'progobjet', 'progobjet');
$manager = new CustomerManager($bdd);

$manager->add($client);