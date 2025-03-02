public class Petshop {
    private int id;
    private String name;
    private int stock;
    private double price;

    public Petshop() {
        this.id = 0;
        this.name = "";
        this.stock = 0;
        this.price = 0.0;
    }

    public Petshop(int id, String name, int stock, double price) {
        this.id = id;
        this.name = name;
        this.stock = stock;
        this.price = price;
    }

    public void setName(String name) { this.name = name; }
    public void setId(int id) { this.id = id; }
    public void setStock(int stock) { this.stock = stock; }
    public void setPrice(double price) { this.price = price; }

    public int getId() { return this.id; }
    public String getName() { return this.name; }
    public int getStock() { return this.stock; }
    public double getPrice() { return this.price; }
}