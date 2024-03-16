<?php

namespace App\Entity;

use App\Repository\StudentGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentGroupRepository::class)]
class StudentGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $groupName = null;

    #[ORM\Column(length: 255)]
    private ?string $program = null;

    #[ORM\OneToMany(targetEntity: Student::class, mappedBy: 'studentGroup')]
    private Collection $students;

    #[ORM\ManyToMany(targetEntity: Schedule::class, mappedBy: 'studentGroup')]
    private Collection $schedules;

    #[ORM\ManyToOne(inversedBy: 'studentGroup')]
    private ?GroupStatistic $groupStatistic = null;

    public function __construct()
    {
        $this->students = new ArrayCollection();
        $this->schedules = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupName(): ?string
    {
        return $this->groupName;
    }

    public function setGroupName(string $groupName): static
    {
        $this->groupName = $groupName;

        return $this;
    }

    public function getProgram(): ?string
    {
        return $this->program;
    }

    public function setProgram(string $program): static
    {
        $this->program = $program;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): static
    {
        if (!$this->students->contains($student)) {
            $this->students->add($student);
            $student->setStudentGroup($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): static
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getStudentGroup() === $this) {
                $student->setStudentGroup(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Schedule>
     */
    public function getSchedules(): Collection
    {
        return $this->schedules;
    }

    public function addSchedule(Schedule $schedule): static
    {
        if (!$this->schedules->contains($schedule)) {
            $this->schedules->add($schedule);
            $schedule->addStudentGroup($this);
        }

        return $this;
    }

    public function removeSchedule(Schedule $schedule): static
    {
        if ($this->schedules->removeElement($schedule)) {
            $schedule->removeStudentGroup($this);
        }

        return $this;
    }

    public function getGroupStatistic(): ?GroupStatistic
    {
        return $this->groupStatistic;
    }

    public function setGroupStatistic(?GroupStatistic $groupStatistic): static
    {
        $this->groupStatistic = $groupStatistic;

        return $this;
    }

}
