

/******************************************************************************
 *  Clase:  ObservadorTemperatura
 *  Autor:    alex
 *
 *  Escribe aqui...
 * 
 ******************************************************************************/
package observador;

import java.util.Observable;
import java.util.Observer;
import javax.swing.JPanel;
import observable.Temperatura;

/**
 *
 * @author alex
 */
public abstract class ObservadorTemperatura extends JPanel implements Observer {

    protected Temperatura miObservable;
    protected double miTemperatura;
    
    /**
     * Constructor
     * @param t 
     */
    protected ObservadorTemperatura(Temperatura t) {
        miObservable = t;
        miTemperatura = 0;
    }
    
    /**
     * Implementación del método update de la interfaz Observer
     * @param o
     * @param arg 
     */
    @Override
    public void update(Observable o, Object arg) {
        miTemperatura = miObservable.getTemperatura();
        System.out.println(toString());
    }

}
