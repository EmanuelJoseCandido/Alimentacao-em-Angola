import java.util.Scanner;

public class Precos
{
	public static void main(String args[])
	{
		char c = 231, e = 233;;
		Scanner scan = new Scanner(System.in);
		double precoNormal, descontos, precoDescontado;
		
		System.out.print("Digite o pre" + c + "o: ");
		precoNormal = scan.nextDouble();
		
		System.out.print("Digite o percentual dos descontos: ");
		descontos = scan.nextDouble();
		
		precoDescontado = precoNormal - ((precoNormal * descontos) / 100);
		
		System.out.print("O pre" + c + "o descontado " + e + ": " + precoDescontado);
		
		
	}
}