class CarreraMontana < Carrera
  
  def initialize(bicis)
    super(bicis)
    @porcentaje_abadono = 0.2 
    @tipo = Tipo::MONTANA
  end

end
