#ifndef DISCO_H
#define DISCO_H

#include "ComponenteEquipo.h"

class Disco : public ComponenteEquipo {

    
public:
    Disco(string n, double p);
    
    void aceptar(VisitanteEquipo &) const;
};

#endif
