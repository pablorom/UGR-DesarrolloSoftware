#include "ComponenteEquipo.h"

/**
 * Constructor
 */
ComponenteEquipo::ComponenteEquipo(string n, double p) : nombre(n), precio(p) {}


double ComponenteEquipo::getPrecio() const {
    return precio;
}


string ComponenteEquipo::getNombre() const {
    return nombre;
}
