#include "../main.h"
#define cutoff (3)

void swap(int *data1, int *data2)
{
	int temp;

	temp = *data2;
	*data2 = *data1;
	*data1 = temp;
}

int getPivot(int *Array, int Left, int Right)
{
	int Middle;

	Middle = (Left + Right)/2;

	if (Array[Left] > Array[Middle])
		swap(&Array[Left], &Array[Middle]);
	if (Array[Middle] > Array[Right])
		swap(&Array[Middle], &Array[Right]);
	if (Array[Left] > Array[Middle])
		swap(&Array[Left], &Array[Middle]);

	/* move pivot element to position next to last element 	*/
	/* and last element is bigger than pivot element 	*/
	swap(&Array[Middle], &Array[Right - 1]);



	return Array[Right - 1];
	
}

void qksort(int *Array, int Left, int Right)
{
	int pivot;
	int big, small;


		
	if (Left + cutoff <= Right)
	{
		pivot = getPivot(Array, Left, Right);
		big = Left;
		small = Right - 1;
		

		for (;;)
		{
			while (Array[++big] < pivot);
			while (Array[--small] > pivot);
			if (big < small)
				swap(&Array[big], &Array[small]);
			else
				break;
		}

		swap(&Array[big], &Array[Right - 1]);

		qksort(Array, Left, big - 1);
		qksort(Array, big + 1, Right);
	}
	else
		insrsort(Array+Left, (Right - Left) + 1);

}
