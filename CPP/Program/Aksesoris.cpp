#include <iostream>
#include <string>
#include "Petshop.cpp"

class Aksesoris : public Petshop {
    private:
        std::string jenis;
        std::string bahan;
        std::string warna;

    public:
        // Konstruktor default
        Aksesoris() : Petshop(), jenis(""), bahan(""), warna("") {}

        // Konstruktor dengan parameter (diperbaiki urutan stock & price)
        Aksesoris(int id, std::string name, int stock, double price, std::string jenis, std::string bahan, std::string warna) 
        : Petshop(id, name, stock, price), jenis(jenis), bahan(bahan), warna(warna) {}

        // Setter
        void set_jenis(std::string jenis) { this->jenis = jenis; }
        void set_bahan(std::string bahan) { this->bahan = bahan; }
        void set_warna(std::string warna) { this->warna = warna; }

        // Getter
        std::string get_jenis() const { return this->jenis; }
        std::string get_bahan() const { return this->bahan; }
        std::string get_warna() const { return this->warna; }

        // Destruktor
        ~Aksesoris() {}
};
