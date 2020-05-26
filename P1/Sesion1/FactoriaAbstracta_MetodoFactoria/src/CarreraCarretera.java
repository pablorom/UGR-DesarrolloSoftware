import java.util.ArrayList;

public class CarreraCarretera extends Carrera {

    /**
     * 
     * @param bicicletas 
     */
    public CarreraCarretera(ArrayList<Bicicleta> bicicletas) {
        super(bicicletas);
        porcentage_abandono = 0.1;
        tipo = Tipo.CARRETERA;
    }

}