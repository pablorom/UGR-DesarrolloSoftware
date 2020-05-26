package controlVelocidad;

import java.util.Observable;

/**
 *
 * @author pablorobles
 */
public class Objetivo extends Observable {
    /* Práctica 1: Interceptor */
    private double velocidad, distancia_recorrida, distancia_reciente; 
    private int RPM;
    private EstadoMotor estado;
    private final float R = 0.15f;
    /* Práctica 2: SCAV */
    final int MAX_COMBUSTIBLE   = 75;
//    final int MAX_ACEITE        = (int) (5 * Math.pow(10, 6));
//    final int MAX_FRENOS        = (int) (Math.pow(10, 8));
//    final int MAX_REVISION      = (int) (Math.pow(10, 9));
<<<<<<< HEAD
    final int MAX_ACEITE        = 10;
    final int MAX_FRENOS        = 15;
    final int MAX_REVISION      = 20;
=======
    
    final int MAX_ACEITE        = (int) (5 * Math.pow(10, 2));
    final int MAX_FRENOS        = (int) (Math.pow(10, 3));
    final int MAX_REVISION      = (int) (2 * Math.pow(10, 3));
    
>>>>>>> e3dac43ef3f9c08dcfebe54936c6137d5b7830e1
    double combustible, consumo;
    int rotaciones;
    long timestamp_previo;
    int rots_aceite, rots_frenos, rots_revision;

    
    public Objetivo() {
        velocidad = distancia_recorrida = distancia_reciente = consumo = 0;
        RPM = rotaciones = rots_aceite = rots_frenos = rots_revision = 0;
//         repostar();
<<<<<<< HEAD
        combustible = 0.2;
=======
        combustible = 0;
>>>>>>> e3dac43ef3f9c08dcfebe54936c6137d5b7830e1
    }


    
    void ejecutar(int revoluciones, EstadoMotor estadoMotor) {
        estado = estadoMotor;       // Actualizar estado del motor
        RPM    = revoluciones;      // Actualizar Velocidad Angular
        actualizarCombustible();    // Actualizar combustible
        actualizarRotacionesEje();  // Actualizar rotaciones
        setVelocidadLineal();       // Calcular Velocidad Lineal
        setDistanciaRecorrida();    // Calcular Distancia recorrida

        if(estado == EstadoMotor.APAGADO)
            distancia_reciente = 0;
        
        // System.out.println("\nPeticion: " + estado.name() );
        // System.out.println("RPM: " + RPM );
        // System.out.println("Vel.: " + velocidad );
        // System.out.println("Distancia: " + distancia_recorrida );
        // System.out.println("Rotaciones eje: " + rotaciones );
        // System.out.println("Combustible: " + getCombustible() + " l");
        
        // Notificar observadores (GUI) para actualicen su estados
        this.setChanged();
        this.notifyObservers();
    }
    
    /**************************/
    /******* SETTERS **********/
    /**************************/
        
    private void setVelocidadLineal() {
        velocidad = 2 * Math.PI * R * RPM * (60*0.00075);
    }
    
    private void setDistanciaRecorrida() {
        double distancia = velocidad * 0.00015;
        
        distancia_recorrida += distancia;
        distancia_reciente  += distancia;
    }
    
    private void actualizarCombustible() {
        consumo = RPM * Math.pow(10, -6);
        combustible = Math.max(0, combustible - consumo);
        // System.out.println("Consumo: " + getConsumo() + " l/100Km");
        
        if (combustible <= 0)
            this.estado = EstadoMotor.APAGADO;
    }
    
    private void actualizarRotacionesEje() {
        long timestamp = System.currentTimeMillis();
        int rots_timestamp = (int) (RPM/60 * (timestamp - timestamp_previo)/1000);
        rotaciones += rots_timestamp;
        timestamp_previo = timestamp;
        
        rots_aceite += rots_timestamp;
        rots_frenos += rots_timestamp;
        rots_revision += rots_timestamp;
        // System.out.println("Aceite|Frenos|Revision: " + rots_aceite+"|"+rots_frenos+"|"+rots_revision);
    }
    
    /**
     * Rellena en depósito a una cantidad aleatoria entre la mitad y el 100% de
     * la capacidad del depósito
     */
    public void repostar() {
        combustible = MAX_COMBUSTIBLE*0.5 + Math.random()*MAX_COMBUSTIBLE*0.5;
    }
    
    public void cambiarAceite() {   rots_aceite = 0;    System.out.println("Aceite cambiado: " + rots_aceite );}
    public void cambiarFrenos() {   rots_frenos = 0;    System.out.println("Frenos cambiado: " + rots_frenos );}
    public void hacerRevision() {   rots_revision = 0;  System.out.println("Revisión realizada: " + rots_revision );}
    
    /**************************/
    /******* GETTERS **********/
    /**************************/
    
    /**
     * Al ser un objeto Observable, los observadores (las clases que implementan 
     * la interfaz visual en nuestro caso) puede obtener este objeto en el
     * método update(). Teniendo la referencia a este objeto pueden llamar a los
     * getters para obtener la información que necesiten y actualizar su estado.
     */
    
    public int getRPM() {
        return RPM;
    }
    
    public EstadoMotor getEstadoMotor() {
        return estado;
    }

    public double getVelocidad() {
        return velocidad;
    }

    public double getDistanciaRecorrida() {
        return distancia_recorrida;
    }
   
    public double getDistanciaReciente() {
        return distancia_reciente;
    }
    
    public double getCombustible() {
        return (double)Math.round(combustible * 100d)/100d;
    }
    
    public double getConsumo() {
        return (double)Math.round(consumo*1500 * 100d)/100d;
    }
    
    public boolean necesitaRevision() {
        return rots_revision >= MAX_REVISION;
    }
    
    public boolean necesitaCambiarAceite() {
        return rots_aceite >= MAX_ACEITE;
    }
    
    public boolean necesitaCambiarFrenos() {
        return rots_frenos >= MAX_FRENOS;
    }
}
