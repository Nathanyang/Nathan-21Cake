<?php
/**
 * Created by PhpStorm.
 * User: Nathan-Y
 * Date: 15-3-4
 * Time: 下午8:17
 */

namespace Nathan\CakeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Class Profile
 * @ORM\Entity(repositoryClass="Nathan\CakeBundle\Repository\ProfileRepository")
 * @ORM\Table(name="profile")
 */
class Profile {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $mobile_number;
    /**
     * @OneToOne(targetEntity="User", inversedBy="profile")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
}
