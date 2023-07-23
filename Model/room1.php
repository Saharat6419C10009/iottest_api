<?php
class Room1{
    //ตัวแปรที่จะใช้ติดต่อกับ Database
    private $conn;

    //ตัวแปรที่จะทำงานคู่กับแต่ละฟิวล์หรือคอลัมน์ในตาราง
    public $id;
    public $airValue1;
    public $airValue2;
    public $airValue3;
    public $roomDate;
    public $roomTime;

    //ตัวแปรที่จะเก็บข้อมูล เพื่อเอาไว้ใช้งานเฉย ๆ
    public $message;

    //คอนสตรักเตอร์ที่จะมีคำสั่งที่ใช้ในการติดต่อกับ database
    public function __construct($db) // underscroll 2 ครั้ง
    {
        $this->conn = $db;
    }

    //ฟังก์ชั่นต่าง ๆ ที่จะทำงานกับ Database ตาม API ที่เราจะทำการสร้างมันขึ้นมา ซึ่งมีมากน้อยแล้วแต่

    //function get AlltempRoom1 ที่ทำงานกับ api_getAllTempRoom1.php
    //วัตถุประสงค์ของฟังก์ชั่นนี้จะไปนำเอาอุณหภูมิใน Room1 ที่มีทั้งหมดมา
  
    function getAllTempRoom1(){
        //คำสั่ง SQL /คำสั่ง SQL  :???????? เรียกว่า พารามิเตอร์ที่จะต้องกำหนดข้อมูลให้มัน
        $strSQL = "SELECT * FROM room1_tb";

        $stmt = $this->conn->prepare($strSQL);

        $stmt->execute();

        return $stmt;
    }

    //function getAirValue2TempRoom1 ที่ทำงานกับ api_getAirValue2Room1.php
    //ต้องการอุณหภูมิเฉพาะแอร์ตัว 2 ของ room1 อย่างเดียว
    
    function getAirValue2Room1(){
        //คำสั่ง SQL /คำสั่ง SQL  :???????? เรียกว่า พารามิเตอร์ที่จะต้องกำหนดข้อมูลให้มัน
        $strSQL = "SELECT airValue2, roomDate, roomTime FROM room1_tb";

        $stmt = $this->conn->prepare($strSQL);

        $stmt->execute();

        return $stmt;
    } 
    
    //ต้องการ getAllTempLessThan20Room1 ที่ทำงานกับ api_getAllTemplessThan20Room1.php
    //วัตถุประสงค์ของฟังก์ชั่นคือ ต้องการอุณภูมิของแอร์ทุกตัวที่น้อยกว่า 20 องศา
    function getAllTemplessThan20Room1(){
        //คำสั่ง SQL /คำสั่ง SQL  :???????? เรียกว่า พารามิเตอร์ที่จะต้องกำหนดข้อมูลให้มัน
        $strSQL = "SELECT * FROM room1_tb WHERE airValue1 < 20 and airValue2 <20 and airValue3 < 20" ;

        $stmt = $this->conn->prepare($strSQL);

        $stmt->execute();

        return $stmt;
    } 
}