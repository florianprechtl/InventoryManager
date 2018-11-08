<?php
    class Inventoryentry{

        public $productnr;
        public $amount;
        public $status;
        public $expiringdate;

        public function __construct($productnr, $amount, $status, $expiringdate) {
            $this->productnr = $productnr;
            $this->amount = $amount;
            $this->status = $status;
            $this->expiringdate = $expiringdate;
        }
    }
?>