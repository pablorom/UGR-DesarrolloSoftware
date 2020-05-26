/******************************************************************************
 *  Clase:  ControlAutomatico
 *  Autor:    alex
 *
 * Clase que implementa la funcionalidad del sistema de control automático
 * del vehículo. La clase es por una parte una entidad observadora ya que 
 * debe observar el objetivo que controla, el motor.
 * 
 ******************************************************************************/
package controlAutomatico;

import GUI.Controles;
import controlVelocidad.EstadoMotor;
import controlVelocidad.Objetivo;
import java.util.Observable;
import java.util.Observer;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author alex
 */
public class ControlAutomatico extends Observable implements Runnable, Observer {
    private static ControlAutomatico INSTANCIA;
    private EstadoSCAV estado;
    private EstadoMotor estado_motor;
    private Controles controles;
    private double velocidad_guardada, velocidad_actual;
    private Objetivo motor;
    private Thread hebra;
    
    /**
     * Constructor privado
     */
    private ControlAutomatico(Controles c) {
        controles = c;
        estado = EstadoSCAV.APAGADO;
        estado_motor = EstadoMotor.APAGADO;
        velocidad_guardada = velocidad_actual = 0;
        hebra = new Thread(this, "Contro automático");
        hebra.start();
    }
    
    /**
     * Método de acceso a la única instancia de control automático
     * @param c
     * @return 
     */
    public static ControlAutomatico getInstancia(Controles c) {
        if (INSTANCIA == null) {
            INSTANCIA = new ControlAutomatico(c);
        }
        return INSTANCIA;        
    }
    
    
    public void setObservable(Objetivo obs) {
        motor = obs;
        motor.addObserver(this);        
    } 

    /**
     * Método de acceso a estado del sistema de control automático
     * @return 
     */
    public EstadoSCAV getEstado() {
        return estado;
    }
    
    public EstadoMotor getEstadoMotor() {
        return estado_motor;
    }
    
    public double getVelocidadGuardada() {
        return (double)Math.round(velocidad_guardada * 100d)/100d;
    }

    /**
     * Setter del estado del SCAV. Este método es el punto de entrada de la 
     * interfaz gráfica.
     * @param e 
     */
    public void setEstado(EstadoSCAV e) {
        estado = e;
        
        if (estado.equals(EstadoSCAV.MANTENER))
            velocidad_guardada = velocidad_actual;
    }
   

    @Override
    public void run() {
        while(true) {
            // Si el motor se apaga de forma manual, el SCAV se apaga también.
            if (estado_motor == EstadoMotor.APAGADO)
                estado = EstadoSCAV.APAGADO;

            switch(estado) {
                case ACELERAR:
                    controles.setEstado(EstadoMotor.ACELERANDO);
                    break;
                case MANTENER:
                    mantener();
                case REINICIAR:
                    mantener();
                    break;
                case APAGADO:
                    break;
            }
            
            try {
                Thread.sleep(750);
            } catch (InterruptedException ex) {
                Logger.getLogger(Controles.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }

    /**
     * Mantiene la velocidad_actual en el umbral establecido
     */
    private void mantener() {
        int umbral = 1;
        double upper_limit = velocidad_guardada + umbral,
               lower_limit = velocidad_guardada - umbral;
        
        if (velocidad_actual < lower_limit)
            controles.setEstado(EstadoMotor.ACELERANDO);
        else
            controles.setEstado(EstadoMotor.ENCENDIDO);
    }

    @Override
    public void update(Observable o, Object arg) {
        velocidad_actual = motor.getVelocidad();
        estado_motor = motor.getEstadoMotor();
        
        if (estado_motor.equals(EstadoMotor.FRENANDO))
            estado = EstadoSCAV.APAGADO;
        
        setChanged();
        notifyObservers();
    }

}
