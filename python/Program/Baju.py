from Aksesoris import Aksesoris

class Baju(Aksesoris):
    def __init__(self, id=0, name="", stock=0, price=0.0, jenis="", bahan="", warna="", untuk="", size="", merk=""):
        super().__init__(id, name, stock, price, jenis, bahan, warna)
        self._untuk = untuk
        self._size = size
        self._merk = merk
    
    def set_untuk(self, untuk): self._untuk = untuk
    def get_untuk(self): return self._untuk
    
    def set_size(self, size): self._size = size
    def get_size(self): return self._size
    
    def set_merk(self, merk): self._merk = merk
    def get_merk(self): return self._merk
