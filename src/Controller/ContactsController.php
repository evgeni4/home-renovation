<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactsType;
use App\Repository\ContactSettingsRepository;
use Sonata\SeoBundle\Seo\SeoPageInterface;
use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactsController extends AbstractController
{
    public $seo;
    private $settings;
    public function __construct(SeoPageInterface $seo,ContactSettingsRepository $settings)
    {
        $this->seo = $seo;
        $this->settings = $settings;
    }
    /**
     * @Route("/contacts", name="app_contacts")
     * @param Request $request
     * @param Swift_Mailer $mailer
     * @return Response
     */
    public function index(Request $request,Swift_Mailer $mailer): Response
    {
           $setting = $this->settings->findOneBy(['id'=>1]);
            $this->seo->setTitle($setting->getTitle())
            ->addMeta('name', 'keywords',$setting->getKeywords())
            ->addMeta('name', 'description', $setting->getDescription())
            ->addMeta('property', 'og:title', $setting->getTitle())
            ->addMeta('property', 'og:description', $setting->getDescription())
            ->addMeta('property', 'og:site_name', '')
        ;
        $contact = new Contacts();
        $form = $this->createForm(ContactsType::class,$contact);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
        $message = (new \Swift_Message($contact->getSubject()))
            ->setFrom($contact->getEmail())
            ->setTo('ginageorge708@gmail.com')
            ->setBody('Sender : '.$contact->getEmail().\PHP_EOL.$contact->getMessage()) ;
            $mailer->send($message);
            $this->addFlash('info','Письмо успешно отправлено');
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
        return $this->render('contacts/index.html.twig', [
            'form' => $form->createView(),
            'setting' => $setting,
        ]);
    }
}
