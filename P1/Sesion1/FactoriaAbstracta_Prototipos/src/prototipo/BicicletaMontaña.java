package prototipo;

public class BicicletaMontaña extends Bicicleta {

    private static int COUNT = 0;
    
    /**
     * 
     */
    public BicicletaMontaña() {
        BicicletaMontaña.COUNT += 1;
        tipo = Tipo.MONTAÑA;
        id = COUNT;
    }

}