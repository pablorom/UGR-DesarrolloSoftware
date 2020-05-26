/******************************************************************************
 *  Clase:  ObservadorMotor
 *  Autor:    alex
 * 
 ******************************************************************************/
package GUI;

import controlVelocidad.Objetivo;
import java.util.Observer;
import javax.swing.JPanel;

/**
 *
 * @author alex
 */
public abstract class ObservadorMotor extends JPanel implements Observer {

    protected Objetivo miObservable;

    
    public void setObservable(Objetivo obs) {
        this.miObservable = obs;
        this.miObservable.addObserver(this);
    }
    
}
