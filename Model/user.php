<?php
class User
{
    //ตัวแปรที่จะใช้ติดต่อกับ Database
    private $conn;

    //ตัวแปรที่จะทำงานคู่กับแต่ละฟิวล์หรือคอลัมน์ในตาราง
    public $userId;
    public $userFullname;
    public $userName;
    public $userPassword;
    public $userStatus;

    //ตัวแปรที่จะเก็บข้อมูล เพื่อเอาไว้ใช้งานเฉย ๆ
    public $message;

    //คอนสตรักเตอร์ที่จะมีคำสั่งที่ใช้ในการติดต่อกับ database
    public function __construct($db) // underscroll 2 ครั้ง
    {
        $this->conn = $db;
    }

    //ฟังก์ชั่นต่าง ๆ ที่จะทำงานกับ Database ตาม API ที่เราจะทำการสร้างมันขึ้นมา ซึ่งมีมากน้อยแล้วแต่
    //function loginUser ที่ทำงานกับ api_loginuser.php

    function loginUser()
    {
        //คำสั่ง SQL /คำสั่ง SQL  :???????? เรียกว่า พารามิเตอร์ที่จะต้องกำหนดข้อมูลให้มัน
        $strSQL = "SELECT * FROM user_tb WHERE userName = :userName and userPassword = :userPassword";

        //กำหนด Statement ที่จะทำงานกับคำสั่ง SQL
        $stmt = $this->conn->prepare($strSQL);

        //ตรวจสอบข้อมูล
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));

        //กำหนดข้อมูลให้กับ พารามิเตอร์
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userPassword", $this->userPassword);

        //สั่งให้ SQL ทำงาน
        $stmt->execute();

        //ส่งค่าผลลัพธ์ที่ได้จากคำสั่ง SQL ไปใช้งาน
        return $stmt;
    }
    //function registerUser ที่ทำงานกับ api_registerUser.php
    function registerUser()
    {
        //คำสั่ง SQL
        $strSQL = "INSERT INTO user_tb (userFullname, userName, userPassword, userStatus)";
        $strSQL .= "VALUES (:userFullname, :userName, :userPassword, :userStatus)";

        $stmt = $this->conn->prepare($strSQL);
        //ตรวจสอบข้อมูล
        $this->userFullname = htmlspecialchars(strip_tags($this->userFullname));
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));
        $this->userStatus = 1;

        //กำหนดข้อมูลให้กับ พารามิเตอร์
        $stmt->bindParam(":userFullname", $this->userFullname);
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userPassword", $this->userPassword);
        $stmt->bindParam(":userStatus", $this->userStatus);

        //สั่งให้ SQL ทำงาน
        if ($stmt->execute()) {
            //สำเร็จ
            return true;
        } else {
            //ไม่สำเร็จ
            return false;
        }
    }
    //function updateUser ที่ทำงานกับ api_updateUser.php
    function updateUser()
    {
        //คำสั่ง SQL
        $strSQL = "UPDATE user_tb SET userFullname = :userFullname, userName = :userName, userPassword = :userPassword WHERE userId = :userId";
        $stmt = $this->conn->prepare($strSQL);
        //ตรวจสอบข้อมูล
        $this->userId = intval(htmlspecialchars(strip_tags($this->userId)));
        $this->userFullname = htmlspecialchars(strip_tags($this->userFullname));
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));

        //กำหนดข้อมูลให้กับ พารามิเตอร์
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":userFullname", $this->userFullname);
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userPassword", $this->userPassword);

        //สั่งให้ SQL ทำงาน
        if ($stmt->execute()) {
            //สำเร็จ
            return true;
        } else {
            //ไม่สำเร็จ
            return false;
        }
    }
}
