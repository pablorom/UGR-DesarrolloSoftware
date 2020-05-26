package controlVelocidad;

import controlVelocidad.Filtros.Filtro;

/**
 *
 * @author pablorobles
 */
public class GestorFiltros {
    CadenaFiltros cadenaFiltros;
    
    
    public GestorFiltros(Objetivo ob) {
        cadenaFiltros = new CadenaFiltros(ob);
    }
    
    
    public void setFiltro(Filtro f) {
        cadenaFiltros.añadirFiltro(f);
    }
    
    
    /**
     * Propaga la petición a la cadena de filtros.
     * 
     * @param estado 
     */
    public void filtrarPeticion(EstadoMotor estado) {
        cadenaFiltros.ejecutar(estado);
    }
}
