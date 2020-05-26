import java.util.Scanner;

public class main {
    
    public static void main(String[] args) {

        // Recolectar número de participantes de la carrera
        System.out.print("Introduzca número de participantes por carrera: ");
        Scanner scanner = new Scanner(System.in);
        int n = scanner.nextInt();

        FactoriaCarretera cc = FactoriaCarretera.getInstance();
        FactoriaMontaña   cm = FactoriaMontaña.getInstance();
        
        cc.crearCarrera(n).start();
//        cm.crearCarrera(n).start();
    }

}