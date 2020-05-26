#include "VisitantePrecio.h"
#include "Bus.h"
#include "Disco.h"
#include "Tarjeta.h"

float VisitantePrecio::obtenerPrecioTotal() const {
    return total;
}

void VisitantePrecio::setCliente(const TipoCliente & cliente) {
    descuento = cliente*0.01;
    total = 0;
    //return descuento;
}

void VisitantePrecio::visitarBus(const Bus & bus) {
    total += (bus.getPrecio() - descuento*bus.getPrecio());
}

void VisitantePrecio::visitarDisco(const Disco & disco) {
    total += (disco.getPrecio() - descuento*disco.getPrecio());
}

void VisitantePrecio::visitarTarjeta(const Tarjeta & tarjeta) {
    total += (tarjeta.getPrecio() - descuento*tarjeta.getPrecio());
}