<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/10/17
 * Time: 14:44
 */


namespace EK\OjaadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('EKOjaadBundle:Admin:admin.html.twig', array(
            'luri' => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?1:0),
            'lang' => $this->getLang((string)$request->getLocale()),
        ));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function memberAction(Request $request)
    {
        return $this->render('EKOjaadBundle:Admin:member.html.twig', array(
            'luri' => (preg_match('/(\/fr\/|\/en\/|\/es\/)$/', $request->getUri())?1:0),
            'lang' => $this->getLang((string)$request->getLocale()),
        ));
    }

    /**
     * Get Language
     *
     * @param String $lang
     *
     * @return int
     */
    protected function getLang($lang)
    {
        if($lang==='en'){
            return 1;
        } elseif ($lang==='es'){
            return 2;
        } else{
            return 0;
        }
    }
}