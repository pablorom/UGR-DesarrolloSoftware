package prototipo;


import java.util.ArrayList;
import java.util.Random;
import java.util.logging.Level;
import java.util.logging.Logger;

public abstract class Carrera extends Thread {

    protected Tipo tipo;
    protected double porcentage_abandono;
    private static int duracion = 15;
    private ArrayList<Bicicleta> bicicletas;

    
    /**
     * 
     * @param bicis
     */
    Carrera(ArrayList<Bicicleta> bicis) {
        bicicletas = bicis;
    }

    
    /**
     * 
     * @return 
     */
    protected Carrera clone() {
        // TODO - implement Carrera.clone
        throw new UnsupportedOperationException();
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
     * Método principal de la hebra
     * 
     */
    @Override
    public void run() {
        Random rand = new Random();
        int abandonos = (int) (bicicletas.size() * porcentage_abandono);
        int tiempo_abandono = rand.nextInt(Carrera.duracion);
        
                
        for(int i=0; i<abandonos; i++)
            bicicletas.get(rand.nextInt(bicicletas.size())).setAbandono(tiempo_abandono);
        
        comenzarCarrera();
                
        try {
            Thread.sleep(duracion*1000);
        } catch (InterruptedException ex) {
            Logger.getLogger(Carrera.class.getName()).log(Level.SEVERE, null, ex);
        }

    }
    
    
    /**
     * 
     * @return 
     */
    @Override
    public String toString() {
        return "Carrera de " + tipo + " ";
    }

}