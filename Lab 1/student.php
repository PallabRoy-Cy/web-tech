<!DOCTYPE html>
<html>
<body>
<?php
class student {
  // Properties
  public $name;
  public $id;
  public $Dob;
  public $Courses[];

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
  function set_id($id) {
    $this->id = $id;
  }
  function get_id() {
    return $this->id;
  }
  function set_dob($Dob) {
    $this->Dob = $Dob;
  }
  function get_dob() {
    return $this->Dob;
  }
  function set_Courses($Courses) {
    $this->Courses = $Courses;
  }
  function get_Courses() {
    return $this->Courses;
  }
}
  $apple = new student();
$apple->set_name('Apple');
$apple->set_id('12314');
echo "Name: " . $apple->get_name();
echo "<br>";
echo "ID: " . $apple->get_id();

?>
</body>
</html>