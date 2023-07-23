<?php
header("Access-control-allow-origin: *");
header("content-type: application/json; charset=UTF-8");

include_once "./../../databaseconnect.php";
include_once "./../../model/room2.php"; //*แก้

$databaseConnect = new DatabaseConnect();
$connDB = $databaseConnect->getConnection();

$room2 = new Room2($connDB); //แก้

//เรียกใช้ ฟังก์ชั่น ตามวัตถุประสงค์ของ API ตัวนี้
$stmt = $room2->getAllTempRoom2();//แก้

//นับแถวเพื่อดูว่าข้อมูลมาไหม
$numrow = $stmt->rowCount();

//สร้างตัวแปรมาเก็บข้อมูลที่ได้จากการเรียกใช้ฟังก์ชั่น เพื่อส่งกลับไปยังส่วนที่เรียกใช้ API
$room2_arr = array(); //แก้

//ตรวจสอบและส่งกลับไปยังส่วนที่เรียกใช้งาน API
if ($numrow > 0) {
    //แปลว่ามีข้อมูล เอาข้อมูลใส่ตัวแปรเพื่อเตรียมส่งกลับ
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $room2_item = array(
            "message" => "1",
            "id" => $id,
            "airValue1" => $airValue1,
            "airValue2" => $airValue2,
            "airValue3" => $airValue3,
            "roomDate" => $roomDate,
            "roomTime" => $roomTime
        );

        array_push($room2_arr, $room2_item);
    }
} else {
    //แปลว่า ไม่มีข้อมูล เอาข้อมูลใส่ตัวแปรเพื่อเตรียมส่งกลับ
    $room2_item = array(
        "massage" => "0"
    );

    array_push($room2_arr, $room2_item);
}
    
    //คำสั่งจัดการข้อมูลให้เป็น JSON เพื่อส่งกลับ
    http_response_code(200);
    echo json_encode($room2_arr);