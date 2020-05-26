import java.util.ArrayList;

public class CarreraMontaña extends Carrera {

    /**
     * 
     * @param bicicletas 
     */
    public CarreraMontaña(ArrayList<Bicicleta> bicicletas) {
        super(bicicletas);
        porcentage_abandono = 0.2;
        tipo = Tipo.MONTAÑA;
    }

}