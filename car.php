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
  function Showall() {
    echo "EngineNo : $this->EngineNo";
    echo "<br>";
    echo  "Model : $this->Model";
    echo "<br>";
    echo "Owner : $this->Owner";
  }
 
}
$car = new Car("42", "red4", "Pallab");
$car ->Showall()
?>
 
</body>
</html>
