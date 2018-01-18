<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/10/17
 * Time: 09:51
 */

namespace EK\OjaadBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserAdmin
 *
 * @package EK\OjaadBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="oj_user_admin")
 */
class UserAdmin extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    public function __construct()
    {
        parent::__construct();
    }

}