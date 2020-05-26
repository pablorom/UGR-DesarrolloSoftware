package prototipo;


import java.util.ArrayList;

public class CarreraCarretera extends Carrera {

    /**
     * 
     * @param bicis 
     */
    public CarreraCarretera(ArrayList<Bicicleta> bicis) {
        super(bicis);
        porcentage_abandono = 0.1;
        tipo = Tipo.CARRETERA;
    }

}