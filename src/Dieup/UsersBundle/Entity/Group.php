<?php

namespace Dieup\UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Group
 * @ORM\Table(name="groups")
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Group
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Group
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add users
     *
     * @param \Dieup\UsersBundle\Entity\User $users
     * @return Group
     */
    public function addUser(\Dieup\UsersBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Dieup\UsersBundle\Entity\User $users
     */
    public function removeUser(\Dieup\UsersBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }
}