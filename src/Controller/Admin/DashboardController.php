<?php

namespace App\Controller\Admin;

use App\Entity\Attendance;
use App\Entity\Book;
use App\Entity\Document;
use App\Entity\GroupStatistic;
use App\Entity\Library;
use App\Entity\Performance;
use App\Entity\Schedule;
use App\Entity\Student;
use App\Entity\StudentGroup;
use App\Entity\Subject;
use App\Entity\Teacher;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
//        return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(StudentGroupCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Гос Образовательное учреждение образованных людей.');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Управление', 'fa fa-home');
        yield MenuItem::section('Секция управления записями студентов');
        yield MenuItem::linkToCrud('Группы', 'fas fa-list', StudentGroup::class);
        yield MenuItem::linkToCrud('Студенты', 'fas fa-list', Student::class);
        yield MenuItem::section('Преподавательский состав');
        yield MenuItem::linkToCrud('Преподаватели', 'fas fa-list', Teacher::class);
        yield MenuItem::linkToCrud('Предметы', 'fas fa-list', Subject::class);
        yield MenuItem::linkToCrud('Расписание', 'fas fa-list', Schedule::class);
        yield MenuItem::section('Оценка');
        yield MenuItem::linkToCrud('Посещаемость студентов', 'fas fa-list', Attendance::class);
        yield MenuItem::linkToCrud('Успеваемость', 'fas fa-list', Performance::class);
        yield MenuItem::linkToCrud('Статистика', 'fas fa-list', GroupStatistic::class);
        yield MenuItem::section('Библиотека');
        yield MenuItem::linkToCrud('Книги', 'fas fa-list', Book::class);
        yield MenuItem::linkToCrud('Выдача книг', 'fas fa-list', Library::class);
        yield MenuItem::section('Документы');
        yield MenuItem::linkToCrud('Документация', 'fas fa-list', Document::class);
    }
}
