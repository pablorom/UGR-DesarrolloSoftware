import java.util.ArrayList;
import java.util.Random;
import java.util.logging.Level;
import java.util.logging.Logger;

public abstract class Carrera extends Thread {
    /* Decalaración de atributos */
    private ArrayList<Bicicleta> bicicletas;
    double porcentage_abandono;
    private final int duracion = 15; // DEV - cambiar a 60
    Tipo tipo = null;

    
    /**
     * Constructor por defecto
     * 
     * @param bicicletas
     */
    public Carrera(ArrayList<Bicicleta> bicicletas) {
        this.bicicletas = bicicletas;
    }
        

    /**
     * Método principal de la hebra
     * 
     */
    @Override
    public void run() {
        Random rand = new Random();
        int abandonos = (int) (bicicletas.size() * porcentage_abandono);
        int tiempo_abandono = rand.nextInt(this.duracion);
        
                
        for(int i=0; i<abandonos; i++) {
            bicicletas.get(rand.nextInt(bicicletas.size())).setAbandono(tiempo_abandono);
        }
        
        comenzarCarrera();
                
        try {
            Thread.sleep(duracion*1000);
        } catch (InterruptedException ex) {
            Logger.getLogger(Carrera.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    
    /**
     * 
     */
    private void comenzarCarrera() {
        System.out.println(this.toString() + "ha comenzado");
        for(Bicicleta bici : bicicletas) {
            bici.start();
            System.out.println( bici.toString() + " ha comenzado la carrera");
        }
    }

    
    /**
     * To String
     * @return 
     */
    @Override
    public String toString() {
        return "Carrera de " + tipo + " ";
    }

}