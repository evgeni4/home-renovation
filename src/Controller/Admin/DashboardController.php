<?php

namespace App\Controller\Admin;

use App\Entity\About;
use App\Entity\Categories;
use App\Entity\ContactSettings;
use App\Entity\Slider;
use App\Entity\Team;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new() ->setTitle('Admin panel');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linktoDashboard('Главная', 'fa fa-home')
                ->setCssClass('sidebar-link'),
            MenuItem::linkToCrud('Категории', 'fa fa-list', Categories::class)
                ->setCssClass('sidebar-link' ),
            MenuItem::linkToCrud('Команда', 'fa fa-list', Team::class)
                ->setCssClass('sidebar-link' ),
            MenuItem::linkToCrud('Администраторы', 'fa fa-users', User::class)
                ->setCssClass('sidebar-link' )->setPermission('ROLE_ADMIN'),
            MenuItem::linkToCrud('О нас', 'fa fa-list', About::class)
                ->setCssClass('sidebar-link' ),
            MenuItem::linkToCrud('Настройка слайдера', 'fa fa-list', Slider::class)
                ->setCssClass('sidebar-link' ),
            MenuItem::subMenu('Настройки','fa fa-cog')->setCssClass('sidebar-link collapsed')
                ->setSubItems([
                    MenuItem::linkToCrud('Контакты', 'uk-icon-file-image-o', ContactSettings::class)
                        ->setCssClass('sidebar-link' )
                ]),
            MenuItem::linkToLogout('Выйти', 'fa fa-sign-out')->setCssClass('sidebar-link'),

        ];

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}

