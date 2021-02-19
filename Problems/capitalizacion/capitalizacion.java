package capitalizacion;

import java.util.Scanner;

public class capitalizacion {

    public static void main(String[] args) {
        Scanner entrada_de_texto = new Scanner(System.in); //Librería para capturar el teclado 
        System.out.println("Escriba la palabra:");
        String s = entrada_de_texto.nextLine(); //entrada de texto por parte del usuario
        capitalizacion(s);// llamado a la función capitalización enviando el parámetro s.  
    }

    public static void capitalizacion(String t) { //creación de la función para el desarrollo del algoritmo

        String texto_inicial = t.substring(0, 1); //con substring se divide la variable String en subconjuntos, en texto inicial se guarda la primer letra de la palabra.
        String texto_final = t.substring(1, t.length());//aquí el texto final toma el resto de la palabra.

        texto_inicial = texto_inicial.toUpperCase();//la variable que contiene la primer letra la convierte a Mayúscula
        t = texto_inicial + texto_final; //en la varibale t se almacena la suma de las dos variables.
        System.out.println("Modificación: " + t);// Se muestra por consola la suma de t.
    }

}