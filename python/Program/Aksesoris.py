from Petshop import Petshop

class Aksesoris(Petshop):
    def __init__(self, id=0, name="", stock=0, price=0.0, jenis="", bahan="", warna=""):
        super().__init__(id, name, stock, price)
        self._jenis = jenis
        self._bahan = bahan
        self._warna = warna
    
    def set_jenis(self, jenis): self._jenis = jenis
    def get_jenis(self): return self._jenis
    
    def set_bahan(self, bahan): self._bahan = bahan
    def get_bahan(self): return self._bahan
    
    def set_warna(self, warna): self._warna = warna
    def get_warna(self): return self._warna
