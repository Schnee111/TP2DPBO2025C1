class Petshop:
    def __init__(self, id=0, name="", stock=0, price=0.0):
        self._id = id
        self._name = name
        self._stock = stock
        self._price = price

    def set_id(self, id): self._id = id
    def get_id(self): return self._id
    
    def set_name(self, name): self._name = name
    def get_name(self): return self._name
    
    def set_stock(self, stock): self._stock = stock
    def get_stock(self): return self._stock
    
    def set_price(self, price): self._price = price
    def get_price(self): return self._price