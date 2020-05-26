#ifndef EQUIPO_H
#define EQUIPO_H

#include "Bus.h"
#include "Disco.h"
#include "Tarjeta.h"

class Equipo {

    
private:
    Bus bus;
    Disco disco;
    Tarjeta tarjeta;
    

public:
    Equipo(Bus b, Disco d, Tarjeta t);

    void aceptar(VisitanteEquipo &) const;
};

#endif
