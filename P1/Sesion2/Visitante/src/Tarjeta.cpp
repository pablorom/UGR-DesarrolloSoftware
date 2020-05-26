#include "Tarjeta.h"
#include "VisitanteEquipo.h"

/**
 * Constructor
 */
Tarjeta::Tarjeta(string n, double p) : ComponenteEquipo(n,p) {}


void Tarjeta::aceptar(VisitanteEquipo & visitante) const {
    visitante.visitarTarjeta(*this);
}