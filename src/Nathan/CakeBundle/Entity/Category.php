<?php
/**
 * Created by PhpStorm.
 * User: Nathan-Y
 * Date: 15-3-5
 * Time: 下午2:01
 */

namespace Nathan\CakeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Category
 * @ORM\Entity(repositoryClass="Nathan\CakeBundle\Repository\CategoryRepository")
 * @ORM\Table(name="category")
 */
class Category {
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
     * @ManyToOne(targetEntity="Author", inversedBy="categories")
     * @JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @OneToMany(targetEntity="Category", mappedBy="parent")
     */
    private $children;
    /**
     * @ManyToOne(targetEntity="Category", inversedBy="children")
     * @JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;
    /**
     * @ManyToMany(targetEntity="Book", mappedBy="categories")
     */
    private $books;

    public function __construct(){
        $this->children = new ArrayCollection();
        $this->books = new ArrayCollection();
    }
}
