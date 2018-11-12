<?php
    class Inventoryentry{

        public $inventoryEntryNr;
        public $productNr;
        public $userNr;
        public $name;
        public $description;
        public $amount;
        public $unit;
        public $status;
        public $expiringDate;
        public $buyingDate;

        public function __construct($inventoryEntryNr, $productNr, $userNr, $name, $description, $amount, $unit, $status,$expiringDate, $buyingDate) {
            $this->inventoryEntryNr = $inventoryEntryNr;
            $this->productNr = $productNr;
            $this->userNr = $userNr;
            $this->name = $name;
            $this->description = $description;
            $this->amount = $amount;
            $this->unit = $unit;
            $this->status = $status;
            $this->expiringDate = $expiringDate;
            $this->expiringDate = $expiringDate;
        }
    }
?>