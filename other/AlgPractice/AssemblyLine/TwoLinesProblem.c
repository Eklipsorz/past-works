#include <stdio.h>
#include <stdlib.h>
#define NumOfLineLevel 6 
#define NumOfResults NumOfLineLevel+1

int EnterLineCost[2] = {2, 4};

int AsemblyCost[2][NumOfLineLevel] = { {7, 9, 3, 4, 8, 4}, \
				       {8, 5, 6, 4, 5, 7} };

int TransCost[2][NumOfLineLevel] = { {2, 3, 1, 3, 4, 3}, \
				     {2, 1, 2, 2, 1, 2}};

int LeastCost[2][NumOfResults];
int Linemap[2][NumOfResults];

int CostCalcOfBestWay(int nlevel, int line)
{
	int Line1Cost, Line2Cost;
	int transfer1Cost, transfer2Cost;
	int MinCost;
	
	
	if (LeastCost[0][nlevel-1] == -1)
		Line1Cost = CostCalcOfBestWay(nlevel-1, 0);
	else
		Line1Cost = LeastCost[0][nlevel-1];

	if (LeastCost[1][nlevel-1] == -1)
		Line2Cost = CostCalcOfBestWay(nlevel-1, 1);
	else
		Line2Cost = LeastCost[1][nlevel-1];


	if (nlevel == NumOfLineLevel)
	{
		Line1Cost = Line1Cost + TransCost[0][nlevel-1];
		Line2Cost = Line2Cost + TransCost[1][nlevel-1];
	}
	else
	{
		transfer1Cost = (line == 0 ? 0 : TransCost[0][nlevel-1]);
		transfer2Cost = (line == 1 ? 0 : TransCost[1][nlevel-1]);	
		
		Line1Cost = Line1Cost + transfer1Cost + AsemblyCost[line][nlevel];
		Line2Cost = Line2Cost + transfer2Cost + AsemblyCost[line][nlevel];
	}

	if (Line1Cost > Line2Cost)
	{
		Linemap[line][nlevel] = 1;
		MinCost = Line2Cost;
	}
	else
	{
		Linemap[line][nlevel] = 0;
		MinCost = Line1Cost;
	}

	LeastCost[line][nlevel] = MinCost;
	return MinCost;

}


void print_linemap(int lastline)
{
	int line,i;
	int n = NumOfLineLevel;

	line = lastline;
	printf("line%d, station%d\n", line+1, n);	

	for (i = n-1; i >= 1; i--)
	{
		line = Linemap[line][i];	
		printf("line%d, station%d\n", line+1, i);
	}
}

void reverse_print_linemap(int nlevel, int line)
{

	if (nlevel == 0)
		return;

	reverse_print_linemap(nlevel-1, Linemap[line][nlevel]);	

	printf("line%d, station%d\n",Linemap[line][nlevel] + 1, nlevel);

}

int main()
{
	int i,j;
	int lastline,n;

	for (j = 0; j < 2; j++)
	{
		for ( i = 0; i < NumOfLineLevel; i++)
		{
			LeastCost[j][i] = -1;
			Linemap[j][i] = 0;
		}
	}


	LeastCost[0][0] = AsemblyCost[0][0] + EnterLineCost[0];
	LeastCost[1][0] = AsemblyCost[1][0] + EnterLineCost[1]; 

	n = NumOfLineLevel;

	lastline = (Linemap[0][n] > Linemap[1][n] ? Linemap[1][n] : Linemap[0][n]);
	
	CostCalcOfBestWay(n, 1);
	
	printf("before reversing\n");

	print_linemap(lastline);

	printf("------------------------------\n");

	printf("after reversing\n");

	reverse_print_linemap(n, lastline);
	
	return 0;
}
