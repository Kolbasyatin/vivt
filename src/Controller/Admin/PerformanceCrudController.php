<?php

namespace App\Controller\Admin;

use App\Entity\Performance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PerformanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Performance::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideWhenCreating()->hideWhenUpdating(),
            ChoiceField::new('grade', 'Оценка')->setChoices([1=>1, 2=>2, 3=>3, 4=>4, 5=>5]),
            DateField::new('date', 'Дата оценки'),
            AssociationField::new('student', 'Студент'),
            AssociationField::new('subject', 'Предмет'),
            AssociationField::new('teacher', 'Преподаватель'),
        ];
    }

}
