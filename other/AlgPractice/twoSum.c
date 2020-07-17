#include <stdio.h>
#include <stdlib.h>
#include <time.h>


typedef struct listnode *node;
typedef struct hashtable *hashtab;

typedef node lists;


struct listnode
{
	int value;
	int position;
	struct listnode *next;
};

struct hashtable
{
	int tableSize;
	lists Thelists;
};

hashtab createHashTab(int size)
{
	hashtab h;
	int i;

	h = (hashtab) malloc(sizeof(struct hashtable));

	h->tableSize = size;
	h->Thelists = (lists) malloc(sizeof(struct listnode)*size);

	for (i = 0; i < size; i++)
		h->Thelists[i].next = NULL;

	return h;
}

int hash(int key, int size)
{
	if (key < 0)
		key = -1 * key;
	
	return key%size;
}

int isExist(int value, hashtab h)
{
	int key;
	node temp = NULL;

	key = hash(value, h->tableSize);
	
	for (temp = h->Thelists[key].next; temp != NULL; temp = temp->next)
		if (temp->value == value)
			return temp->position;

	return -1;

}


void insert(int value, int index, hashtab h)
{
	int Exist;
	node temp = NULL;
	node head = NULL;
	Exist = isExist(value, h);

	{
		temp = (node)malloc(sizeof(struct listnode));
		head = &(h->Thelists[hash(value,h->tableSize)]);

		temp->value = value;
		temp->next = head->next;
		temp->position = index;
		head->next = temp;


	}




}

void showContent(hashtab h)
{

	int size, i;
	node temp;

	size = h->tableSize;

	for (i = 0; i < size; i++)
	{
		printf("list %d:\n", i);
		
		for (temp = h->Thelists[i].next; temp != NULL; temp = temp->next)
			printf("%d ", temp->value);
		printf("\n");

	}

}


int *twoSum(int *nums, int numSize, int target)
{
	int i, newNumSize = 0;
	int *ans = NULL;
	int temp, pos;

	hashtab h;


	h = createHashTab(10);

	for (i = 0; i < numSize; i++)
		insert(nums[i], i, h);


	for (i = 0; i < numSize; i++)
	{
		temp = target - nums[i];
		pos = isExist(temp, h);
		if (pos != -1 && temp != nums[i]) // need to be modified
		{
			ans = (int *) malloc(sizeof(int)*2);
			ans[0] = i;
			ans[1] = pos;
			break;
		}
	}


	free(h);

	return ans;
}



int main()
{
	int array[] = {3, 2, 4};
	int i, *ans;

	srand(time(NULL));

/*
	for (i = 0; i < 30; i++)
	{	
		array[i] = rand()%20 + 1 ;
		printf("%d ",array[i]);
	
	}

	printf("\n");
*/	
	ans = twoSum(array, 3, 6);	
	printf("%d %d\n",ans[0],ans[1]);
	
	return 0;
}
