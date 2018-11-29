<!-- Just the class Product, which makes it easier to manage products within the files -->
<?php
    class Product {

        public $name;
        public $description;
        public $image;
        public $unit;
        public $prodnr;

        public function __construct($name, $description, $image, $unit, $prodnr) {
            $this->name = $name;
            $this->description = $description;
            $this->image = $image;
            $this->unit = $unit;
            $this->prodnr = $prodnr;
        }
    }
?>