<?php
require_once 'Aksesoris.php';

class Baju extends Aksesoris {
    protected $untuk;
    protected $size;
    protected $merk;

    public function __construct($id, $name, $stock, $price, $photo, $jenis, $bahan, $warna, $untuk, $size, $merk) {
        parent::__construct($id, $name, $stock, $price, $photo, $jenis, $bahan, $warna);
        $this->untuk = $untuk;
        $this->size = $size;
        $this->merk = $merk;
    }

    public function setUntuk($untuk) { $this->untuk = $untuk; }
    public function getUntuk() { return $this->untuk; }
    
    public function setSize($size) { $this->size = $size; }
    public function getSize() { return $this->size; }
    
    public function setMerk($merk) { $this->merk = $merk; }
    public function getMerk() { return $this->merk; }
}