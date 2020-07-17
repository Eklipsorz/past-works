


int binsearch(int target, int *Array, int size)
{

	int middle, left, right;

	left = 0;
	right = size - 1;

	while (right <= left)
	{
		middle = (right + left)/2;

		if (Array[middle] > target)
			right = middle - 1; 
		else if (Array[middle] < target)
			left = middle + 1;
		else
			return 1;
	}


	return 0;

}

