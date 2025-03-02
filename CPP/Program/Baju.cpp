#include <iostream>
#include <string>
#include "Aksesoris.cpp"

class Baju : public Aksesoris {
    private:
        std::string untuk;
        std::string size;
        std::string merk;
    
    public:
        // Konstruktor default
        Baju() : Aksesoris(), untuk(""), size(""), merk("") {}

        // Konstruktor dengan parameter (diperbaiki urutan & tipe harga)
        Baju(int ID, std::string nama, int stok_produk, double harga_produk, std::string jenis, std::string bahan, std::string warna, std::string untuk, std::string size, std::string merk) 
        : Aksesoris(ID, nama, stok_produk, harga_produk, jenis, bahan, warna), untuk(untuk), size(size), merk(merk) {}

        // Setter
        void set_untuk(std::string untuk) { this->untuk = untuk; }
        void set_size(std::string size) { this->size = size; }
        void set_merk(std::string merk) { this->merk = merk; }

        // Getter
        std::string get_untuk() const { return this->untuk; }
        std::string get_size() const { return this->size; }
        std::string get_merk() const { return this->merk; }

        // Destruktor
        ~Baju() {}
};
