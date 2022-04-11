<?php

class Room implements iReservable{
    public $roomType;
    public $hasRestroom;
    public $hasBalcony;
    public $bedCount;
    public $roomNumber;
    public $extras;
    public $roomRates;
    public $reservations = array();
    public function addReservation($reservation){
        array_push($this->reservations, $reservation);
    }
    public function removeReservation($reservation){
        for ($i = 0; $i<count($this->reservations); $i++){
            if (($this->reservations)[$i]->startDate == $reservation){
                array_splice($this->reservations,$i,1);
            }
        }
    }
}

class Guest{
    public $firstName;
    public $lastName;
    public $personalID;
    public function __construct($firstName,$lastName,$personalID){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->personalID = $personalID;
    }
}

class Reservation{
    public $startDate;
    public $endDate;
    public $guest;
    public function __construct($startDate,$endDate,$guest){
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->guest = $guest;
    }
    public function getStartDate(){
        return date('Y-m-d', $this->startDate);
    }
    public function getEndDate(){
        return date('Y-m-d', $this->endDate);
    }
}

class SingleRoom extends Room{
    function __construct($roomNumber, $roomRates)
    {
        $this->roomType = 'standard';
        $this->hasRestroom = true;
        $this->hasBalcony = false;
        $this->bedCount = 1;
        $this->roomNumber = $roomNumber;
        $this->extras = 'TV, điều hoà';
        $this->roomRates = $roomRates;
        $this->reservations = array();
    }
    public function addReservation($reservation){
        array_push($this->reservations, $reservation);
    }
    public function removeReservation($reservation){
        for ($i=0;$i<count($this->reservations);$i++){
            if (($this->reservations)[$i]->startDate==$reservation){
                array_splice($this->reservations,$i,1);
            }
        }
    }
}

class Bedroom extends Room{
    function __construct($roomNumber, $roomRates)
    {
        $this->roomType = 'gold';
        $this->hasRestroom = true;
        $this->hasBalcony = true;
        $this->bedCount = 2;
        $this->roomNumber = $roomNumber;
        $this->extras = 'TV, điều hoà, tủ lạnh, minibar, bồn tắm';
        $this->roomRates = $roomRates;
        $this->reservations = array();
    }
    public function addReservation($reservation){
        array_push($this->reservations, $reservation);
    }
    public function removeReservation($reservation){
        for ($i=0;$i<count($this->reservations);$i++){
            if (($this->reservations)[$i]->startDate==$reservation){
                array_splice($this->reservations,$i,1);
            }
        }
    }
}

class Apartment extends Room{
    function __construct($roomNumber, $roomRates)
    {
        $this->roomType = 'diamond';
        $this->hasRestroom = true;
        $this->hasBalcony = true;
        $this->bedCount = 4;
        $this->roomNumber = $roomNumber;
        $this->extras = 'TV, điều hoà, tủ lạnh, bếp, minibar, bồn tắm, Wifi miễn phí';
        $this->roomRates = $roomRates;
        $this->reservations = array();
    }
    public function removeReservation($reservation){
        for ($i=0;$i<count($this->reservations);$i++){
            if (($this->reservations)[$i]->startDate==$reservation){
                array_splice($this->reservations,$i,1);
            }
        }
    }
}

interface iReservable{
    public function addReservation($reservation);
    public function removeReservation($reservation);
}


final class BookingManager {
    public static function bookRoom($room,$reservation){
        $room->addReservation($reservation);
        echo "Room {$room->roomNumber} is successfully booked from 
        {$reservation->guest->firstName} {$reservation->guest->lastName} from
        {$reservation->getStartDate()} to {$reservation->getEndDate()}";
    }
}

$room = new SingleRoom(1408, 100000);
$guest = new Guest("Anh", "Nguyen", 123123123);
$startDate = strtotime("2020-04-24");
$endDate = strtotime("2020-04-26"); 
$reservation = new Reservation($startDate, $endDate, $guest); 
$room->addReservation($reservation);
//BookingManager::bookRoom($room,$reservation);

$room1 = new Bedroom(542, 200000);
$guest = new Guest("Long", "Bui", 6582466666);
$startDate = strtotime("2021-04-24");
$endDate = strtotime("2021-04-29"); 
$reservation = new Reservation($startDate, $endDate, $guest); 
$room1->addReservation($reservation);

$room2 = new Apartment(111, 300000);
$guest = new Guest("A", "Bui", 222222222);
$startDate = strtotime("2021-08-24");
$endDate = strtotime("2021-09-29"); 
$reservation = new Reservation($startDate, $endDate, $guest); 
$room2->addReservation($reservation);

$room3 = new Apartment(444, 22000);
$guest = new Guest("B4", "Bui", 222222222);
$startDate = strtotime("2020-04-25");
$endDate = strtotime("2020-04-25"); 
$reservation = new Reservation($startDate, $endDate, $guest); 
$room3->addReservation($reservation);


$roomArray = array();
$roomArray[] = $room;
$roomArray[] = $room1;
$roomArray[] = $room2;
$roomArray[] = $room3;

//print_r($roomArray);
echo '<pre>'; 
print_r($roomArray); 
echo '</pre>';

// Loc va in ra man hinh tat ca cac phong co ban cong
function main1($roomArray){
    $output = "";
    foreach($roomArray as $room)
    {
        if($room->hasBalcony){
            $output .= $room->roomNumber . ", ";
        }
    }
    echo "Cac phong co ban cong la:" . $output;
}

// Loc va in ra cac phong Bedroom va Apartment co gia nho hon 250000
function main2($roomArray){
    $output = "";
    foreach($roomArray as $room)
    {
        if($room->roomType == 'gold' or $room->roomType == 'diamond'){
            if($room->roomRates < 250000){
                $output .= $room->roomNumber . ", ";
            }
        }
    }
    echo "cac phong Bedroom va Apartment co gia nho hon 250000 la:" . $output;
}

// Lọc ra và hiển thị các số phòng của các phòng có bồn tắm
function main3($roomArray){
    $output = "";
    foreach($roomArray as $room)
    {
        if(strpos($room->extras, "bồn tắm") > 0){
            $output .= $room->roomNumber . ", ";
        }
    }
    echo "Các số phòng của các phòng có bồn tắm là:" . $output;
}

// Lọc ra các Apartment không được đặt trong một khoảng thời gian cho trước
function main4($roomArray, $startDateInput, $endDateInput){
    $output = "";
    foreach($roomArray as $room)
    {
        if($room->roomType == "diamond"){
            if($room->reservations[0]->startDate >= strtotime($startDateInput) && $room->reservations[0]->startDate <= strtotime($endDateInput)){

            }else{
                $output .= $room->roomNumber . ", ";
            }
        }
        
    }
    echo "Các Apartment không được đặt trong một khoảng thời gian từ $startDateInput đến $endDateInput là:" . $output;
}

main1($roomArray);
echo "</br>";
main2($roomArray);
echo "</br>";
main3($roomArray);
echo "</br>";

$startDateInput = "2020-04-24";
$endDateInput = "2020-04-26";
main4($roomArray, $startDateInput, $endDateInput);
echo "</br>";