import java.util.*;

public class Main {
    public static void main(String[] args) {
        List<Baju> listBaju = new ArrayList<>(Arrays.asList(
            new Baju(1, "Sweater Anjing", 10, 120000, "Pakaian", "Katun", "Merah", "Anjing", "M", "DogFashion"),
            new Baju(2, "Rompi Kucing", 8, 95000, "Pakaian", "Wol", "Biru", "Kucing", "S", "MeowWear"),
            new Baju(3, "Jaket Anjing", 5, 150000, "Pakaian", "Jeans", "Hitam", "Anjing", "L", "PawStyle"),
            new Baju(4, "Kaos Kucing", 12, 75000, "Pakaian", "Katun", "Kuning", "Kucing", "M", "FurryTrend"),
            new Baju(5, "Hoodie Anjing", 7, 180000, "Pakaian", "Fleece", "Abu-abu", "Anjing", "XL", "CozyPet")
        ));
        
        Scanner scanner = new Scanner(System.in);
        int choice;
        do {
            System.out.println("\n===== MENU PETSHOP =====");
            System.out.println("1. Show Product");
            System.out.println("2. Add Product");
            System.out.println("3. Exit");
            System.out.print("Choose: ");
            choice = scanner.nextInt();
            scanner.nextLine();

            switch (choice) {
                case 1:
                    List<Integer> columnWidths = Arrays.asList(3, 20, 5, 10, 10, 10, 10, 10, 5, 10);
                    for (Baju b : listBaju) {
                        columnWidths.set(1, Math.max(columnWidths.get(1), b.getName().length()));
                        columnWidths.set(2, Math.max(columnWidths.get(2), String.valueOf(b.getStock()).length()));
                        columnWidths.set(3, Math.max(columnWidths.get(3), String.valueOf(b.getPrice()).length()));
                        columnWidths.set(4, Math.max(columnWidths.get(4), b.getJenis().length()));
                        columnWidths.set(5, Math.max(columnWidths.get(5), b.getBahan().length()));
                        columnWidths.set(6, Math.max(columnWidths.get(6), b.getWarna().length()));
                        columnWidths.set(7, Math.max(columnWidths.get(7), b.getUntuk().length()));
                        columnWidths.set(8, Math.max(columnWidths.get(8), b.getSize().length()));
                        columnWidths.set(9, Math.max(columnWidths.get(9), b.getMerk().length()));
                    }
                    
                    String header = String.format("| %" + columnWidths.get(0) + "s | %" + columnWidths.get(1) + "s | %" + columnWidths.get(2) + "s | %" + columnWidths.get(3) + "s | %" + columnWidths.get(4) + "s | %" + columnWidths.get(5) + "s | %" + columnWidths.get(6) + "s | %" + columnWidths.get(7) + "s | %" + columnWidths.get(8) + "s | %" + columnWidths.get(9) + "s |", "ID", "Nama Produk", "Stok", "Harga", "Jenis", "Bahan", "Warna", "Untuk", "Size", "Merk");
                    int totalWidth = header.length();
                    System.out.println("=".repeat(totalWidth));
                    System.out.println(header);
                    System.out.println("=".repeat(totalWidth));
                    for (Baju b : listBaju) {
                        System.out.printf("| %" + columnWidths.get(0) + "d | %" + columnWidths.get(1) + "s | %" + columnWidths.get(2) + "d | %" + columnWidths.get(3) + ".2f | %" + columnWidths.get(4) + "s | %" + columnWidths.get(5) + "s | %" + columnWidths.get(6) + "s | %" + columnWidths.get(7) + "s | %" + columnWidths.get(8) + "s | %" + columnWidths.get(9) + "s |\n", b.getId(), b.getName(), b.getStock(), b.getPrice(), b.getJenis(), b.getBahan(), b.getWarna(), b.getUntuk(), b.getSize(), b.getMerk());
                    }
                    System.out.println("=".repeat(totalWidth));
                    break;
                case 2:
                    System.out.print("Masukkan ID: ");
                    int id = scanner.nextInt();
                    scanner.nextLine();
                    
                    System.out.print("Masukkan Nama Produk: ");
                    String name = scanner.nextLine();
                    
                    System.out.print("Masukkan Stok: ");
                    int stock = scanner.nextInt();
                    
                    System.out.print("Masukkan Harga: ");
                    double price = scanner.nextDouble();
                    scanner.nextLine();
                    
                    System.out.print("Masukkan Jenis: ");
                    String jenis = scanner.nextLine();
                    
                    System.out.print("Masukkan Bahan: ");
                    String bahan = scanner.nextLine();
                    
                    System.out.print("Masukkan Warna: ");
                    String warna = scanner.nextLine();
                    
                    System.out.print("Produk ini untuk siapa? (Anjing/Kucing): ");
                    String untuk = scanner.nextLine();
                    
                    System.out.print("Masukkan Ukuran (S/M/L/XL): ");
                    String size = scanner.nextLine();
                    
                    System.out.print("Masukkan Merk: ");
                    String merk = scanner.nextLine();
                    
                    listBaju.add(new Baju(id, name, stock, price, jenis, bahan, warna, untuk, size, merk));
                    System.out.println("\n[INFO] Produk berhasil ditambahkan!");
                    break;
                case 3:
                    System.out.println("\n[INFO] Thanks! Exit from program.");
                    break;
                default:
                    System.out.println("\n[ERROR] Invalid choice! Try again.");
            }
        } while (choice != 3);
    }
}
