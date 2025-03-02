<?php
class Petshop {
    protected $id;
    protected $name;
    protected $stock;
    protected $price;
    protected $photo;

    public function __construct($id = 0, $name = "", $stock = 0, $price = 0.0, $photo = "") {
        $this->id = $id;
        $this->name = $name;
        $this->stock = $stock;
        $this->price = $price;
        $this->photo = $photo;
    }

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }
    
    public function setName($name) { $this->name = $name; }
    public function getName() { return $this->name; }
    
    public function setStock($stock) { $this->stock = $stock; }
    public function getStock() { return $this->stock; }
    
    public function setPrice($price) { $this->price = $price; }
    public function getPrice() { return $this->price; }
    
    public function setPhoto($photo) { $this->photo = $photo; }
    public function getPhoto() { return $this->photo; }
}