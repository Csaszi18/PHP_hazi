<?php
include  loader.php;
try {
    $univ = new University();

    $webprog = $univ->addSubject("WEB101", "Web");
    $database = $univ->addSubject("DB201", "Database");

    $student1 = new Student("Kis Pista", "S001");
    $student2 = new Student("Ferenc Adam", "S002");
    $student3 = new Student("Antal Laci", "S003");

    $univ->addStudentOnSubject("WEB101", $student1);
    $univ->addStudentOnSubject("WEB101", $student2);
    $univ->addStudentOnSubject("DB201", $student2);
    $univ->addStudentOnSubject("DB201", $student3);

    $student1->addGrade($webprog, 8.5);
    $student2->addGrade($webprog, 7.0);
    $student2->addGrade($database, 9.0);
    $student3->addGrade($database, 6.5);

    echo "Grades of :" . $student1;
    $student1->printGrades();
    echo "\n";

    echo "Grades of " . $student2;
    $student2->printGrades();
    echo "\n";

    echo "Grades of " . $student3;
    $student3->printGrades();
    echo "\n";

    echo "Osszes hallgato: " . $univ->getNumberOfStudents() . "\n";

    $univ->print();

    $webprog->deleteStudent("S002") ;

    $univ->deleteSubject($database);

    $students = [$student1, $student2, $student3];
    $sortedStudents = sortStudentsByAverageGrade($students);

    foreach ($sortedStudents as $student) {
        echo $student->getName() . " - Avg Grade: " . $student->getAvgGrade() . "\n";
    }

} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
