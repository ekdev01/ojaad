<?php

namespace EK\OjaadBundle\Entity;

/**
 * Company
 *
 * @ORM\Table(name="oj_company")
 * @ORM\Entity(repositoryClass="EK\OjaadBundle\Repository\CompanyRepository")
 **/

class Company {
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
	 * @ORM\Column(name="socialreason", type="string", length=255)
	 **/
	private $socialreason;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="contactname", type="string", length=255)
	 **/
	private $contactname;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=255, unique=true)
	 **/
	private $email;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="role", type="string", length=255)
	 **/
	private $role;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="countryoffice", type="string", length=255)
	 **/
	private $countryoffice;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="phone", type="string", length=20, nullable=true)
	 **/
	private $phone;

	/**
	 * @var \string
	 *
	 * @ORM\Column(name="activity", type="string", length=255)
	 **/
	private $activity;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="turnover", type="string", length=255)
	 **/
	private $turnover;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="employees", type="integer", length=255, nullable=true)
	 **/
	private $employees;

	/**
	 * @var \string
	 *
	 * @ORM\Column(name="legalhotline", type="string", length=3)
	 **/
	private $legalhotline;

	/**
	 * @var \string
	 *
	 * @ORM\Column(name="legaladvice", type="string", length=3)
	 **/
	private $legaladvice;

	/**
	 * @var \string
	 *
	 * @ORM\Column(name="website", type="string", length=255, nullable=true)
	 **/
	private $website;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="datecrea", type="datetime")
	 **/
	private $datecrea;

	/**
	 * @var \string
	 *
	 * @ORM\Column(name="question", type="string", length=255)
	 **/
	private $question;

	/**
	 * Company constructor.
	 */
	public function __construct() {
		$this->datecrea = new \DateTime();
	}

	/**
	 * Get id
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set Social reason
	 * @param string $socialreason
	 * @return Company
	 */
	public function setSocialreason($socialreason) {
		$this->socialreason = strtoupper($socialreason);
		return $this;
	}
	/**
	 * Get Social reason
	 * @return string
	 */
	public function getSocialreason() {
		return $this->socialreason;
	}

	/**
	 * Set Contact name
	 * @param string $contactname
	 * @return Company
	 */
	public function setContactname($contactname) {
		$this->contactname = $contactname;
		return $this;
	}
	/**
	 * Get Contact name
	 * @return string
	 */
	public function getContactname() {
		return $this->contactname;
	}

	/**
	 * Set Email
	 * @param string $email
	 * @return Company
	 */
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	/**
	 * Get Email
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Set Role
	 * @param string $role
	 * @return Company
	 */
	public function setRole($role) {
		$this->role = $role;
		return $this;
	}
	/**
	 * Get Role
	 * @return string
	 */
	public function getRole() {
		return $this->role;
	}

	/**
	 * Set Country office
	 * @param string $countryoffice
	 * @return Company
	 */
	public function setCountryoffice($countryoffice) {
		$this->countryoffice = $countryoffice;
		return $this;
	}
	/**
	 * Get Country office
	 * @return string
	 */
	public function getCountryoffice() {
		return $this->countryoffice;
	}

	/**
	 * Set Phone
	 * @param string $phone
	 * @return Company
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
		return $this;
	}
	/**
	 * Get Phone
	 * @return string
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * Set Activity
	 * @param string $activity
	 * @return Company
	 */
	public function setActivity($activity) {
		$this->activity = $activity;
		return $this;
	}
	/**
	 * Get Activity
	 * @return string
	 */
	public function getActivity() {
		return $this->activity;
	}

	/**
	 * Set Turnover
	 * @param string $turnover
	 * @return Company
	 */
	public function setTurnover($turnover) {
		$this->turnover = $turnover;
		return $this;
	}
	/**
	 * Get Turnover
	 * @return string
	 */
	public function getTurnover() {
		return $this->turnover;
	}

	/**
	 * Set Number of employees
	 * @param int $employees
	 * @return Company
	 */
	public function setEmployees($employees) {
		$this->employees = $employees;
		return $this;
	}
	/**
	 * Get Number of employees
	 * @return int
	 */
	public function getEmployees() {
		return $this->employees;
	}

	/**
	 * Set Legal hotline
	 * @param string $legalhotline
	 * @return Company
	 */
	public function setLegalhotline($legalhotline) {
		$this->legalhotline = $legalhotline;
		return $this;
	}
	/**
	 * Get Legal hotline
	 * @return string
	 */
	public function getLegalhotline() {
		return $this->legalhotline;
	}

	/**
	 * Set Legal advice
	 * @param string $legaladvice
	 * @return Company
	 */
	public function setLegaladvice($legaladvice) {
		$this->legaladvice = $legaladvice;
		return $this;
	}
	/**
	 * Get Legal advice
	 * @return string
	 */
	public function getLegaladvice() {
		return $this->legaladvice;
	}

	/**
	 * Set Website
	 * @param string $website
	 * @return Company
	 */
	public function setWebsite($website) {
		$this->website = $website;
		return $this;
	}
	/**
	 * Get Website
	 * @return string
	 */
	public function getWebsite() {
		return $this->website;
	}

	/**
	 * Set datecrea
	 * @param \DateTime $datecrea
	 * @return Company
	 */
	public function setDatecrea($datecrea) {
		$this->datecrea = $datecrea;
		return $this;
	}
	/**
	 * Get datecrea
	 * @return \DateTime
	 */
	public function getDatecrea() {
		return $this->datecrea;
	}

	/**
	 * Set Question
	 * @param string $question
	 * @return Company
	 */
	public function setQuestion($question) {
		$this->question = $question;
		return $this;
	}
	/**
	 * Get Question
	 * @return string
	 */
	public function getQuestion() {
		return $this->question;
	}
}
