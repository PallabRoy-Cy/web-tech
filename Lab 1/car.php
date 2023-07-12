<!DOCTYPE html>
<html>
<body>

<?php
class Car {
  public $EngineNo;
  public $Model;
  public $Owner;

  function __construct($EngineNo, $Model, $Owner) {
    $this->EngineNo = $EngineNo; 
    $this->Model = $Model; 
    $this->Owner = $Owner;
  }
  function get_EngineNo() {
    return $this->name;
  }
  function get_EngineNo() {
    return $this->color;
  }
  function get_Model() {
    return $this->name;
  }
  function get_Model() {
    return $this->color;
  }
  function get_Owner() {
    return $this->name;
  }
  function get_Owner() {
    return $this->color;
  }
}

$car = new Car("42", "red4", "Pallab");
echo $car->get_EngineNo();
echo "<br>";
echo $apple->get_color();
?>
 
</body>
</html>
