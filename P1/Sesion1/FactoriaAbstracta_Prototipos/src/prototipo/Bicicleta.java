package prototipo;


import java.util.logging.Level;
import java.util.logging.Logger;

public abstract class Bicicleta extends Thread {

    int id;
    Tipo tipo;
    private int ttl;
    private int DEFAULT_TTL = 15;


    Bicicleta() {}

    /**
     * 
     * @return copy of self
     */
    @Override
    protected Bicicleta clone() {
        // TODO implementar clone
        return this.clone();
    }

    /**
     * 
     * @param tiempo
     */
    public void setAbandono(int tiempo) {
        ttl = tiempo;
    }

    
    /**
     * 
     */
    @Override
    public void run() {
        try {
            Thread.sleep(this.ttl*1000);
        } catch (InterruptedException ex) {
            Logger.getLogger(Bicicleta.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        if(ttl != DEFAULT_TTL)
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