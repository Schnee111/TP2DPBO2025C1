from Baju import Baju

def get_column_widths(list_baju):
    col_widths = [3, 20, 5, 10, 10, 10, 10, 10, 5, 10]  # Default widths
    for b in list_baju:
        col_widths[1] = max(col_widths[1], len(b.get_name()))
        col_widths[2] = max(col_widths[2], len(str(b.get_stock())))
        col_widths[3] = max(col_widths[3], len(str(int(b.get_price()))))
        col_widths[4] = max(col_widths[4], len(b.get_jenis()))
        col_widths[5] = max(col_widths[5], len(b.get_bahan()))
        col_widths[6] = max(col_widths[6], len(b.get_warna()))
        col_widths[7] = max(col_widths[7], len(b.get_untuk()))
        col_widths[8] = max(col_widths[8], len(b.get_size()))
        col_widths[9] = max(col_widths[9], len(b.get_merk()))
    return col_widths

def show_products(list_baju):
    if not list_baju:
        print("\n[INFO] Can't find product in the list!\n")
        return
    
    col_widths = get_column_widths(list_baju)
    table_width = sum(col_widths) + len(col_widths) * 3 + 1
    
    print("=" * table_width)
    print(f"| {'ID':>{col_widths[0]}} | {'Nama Produk':<{col_widths[1]}} | {'Stok':>{col_widths[2]}} | {'Harga':>{col_widths[3]}} | {'Jenis':<{col_widths[4]}} | {'Bahan':<{col_widths[5]}} | {'Warna':<{col_widths[6]}} | {'Untuk':<{col_widths[7]}} | {'Size':<{col_widths[8]}} | {'Merk':<{col_widths[9]}} |")
    print("-" * table_width)
    
    for b in list_baju:
        print(f"| {b.get_id():>{col_widths[0]}} | {b.get_name():<{col_widths[1]}} | {b.get_stock():>{col_widths[2]}} | {int(b.get_price()):>{col_widths[3]}} | {b.get_jenis():<{col_widths[4]}} | {b.get_bahan():<{col_widths[5]}} | {b.get_warna():<{col_widths[6]}} | {b.get_untuk():<{col_widths[7]}} | {b.get_size():<{col_widths[8]}} | {b.get_merk():<{col_widths[9]}} |")
    print("=" * table_width)

def add_product(list_baju):
    id = int(input("Masukkan ID: "))
    name = input("Masukkan Nama Produk: ")
    stock = int(input("Masukkan Stok: "))
    price = float(input("Masukkan Harga: "))
    jenis = input("Masukkan Jenis: ")
    bahan = input("Masukkan Bahan: ")
    warna = input("Masukkan Warna: ")
    untuk = input("Produk ini untuk siapa? (Anjing/Kucing): ")
    size = input("Masukkan Ukuran (S/M/L/XL): ")
    merk = input("Masukkan Merk: ")
    list_baju.append(Baju(id, name, stock, price, jenis, bahan, warna, untuk, size, merk))
    print("\n[INFO] Produk berhasil ditambahkan!\n")

def main():
    list_baju = [
        Baju(1, "Sweater Anjing", 10, 120000, "Pakaian", "Katun", "Merah", "Anjing", "M", "DogFashion"),
        Baju(2, "Rompi Kucing", 8, 95000, "Pakaian", "Wol", "Biru", "Kucing", "S", "MeowWear"),
        Baju(3, "Jaket Anjing", 5, 150000, "Pakaian", "Jeans", "Hitam", "Anjing", "L", "PawStyle"),
        Baju(4, "Kaos Kucing", 12, 75000, "Pakaian", "Katun", "Kuning", "Kucing", "M", "FurryTrend"),
        Baju(5, "Hoodie Anjing", 7, 180000, "Pakaian", "Fleece", "Abu-abu", "Anjing", "XL", "CozyPet")
    ]
    
    while True:
        print("\n===== MENU PETSHOP =====")
        print("1. Show Product")
        print("2. Add Product")
        print("3. Exit")
        choice = input("Choose: ")
        
        if choice == "1":
            show_products(list_baju)
        elif choice == "2":
            add_product(list_baju)
        elif choice == "3":
            print("\n[INFO] Thanks! Exit from program.")
            break
        else:
            print("\n[ERROR] Invalid choice! Try again.")

if __name__ == "__main__":
    main()