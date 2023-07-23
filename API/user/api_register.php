<?php
header("Access-control-allow-origin: *");
header("content-type: application/json; charset=UTF-8");

include_once "./../../databaseconnect.php";
include_once "./../../model/user.php";

$databaseConnect = new DatabaseConnect();
$connDB = $databaseConnect->getConnection();

$user = new user($connDB);

//สร้างตัวแปรเก็บค่าของข้อมูลที่ส่งมาซึ่งเป็น JSON ที่ทำการ decode แล้ว
$data = json_decode(file_get_contents("php://input"));

//เอาข้อมูลที่ถูก decode ไปเก็บในตัวแปร
$user->userFullname = $data->userFullname;
$user->userName = $data->userName;
$user->userPassword = $data->userPassword;

//เรียกใช้ ฟังก์ชั่น ตามวัตถุประสงค์ของ API ตัวนี้
if($stmt = $user->registerUser() ){
    //บันทึกสำเร็จ
    http_response_code(200);

    echo json_encode(array("message"=>"1") );
}else{
    //บันทึกไม่สำเร็จ
    http_response_code(200);

    echo json_encode(array("message"=>"0") );
}