<?php

namespace App\Entity;

use App\Repository\GroupStatisticRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupStatisticRepository::class)]
class GroupStatistic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: StudentGroup::class, mappedBy: 'groupStatistic')]
    private Collection $studentGroup;

    #[ORM\Column(nullable: true)]
    private ?float $performance = null;

    public function __construct()
    {
        $this->studentGroup = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, StudentGroup>
     */
    public function getStudentGroup(): Collection
    {
        return $this->studentGroup;
    }

    public function addStudentGroup(StudentGroup $studentGroup): static
    {
        if (!$this->studentGroup->contains($studentGroup)) {
            $this->studentGroup->add($studentGroup);
            $studentGroup->setGroupStatistic($this);
        }

        return $this;
    }

    public function removeStudentGroup(StudentGroup $studentGroup): static
    {
        if ($this->studentGroup->removeElement($studentGroup)) {
            // set the owning side to null (unless already changed)
            if ($studentGroup->getGroupStatistic() === $this) {
                $studentGroup->setGroupStatistic(null);
            }
        }

        return $this;
    }

    public function getPerformance(): ?float
    {
        return $this->performance;
    }

    public function setPerformance(?float $performance): static
    {
        $this->performance = $performance;

        return $this;
    }
}
