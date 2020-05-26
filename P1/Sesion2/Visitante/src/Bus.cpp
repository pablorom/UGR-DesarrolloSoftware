#include "Bus.h"
#include "VisitanteEquipo.h"

/**
 * Constructor
 */
Bus::Bus(string n, double p) : ComponenteEquipo(n,p) {}


void Bus::aceptar(VisitanteEquipo & visitante) const {
    visitante.visitarBus(*this);
}
