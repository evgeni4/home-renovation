<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    public function configureActions(Actions $actions): Actions
    {

        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa fa-plus')->setLabel(false)->addCssClass('d');
            })
            ->add(Crud::PAGE_INDEX, Action::DETAIL)

            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setIcon('fa fa-eye')->setLabel(false)->addCssClass('d');
            })->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-pencil-square-o')->setLabel(false)->addCssClass('d') ;

            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel(false)->addCssClass('d');
            })
            ->setPermission(Action::EDIT,'ROLE_ADMIN')
            ->setPermission(Action::DELETE,'ROLE_ADMIN')
      // ->remove(Crud::PAGE_INDEX, Action::DELETE)
       // ->remove(Crud::PAGE_INDEX, Action::EDIT)
        ->remove(Crud::PAGE_INDEX, Action::NEW);
        // ->remove(Crud::PAGE_DETAIL, Action::EDIT)
        // ->remove(Crud::PAGE_DETAIL, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('fullName','Имя')->onlyOnIndex(),
            TextField::new('email','Email')->onlyOnIndex(),
            ArrayField::new('roles','Права')->onlyOnIndex(),
            ChoiceField::new('roles')
                ->setChoices(['Администратор' => 'ROLE_ADMIN', 'Менеджер' => 'ROLE_MANAGER'])
                ->allowMultipleChoices(),
            ImageField::new('avatar', 'Фото')
                ->setBasePath("/uploads/team/")->onlyOnIndex(),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index',"Администраторы")
            ->setPageTitle('detail','Детайли администратора')
            ->setPageTitle('edit','Изменить администратора')
            ->setPageTitle('new','Создать администратора');
    }
}
