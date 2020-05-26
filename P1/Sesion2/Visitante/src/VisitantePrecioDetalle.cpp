#include <iostream>

#include "VisitantePrecioDetalle.h"
#include "Bus.h"
#include "Disco.h"
#include "Tarjeta.h"

void VisitantePrecioDetalle::visitarBus(const Bus & b) {
    cout << "Bus: " << b.getNombre() << " - (" << b.getPrecio() << "€)\n";
}

void VisitantePrecioDetalle::visitarDisco(const Disco & d) {
    cout << "Disco: " << d.getNombre() << " - (" << d.getPrecio() << "€)\n";
}

void VisitantePrecioDetalle::visitarTarjeta(const Tarjeta & t) {
    cout << "Tarjeta: " << t.getNombre() << " - (" << t.getPrecio() << "€)\n";
}
