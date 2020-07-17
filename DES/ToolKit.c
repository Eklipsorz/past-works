
//Code_Author: Shou Liang Sun
//Date: 11/5
//Subject : DES


#include "DESTool.h"


void unsignedstrcpy(unsigned char * A,unsigned char * B,int length)
{
	
	int i;
	for(i=0;i<length;i++)
	{
		A[i]=B[i];
	}


}

void showKey(unsigned char *Key,int length)
{
	int i;
	for(i=0;i<length;i++)
	{
		printf("%d",Key[i]);
		if((i+1)%8==0)	
			printf(" ");
	}
	//printf("\n");
}

int BinaryToTen(unsigned char * str,int length)
{
	int number=0,count=0, power=length-1;
	for(;count<length;count++)
	{
		if(str[count]==1)
		{
					
			number+=(int)pow(2,(float)power);
		}
		power--;

	}
	return number;
}

void TenToBinary(unsigned char * str,int number,int length)
{
	int count=0,temp=length-1,powerNumber;
	for(;count<length;count++)
	{
		powerNumber=(int)pow((float)2,temp);
		if(number>=powerNumber)
		{
			number-=powerNumber;
			str[count]=1;
		}
		else
		{
			str[count]=0;
		}
		temp--;
	}
}

