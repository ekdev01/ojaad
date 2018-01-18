<?php
/**
 * Created by PhpStorm.
 * User: ekdevcenter
 * Date: 14/12/2017
 * Time: 16:00
 */

namespace EK\OjaadBundle\Entity;


class Contact
{
    protected $name;
    protected $email;
    protected $phone;
    protected $subject;
    protected $body;

    // Getters

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getBody()
    {
        return $this->body;
    }

    // Setters

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }
}
