<?php
//include './inc/functions.php';
//
//mb_internal_encoding('utf-8');
////$connection=mysqli_connect('localhost','hackohackob','7809','phpPlayground');
////mysqli_set_charset($connection,'utf8');
//
//$data['greeting'] = 'Hello world!';
//
//render($data, 'index_public');


class Dog2
{
    private static $instance=null;

    public static function getInstance()
    {
        if(self::$instance==null)
        {
            self::$instance=new self();
        }

        return self::$instance;
    }

    private $name;
    private $age;

    private function __construct()
    {
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($input)
    {
        $this->age = $input;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


}

$dogS=Dog2::getInstance();
$dogS->setName("sharo");
$dogS->setAge(5);
echo $dogS->getName()." ".$dogS->getAge()."<br>";

$dogS2=Dog2::getInstance();
echo $dogS2->getName()." ".$dogS2->getAge()."<br>";
?>
