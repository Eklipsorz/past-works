
//Code_Author: Shou Liang Sun
//Date: 11/5
//Subject : DES


#include "DESTool.h"

void Initial_Permutation(unsigned char * str,unsigned char * returnAns)
{
	unsigned char cp=str[0];
	unsigned char TempStr[64]={'\0'};
	unsigned char SortStr[64]={'\0'};
	int i,j=0;
	for(i=0;i<64;i++)
	{
		if(i>0&&i%8==0)
		{
			cp=str[++j];
		}
			TempStr[i]=(0x80&cp)/0x80;
			cp<<=1;

	}
	
	for(i=0;i<64;i++)
	{
		returnAns[i]=TempStr[InitialPermutation_Table[i]-1];
		
	}
	
}
void GetSplitFrame(unsigned char * FullFrame,unsigned char * frame1,unsigned char * frame2)
{
	
	int i;
	for(i=0;i<64;i++)
	{
		if(i<32)
			frame1[i]=FullFrame[i];
		else if(i>=32)
			frame2[i-32]=FullFrame[i];

	}


}

void FunctionToBox(unsigned char * ReturnAns,unsigned char * rtemp,int MRoundX)
{
	int MRoundY,BRoundX,BRoundY,count,row,Column,temp1,temp2;
	unsigned char extended[48]={'\0'},WaitforSBOX[8][6]={'\0'},ColumnTemp[2]={'\0'},RowTemp[4]={'\0'};
	unsigned char copy[32]={'\0'};
	for(MRoundY=0;MRoundY<48;MRoundY++)
	{
	extended[MRoundY]=rtemp[ExtendedPermutation_Table[MRoundY]-1];
	WaitforSBOX[MRoundY/6][MRoundY%6]=Keynumber[MRoundX][MRoundY]^extended[MRoundY];
	
	}


		
	      for(BRoundY=count=0;BRoundY<8;BRoundY++)
	      {
		for(BRoundX=0,row=Column=0;BRoundX<6;BRoundX++)
		{	
			if(BRoundX==0||BRoundX==5)
				ColumnTemp[Column++]=WaitforSBOX[BRoundY][BRoundX];
			else
				RowTemp[row++]=WaitforSBOX[BRoundY][BRoundX];

		}
		
		
		temp1=BinaryToTen(ColumnTemp,2);
		temp2=BinaryToTen(RowTemp,4);

		

		TenToBinary(ReturnAns+count,S_BOX[BRoundY][temp1][temp2],4);
		count+=4;

	      }

		for(BRoundX=0;BRoundX<32;BRoundX++)
		{
			
		copy[BRoundX]=ReturnAns[P_BOX[BRoundX]-1];
		}
		printf("\n");
		unsignedstrcpy(ReturnAns,copy,32);


	     
}

int main()
{
	unsigned char secureWord[64]={'\0'},SboxReturn[32]={'\0'},rtemp[32]={'\0'},ltemp[32]={'\0'};
	unsigned char WaitForFinalPer[64]={'\0'},Finaltext[64]={'\0'};
	unsigned char NewrightKey[32]={'\0'},copy[32]={'\0'};
	unsigned char test[]="security";
	int MRoundX,MRoundY;
	Keygen();

	Initial_Permutation(test,secureWord);
	GetSplitFrame(secureWord,ltemp,rtemp);

	int x;
	
	for(x=0;x<16;x++)
	{	
	unsignedstrcpy(copy,rtemp,32);
	FunctionToBox(SboxReturn,rtemp,x);
	if(x<9)
		printf("chiphertext of the round 0%d: ",x+1);
	else
		printf("chiphertext of the round %d: ",x+1);
	for(MRoundX=0;MRoundX<32;MRoundX++)
	{
			
	rtemp[MRoundX]=ltemp[MRoundX]^SboxReturn[MRoundX];			

	}
	unsignedstrcpy(ltemp,copy,32);	
	
	showKey(ltemp,32);
	showKey(rtemp,32);
	}
	
	for(MRoundX=0;MRoundX<64;MRoundX++)
	{
		if(MRoundX<32)
		WaitForFinalPer[MRoundX]=ltemp[MRoundX];
		else
		WaitForFinalPer[MRoundX]=rtemp[MRoundX-32];
	}
		printf("\nFP:");	
	for(MRoundX=0;MRoundX<64;MRoundX++)
	{
			Finaltext[MRoundX]=WaitForFinalPer[FinalPermutation_Table[MRoundX]-1];
	}
	showKey(Finaltext,64);
	printf("\n");


	return 0;
}

