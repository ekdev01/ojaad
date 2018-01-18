<?php

namespace EK\OjaadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="oj_person")
 * @ORM\Entity(repositoryClass="EK\OjaadBundle\Repository\PersonRepository")
 **/
class Person
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
     * @ORM\Column(name="name", type="string", length=50)
     **/
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50)
     **/
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     **/
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     **/
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime")
     **/
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=25, nullable=true)
     **/
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="prosituation", type="string", length=30)
     **/
    private $prosituation;

    /**
     * @var string
     *
     * @ORM\Column(name="famsituation", type="string", length=20)
     **/
    private $famsituation;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=50)
     **/
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="nativecountry", type="string", length=50)
     **/
    private $nativecountry;

    /**
     * @var string
     *
     * @ORM\Column(name="question1", type="string", length=3)
     **/
    private $question1;

    /**
     * @var string
     *
     * @ORM\Column(name="question2", type="string", length=3)
     **/
    private $question2;

    /**
     * @var string
     *
     * @ORM\Column(name="question3", type="string", length=3)
     **/
    private $question3;

    /**
     * @var string
     *
     * @ORM\Column(name="question4", type="string", length=3)
     **/
    private $question4;

    /**
     * @var string
     *
     * @ORM\Column(name="question5", type="string", length=255)
     **/
    private $question5;

    /**
     * @var string
     *
     * @ORM\Column(name="question6", type="string", length=3)
     **/
    private $question6;

    /**
     * @var string
     *
     * @ORM\Column(name="question7", type="string", length=3)
     **/
    private $question7;

    /**
     * @var string
     *
     * @ORM\Column(name="question8", type="string", length=3)
     **/
    private $question8;

    /**
     * @var string
     *
     * @ORM\Column(name="question9", type="string", length=30)
     **/
    private $question9;

    /**
     * @var string
     *
     * @ORM\Column(name="question10", type="string", length=255)
     **/
    private $question10;

    /**
     * @var string
     *
     * @ORM\Column(name="question11", type="string", length=255)
     **/
    private $question11;

    /**
     * @var string
     *
     * @ORM\Column(name="adhesion", type="string", length=3)
     **/
    private $adhesion;

    /**
     * @var string
     *
     * @ORM\Column(name="mensual", type="string", nullable=true)
     **/
    private $mensual;

    /**
     * @var string
     *
     * @ORM\Column(name="question12", type="string", length=255)
     **/
    private $question12;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecrea", type="datetime")
     **/
    private $datecrea;


    /**
     * Person constructor.
     *
     */
    public function __construct()
    {
        $this->datecrea = new \DateTime();
    }

    /**
     * Get Name
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    /**
     * Set Name
     * @param $name
     * @return Person
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Get Last Name
     * @return string
     */
    public function getLastname() {
        return $this->lastname;
    }
    /**
     * Set Last Name
     * @param $lastname
     * @return Person
     */
    public function setLastname($lastname){
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Get Address
     * @return string
     */
    public function getAddress() {
        return $this->address;
    }
    /**
     * Set Address
     * @param $address
     * @return Person
     */
    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    /**
     * Get Email
     * @return string
     */
    public function getEmail(){
        return $this->email;
    }
    /**
     * Set Email
     * @param $email
     * @return Person
     */
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    /**
     * Get Birth Date
     * @return string
     */
    public function getBirthdate(){
        return $this->birthdate;
    }
    /**
     * Set Birth Date
     * @param $birthdate
     * @return Person
     */
    public function setBirthdate($birthdate){
        $this->birthdate = new \DateTime($birthdate->format('Y-m-d'));
        return $this;
    }

    /**
     * Get Phone
     * @return string
     */
    public function getPhone(){
        return $this->phone;
    }
    /**
     * Set Phone
     * @param $phone
     * @return Person
     */
    public function setPhone($phone){
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get Professional Situation
     * @return string
     */
    public function getProsituation(){
        return $this->prosituation;
    }
    /**
     * Set Professional Situation
     * @param $prosituation
     * @return Person
     */
    public function setProsituation($prosituation){
        $this->prosituation = $prosituation;
        return $this;
    }

    /**
     * Get Family Situation
     * @return string
     */
    public function getFamsituation(){
        return $this->famsituation;
    }
    /**
     * Set Family Situation
     * @param $famsituation
     * @return Person
     */
    public function setFamsituation($famsituation){
        $this->famsituation = $famsituation;
        return $this;
    }

    /**
     * Get Nationality
     * @return string
     */
    public function getNationality(){
        return $this->nationality;
    }
    /**
     * Set Nationality
     * @param $nationality
     * @return Person
     */
    public function setNationality($nationality){
        $this->nationality = $nationality;
        return $this;
    }

    /**
     * Get Native Country
     * @return string
     */
    public function getNativecountry(){
        return $this->nativecountry;
    }
    /**
     * Set Native Country
     * @param $nativecountry
     * @return Person
     */
    public function setNativecountry($nativecountry){
        $this->nativecountry = $nativecountry;
        return $this;
    }

    /**
     * Get Question1
     * @return string
     */
    public function getQuestion1(){
        return $this->question1;
    }
    /**
     * Set Question1
     * @param $question
     * @return Person
     */
    public function setQuestion1($question){
        $this->question1 = $question;
        return $this;
    }

    /**
     * Get Question2
     * @return string
     */
    public function getQuestion2(){
        return $this->question2;
    }
    /**
     * Set Question2
     * @param $question
     * @return Person
     */
    public function setQuestion2($question){
        $this->question2 = $question;
        return $this;
    }

    /**
     * Get Question3
     * @return string
     */
    public function getQuestion3(){
        return $this->question3;
    }
    /**
     * Set Question3
     * @param $question
     * @return Person
     */
    public function setQuestion3($question){
        $this->question3 = $question;
        return $this;
    }

    /**
     * Get Question4
     * @return string
     */
    public function getQuestion4(){
        return $this->question4;
    }
    /**
     * Set Question4
     * @param $question
     * @return Person
     */
    public function setQuestion4($question){
        $this->question4 = $question;
        return $this;
    }

    /**
     * Get Question5
     * @return string
     */
    public function getQuestion5(){
        return $this->question5;
    }
    /**
     * Set Question5
     * @param $question
     * @return Person
     */
    public function setQuestion5($question){
        $this->question5 = $question;
        return $this;
    }

    /**
     * Get Question6
     * @return string
     */
    public function getQuestion6(){
        return $this->question6;
    }
    /**
     * Set Question6
     * @param $question
     * @return Person
     */
    public function setQuestion6($question){
        $this->question6 = $question;
        return $this;
    }

    /**
     * Get Question7
     * @return string
     */
    public function getQuestion7(){
        return $this->question7;
    }
    /**
     * Set Question7
     * @param $question
     * @return Person
     */
    public function setQuestion7($question){
        $this->question7 = $question;
        return $this;
    }

    /**
     * Get Question8
     * @return string
     */
    public function getQuestion8(){
        return $this->question8;
    }
    /**
     * Set Question8
     * @param $question
     * @return Person
     */
    public function setQuestion8($question){
        $this->question8 = $question;
        return $this;
    }

    /**
     * Get Question9
     * @return string
     */
    public function getQuestion9(){
        return $this->question9;
    }
    /**
     * Set Question9
     * @param $question
     * @return Person
     */
    public function setQuestion9($question){
        $this->question9 = $question;
        return $this;
    }

    /**
     * Get Question10
     * @return string
     */
    public function getQuestion10(){
        return $this->question10;
    }
    /**
     * Set Question10
     * @param $question
     * @return Person
     */
    public function setQuestion10($question){
        $this->question10 = $question;
        return $this;
    }

    /**
     * Get Question11
     * @return string
     */
    public function getQuestion11(){
        return $this->question11;
    }
    /**
     * Set Question11
     * @param $question
     * @return Person
     */
    public function setQuestion11($question){
        $this->question11 = $question;
        return $this;
    }

    /**
     * Get Adhesion
     * @return string
     */
    public function getAdhesion(){
        return $this->adhesion;
    }
    /**
     * Set Adhesion
     * @param $adhesion
     * @return Person
     */
    public function setAdhesion($adhesion){
        $this->adhesion = $adhesion;
        return $this;
    }

    /**
     * Get Mensual
     * @return float
     */
    public function getMensual(){
        return $this->mensual;
    }
    /**
     * Set Mensual
     * @param $mensual
     * @return Person
     */
    public function setMensual($mensual){
        $this->mensual = $mensual;
        return $this;
    }

    /**
     * Get Question12
     * @return string
     */
    public function getQuestion12(){
        return $this->question12;
    }
    /**
     * Set Question12
     * @param $question
     * @return Person
     */
    public function setQuestion12($question){
        $this->question12 = $question;
        return $this;
    }

    /**
     * Set Date creation
     * @param \DateTime $datecrea
     * @return Person
     */
    public function setDatecrea($datecrea){
        $this->datecrea = $datecrea;
        return $this;
    }
    /**
     * Get Date creation
     * @return \DateTime
     */
    public function getDatecrea(){
        return $this->datecrea;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
