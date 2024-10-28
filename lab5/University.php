<?php

class University extends AbstractUniversity
{
    public function addSubject(string $code, string $name): Subject
    {
        if (!$this->isSubjectExists($code)) {
            $subject = new Subject($code, $name);
            $this->subjects[] = $subject;
            return $subject;
        } else {
            throw new Exception('Subject already exists');
        }
    }

    public function addStudentOnSubject(string $subjectCode, Student $student)
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                $subject->addStudent($student);
                return;
            }
        }
        throw new Exception("Subject with code {$subjectCode} not found.");
    }

    public function getStudentsForSubject(string $subjectCode)
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                return $subject->getStudents();
            }
        }
        return [];
    }

    public function getNumberOfStudents(): int
    {
        $totalStudents = 0;
        foreach ($this->subjects as $subject) {
            $totalStudents += count($subject->getStudents());
        }
        return $totalStudents;
    }

    public function print(): void
    {
        foreach ($this->subjects as $subject) {
            echo $subject->getName() . " - " . str_repeat("-", 25) . "\n";
            foreach ($subject->getStudents() as $student) {
                echo $student->getName() . " - " . $student->getStudentNumber() . "\n";
            }
            echo "\n";
        }
    }

    public function deleteSubject(Subject $subject): void
    {
        if (count($subject->getStudents()) > 0) {
            throw new Exception("Cannot delete subject with enrolled students.");
        }

        foreach ($this->subjects as $index => $subj) {
            if ($subj->getCode() === $subject->getCode()) {
                unset($this->subjects[$index]);
                $this->subjects = array_values($this->subjects);
                return;
            }
        }
    }

    private function isSubjectExists(string $code): bool
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() === $code) {
                return true;
            }
        }
        return false;
    }
}
