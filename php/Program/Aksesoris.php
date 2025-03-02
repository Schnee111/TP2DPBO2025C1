<?php
require_once 'PetShop.php';

class Aksesoris extends Petshop {
    protected $jenis;
    protected $bahan;
    protected $warna;

    public function __construct($id, $name, $stock, $price, $photo, $jenis, $bahan, $warna) {
        parent::__construct($id, $name, $stock, $price, $photo);
        $this->jenis = $jenis;
        $this->bahan = $bahan;
        $this->warna = $warna;
    }

    public function setJenis($jenis) { $this->jenis = $jenis; }
    public function getJenis() { return $this->jenis; }
    
    public function setBahan($bahan) { $this->bahan = $bahan; }
    public function getBahan() { return $this->bahan; }
    
    public function setWarna($warna) { $this->warna = $warna; }
    public function getWarna() { return $this->warna; }
}