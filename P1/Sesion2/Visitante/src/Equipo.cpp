#include "Equipo.h"

/**
 * Constructor
 */
 Equipo::Equipo(Bus b, Disco d, Tarjeta t) : bus(b), disco(d), tarjeta(t) {}

/**
 * Método aceptar del patrón Visitante. Recibe al visitante en cuestión como 
 * parámetro y lo redirije a cada uno de los elementos que componen el equipo,
 * para que cada uno de ellos lo gestione de la forma correspondiente, en sus 
 * métodos aceptar.
 * 
 * @param ve
 */
void Equipo::aceptar(VisitanteEquipo & visitante) const {
    bus.aceptar(visitante);
    disco.aceptar(visitante);
    tarjeta.aceptar(visitante);
}
