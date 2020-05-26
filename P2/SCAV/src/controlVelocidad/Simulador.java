package controlVelocidad;

import controlVelocidad.Filtros.FiltroCalcularRPM;
import controlVelocidad.Filtros.FiltroRozamiento;
import GUI.SalpicaderoSteelSeries;
import GUI.Ventana;
import GUI.Controles;
import GUI.MonitorMecanico.MonitorMecanico;
import GUI.SCAV.ControlesSCAV;
import controlAutomatico.ControlAutomatico;
import java.io.IOException;

/**
 *
 * @author pablorobles
 */
public class Simulador {
    /**
     * @param args the command line arguments
     * @throws java.io.IOException
     */
    public static void main(String[] args) throws IOException {

        Objetivo motor = new Objetivo();
        GestorFiltros gestor = new GestorFiltros(motor);
        Cliente controlador = new Cliente(gestor);
        
        /****/
        
        FiltroCalcularRPM filtro_velocidad = new FiltroCalcularRPM();
        FiltroRozamiento filtro_rozamiento = new FiltroRozamiento();
        gestor.setFiltro(filtro_velocidad);
        gestor.setFiltro(filtro_rozamiento);
        
        /****/
        
        SalpicaderoSteelSeries salpicadero = new SalpicaderoSteelSeries();
        salpicadero.setObjetivo(motor);
        salpicadero.setLocation(200, 200);
        Ventana ventana_salpicadero = new Ventana(salpicadero, "Salpicadero");
        
        /****/
        
        Controles controles = new Controles();
        controles.setControlador(controlador);
        controles.setLocation(200, 400);
        Ventana ventana_controles = new Ventana(controles, "Controles");
        
        /****/
        
        MonitorMecanico monitor = new MonitorMecanico();
        monitor.setObjetivo(motor);
        Ventana ventana_monitor = new Ventana(monitor, "Monitor Mecánico");
        
        /****/
        
        ControlAutomatico scav = ControlAutomatico.getInstancia(controles);
        scav.setObservable(motor);
        
        ControlesSCAV controles_scav = new ControlesSCAV();
        controles_scav.setObservable(scav);
        scav.addObserver(controles_scav);
        Ventana ventana_controles_scav = new Ventana(controles_scav, "Control Automático");
    }
}
