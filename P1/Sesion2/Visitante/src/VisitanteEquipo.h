#ifndef VISITANTEEQUIPO_H
#define VISITANTEEQUIPO_H

class Bus;
class Disco;
class Tarjeta;

class VisitanteEquipo {


public:
    virtual ~VisitanteEquipo() = default;
    
    virtual void visitarBus(const Bus &) = 0;
    virtual void visitarDisco(const Disco &) = 0;
    virtual void visitarTarjeta(const Tarjeta &) = 0;
};

#endif
