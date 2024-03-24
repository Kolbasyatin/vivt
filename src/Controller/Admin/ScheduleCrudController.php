<?php

namespace App\Controller\Admin;

use App\Entity\Schedule;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class ScheduleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Schedule::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $daysOfWeek = [
            'пн' => 1,
            'вт' => 2,
            'ср' => 3,
            'чт' => 4,
            'пт' => 5,
            'сб' => 6,
            'вск' => 7,
        ];
        return [
            IdField::new('id')->hideWhenCreating()->hideWhenUpdating(),
            ChoiceField::new('dayOfWeek', 'День недели')->setChoices($daysOfWeek),
            TimeField::new('startTime', 'Время начала'),
            TimeField::new('endTime', 'Время окончания'),
            AssociationField::new('subject', 'Предмет'),
            AssociationField::new('studentGroup', 'Группа'),
        ];
    }

}
