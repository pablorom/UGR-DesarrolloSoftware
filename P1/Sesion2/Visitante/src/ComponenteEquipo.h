#ifndef COMPONENTEEQUIPO_H
#define COMPONENTEEQUIPO_H

#include <string>
using namespace std;

class VisitanteEquipo;


class ComponenteEquipo {
    
private:
    const string nombre;
    const double precio;
    
protected:
    ComponenteEquipo(string n, double p);
    
public:
    virtual ~ComponenteEquipo() = default;
    
    virtual void aceptar(VisitanteEquipo &) const = 0;
    
    double getPrecio() const;
    string getNombre() const;
};

#endif
