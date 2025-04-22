<?php

class AdminController {
    use Controller;
    public function __construct() {
    }
    public function home() {
        $this->view('admin/home');
    }
    public function media() {
        $this->view('admin/media');
    }
    public function showtime() {
        $this->view('admin/showtime');
    }
    public function cinema() {
        $this->view('admin/cinema');
    }
    public function room() {
        $this->view('admin/room');
    }




    public function getMedia() {
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            unset($_GET['url']);
            $mediaModel = new MediaModel();
            $result = $mediaModel->where($_GET);
            if($result != false) {
                echo json_encode([
                    'status' => true, 
                    "data" => $result,
                ]);
                exit;
            }
            echo json_encode(['status' => false, 'message' => $mediaModel->message]);
            exit;

        }
        echo json_encode(['status' => false, 'message' => 'Invalid request']);
        exit;
    }

    public function getCinema() {
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            unset($_GET['url']);
            $cinemaModel = new CinemaModel();
            $result = $cinemaModel->where($_GET);
            if($result != false) {
                echo json_encode([
                    'status' => true, 
                    "data" => $result,
                ]);
                exit;
            }
            echo json_encode(['status' => false, 'message' => $cinemaModel->message]);
            exit;

        }
        echo json_encode(['status' => false, 'message' => 'Invalid request']);
        exit;
    }

    public function getRoom() {
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            unset($_GET['url']);
            $roomModel = new RoomModel();
            $result = $roomModel->where($_GET);
            if($result != false) {
                echo json_encode([
                    'status' => true, 
                    "data" => $result,
                ]);
                exit;
            }
            echo json_encode(['status' => false, 'message' => $roomModel->message]);
            exit;

        }
        echo json_encode(['status' => false, 'message' => 'Invalid request']);
        exit;
    }

    public function getSeat() {
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            unset($_GET['url']);
            $seatModel = new SeatModel();
            $result = $seatModel->where($_GET);
            if($result != false) {
                usort($result, function ($a, $b) {
                    if ($a->row == $b->row) {
                        return $a->col - $b->col;
                    }
                    return $a->row - $b->row;
                });
                
                echo json_encode([
                    'status' => true, 
                    "data" => $result,
                ]);
                exit;
            }
            echo json_encode(['status' => false, 'message' => $seatModel->message]);
            exit;

        }
        echo json_encode(['status' => false, 'message' => 'Invalid request']);
        exit;
    }

    public function getShowtime() {
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            unset($_GET['url']);
            $showtimeModel = new ShowtimeModel();
            $result = $showtimeModel->where($_GET);
            if($result != false) {
                usort($result, function ($a, $b) {
                    $timeA = strtotime($a->start_time);
                    $timeB = strtotime($b->start_time);
            
                    return $timeA - $timeB; // Sắp xếp tăng dần theo start_time
                });
                echo json_encode([
                    'status' => true, 
                    "data" => $result,
                ]);
                exit;
            }
            echo json_encode(['status' => false, 'message' => $showtimeModel->message]);
            exit;

        }
        echo json_encode(['status' => false, 'message' => 'Invalid request']);
        exit;
    }
    
    public function insertMedia() {
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
            $mediaModel = new MediaModel();
            $result = $mediaModel->insertMedia($_POST, $_FILES['file']);
            if($result != false) {
                echo json_encode([
                    'status' => true, 
                    'message' => $mediaModel->message
                ]);
                exit;
            }
            echo json_encode(['status' => false, 'message' => $mediaModel->message]);
        }
        echo json_encode(['status' => false, 'message' => 'Invalid request']);
        exit;
    }

    public function deleteMedia() {
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mediaModel = new MediaModel();
            $result = $mediaModel->deleteMedia($_POST);
            if($result != false) {
                echo json_encode([
                    'status' => true, 
                    'message' => $mediaModel->message
                ]);
                exit;
            }
            echo json_encode(['status' => false, 'message' => $mediaModel->message]);
        }
        echo json_encode(['status' => false, 'message' => 'Invalid request']);
        exit;
    }

    public function updateMedia() {
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mediaModel = new MediaModel();
            $result = $mediaModel->update($_POST['id'], $_POST);
            if($result != false) {
                echo json_encode([
                    'status' => true, 
                    'message' => $mediaModel->message
                ]);
                exit;
            }
            echo json_encode(['status' => false, 'message' => $mediaModel->message]);
            exit;
        }
        echo json_encode(['status' => false, 'message' => 'Invalid request']);
        exit;
    }

    public function insertSeat() {
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $seatModel = new SeatModel();
            $result = $seatModel->insert($_POST);
            if($result != false) {
                echo json_encode([
                    'status' => true, 
                    'message' => $seatModel->message
                ]);
                exit;
            }
            echo json_encode(['status' => false, 'message' => $seatModel->message]);
        }
        echo json_encode(['status' => false, 'message' => 'Invalid request']);
        exit;
    }

    public function insertShowtime() {
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $showtimeModel = new ShowtimeModel();
            $result = $showtimeModel->insert($_POST);
            if($result != false) {
                echo json_encode([
                    'status' => true, 
                    'message' => $showtimeModel->message
                ]);
                exit;
            }
            echo json_encode(['status' => false, 'message' => $showtimeModel->message]);
        }
        echo json_encode(['status' => false, 'message' => 'Invalid request']);
        exit;
    }

    public function deleteShowtime() {
        header('Content-Type: application/json');
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $showtimeModel = new ShowtimeModel();
            $result = $showtimeModel->delete($_POST['id']);
            if($result != false) {
                echo json_encode([
                    'status' => true, 
                    'message' => $showtimeModel->message
                ]);
                exit;
            }
            echo json_encode(['status' => false, 'message' => $showtimeModel->message]);
        }
        echo json_encode(['status' => false, 'message' => 'Invalid request']);
        exit;
    }


}
