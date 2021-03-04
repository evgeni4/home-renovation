<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sonata\SeoBundle\Seo\SeoPageInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    private $entityManager;
    private $seo;
    public function __construct(SeoPageInterface $seo,EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->seo = $seo;
    }

    /**
     * @Route("/register", name="app_register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $this->seo->setTitle("Регистрация")
            ->addMeta('name', 'keywords','Один,звонок,делает,все, Услуги , компании, ремонту')
            ->addMeta('name', 'description', 'Бизнес по обслуживанию дома')
            ->addMeta('property', 'og:title', 'Регистрация')
            ->addMeta('property', 'og:description', 'Бизнес по обслуживанию дома')
            ->addMeta('property', 'og:site_name', '')
        ;
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        $countUser = $this->entityManager->getRepository(User::class)->findAll();
        if ($form->isSubmitted() && $form->isValid()) {
            if (count($countUser) === 0) {
                $user->setRoles(['ROLE_ADMIN']);
            } else {
                $user->setRoles(['ROLE_USER']);
            }
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email
            $this->addFlash('info', 'Регистрация успешно завершина!');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
