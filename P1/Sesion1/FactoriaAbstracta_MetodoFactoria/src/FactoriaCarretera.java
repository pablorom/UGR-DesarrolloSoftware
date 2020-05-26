import java.util.ArrayList;

public class FactoriaCarretera implements FactoriaCarreraYBicicleta {
     
    /**
     * Singleton
     */
    private static final FactoriaCarretera INSTANCE = new FactoriaCarretera();

    private FactoriaCarretera() {}
    
    public static FactoriaCarretera getInstance() {
        return INSTANCE;
    }
    
    /**
     * Implemetación de métodos de la 1nterfaz
     */
    
    /**
     * 
     * @param n
     * @return 
     */
    @Override
    public Carrera crearCarrera(int n) {
        ArrayList<Bicicleta> bicis = new ArrayList();
        
        for(int i=0; i<n; i++)
            bicis.add(crearBicicleta());
            
        return new CarreraCarretera(bicis);
    }

    /**
     * 
     * @return 
     */
    @Override
    public Bicicleta crearBicicleta() {
        return new BicicletaCarretera();
    }

}