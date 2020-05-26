package observador;

import java.util.Observable;
import observable.Temperatura;

/**
 *
 * @author alex
 */
public class GraficaTemperatura extends ObservadorTemperatura {

    /**
     * Constructor
     * @param t 
     */
    public GraficaTemperatura(Temperatura t) {
        super(t);
        initComponents();
    }

    
    @Override
    public String toString() {
        return "GraficaTemperatura: " + miTemperatura;
    }

    @Override
    public void update(Observable o, Object arg) {
        super.update(o, arg);
        this.progressBar.setValue((int) this.miTemperatura);
        
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        progressBar = new javax.swing.JProgressBar();

        setPreferredSize(new java.awt.Dimension(200, 30));
        setLayout(new java.awt.BorderLayout());

        progressBar.setMaximum(30);
        progressBar.setValue(5);
        progressBar.setPreferredSize(new java.awt.Dimension(500, 20));
        add(progressBar, java.awt.BorderLayout.CENTER);
    }// </editor-fold>//GEN-END:initComponents


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JProgressBar progressBar;
    // End of variables declaration//GEN-END:variables
}
