<?php
class ShowtimeModel
{

    use Model;
    public function __construct() {
        $this->allowedColumns = [
            'room_id',
            'media_id',
            'cinema_id',
            'date',
            'start_time',
            'end_time',
        ];
        $this->table = 'showtime';
        $this->message = '';
    }

    public function getSeatByShowtime($data) {
        try {
            $showtime_id = $data['showtime_id'];
            $showtime = $this->where(['id' => $showtime_id]);

            if($showtime != false) {
                $showtime = $showtime[0];
                $room_id = $showtime->room_id;
                
                $seats = (new SeatModel())->where(['room_id' => $room_id]);
                

                $orderDetails = (new OrderDetailModel())->where(['showtime_id' => $showtime_id]);
                if($orderDetails != false) {
                    foreach ($orderDetails as $orderDetail) {
                        if (strtotime($orderDetail->time) + 5*60 < time()) {

                            $order = (new OrderModel())->where(['order_code' => $orderDetail->order_code]);
                            if ($order == false) {
                                (new OrderDetailModel())->delete($orderDetail->id);
                                continue;
                            }
                        } else {
                            foreach ($seats as $seat) {
                                if ($seat->id == $orderDetail->seat_id) {
                                    $seat->status = $orderDetail->status;
                                }
                            }
                        }
                    }



                    foreach($seats as $seat) {
                        foreach($orderDetails as $orderDetail) {
                            if($orderDetail->seat_id == $seat->id) {
                                if($orderDetail->status == 'pending') {
                                    if (strtotime($orderDetail->time) + 5*60 < time()) {
                                        (new OrderDetailModel())->delete($orderDetail->id);
                                    }
                                } else {
                                    $seat->status = $orderDetail->status;
                                }
                            }
                        }
                    }
                }

                return $seats;
                
            }
            return false;
        } catch (Exception $e) {
            $this->message = 'Error: ' . $e->getMessage();
            return false;
        }
    }

}
