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
$user->userName = $data->userName;
$user->userPassword = $data->userPassword;

//เรียกใช้ ฟังก์ชั่น ตามวัตถุประสงค์ของ API ตัวนี้
$stmt = $user->loginUser();

//นับแถวเพื่อดูว่าข้อมูลมาไหม
$numrow = $stmt->rowCount();

//สร้างตัวแปรมาเก็บข้อมูลที่ได้จากการเรียกใช้ฟังก์ชั่น เพื่อส่งกลับไปยังส่วนที่เรียกใช้ API
$user_arr = array();

//ตรวจสอบและส่งกลับไปยังส่วนที่เรียกใช้งาน API
if ($numrow > 0) {
    //แปลว่ามีข้อมูล เอาข้อมูลใส่ตัวแปรเพื่อเตรียมส่งกลับ
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $user_item = array(
            "message" => "1",
            "userId" => $userId,
            "userFullname" => $userFullname
        );

        array_push($user_arr, $user_item);
    }
} else {
    //แปลว่า ไม่มีข้อมูล เอาข้อมูลใส่ตัวแปรเพื่อเตรียมส่งกลับ
    $user_item = array(
        "massage" => "0"
    );

    array_push($user_arr, $user_item);
}
    
    //คำสั่งจัดการข้อมูลให้เป็น JSON เพื่อส่งกลับ
    http_response_code(200);
    echo json_encode($user_arr);