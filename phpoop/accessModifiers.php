<?php
//Access modifiers decides wherewe can access the methods and properties
//Access Zone
//===================================
//> Access inside the current class only - Private
//> Access every where - public
//> Access in inherited class -protected

class Teachers{
    private function questionPapers(){
        echo "Question paper for student";
    }
    function exam(){
        $this->questionPapers();
    }

    protected function studentMarks(){
        echo "all student mark";
    }
}

class Management extends Teachers{
    function reviewExam(){
        $this->studentMarks();
    }
}
$t1 = new Teachers();
// $t1->questionPapers(); //it give error as private cannot access from outside

$t1->exam();
// $t1->studentMarks(); // it give error as protected 

$m1 = new Management();
$m1->reviewExam();

?>