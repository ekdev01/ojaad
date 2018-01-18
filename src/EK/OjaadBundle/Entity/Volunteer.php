<?php

namespace EK\OjaadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Volunteer
 *
 * @ORM\Table(name="oj_volunteer")
 * @ORM\Entity(repositoryClass="EK\OjaadBundle\Repository\VolunteerRepository")
 **/
class Volunteer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     **/
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     **/
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     **/
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="text")
     **/
    private $cover;

    /**
     * @var string
     *
     * @ORM\Column(name="cvfile", type="string", length=255)
     **/
    private $cvfile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecrea", type="datetime")
     */
    private $datecrea;


    /**
     * Volunteer constructor.
     *
     */
    public function __construct()
    {
        $this->datecrea = new \DateTime();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Volunteer
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
     * Set email
     *
     * @param string $email
     *
     * @return Volunteer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set cover
     *
     * @param string $cover
     *
     * @return Volunteer
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }
    /**
     * Get cover
     *
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set cvfile
     *
     * @param string $cvfile
     *
     * @return Volunteer
     */
    public function setCvfile($cvfile)
    {
        $this->cvfile = $cvfile;

        return $this;
    }
    /**
     * Get cvfile
     *
     * @return string
     */
    public function getCvfile()
    {
        return $this->cvfile;
    }

    /**
     * Set datecrea
     *
     * @param \DateTime $datecrea
     *
     * @return Volunteer
     */
    public function setDatecrea($datecrea)
    {
        $this->datecrea = $datecrea;

        return $this;
    }
    /**
     * Get datecrea
     *
     * @return \DateTime
     */
    public function getDatecrea()
    {
        return $this->datecrea;
    }
}
