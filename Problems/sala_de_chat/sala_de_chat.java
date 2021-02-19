package sala_de_chat;

import java.util.Scanner;

public class sala_de_chat {

    public static void main(String[] args) {
        Scanner entrada_de_texto = new Scanner(System.in); //Librería para capturar el teclado 
        String s; //creación de variable String
        System.out.println("Escriba la hola:");
        s = entrada_de_texto.nextLine(); //entrada de texto por parte del usuario
        validar(s); // llamado a la función validar enviando el parámetro s.
    }

    public static void validar(String t) {
        String[] vector = t.split(""); //división de variable string en in vector

        int i = 0, t_vector, contador = 0; //creación de variables
        
        for (t_vector = 0; t_vector < vector.length; t_vector++) { //se utiliza el for para saber el tamaño del vector
        }
        while (vector[i].equals("h")||vector[i].equals("H")) { //Se compara el caracter en la posición i, y si es verdadero, se le va a sumar tanto a la variable i como al contador 
            contador++;
            i++;
        }

        while (vector[i].equals("o")||vector[i].equals("O")) { //Se compara el caracter en la posición i, y si es verdadero, se le va a sumar tanto a la variable i como al contador 
            contador++;
            i++;
        }
        while (vector[i].equals("l")||vector[i].equals("L")) { //Se compara el caracter en la posición i, y si es verdadero, se le va a sumar tanto a la variable i como al contador 
            contador++;
            i++;
        }
        while (vector[i].equals("a")||vector[i].equals("A")) { //Se compara el caracter en la posición i, y si es verdadero, se le va a sumar tanto a la variable i como al contador 
            contador++;
            i++;
            if (i == t_vector) {
                break;
            }
        }

        if (contador == t_vector) { //Si el resultado del contador con el tamaño del vector dan lo mismo, significa que cumple los parámetros. 
            System.out.println("Verdadero");
        } else {
            System.err.println("Falso");
        }
    }
}
