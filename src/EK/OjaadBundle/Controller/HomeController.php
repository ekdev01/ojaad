<?php
/**
 * Created by PhpStorm.
 * User: ekdev
 * Date: 11/10/17
 * Time: 21:59
 */

namespace EK\OjaadBundle\Controller;

use EK\OjaadBundle\Entity\Company;
use EK\OjaadBundle\Entity\Person;
use EK\OjaadBundle\Entity\Volunteer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller {
	/**
	 * Action Home
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function indexAction(Request $request) {
		return $this->render('EKOjaadBundle:Home:index.html.twig', array(
				'luri'   => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?1:0),
				'active' => 1,
				'lang'   => $this->getLang((string) $request->getLocale()),
			));
	}
	/**
	 * Action Person
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function personAction(Request $request) {
		$trans = $this->get('translator');
		$form  = $this->createForm('EK\OjaadBundle\Form\PersonType', null, array(
				'action'     => $this->generateUrl('ek_ojaad_person'),
				'method'     => 'POST',
				'translator' => $trans,
			));

		if ($request->isMethod('POST')) {
			// Refill the fields in case the form is not valid.
			$form->handleRequest($request);

			if ($form->isValid()/*&& $this->isRecaptchaValid($fData['g-recaptcha-response'])*/) {

				// Preparation of entity data
				$p = new Person();
				$p->setName($form->get('name')->getData());
				$p->setLastname($form->get('lastname')->getData());
				$p->setAddress($form->get('address')->getData());
				$p->setEmail($form->get('email')->getData());
				$p->setBirthdate($form->get('birthdate')->getData());
				$p->setPhone($form->get('phone')->getData());
				$p->setProsituation($form->get('prosituation')->getData());
				$p->setFamsituation($form->get('famsituation')->getData());
				$p->setNationality($form->get('nationality')->getData());
				$p->setNativecountry($form->get('nativecountry')->getData());
				$p->setQuestion1($form->get('question1')->getData());
				$p->setQuestion2($form->get('question2')->getData());
				$p->setQuestion3($form->get('question3')->getData());
				$p->setQuestion4($form->get('question4')->getData());
				$p->setQuestion5($form->get('question5')->getData());
				$p->setQuestion6($form->get('question6')->getData());
				$p->setQuestion7($form->get('question7')->getData());
				$p->setQuestion8($form->get('question8')->getData());
				$p->setQuestion9($form->get('question9')->getData());
				$p->setQuestion10($form->get('question10')->getData());
				$p->setQuestion11($form->get('question11')->getData());
				$p->setAdhesion($form->get('adhesion')->getData());
				$p->setMensual($form->get('mensual')->getData());
				$p->setQuestion12($form->get('question12')->getData());

				// Update BDD
				$bddStatus = $this->addPerson($p);

				// Send mail
				$mailer = $this->container->get('ek_ojaad.mailer');
				$status = null;
				$tag    = null;

				if ($bddStatus != 9 && ($mailer->sendPersonEmail($p))) {

					// Everything OK, redirect to wherever you want ! :
					$msg = $p->getLastname().' '.$p->getName().', '.(string) $trans->trans('bform.msg.confirm');
					$this->addFlash('success', $msg);
					$status = (string) $trans->trans('status.op.success');
					$tag    = 1;

				} else {
					// An error ocurred
					$tag    = 0;
					$status = (string) $trans->trans('status.op.error');

					if ($bddStatus == 9) {
						$this->addFlash('warning', (string) $trans->trans('bform.msg.duplicate'));
					} else {
						$this->addFlash('warning', (string) $trans->trans('bform.msg.warning'));
					}
				}

				return $this->render('EKOjaadBundle:Home:message.html.twig', array(
						'luri'   => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?1:0),
						'lang'   => $this->getLang((string) $request->getLocale()),
						'tag'    => $tag,
						'active' => 0,
						'status' => $status,
					));
			}
		}
		return $this->render('EKOjaadBundle:Home:person.html.twig', array(
				'luri'   => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?2:0),
				'active' => (preg_match('/person/', $request->getUri())?2:0),
				'lang'   => $this->getLang((string) $request->getLocale()),
				'form'   => $form->createView(),
			));
	}
	/**
	 * Add Person
	 * @param Person $p
	 * @return int
	 */
	public function addPerson(Person $p) {
		try {
			$em = $this->getDoctrine()->getManager();// get entity manager
			$em->persist($p);// persist objet
			$em->flush();// update database
			return 1;
		}
		 catch (\Exception $e) {
			if (preg_match('/Duplicate entry/', $e->getMessage())) {
				return 9;
			} else {
				return 0;
			}
		}
	}
	/**
	 * Action Company
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function companyAction(Request $request) {
		$trans = $this->get('translator');
		$form  = $this->createForm('EK\OjaadBundle\Form\CompanyType', null, array(
				'action'     => $this->generateUrl('ek_ojaad_company'),
				'method'     => 'POST',
				'translator' => $trans,
			));

		if ($request->isMethod('POST')) {
			// Refill the fields in case the form is not valid.
			$form->handleRequest($request);

			if ($form->isValid()/*&& $this->isRecaptchaValid($fData['g-recaptcha-response'])*/) {

				// Preparation of entity data
				$c = new Company();
				$c->setSocialreason($form->get('socialreason')->getData());
				$c->setContactname($form->get('contactname')->getData());
				$c->setEmail($form->get('email')->getData());
				$c->setRole($form->get('role')->getData());
				$c->setCountryoffice($form->get('countryoffice')->getData());
				$c->setPhone($form->get('phone')->getData());
				$c->setActivity($form->get('activity')->getData());
				$c->setTurnover($form->get('turnover')->getData());
				$c->setEmployees($form->get('employees')->getData());
				$c->setLegalhotline($form->get('legalhotline')->getData());
				$c->setLegaladvice($form->get('legaladvice')->getData());
				$c->setWebsite($form->get('website')->getData());
				$c->setQuestion($form->get('question')->getData());

				// Update BDD
				$bddStatus = $this->addCompany($c);

				// Send mail
				$mailer = $this->container->get('ek_ojaad.mailer');
				$status = null;
				$tag    = null;

				if ($bddStatus != 9 && ($mailer->sendCompanyEmail($c))) {

					// Everything OK, redirect to wherever you want ! :
					$msg = $c->getContactname().', '.(string) $trans->trans('bform.msg.confirm');
					$this->addFlash('success', $msg);
					$status = (string) $trans->trans('status.op.success');
					$tag    = 1;

				} else {
					// An error ocurred
					$tag    = 0;
					$status = (string) $trans->trans('status.op.error');

					if ($bddStatus == 9) {
						$this->addFlash('warning', (string) $trans->trans('bform.msg.duplicate'));
					} else {
						$this->addFlash('warning', (string) $trans->trans('bform.msg.warning'));
					}
				}

				return $this->render('EKOjaadBundle:Home:message.html.twig', array(
						'luri'   => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?1:0),
						'lang'   => $this->getLang((string) $request->getLocale()),
						'tag'    => $tag,
						'active' => 0,
						'status' => $status,
					));
			}
		}
		return $this->render('EKOjaadBundle:Home:company.html.twig', array(
				'luri'   => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?1:0),
				'active' => (preg_match('/company/', $request->getUri())?3:0),
				'lang'   => $this->getLang((string) $request->getLocale()),
				'form'   => $form->createView(),
			));
	}
	/**
	 * Add Company
	 * @param Company $c
	 * @return int
	 */
	public function addCompany(Company $c) {
		try {
			$em = $this->getDoctrine()->getManager();// get entity manager
			$em->persist($c);// persist objet
			$em->flush();// update database

			return 1;
		}
		 catch (\Exception $e) {
			if (preg_match('/Duplicate entry/', $e->getMessage())) {
				return 9;
			} else {
				return 0;
			}
		}
	}
	/**
	 * Action Membership
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function membershipAction(Request $request) {
		$trans = $this->get('translator');
		$form  = $this->createForm('EK\OjaadBundle\Form\VolunteerType', null, array(
				'action'     => $this->generateUrl('ek_ojaad_membership'),
				'method'     => 'POST',
				'translator' => $trans,
			));

		if ($request->isMethod('POST')) {
			// Refill the fields in case the form is not valid.
			$form->handleRequest($request);

			if ($form->isValid()/*&& $this->isRecaptchaValid($fData['g-recaptcha-response'])*/) {

				// Get and prepare attached file
				$file     = $form->get('cvfile')->getData();
				$filename = $file->getClientOriginalName();
				$file->move('/tmp', $filename);

				// Preparation of entity data
				$vol = new Volunteer();
				$vol->setName($form->get('name')->getData());
				$vol->setEmail($form->get('email')->getData());
				$vol->setCover($form->get('cover')->getData());
				$vol->setCvfile($filename);

				// Update BDD
				$bddStatus = $this->addVolunteer($vol);

				// Send mail
				$mailer  = $this->container->get('ek_ojaad.mailer');
				$subject = $trans->trans('ojaad.label.pre').' '.$form->get('name')->getData();
				$status  = null;
				$tag     = null;

				if ($bddStatus != 9 && ($mailer->sendAttachEmail(
							$form->get('email')->getData(),
							$form->get('cover')->getData(),
							$form->get('name')->getData(),
							$subject,
							$filename))) {

					// Everything OK, redirect to wherever you want ! :
					$msg = $vol->getName().', '.(string) $trans->trans('success.add.volunteer');
					$this->addFlash('success', $msg);
					$status = (string) $trans->trans('status.op.success');
					$tag    = 1;

				} else {
					// An error ocurred
					$tag    = 0;
					$status = (string) $trans->trans('status.op.error');

					if ($bddStatus == 9) {
						$this->addFlash('warning', (string) $trans->trans('warning.duplicate.volunteer'));
					} else {
						$this->addFlash('warning', (string) $trans->trans('warning.add.volunteer'));
					}
				}

				// Deleting the attached file after sending the mail
				if ($filename != "") {
					unlink('/tmp/'.$filename);
				}

				return $this->render('EKOjaadBundle:Home:message.html.twig', array(
						'luri'   => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?1:0),
						'lang'   => $this->getLang((string) $request->getLocale()),
						'tag'    => $tag,
						'active' => 0,
						'status' => $status,
					));
			}
		}
		return $this->render('EKOjaadBundle:Home:membership.html.twig', array(
				'luri'   => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?1:0),
				'active' => (preg_match('/membership/', $request->getUri())?4:0),
				'lang'   => $this->getLang((string) $request->getLocale()),
				'form'   => $form->createView(),
			));
	}
	/**
	 * Add Volunteer Member
	 * @param Volunteer $v
	 * @return int
	 */
	public function addVolunteer(Volunteer $v) {
		try {
			$em = $this->get('doctrine.orm.entity_manager');// get entity manager
			$em->persist($v);// persist objet
			$em->flush();// update database
			return 1;
		}
		 catch (\Exception $e) {
			if (preg_match('/Duplicate entry/', $e->getMessage())) {
				return 9;
			} else {
				return 0;
			}
		}
	}
	/**
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function contactAction(Request $request) {
		$trans  = $this->get('translator');
		$status = null;

		$form = $this->createForm('EK\OjaadBundle\Form\ContactType', null, array(
				'action'     => $this->generateUrl('ek_ojaad_contact'),
				'method'     => 'POST',
				'translator' => $trans,
			));

		if ($request->isMethod('POST')) {
			// Refill the fields in case the form is not valid.
			$form->handleRequest($request);

			$fData = $form->getData();

			$user_ip    = $this->get_ip();
			$response   = $_POST['g-recaptcha-response'];
			$secret     = $this->container->getParameter('google_recaptcha_secret');
			$bRecaptcha = $this->isRecaptchaValid($response, $secret, $user_ip);

			if ($form->isValid() && $bRecaptcha) {

				// Send mail
				$mailer = $this->container->get('ek_ojaad.mailer');
				$tag    = null;

				if ($mailer->sendEmail($fData['email'], $fData['body'], $fData['name'], $fData['subject'])) {

					// Everything OK, redirect to wherever you want ! :
					$this->addFlash('success', (string) $trans->trans('success.send.mail'));
					$status = (string) $trans->trans('status.op.success');
					$tag    = 1;

				} else {
					// An error ocurred, handle
					$this->addFlash('warning', (string) $trans->trans('warning.send.mail'));
					$status = (string) $trans->trans('status.op.error');
					$tag    = 0;
				}
				return $this->render('EKOjaadBundle:Home:message.html.twig', array(
						'luri'   => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?5:0),
						'lang'   => $this->getLang((string) $request->getLocale()),
						'tag'    => $tag,
						'active' => 0,
						'status' => $status,
					));
			} else {
				$status = (string) $trans->trans('status.op.error');
			}
		}
		return $this->render('EKOjaadBundle:Home:contact.html.twig', array(
				'luri'   => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?1:0),
				'active' => (preg_match('/contact/', $request->getUri())?5:0),
				'lang'   => $this->getLang((string) $request->getLocale()),
				'form'   => $form->createView(),
				'status' => $status,
			));
	}
	/**
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function mentionAction(Request $request) {
		return $this->render('EKOjaadBundle:Home:mention.html.twig', array(
				'luri'   => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?1:0),
				'active' => 0,
				'lang'   => $this->getLang((string) $request->getLocale()),
			));
	}

	/**
	 * Get Language
	 * @param String $lang
	 * @return int
	 */
	protected function getLang($lang) {
		if ($lang === 'en') {
			return 1;
		} elseif ($lang === 'es') {
			return 2;
		} else {
			return 0;
		}
	}
	/**
	 * @param $code
	 * @param null $ip
	 * @return bool
	 */
	private function isRecaptchaValid($code, $secret, $ip = null) {
		if (empty($code)) {
			return false;// Si aucun code n'est entré, on ne cherche pas plus loin
		}
		$params = [
			'secret'   => $secret,
			'response' => $code
		];
		if ($ip) {
			$params['remoteip'] = $ip;
		}
		$url = "https://www.google.com/recaptcha/api/siteverify?".http_build_query($params);
		if (function_exists('curl_version')) {
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_TIMEOUT, 1);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);// Evite les problèmes, si le ser
			$response = curl_exec($curl);
		} else {
			// Si curl n'est pas dispo, un bon vieux file_get_contents
			$response = file_get_contents($url);
		}

		if (empty($response) || is_null($response)) {
			return false;
		}

		$json = json_decode($response);
		return $json->success;
	}

	private function get_ip() {
		// IP si internet partagé
		if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			return $_SERVER['HTTP_CLIENT_IP'];
		}
		// IP derrière un proxy
		 elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		// Sinon : IP normale
		 else {
			return (isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'');
		}
	}
}