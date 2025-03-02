public class Baju extends Aksesoris {
    private String untuk;
    private String size;
    private String merk;

    public Baju() {
        super();
        this.untuk = "";
        this.size = "";
        this.merk = "";
    }

    public Baju(int id, String name, int stock, double price, String jenis, String bahan, String warna, String untuk, String size, String merk) {
        super(id, name, stock, price, jenis, bahan, warna);
        this.untuk = untuk;
        this.size = size;
        this.merk = merk;
    }

    public void setUntuk(String untuk) { this.untuk = untuk; }
    public void setSize(String size) { this.size = size; }
    public void setMerk(String merk) { this.merk = merk; }

    public String getUntuk() { return this.untuk; }
    public String getSize() { return this.size; }
    public String getMerk() { return this.merk; }
}