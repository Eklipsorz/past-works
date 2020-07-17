#include <stdio.h>
#include <stdlib.h>


void hanoi(char A, char B, char C, int n)
{

	if (n == 1)
	{
		printf("%c -> %c \n", A, C);
		return;
	}
	else if (n == 0)
		return;

	hanoi(A, C, B, n-1);
	hanoi(A, B, C, 1);
	hanoi(B, A, C, n-1);

}

int main()
{


	hanoi('A','B','C',3);

	return 0;
}
