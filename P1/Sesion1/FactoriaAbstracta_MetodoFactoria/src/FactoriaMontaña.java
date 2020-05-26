import java.util.ArrayList;

public class FactoriaMontaña implements FactoriaCarreraYBicicleta {

    /**
     * Singleton
     */
    private static final FactoriaMontaña INSTANCE = new FactoriaMontaña();

    private FactoriaMontaña() {}
    
    public static FactoriaMontaña getInstance() {
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
            
        return new CarreraMontaña(bicis);
    }

    /**
     * 
     * @return 
     */
    @Override
    public Bicicleta crearBicicleta() {
        return new BicicletaMontaña();
    }

}