<!DOCTYPE html>
<html>
<body>
<?php
class Student {
  // Properties
  public $name;
  public $id;
  public $dob;
  public $courses=[];

  // Methods
  function showInfo(){

    echo "Name : $this-> name";
    echo "Id : $this->id";
    echo "Dob : $this->dob";
  }
  function addCourse($courseName) {
    $this->courses[] = $courseName;
  }

  function showCourses() {
    echo "Name :  $this->name <br>";
    echo "Id :  $this->id <br>";
    echo "Dob :  $this->dob <br>";
  
  foreach($this->courses as $c){
      echo "Courses : $c <br>";
    
  }
}
}
  $sl = new Student();
  $sl->name = "Pallab";
  $sl->id = "32523";
  $sl->dob = "9/14/2021";
  $sl->addCourse("Science");
  $sl->showCourses()
?>
</body>
</html>