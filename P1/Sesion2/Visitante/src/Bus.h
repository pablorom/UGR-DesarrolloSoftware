#ifndef BUS_H
#define BUS_H

#include "ComponenteEquipo.h"

class Bus : public ComponenteEquipo {


public:
    Bus(string n, double p);
    
    void aceptar(VisitanteEquipo &) const;
};

#endif
