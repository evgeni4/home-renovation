<?php

namespace App\Controller\Admin;

use App\Entity\Slider;
use App\Field\VichImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SliderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Slider::class;
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
            ArrayField::new('title','Заголовок'),
            ImageField::new('smallImage', 'Изображение ')
                ->setBasePath("/uploads/slider/")->onlyOnIndex(),

            VichImageField::new('smallImageFile','Изображение  ')
                ->setFormType(VichImageType::class)->onlyOnForms(),
            BooleanField::new('published','Статус')
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index',"Слайдер")
            ->setPageTitle('detail','Детайли слайдера')
            ->setPageTitle('edit','Изменить слайдер')
            ->setPageTitle('new','Создать слайдер');
    }
}
