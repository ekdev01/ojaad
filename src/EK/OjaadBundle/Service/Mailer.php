<?php
/**
 * Created by PhpStorm.
 * User: ekdevcenter
 * Date: 18/12/2017
 * Time: 20:53
 * Path: src/EK/OjaadBundle/Service/Mailer.php
 */

namespace EK\OjaadBundle\Service;

use EK\OjaadBundle\Entity\Company;
use EK\OjaadBundle\Entity\Person;

class Mailer
{
    private $host;
    private $port;
    private $mailFrom;
    private $mailFromPwd;

    public function __construct($hostmail, $portmail, $mailfrom, $mailfrompwd)
    {
        $this->host        = $hostmail;
        $this->port        = $portmail;
        $this->mailFrom    = $mailfrom;
        $this->mailFromPwd = $mailfrompwd;
    }
    /**
     * @param $emailTo
     * @param $body
     * @param $name
     * @param $subject
     * @return int
     */
    public function sendEmail($emailTo, $body, $name, $subject)
    {
        $subject = '[OJAAD Site] '. $subject;

        // Send via Gandi
        $transport = \Swift_SmtpTransport::newInstance($this->host, $this->port, 'ssl')
            ->setUsername($this->mailFrom)
            ->setPassword($this->mailFromPwd);

        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance($subject)
            ->setFrom(array($emailTo => $name))
            ->setTo(array(
                $this->mailFrom => 'OJAAD Website'
            ))
            ->setBody($body);

        return $mailer->send($message);
    }
    /**
     * @param $emailTo
     * @param $body
     * @param $name
     * @param $subject
     * @param $filename
     * @return int
     */
    public function sendAttachEmail($emailTo, $body, $name, $subject, $filename)
    {
        $subject       = '[OJAAD Site] '. $subject;

        // Send via Gandi
        $transport = \Swift_SmtpTransport::newInstance($this->host, $this->port, 'ssl')
            ->setUsername($this->mailFrom)
            ->setPassword($this->mailFromPwd);

        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance($subject)
            ->setFrom(array($emailTo => $name))
            ->setTo(array(
                $this->mailFrom => 'OJAAD Website'
            ))
            ->setBody($body)
            ->attach(\Swift_Attachment::fromPath('/tmp/'.$filename));

        return $mailer->send($message);
    }
    /**
     * @param Person $p
     * @return int
     */
    public function sendPersonEmail(Person $p)
    {
        $subject = "[OJAAD Site] Formulaire d'informations envoyée par ".$p->getLastname().' '. $p->getName();
        $body    = "Bonjour,\n".
                    "Ceci est un message envoyé depuis votre site web ojaad.org.\n\n".
                    "Nom: ". $p->getName() ."\n".
                    "Prénom: " . $p->getLastname() ."\n".
                    "Adresse: ". $p->getAddress() ."\n".
                    "E-mail: ". $p->getEmail() ."\n".
                    "Date de naissance: ". $p->getBirthdate()->format('Y-m-d') ."\n".
                    "Téléphone: ". $p->getPhone() ."\n".
                    "Situation professionnelle: ". $p->getProsituation() ."\n".
                    "Situation familiale: ". $p->getFamsituation() ."\n".
                    "Nationalité: ". $p->getNationality() ."\n".
                    "Pays d'origine: ". $p->getNativecountry() ."\n".
                    "Avez-vous une assurance juridique actuellement?: ". $p->getQuestion1() ."\n".
                    "Avez-vous un avocat?: ". $p->getQuestion2() ."\n".
                    "Avez-vous déjà eu affaire à la justice?: ". $p->getQuestion3() ."\n".
                    "Si oui avez-vous trouvé facilement un avocat?: ". $p->getQuestion4() ."\n".
                    "Comment avez-vous financé les frais de justice?: ". $p->getQuestion5() ."\n".
                    "Connaissez-vous des personnes de votre entourage qui ont eu affaire à la justice?: ". $p->getQuestion6() ."\n".
                    "Ont-ils trouvé facilement un avocat?: ". $p->getQuestion7() ."\n".
                    "Ont-ils pu financer facilement leurs frais de justice?: ". $p->getQuestion8() ."\n".
                    "Quel est votre tranche de revenus annuels (en euros)?: ". $p->getQuestion9() ."\n".
                    "Quel est votre ressenti sur la justice de manière générale?: ". $p->getQuestion10() ."\n".
                    "Quel est votre ressenti sur la situation des africains et afrodescendants?: ". $p->getQuestion11() ."\n".
                    "Souhaitez-vous adhérer à OJAAD ?: ". $p->getAdhesion() ."\n".
                    "Si oui, quelle mensualité vous conviendrait?: ". $p->getMensual() ."\n".
                    "Qu'attendez-vous de OJAAD?: ". $p->getQuestion12() ."\n\n".
                    "--------------- Sending by Server ----------------------------------------\n\n";

        // Send via Gandi
        $transport = \Swift_SmtpTransport::newInstance($this->host, $this->port,'ssl')
            ->setUsername($this->mailFrom)
            ->setPassword($this->mailFromPwd);

        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance($subject)
            ->setFrom(array($p->getEmail()  => $p->getLastname() .' '. $p->getName()))
            ->setTo(array(
                $this->mailFrom => 'OJAAD Website'
            ))
            ->setBody($body);

        return $mailer->send($message);
    }
    /**
     * @param Company $c
     * @return int
     */
    public function sendCompanyEmail(Company $c)
    {
        $subject = "[OJAAD Site] Formulaire d'informations entreprise envoyée par ". $c->getSocialreason();
        $body    = "Bonjour,\n".
                    "Ceci est un message envoyé depuis votre site web ojaad.org.\n\n".
                    "Raison Sociale: ". $c->getSocialreason() ."\n".
                    "Nom du contact: " . $c->getContactname() ."\n".
                    "E-mail: ". $c->getEmail() ."\n".
                    "Fonction du contact: ". $c->getRole() ."\n".
                    "Téléphone: ". $c->getPhone() ."\n".
                    "Pays du siège social: ". $c->getCountryoffice() ."\n".
                    "Activité: ".  $c->getActivity() ."\n".
                    "Chiffre d'Affaire: ". $c->getTurnover() ."\n".
                    "Nombre d'employés / Bénévoles: ". $c->getEmployees() ."\n".
                    "Besoin d'une hotline juridique?: ". $c->getLegalhotline() ."\n".
                    "Besoin de conseils juridiques?: ". $c->getLegaladvice() ."\n".
                    "Site web: ". $c->getWebsite() ."\n\n".
                    "--------------- Sending by Server ----------------------------------------\n\n";

        // 1. Create the Transport
        $transport = \Swift_SmtpTransport::newInstance($this->host, $this->port,'ssl')
            ->setUsername($this->mailFrom)
            ->setPassword($this->mailFromPwd);

        // 2. Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // 3. Create a message
        $message = (\Swift_Message::newInstance($subject))
            ->setFrom([$c->getEmail() => $c->getContactname()])
            ->setTo([$this->mailFrom => 'OJAAD Website'])
            ->setBody($body)
        ;
        return $mailer->send($message);
    }
}