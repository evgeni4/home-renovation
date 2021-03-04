<?php

namespace App\Controller;

use Sonata\SeoBundle\Seo\SeoPageInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    private $seo;

    public function __construct(SeoPageInterface $seo)
    {
        $this->seo = $seo;
    }
    /**
     * @Route("/calculator", name="app_calculator")
     */
    public function index(): Response
    {
        $this->seo->setTitle("Калькулятор стоимости")
            ->addMeta('name', 'keywords','Один,звонок,делает,все, Услуги , компании, ремонту')
            ->addMeta('name', 'description', 'Бизнес по обслуживанию дома')
            ->addMeta('property', 'og:title', 'Калькулятор стоимости')
            ->addMeta('property', 'og:description', 'Бизнес по обслуживанию дома')
            ->addMeta('property', 'og:site_name', '')
        ;
        return $this->render('calculator/index.html.twig');
    }
}
