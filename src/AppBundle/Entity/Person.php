<?php

// src/AppBundle/Entity/Task.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="person")
 */
class Person
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $name;
  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $email;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $birthDate;


  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }



  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }



  public function getBirthDate()
  {
    return $this->birthDate;
  }

  public function setBirthDate(\DateTime $birthDate = null)
  {
    $this->birthDate = $birthDate;
  }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
