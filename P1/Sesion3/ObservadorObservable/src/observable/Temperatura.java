package observable;

import java.util.Observable;
import java.util.concurrent.ThreadLocalRandom;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author alex
 */
public class Temperatura extends Observable implements Runnable {

    private double temperatura;
    public Thread hebra;
    
    /**
     * Constructor
     */
    public Temperatura() {
        this.temperatura = 0;
        hebra = new Thread(this, "Temperatura");
    }

    /**
     * 
     * @return 
     */
    public double getTemperatura() {
        return (double)Math.round(temperatura * 100d)/100d;
    }

    /**
     * 
     * @param temperatura 
     */
    public void setTemperatura(double temperatura) {
        this.temperatura = temperatura;
        System.out.println(toString());
        setChanged();
        notifyObservers();
    }
    
    //**********************************************************************//
    //********************* MÉTODOS HEREDADOS ******************************//
    //**********************************************************************//
    
    /**
     * Cambia el estado del observable. En nuestro caso, genera un valor de tipo
     * doble aleatorio entre 10 y 30 y actualiza el atributo temperatura a este
     * nuevo valor. A continuación, señala que su estado ha cambiado y notifica
     * a sus observadores. Finalmente espera 5 segundos antes de volver a realizar
     * el proceso de actualización.
     */
    @Override
    public void run() {
        
        while(true) {
            try {
                setTemperatura( ThreadLocalRandom.current().nextDouble(10, 30) );
                Thread.sleep(3000);
            } catch (InterruptedException ex) {
                Logger.getLogger(Temperatura.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        
    }
    
    

    /**
     * Redefinición del método toString
     * @return 
     */
    @Override
    public String toString() {
        return "\nTemperatura "+this.hebra.getId()+": " + getTemperatura() + "ºC";
    }

}



    
