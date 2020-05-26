package prototipo;


import java.util.ArrayList;

public class CarreraMontaña extends Carrera {

    /**
     * 
     * @param bicis 
     */
    public CarreraMontaña(ArrayList<Bicicleta> bicis) {
        super(bicis);
        porcentage_abandono = 0.2;
        tipo = Tipo.MONTAÑA;
    }

}