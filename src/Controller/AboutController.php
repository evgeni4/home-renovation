<?php

namespace App\Controller;

use App\Service\About\AboutService;
use App\Service\About\AboutServiceInterface;
use App\Service\Team\TeamServiceInterface;
use Sonata\SeoBundle\Seo\SeoPageInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    private $aboutService;
    private $teamService;
    private $seo;
    public function __construct(SeoPageInterface $seo,AboutServiceInterface $aboutService,TeamServiceInterface $teamService)
    {
        $this->aboutService = $aboutService;
        $this->teamService = $teamService;
        $this->seo = $seo;
    }

    /**
     * @Route("/about", name="app_about")
     */
    public function index(): Response
    {
        $this->seo->setTitle("О нас")
            ->addMeta('name', 'keywords','Один,звонок,делает,все, Услуги , компании, ремонту')
            ->addMeta('name', 'description', 'Бизнес по обслуживанию дома')
            ->addMeta('property', 'og:title', 'О нас')
            ->addMeta('property', 'og:description', 'Бизнес по обслуживанию дома')
            ->addMeta('property', 'og:site_name', '')
        ;
        $id = 1;
        $about = $this->aboutService->getOneAbout($id);
        $teams = $this->teamService->allTeam();
        return $this->render('about/index.html.twig', [
            'about' => $about,
            'teams'=>$teams
        ]);
    }
}
