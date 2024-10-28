<?php

class Student
{
    private string $name;
    private string $studentNumber;
    private array $grades = [];

    public function __construct(string $name, string $studentNumber)
    {
        $this->name = $name;
        $this->studentNumber = $studentNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    public function addGrade(Subject $subject, float $grade): void
    {
        $this->grades[$subject->getCode()] = $grade;
    }

    public function getAvgGrade(): float
    {
        return empty($this->grades) ? 0.0 : array_sum($this->grades) / count($this->grades);
    }

    public function printGrades(): void
    {
        foreach ($this->grades as $subjectCode => $grade) {
            echo "{$subjectCode} - {$grade}\n";
        }
    }

    public function __toString(): string
    {
        return $this->name . " - " . $this->studentNumber;
    }
}
