package GUI;


import java.io.IOException;
import java.util.ArrayList;
import observable.Temperatura;
import observador.BotonCambio;
import observador.GraficaTemperatura;
import observador.PantallaTemperatura;
import observador.TiempoSatelital;
import observador.Ventana;


/**
 *
 * @author alex
 */
public class Simulador {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws IOException {
        // Instanciación de observable
        Temperatura temperatura = new Temperatura();
        Temperatura temperatura2 = new Temperatura();
        Temperatura temperatura3 = new Temperatura();
        Temperatura temperatura4 = new Temperatura();
        Temperatura temperatura5 = new Temperatura();
        
        //Creamos las lista de temperaturas
        ArrayList <Temperatura> temperaturas = new ArrayList();
        temperaturas.add(temperatura);
        temperaturas.add(temperatura2);
        temperaturas.add(temperatura3);
        temperaturas.add(temperatura4);
        temperaturas.add(temperatura5);
        
        // Instanciación de observadores
        PantallaTemperatura pantalla = new PantallaTemperatura(temperatura);
        GraficaTemperatura grafica = new GraficaTemperatura(temperatura);
        BotonCambio boton = new BotonCambio(temperatura);
        TiempoSatelital  mapa = new TiempoSatelital(temperaturas);
        
        // Ventanas para cada observador
        Ventana ventana_grafica = new Ventana(grafica, "Gráfica temperatura");
        ventana_grafica.setLocation(200, 200);
        
        Ventana ventana_pantalla = new Ventana(pantalla, "Pantalla temperatura");
        ventana_pantalla.setLocation(200, 300);
        
        Ventana ventana_boton = new Ventana(boton, "Botón cambiar temperatura");
        ventana_boton.setLocation(200, 400);
        
        // Creacion de la ventana del mapa
        Ventana ventana_mapa = new Ventana(mapa, "Mapa Satélite");
        ventana_mapa.setLocation(500, 100);
        
        
        // Añadir los observadores al observable
        temperatura.addObserver(grafica);
        temperatura.addObserver(boton);
        temperatura.addObserver(mapa);
        temperatura2.addObserver(mapa);
        temperatura3.addObserver(mapa);
        temperatura4.addObserver(mapa);
        temperatura5.addObserver(mapa);
        
        
        // Lanzar las hebra de los observables
        temperatura.hebra.start();
        temperatura2.hebra.start();
        temperatura3.hebra.start();
        temperatura4.hebra.start();
        temperatura5.hebra.start();
        pantalla.hebra.start();
    }
    
}
