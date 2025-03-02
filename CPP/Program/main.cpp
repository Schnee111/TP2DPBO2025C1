#include <iostream>
#include <list>
#include <vector>
#include <algorithm>
#include <iomanip>
#include "Baju.cpp"

using namespace std;
// Fungsi untuk mendapatkan panjang maksimum setiap kolom
vector<int> getColumnWidths(const list<Baju>& daftarBaju) {
    vector<int> col_widths = {4, 12, 4, 7, 8, 8, 8, 6, 4, 10}; // Default width

    for (const auto& baju : daftarBaju) {
        col_widths[0] = max(col_widths[0], (int)to_string(baju.get_id()).length());
        col_widths[1] = max(col_widths[1], (int)baju.get_name().length());
        col_widths[2] = max(col_widths[2], (int)to_string(baju.get_stock()).length());
        col_widths[3] = max(col_widths[3], (int)to_string(baju.get_price()).length());
        col_widths[4] = max(col_widths[4], (int)baju.get_jenis().length());
        col_widths[5] = max(col_widths[5], (int)baju.get_bahan().length());
        col_widths[6] = max(col_widths[6], (int)baju.get_warna().length());
        col_widths[7] = max(col_widths[7], (int)baju.get_untuk().length());
        col_widths[8] = max(col_widths[8], (int)baju.get_size().length());
        col_widths[9] = max(col_widths[9], (int)baju.get_merk().length());
    }

    return col_widths;
}

void showProducts(const list<Baju>& daftarBaju) {
    if (daftarBaju.empty()) {
        cout << "\n[INFO] Can't find product in the list!\n";
        return;
    }

    // Ambil lebar kolom yang disesuaikan dengan data
    vector<int> col_widths = getColumnWidths(daftarBaju);

    // Hitung total lebar tabel
    int tableWidth = 0;
    for (int w : col_widths) tableWidth += w;
    int overhead = 3 * col_widths.size();
    tableWidth += overhead+1;

    // Garis pembatas atas
    cout << setfill('=') << setw(tableWidth) << "=" << setfill(' ') << "\n";

    // Header tabel
    cout << "| " << right << setw(col_widths[0]) << "ID"
         << " | " << left  << setw(col_widths[1]) << "Nama Produk"
         << " | " << right << setw(col_widths[2]) << "Stok"
         << " | " << right << setw(col_widths[3]) << "Harga"
         << " | " << left  << setw(col_widths[4]) << "Jenis"
         << " | " << left  << setw(col_widths[5]) << "Bahan"
         << " | " << left  << setw(col_widths[6]) << "Warna"
         << " | " << left  << setw(col_widths[7]) << "Untuk"
         << " | " << left  << setw(col_widths[8]) << "Size"
         << " | " << left  << setw(col_widths[9]) << "Merk"
         << " |\n";

    // Garis pemisah
    cout << setfill('-') << setw(tableWidth) << "-" << setfill(' ') << "\n";

    // Isi tabel
    for (const auto& baju : daftarBaju) {
        cout << "| " << right << setw(col_widths[0]) << baju.get_id()
             << " | " << left  << setw(col_widths[1]) << baju.get_name()
             << " | " << right << setw(col_widths[2]) << baju.get_stock()
             << " | " << right << setw(col_widths[3]) << (int)baju.get_price()
             << " | " << left  << setw(col_widths[4]) << baju.get_jenis()
             << " | " << left  << setw(col_widths[5]) << baju.get_bahan()
             << " | " << left  << setw(col_widths[6]) << baju.get_warna()
             << " | " << left  << setw(col_widths[7]) << baju.get_untuk()
             << " | " << left  << setw(col_widths[8]) << baju.get_size()
             << " | " << left  << setw(col_widths[9]) << baju.get_merk()
             << " |\n";
    }

    // Garis pembatas bawah
    cout << setfill('=') << setw(tableWidth) << "=" << setfill(' ') << "\n";
}

// Fungsi untuk menambahkan produk baru
void addProduct(list<Baju>& listBaju) {
    int id, stok;
    double harga;
    string nama, jenis, bahan, warna, untuk, size, merk;

    cout << "\nMasukkan ID: ";
    cin >> id;
    cin.ignore();

    cout << "Masukkan Nama Produk: ";
    getline(cin, nama);

    cout << "Masukkan Stok: ";
    cin >> stok;

    cout << "Masukkan Harga: ";
    cin >> harga;
    cin.ignore();

    cout << "Masukkan Jenis: ";
    getline(cin, jenis);

    cout << "Masukkan Bahan: ";
    getline(cin, bahan);

    cout << "Masukkan Warna: ";
    getline(cin, warna);

    cout << "Produk ini untuk siapa? (Anjing/Kucing): ";
    getline(cin, untuk);

    cout << "Masukkan Ukuran (S/M/L/XL): ";
    getline(cin, size);

    cout << "Masukkan Merk: ";
    getline(cin, merk);

    listBaju.push_back(Baju(id, nama, stok, harga, jenis, bahan, warna, untuk, size, merk));
    cout << "\n[INFO] Produk berhasil ditambahkan!\n";
}

// Program utama
int main() {
    list<Baju> listBaju = {
        Baju(1, "Sweater Anjing", 10, 120000, "Pakaian", "Katun", "Merah", "Anjing", "M", "DogFashion"),
        Baju(2, "Rompi Kucing", 8, 95000, "Pakaian", "Wol", "Biru", "Kucing", "S", "MeowWear"),
        Baju(3, "Jaket Anjing", 5, 150000, "Pakaian", "Jeans", "Hitam", "Anjing", "L", "PawStyle"),
        Baju(4, "Kaos Kucing", 12, 75000, "Pakaian", "Katun", "Kuning", "Kucing", "M", "FurryTrend"),
        Baju(5, "Hoodie Anjing", 7, 180000, "Pakaian", "Fleece", "Abu-abu", "Anjing", "XL", "CozyPet")
    };

    int choice;
    do {
        cout << "\n===== MENU PETSHOP =====\n";
        cout << "1. Show Product\n";
        cout << "2. Add Product\n";
        cout << "3. Exit\n";
        cout << "choose: ";
        cin >> choice;

        switch (choice) {
            case 1:
                showProducts(listBaju);
                break;
            case 2:
                addProduct(listBaju);
                break;
            case 3:
                cout << "\n[INFO] Thanks! Exit from program.\n";
                break;
            default:
                cout << "\n[ERROR] Invalid choice! try again.\n";
        }
    } while (choice != 3);

    return 0;
}