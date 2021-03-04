<?php

namespace App\Controller;

use App\Service\Categories\CategoriesServiceInterface;
use App\Service\Slider\SliderServiceInterface;
use App\Service\Testimonials\TestimonialsServiceInterface;
use Sonata\SeoBundle\Seo\SeoPageInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $categoriesService;
    private $sliderService;
    private $testimonialsService;
    private $seo;
    public function __construct(SeoPageInterface $seo,CategoriesServiceInterface $categoriesService, SliderServiceInterface $sliderService,TestimonialsServiceInterface $testimonialsService)
    {
        $this->categoriesService = $categoriesService;
        $this->sliderService = $sliderService;
        $this->testimonialsService = $testimonialsService;
        $this->seo = $seo;
    }

    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $this->seo->setTitle("Главная")
            ->addMeta('name', 'keywords','')
            ->addMeta('name', 'description', '')
            ->addMeta('property', 'og:title', '')
            ->addMeta('property', 'og:description', '')
            ->addMeta('property', 'og:site_name', '');
        $categories = $this->categoriesService->allCategories();
        $slider = $this->sliderService->allSlider();
        $comments = $this->testimonialsService->getAllComets();
        return $this->render('home/index.html.twig', [
            'categories' => $categories,
            'sliders' => $slider,
            'comments' => $comments,
        ]);
    }


    /**
     * @Route("/our-services", name="app_our_services")
     */
    public function show(): Response
    {
        $categories = $this->categoriesService->allCategories();
        $slider = $this->sliderService->allSlider();
        return $this->render('ourservice/show.html.twig', [
            'categories' => $categories,
            'sliders' => $slider,
        ]);
    }
}
