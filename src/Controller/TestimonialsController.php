<?php

namespace App\Controller;

use App\Entity\Testimonials;
use App\Form\TestimonialsType;
use App\Service\Testimonials\TestimonialsServiceInterface;
use App\Service\User\UserServiceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sonata\SeoBundle\Seo\SeoPageInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestimonialsController extends AbstractController
{
    private $userService;
    private $testimonialsService;
    private $seo;

    public function __construct(SeoPageInterface $seo, UserServiceInterface $userService, TestimonialsServiceInterface $testimonialsService)
    {
        $this->seo = $seo;
        $this->userService = $userService;
        $this->testimonialsService = $testimonialsService;
    }

    /**
     * @Route("/testimonials", name="app_testimonials", methods={"GET"})
     * @Security ("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function add(): Response
    {
        $this->seo->setTitle("Отзывы")
            ->addMeta('name', 'keywords', 'Один,звонок,делает,все, Услуги , компании, ремонту')
            ->addMeta('name', 'description', 'Бизнес по обслуживанию дома')
            ->addMeta('property', 'og:title', 'Отзывы')
            ->addMeta('property', 'og:description', 'Бизнес по обслуживанию дома')
            ->addMeta('property', 'og:site_name', '');
        $comments = $this->testimonialsService->getAllByUserComets($this->userService->currentUser()->getId());

        $form = $this->createForm(TestimonialsType::class);
        return $this->render('testimonials/index.html.twig', [
            'form' => $form->createView(),
            'comments' => $comments
        ]);
    }

    /**
     * @Route("/testimonials", methods={"POST"})
     * @Security ("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @return Response
     */
    public function addProcess(Request $request): Response
    {
        $comment = new Testimonials();
        $form = $this->createForm(TestimonialsType::class, $comment);
        $form->handleRequest($request);
        $comment->setAuthor($this->userService->currentUser());
        if ($form->isSubmitted() && $form->isValid()) {
            $this->testimonialsService->insert($comment);
            $this->addFlash('info', 'Ваш отзывы добавлен!');
            return $this->redirectToRoute('app_testimonials');
        }
        return $this->render('testimonials/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
