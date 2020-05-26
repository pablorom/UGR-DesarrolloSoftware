module FactoriaAbstracta_Prototipos_RUBY
  

  class Main

    def self.main()
      b = Bicicleta.new
      b1 = BicicletaCarretera.new(b)
      puts "\nID:" + b1.id
      puts b1.tipo
      puts b1.ttl
    end

  end

end

FactoriaAbstracta_Prototipos_RUBY::Main.main
