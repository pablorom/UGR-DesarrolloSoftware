class BicicletaMontana < Bicicleta
  
  #Variable de clase
  @@count = 0
  
  def initialize
    @@count += 1 
    @tipo = Tipo::MONTANA
    @id = @@count
  end
  
  
end
