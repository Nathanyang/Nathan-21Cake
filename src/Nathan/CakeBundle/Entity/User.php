<?php
/**
 * Created by PhpStorm.
 * User: Nathan-Y
 * Date: 15-3-4
 * Time: 下午7:30
 */

namespace Nathan\CakeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\ManyToMany;
/**
 * Class User
 * @package Nathan\CakeBundle\Entity
 * @ORM\Entity(repositoryClass="Nathan\CakeBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $username;
    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $password;
    /**
     * @ORM\Column(type="integer")
     */
    protected $age;
    /**
     * @OneToOne(targetEntity="Profile", mappedBy="user")
     */
    private $profile;
    /**
     * @ManyToMany(targetEntity="Book", mappedBy="users")
     */
    private $books;

    public function __construct(){
        $this->books = new ArrayCollection();
    }
}
