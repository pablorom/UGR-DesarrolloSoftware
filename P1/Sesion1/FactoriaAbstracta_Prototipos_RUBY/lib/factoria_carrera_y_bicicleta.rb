module FactoriaAbstracta_Prototipos_RUBY

  class FactoriaCarreraYBicicleta

    attr_accessor :_prototipoCarreraMontana, 
                  :_prototipoCarreraCarretera, 
                  :_prototipoBicicletaCarretera,
                  :_prototipoBicicletaMontana

    def initialize
      @_prototipoCarreraMontaña = CarreraMontana.new
      @_prototipoCarreraCarretera   = CarreraCarretera.new
      @_prototipoBicicletaCarretera = BicicletaCarretera.new
      @_prototipoBicicletaMontaña   = BicicletaMontana.new
    end


    def crearCarrera(n, tipo)
      if(tipo == Tipo::CARRETERA)
          return _prototipoCarreraCarretera.clone();
      else
          return _prototipoCarreraMontana.clone();
      end
    end

    def crearBicicleta(tipo)
      if(tipo == Tipo::CARRETERA)
          return _prototipoBicicletaCarretera.clone();
      else
          return _prototipoBicicletaMontana.clone();
      end
    end

  end

end