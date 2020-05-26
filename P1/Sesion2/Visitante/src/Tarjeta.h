#ifndef TARJETA_H
#define TARJETA_H

#include "ComponenteEquipo.h"

class Tarjeta : public ComponenteEquipo {


public:
    Tarjeta(string n, double p);
    
    void aceptar(VisitanteEquipo &) const;
};

#endif
