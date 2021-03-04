<?php

namespace App\Controller\Admin;

use App\Entity\ContactSettings;
use App\Field\VichImageField;
use App\Repository\ContactSettingsRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ContactSettingsCrudController extends AbstractCrudController
{
    private ContactSettingsRepository $contactSettings;

    /**
     * ContactSettingsCrudController constructor.
     * @param ContactSettingsRepository $contactSettings
     */
    public function __construct(ContactSettingsRepository $contactSettings)
    {
        $this->contactSettings = $contactSettings;
    }


    public static function getEntityFqcn(): string
    {
        return ContactSettings::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        if (count($this->contactSettings->findAll())==1){
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
                }) ->remove(Crud::PAGE_INDEX, Action::DELETE)
                //->remove(Crud::PAGE_INDEX, Action::EDIT)
                ->remove(Crud::PAGE_INDEX, Action::NEW)
                ->remove(Crud::PAGE_DETAIL, Action::EDIT)
                ->remove(Crud::PAGE_DETAIL, Action::DELETE);
        }
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
            }) ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->remove(Crud::PAGE_DETAIL, Action::EDIT)
            ->remove(Crud::PAGE_DETAIL, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title','Заголовок'),
            TextField::new('populatePlace','Населенный пункт'),
            TextField::new('address','Адрес'),
            TextField::new('phone','Телефон'),
            TextField::new('email','Email'),
            TextField::new('workTime','Рабочее время'),
            TextField::new('week','Рабочая неделя'),
            TextareaField::new('slogan','Девиз')->hideOnIndex(),
            TextField::new('lat','Карта долгота')->hideOnIndex(),
            TextField::new('lng','Карта широта')->hideOnIndex(),
            TextField::new('keywords','Ключевые слова')->hideOnIndex(),
            TextareaField::new('description','Описание')->hideOnIndex(),
//            ImageField::new('logo', 'Логотип ')
//                ->setBasePath("/uploads/logo/")
//                ->hideOnIndex() ,
//            VichImageField::new('thumbnailFile','Логотип')
//                ->setFormType(VichImageType::class)->onlyOnForms(),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index',"Настройки")
            ->setPageTitle('detail','Детайли настроек')
            ->setPageTitle('edit','Изменить настройки')
        ->setPageTitle('new','Создать настройки');
    }
}
