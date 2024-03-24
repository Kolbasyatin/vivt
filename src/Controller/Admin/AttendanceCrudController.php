<?php

namespace App\Controller\Admin;

use App\Entity\Attendance;
use App\Entity\Student;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AttendanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Attendance::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideWhenCreating()->hideWhenUpdating(),
            AssociationField::new('schedule', 'Расписание'),
            CollectionField::new('students', 'Студенты'),
        ];
    }

}
