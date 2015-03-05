<?php
/**
 * Created by PhpStorm.
 * User: Nathan-Y
 * Date: 15-3-5
 * Time: 下午12:47
 */

namespace Nathan\CakeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Author
 * @ORM\Entity(repositoryClass="Nathan\CakeBundle\Repository\AuthorRepository")
 * @ORM\Table(name="author")
 */
class Author {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $name;
    /**
     * @OneToMany(targetEntity="Book", mappedBy="author")
     */
    private $books;
    /**
     * @OneToMany(targetEntity="Category", mappedBy="author")
     */
    private $categories;

    public function __construct(){
        $this->books = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }
}
