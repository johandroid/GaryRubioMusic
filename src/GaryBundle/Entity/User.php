<?php
/**
 * Created by PhpStorm.
 * User: johandroid
 * Date: 10/05/16
 * Time: 23:11
 */
// src/AppBundle/Entity/User.php

namespace GaryBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    private $nombre;

    private $apellido;

    private $telefono;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}