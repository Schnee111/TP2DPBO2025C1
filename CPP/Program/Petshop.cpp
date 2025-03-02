#include <iostream>
#include <string>

using namespace std;

// Kelas petshop
class Petshop{
    private:
        int id;            // ID
        string name;       // Nama produk
        int stock;         // Stok produk
        double price;      // Harga 

    public:
        // Konstruktor default
        Petshop() {
            this->id = 0;
            this->name = "";
            this->stock = 0;
            this->price = 0.0;
        }

        // Konstruktor dengan parameter untuk inisialisasi dengan nilai yang diberikan
        Petshop(int id, string name, int stock, double price) {
            this->id = id;
            this->name = name;
            this->stock = stock;
            this->price = price;
        }
        
        // Setter
        void set_name(string name) { this->name = name; }
        void set_id(int id) { this->id = id; }
        void set_stock(int stock) { this->stock = stock; }
        void set_price(double price) { this->price = price; }

        // Getter
        int get_id() const { return this->id; }
        string get_name() const { return this->name; }
        int get_stock() const { return this->stock; }
        double get_price() const { return this->price; }

        // Destruktor
        ~Petshop(){}
};