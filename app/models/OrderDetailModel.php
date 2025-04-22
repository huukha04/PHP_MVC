<?php
class OrderDetailModel
{

    use Model;
    public function __construct() {
        $this->allowedColumns = [
            'order_code',
            'showtime_id',
            'seat_id',
            'product_id',

        ];
        $this->table = 'orderdetail';
        $this->message = '';

        
    }

    public function insertOrderDetail($data) {
        try {
            $order_code = $data['order_code'];
            $result = $this->where($data);
            if ($result) {
                $update = $this->update($result[0]->id, $data);
                if ($update) {
                    return true;
                }
            } else {
                $insert = $this->insert($data);
                if ($insert) {
                    return true;
                }
            }
            return false;
        } catch (Exception $e) {
            $this->message = 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function deleteOrderDetail($data) {
        try {
            $order_code = $data['order_code'];
            $result = $this->where($data);
            if ($result) {
                $delete = $this->delete($result[0]->id);
                if ($delete) {
                    return true;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            $this->message = 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function getBookingInfo($data) {
        try {
            // Cập nhật thời gian cho tất cả các bản ghi có order_code tương ứng

            $returnData = [];
            $order_code = $data['order_code'];
            $showtime_id = $data['showtime_id'];

            $updateQuery = "UPDATE orderDetail SET time = CURRENT_TIMESTAMP WHERE order_code = :order_code";
            $this->PDOquery($updateQuery, ['order_code' => $order_code]);

            $showtime = (new ShowtimeModel())->where(['id' => $showtime_id]);
            if($showtime != false) {
                $showtime = $showtime[0];
                $movie = (new MediaModel())->where(['id' => $showtime->media_id]);
                if($movie != false) {
                    $movie = $movie[0];
                    $returnData['movie_name'] = $movie->title;
                }

                $cinema = (new CinemaModel())->where(['id' => $showtime->cinema_id]);
                if($cinema != false) {
                    $cinema = $cinema[0];
                    $returnData['cinema_name'] = $cinema->name;
                }

                $room = (new RoomModel())->where(['id' => $showtime->room_id]);
                if($room != false) {
                    $room = $room[0];
                    $returnData['room_name'] = $room->name;
                }

                $returnData['showtime'] = $showtime->start_time;
            }

            $orderDetail = $this->where(['order_code' => $order_code, 'showtime_id' => $showtime_id]);
            if($orderDetail != false) {
                $returnData['total_price'] = 0;
                $returnData['product_list'] = '';      // Khởi tạo chuỗi rỗng
                $returnData['seat_list'] = '';     // Khởi tạo chuỗi rỗng


                foreach($orderDetail as $item) {
                    if($item->product_id != null) {
                        $product = (new ProductModel())->where(['id' => $item->product_id]);
                        if($product != false) {
                            $product = $product[0];
                            $returnData['product_list'] .= $product->name . 'x' . $item->quantity . ' ';
                            $returnData['total_price'] += $product->price * $item->quantity;
                        }
                    } else {
                        $seat = (new SeatModel())->where(['id' => $item->seat_id]);
                        if($seat != false) {
                            $seat = $seat[0];
                            $returnData['total_price'] += $seat->price;
                            $returnData['seat_list'] .= $seat->code . ' ';
                        }
                    }
                }
            }

            return $returnData;
            
        } catch (Exception $e) {
            $this->message = 'Error: ' . $e->getMessage();
            return false;
        }
    }

    
    

}
