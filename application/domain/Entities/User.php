<?php
/**
* @Entity
* @Table(name="user")
*/
class Entities_User
{
/**
* @Id @Column(type="integer")
* @GeneratedValue(strategy="AUTO")
*/
private $userId;

/** @Column(type="string") */
private $name;

/** @Column(type="string") */
private $birthday;

public function setName ($name)
{
$this->name = $name;
return true;
}

public function getName()
{
return $this->name;
}
}