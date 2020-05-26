#include "Disco.h"
#include "VisitanteEquipo.h"

/**
 * Constructor
 */
Disco::Disco(string n, double p) : ComponenteEquipo(n,p) {}


void Disco::aceptar(VisitanteEquipo & visitante) const {
    visitante.visitarDisco(*this);
}
