<?php
class Room3{
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
    //

}