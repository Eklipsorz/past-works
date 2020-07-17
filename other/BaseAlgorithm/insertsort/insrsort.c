
void insrsort(int *Array, int size)
{

	int i, j, temp;


	for (i = 1 ;i < size;i++)
	{
		temp = Array[i];

		for (j = i; j > 0 && Array[j - 1] > temp; j--)
			Array[j] = Array[j - 1];
		
		Array[j] = temp;
	}


}
