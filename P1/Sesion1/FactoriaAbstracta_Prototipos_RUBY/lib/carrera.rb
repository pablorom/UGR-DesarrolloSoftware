class Carrera
  
  #Variable de clase
  @@duracion = 15
  
  attr_accessor :tipo, :porcentaje_abandono, :bicicletas, :duracion
  
  def initialize(bicis)
    @bicicletas = Array.new(bicis)
  end
  
  def comenzarCarrera()
    puts "\nLa carrera de tipo #{@tipo} ha comenzado"
    for bici in @bicicletas
      puts "\nLa bicicleta #{@bici.id} ha comenzado la carrera"
    end
  end
  
  def to_s
    puts "\nCarrera de tipo #{@tipo}"
  end
  
end
