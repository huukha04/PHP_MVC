<?php
class ProductModel
{

    use Model;
    public function __construct() {
        $this->allowedColumns = [
            'name',
            'price',
            'quality'
        ];
        $this->table = 'product';
        $this->message = '';
    }


}
