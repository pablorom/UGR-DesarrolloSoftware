
import java.util.logging.Level;
import java.util.logging.Logger;

public abstract class Bicicleta extends Thread {
    
    int id;
    Tipo tipo = null;
    private int tiempo = 15;
    private static int TIEMPO_DEFECTO = 15;

    
    public Bicicleta() {}
    
    
    /**
     * 
     * @param tiempo 
     */
    public void setAbandono(int tiempo) {
        this.tiempo = tiempo;
    }
    
    
    /**
     * 
     */
    @Override
    public void run() {
        try {
            Thread.sleep(this.tiempo*1000);
        } catch (InterruptedException ex) {
            Logger.getLogger(Bicicleta.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        if(tiempo != TIEMPO_DEFECTO)
            fin("se ha retirado");
        else
            fin("ha finalizado");
    }
    
    
    /**
     * 
     * @param estado 
     */
    public void fin(String estado) {
        System.out.println("Bicicleta de " + tipo + " " + id + " " + estado);
    }
    

    @Override
    public String toString() {
        return "Bicicleta de " + tipo + " " + id;
    }
}