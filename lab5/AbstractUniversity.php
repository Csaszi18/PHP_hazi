<?php

abstract class AbstractUniversity
{
    /**
     * @var Subject[]
     */
    public $subjects = [];

    /**
     * Method accepts the name and code of the Subject, creates an instance of the class,
     * adds the instance to the $subjects array, and returns the created instance.
     *
     * @param string $code
     * @param string $name
     * @return Subject
     */
    abstract public function addSubject(string $code, string $name): Subject;

    /**
     * Method accepts subject code and a Student instance. Finds the subject in the $subjects array
     * based on code and adds the student to its array.
     *
     * @param string   $subjectCode
     * @param \Student $student
     * @return void
     */
    abstract public function addStudentOnSubject(string $subjectCode, Student $student): void;

    /**
     * Method returns an array of students for a given subject code.
     *
     * @param string $subjectCode
     * @return Student[]
     */
    abstract public function getStudentsForSubject(string $subjectCode): array;

    /**
     * This method returns the total number of students registered across all subjects.
     *
     * @return int
     */
    abstract public function getNumberOfStudents(): int;

    /**
     * Prints the structure of subjects and enrolled students:
     * Iterates over $subjects, prints the subject name followed by "-" repeated 25 times,
     * then iterates over the students of the subject and prints their name and student number in the format:
     * StudentName - StudentNumber
     *
     * @return void
     */
    abstract public function print(): void;

    /**
     * Deletes a subject only if it has no enrolled students.
     *
     * @param Subject $subject
     * @return void
     * @throws Exception if subject has students enrolled.
     */
    abstract public function deleteSubject(Subject $subject): void;
}
