<?php

namespace App\Controller\Admin;
use App\Entity\Categories;
use App\Field\VichImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categories::class;
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
            IdField::new('id','ID#')->onlyOnIndex(),
            TextField::new('title','Заголовок'),
            TextField::new('slug','Slug'),
            TextareaField::new('description','Описание')->hideOnIndex(),
           ImageField::new('image', 'Изображение')
               ->setBasePath("/uploads/categories/")->onlyOnIndex(),
           VichImageField::new('thumbnailFile','Изображение ')
               ->setFormType(VichImageType::class)->onlyOnForms(),

            TextField::new('icon','Иконка')->onlyOnForms(),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index',"Категории")
            ->setPageTitle('detail','Детайли категории')
            ->setPageTitle('edit','Изменить категорию')
            ->setPageTitle('new','Создать категорию');
    }
}
