<?php

class Subject
{
    private string $code;
    private string $name;
    private array $students = [];

    public function __construct(string $code, string $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function addStudent(Student $student): void
    {
        if (!$this->isStudentExists($student->getStudentNumber())) {
            $this->students[] = $student;
        } else {
            throw new Exception("Student with this number already exists in subject.");
        }
    }

    public function deleteStudent(string $studentNumber): bool
    {
        foreach ($this->students as $index => $student) {
            if ($student->getStudentNumber() === $studentNumber) {
                unset($this->students[$index]);
                $this->students = array_values($this->students);
                return true;
            }
        }
        return false;
    }

    private function isStudentExists(string $studentNumber): bool
    {
        foreach ($this->students as $student) {
            if ($student->getStudentNumber() === $studentNumber) {
                return true;
            }
        }
        return false;
    }

    public function __toString(): string
    {
        return $this->name . ' ' . $this->code;
    }
}
