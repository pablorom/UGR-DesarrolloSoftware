module FactoriaAbstracta_Prototipos_RUBY
  
  class BicicletaCarretera < Bicicleta

    #Variable de clase
    @@count = 0

    attr_accessor :prototype

    def initialize(prototype)
      @prototype = prototype
      @@count += 1 
      @tipo = Tipo::CARRETERA
      @id = @@count
    end

  end
  
end
