<?php

namespace App\Controller\Admin;

use App\Entity\About;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AboutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return About::class;
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
                return $action->setIcon('fa fa-pencil-square-o')->setLabel(false)->addCssClass('d');
            }) ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel(false)->addCssClass('d');
            }) ;
        //->remove(Crud::PAGE_INDEX, Action::DELETE)
        //->remove(Crud::PAGE_INDEX, Action::EDIT)
        // ->remove(Crud::PAGE_INDEX, Action::NEW)
        // ->remove(Crud::PAGE_DETAIL, Action::EDIT)
        // ->remove(Crud::PAGE_DETAIL, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('titleTop','Заголовок header'),
            TextareaField::new('descriptionTop','Описание header')->hideOnIndex(),
            TextField::new('title','Заголовок'),
            TextareaField::new('descriptionPage','Описание')->hideOnIndex(),
            TextField::new('keywords'),
            TextField::new('description'),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index',"О нас")
            ->setPageTitle('detail','Детайли о нас')
            ->setPageTitle('edit','Изменить о нас')
            ->setPageTitle('new','Создать о нас');
    }
}
