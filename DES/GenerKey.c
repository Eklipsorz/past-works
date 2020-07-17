//Code_Author: Shou Liang Sun
//Date: 11/5
//Subject : DES
#include "DESTool.h"

unsigned char generedKey[64]={'\0'};
unsigned char InitialKey[56]={'\0'};
unsigned char LeftKey[28]={'\0'};
unsigned char RightKey[28]={'\0'};
unsigned char Keynumber[16][48]={'\0'};
int Shiftround=0;
void showHalfKey(unsigned char *Key)
{

	int view=0;
	for(;view<56;view++)
	{
	
		if(view==0)
			printf("KL%d: ",Shiftround);
		else if(view==28)
			printf("\nKR%d: ",Shiftround);



		if(view<28)
		{

			if(view>0&&(view)%8==0)
				printf(" ");
		}
		else
		{
				if(view!=28&&(view-4)%8==0)
					printf(" ");

		}

				
			printf("%d",InitialKey[view]);
		
	}
	printf("\n");
	Shiftround++;
}

void generKey_Initial_Permutation(unsigned char * Key)
{
	unsigned char cp=Key[0];
	unsigned char sortKey[64]={'\0'};
	int i,j=0;
	
	printf("Primitive Key: ");
	for(i=0;i<56;i++)
	{
		if((i)>0&&i%8==0)
		{
			cp=Key[++j];
			printf(" ");
		}
		
		
		generedKey[i]=(0x80&cp)/0x80;
		cp<<=1;
		printf("%d",generedKey[i]);
	}
		printf("\n");	

	for(i=0,j=0;i<64;i++)
	{
		if((i+1)%8==0)
		{	
			sortKey[i]=0;
			j++;
		}
		else
		{
			sortKey[i]=generedKey[i-j];
		}


	}

	
	OddPerityCheck(sortKey);
	printf("OddPerityCheck : ");
	showKey(sortKey,64);
	printf("\n");	


	for(i=0;i<56;i++)
	{
		InitialKey[i]=sortKey[DES_KP[i]-1];
		
	}
		showHalfKey(InitialKey);


}


void OddPerityCheck(unsigned char * A)
{
	int i;
	
	unsigned char B[64];

	unsignedstrcpy(B,A,64);
	for(i=0;i<64;i++)
	{
		if((i+1)%8==0)
		{
			A[i]=0x01^B[i-1];
			
		}
		else
		{ 
			B[i+1]=B[i+1]^B[i];
		}

		


	}

		
	
}
void GenerKey_number()
{

	int i=0,j;

	for(i=0;i<28;i++)
	{		
		LeftKey[i]=InitialKey[i];
	
		
	}

	for(;i<56;i++)
	{
		RightKey[i-28]=InitialKey[i];


		
	}

// Left Shift:
	
	for(i=0;i<16;i++)
	{
		Left_Shift(LeftKey,DES_LeftShiftStep[i]);
		Left_Shift(RightKey,DES_LeftShiftStep[i]);
		for(j=0;j<56;j++)
		{
			if(j<28)
				InitialKey[j]=LeftKey[j];
			
			else
				InitialKey[j]=RightKey[j-28];
			
		}

			if(i==0)
			{
				showHalfKey(InitialKey);
				printf("\n");
			}

		for(j=0;j<48;j++)
		{
			Keynumber[i][j]=InitialKey[DES_CP[j]-1];
		}


	}








}

void Left_Shift(unsigned char * A,int count)
{
	int i,j,swap;

	for(i=0;i<count;i++)
	{
		swap=A[0];
		for(j=1;j<28;j++)
		{
			A[j-1]=A[j];

		}
		A[j-1]=swap;

	}


}



void Keygen()
{
	unsigned char test[]="science";
	generKey_Initial_Permutation(test);	
	GenerKey_number();
	int x,y;
	for(x=0;x<16;x++)
	{
		if(x<9)
			printf("The Key of Round 0%d: ",x+1);
		else
			printf("The Key of Round %d: ",x+1);

		for(y=0;y<48;y++)
		{
			if(y>0&&y%8==0)printf(" ");
			printf("%d",Keynumber[x][y]);
		}
		printf("\n");
		

	}




}
