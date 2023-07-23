<?php
class Room2{
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

    //function get AlltempRoom1 ที่ทำงานกับ api_getAllTempRoom1.php
    //วัตถุประสงค์ของฟังก์ชั่นนี้จะไปนำเอาอุณหภูมิใน Room1 ที่มีทั้งหมดมา
  
    function getAllTempRoom2(){
        //คำสั่ง SQL /คำสั่ง SQL  :???????? เรียกว่า พารามิเตอร์ที่จะต้องกำหนดข้อมูลให้มัน
        $strSQL = "SELECT * FROM room2_tb";

        $stmt = $this->conn->prepare($strSQL);

        $stmt->execute();

        return $stmt;
    }
}