package prototipo;

public class FactoriaCarreraYBicicleta {

    private static CarreraMontaña      _prototipoCarreraMontaña;
    private static CarreraCarretera    _prototipoCarreraCarretera;
    private static BicicletaCarretera  _prototipoBicicletaCarretera;
    private static BicicletaMontaña    _prototipoBicicletaMontaña;

    
    /**
     * 
     */
    FactoriaCarreraYBicicleta() {
        _prototipoCarreraMontaña     = new CarreraMontaña(null);
        _prototipoCarreraCarretera   = new CarreraCarretera(null);
        _prototipoBicicletaCarretera = new BicicletaCarretera();
        _prototipoBicicletaMontaña   = new BicicletaMontaña();
    }
    
    
    /**
     * 
     * @param n
     * @param tipo
     */
    Carrera crearCarrera(int n, Tipo tipo) {
        if(tipo == Tipo.CARRETERA)
            return _prototipoCarreraCarretera.clone();
        else
            return _prototipoCarreraMontaña.clone();
    }

    
    /**
     * 
     * @param tipo
     */
    Bicicleta crearBicicleta(Tipo tipo) {
        // TODO - implement FactoriaCarreraYBicicleta.crearBicicleta
        throw new UnsupportedOperationException();
    }

}