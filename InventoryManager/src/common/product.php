<?php
    class Product {
        public $name;
        public $description;
        public $unit;
        public $prodnr;

        public function __construct($name, $description, $unit, $prodnr) {
            $this->name = $name;
            $this->description = $description;
            $this->unit = $unit;
            $this->prodnr = $prodnr;

        }
    }
?>