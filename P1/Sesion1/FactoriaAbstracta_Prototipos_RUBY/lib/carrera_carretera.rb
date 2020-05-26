class CarreraCarretera < Carrera
  
  def initialize(bicis)
    super(bicis)
    @porcentaje_abadono = 0.1 
    @tipo = Tipo::CARRETERA
  end

end