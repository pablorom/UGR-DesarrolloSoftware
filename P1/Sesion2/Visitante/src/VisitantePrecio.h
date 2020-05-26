#ifndef VISITANTEPRECIO_H
#define VISITANTEPRECIO_H

#include "VisitanteEquipo.h"
#include "TipoCliente.h"

class VisitantePrecio : public VisitanteEquipo {
    

public:
    float obtenerPrecioTotal() const;
    void setCliente(const TipoCliente &);

    void visitarBus(const Bus &);
    void visitarDisco(const Disco &);
    void visitarTarjeta(const Tarjeta &);
    
private:
    float total; 
    float descuento;
};

#endif
