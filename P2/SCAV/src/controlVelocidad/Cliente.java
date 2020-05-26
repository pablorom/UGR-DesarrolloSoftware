
/******************************************************************************
 *  Clase:  Cliente
 *  Autor:    alex
 *
 *  Controlador del simulador. Recibe eventos y acciones desde la interfaz (GUI),
 * propagándolas a GestorFiltros para actualizar el estado del simulador.
 * 
 ******************************************************************************/
package controlVelocidad;

/**
 *
 * @author alex
 */
public class Cliente {
    private GestorFiltros gestor;

    
    public Cliente(GestorFiltros gestor) {
        this.gestor = gestor;
    }
    
    
    /**
     * Método de entrada al simulador desde la interfaz (GUI)
     * @param estado 
     */
    public void enviarPeticion(EstadoMotor estado) {
        gestor.filtrarPeticion(estado);
    }
    
}
