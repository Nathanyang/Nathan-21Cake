<?php
/**
 * Created by PhpStorm.
 * User: Nathan-Y
 * Date: 15-3-5
 * Time: 下午2:11
 */

namespace Nathan\CakeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Book
 * @ORM\Entity(repositoryClass="Nathan\CakeBundle\Repository\BookRepository")
 * @ORM\Table(name="book")
 * @ORM\HasLifecycleCallbacks();
 */
class Book {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $title;
    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;
    /**
     * @ManyToMany(targetEntity="User", inversedBy="books")
     * @JoinTable(name="users_books")
     */
    private $users;
    /**
     * @ManyToOne(targetEntity="Author", inversedBy="books")
     * @JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;
    /**
     * @ManyToMany(targetEntity="Category", inversedBy="books")
     * @JoinTable(name="categories_books")
     */
    private $categories;

    public function __construct(){
        $this->users = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }
//
//    /**
//     * @ORM\PrePersist()
//     */
//    public function PrePersist(){
//        if($this->getCreatedAt() == null){
//            $this->setCreatedAt(new \DateTime('now'));
//        }
//        $this->setUpdatedAt(new \DateTime('now'));
//    }
//    /**
//     * @ORM\PreUpdate()
//     */
//    public function PreUpdate(){
//        $this->setUpdatedAt(new \DateTime('now'));
//    }
}
