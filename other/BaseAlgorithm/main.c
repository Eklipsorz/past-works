#include "main.h"

int main()
{
	int test[10] = {8, 100, 4, 9, 6, 3, 5, 2, 7, 0};
	int i;


	qksort(test, 0 , 9);

	printf("After getPivot function\n");
	for (i = 0; i < 10; i++)
		printf("%d\n", test[i]);
}
