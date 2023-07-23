<?php
header("Access-control-allow-origin: *");
header("content-type: application/json; charset=UTF-8");

include_once "./../../databaseconnect.php";
include_once "./../../model/room1.php"; //*แก้

$databaseConnect = new DatabaseConnect();
$connDB = $databaseConnect->getConnection();

$room1 = new Room1($connDB); //แก้

//เรียกใช้ ฟังก์ชั่น ตามวัตถุประสงค์ของ API ตัวนี้
$stmt = $room1->getAirValue2Room1();//แก้

//นับแถวเพื่อดูว่าข้อมูลมาไหม
$numrow = $stmt->rowCount();

//สร้างตัวแปรมาเก็บข้อมูลที่ได้จากการเรียกใช้ฟังก์ชั่น เพื่อส่งกลับไปยังส่วนที่เรียกใช้ API
$room1_arr = array(); //แก้

//ตรวจสอบและส่งกลับไปยังส่วนที่เรียกใช้งาน API
if ($numrow > 0) {
    //แปลว่ามีข้อมูล เอาข้อมูลใส่ตัวแปรเพื่อเตรียมส่งกลับ
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $room1_item = array(
            "message" => "1",
            "airValue2" => $airValue2,
            "roomDate" => $roomDate,
            "roomTime" => $roomTime
        );

        array_push($room1_arr, $room1_item);
    }
} else {
    //แปลว่า ไม่มีข้อมูล เอาข้อมูลใส่ตัวแปรเพื่อเตรียมส่งกลับ
    $room1_item = array(
        "massage" => "0"
    );

    array_push($room1_arr, $room1_item);
}
    
    //คำสั่งจัดการข้อมูลให้เป็น JSON เพื่อส่งกลับ
    http_response_code(200);
    echo json_encode($room1_arr);