
import java.util.*;
import java.lang.*;

public class ByteSub {
//{{{
//
	private int leader;
	public int []coef;
	public int []poly;
//}}}
/*****************************************************/
//# {{{
//
    ByteSub()
    {
	leader=0;
	poly=new int[9];
    	coef=new int[9];
  
    }

    public void setLeader(int l)
    {
		leader=l;
    }
   
    public int getLeader()
    {
	return leader;
    }
	
    public void copyPoly(int []x)
    {
	System.arraycopy(x,0,poly,0,poly.length);
  	SetCoef();
    }
    
    public void SetCoef()
    {
	int []clear={0,0,0,0,0,0,0,0,0};

	System.arraycopy(clear,0,coef,0,coef.length);
	for(int i=0,count=0;i<9;i++)
	{
		if(poly[i]==1)
		{
			coef[count++]=9-i;
		}
	}
    }
    public void printPoly()
    {
	for(int i=0;i<poly.length;i++)
		System.out.print(poly[i]);
	System.out.println();

    }


    //# }}}	
/*****************************************************/
//# {{{
    public static void main(String[] args) {
	ByteSub n=new ByteSub();	
    	ByteSub inputByteSub=new ByteSub();    
	Scanner sc = new Scanner(System.in);
       	String input = sc.next();
	int [] inputToHex=new int[9];       	
	int [] Moder={1,0,0,0,1,1,0,1,1};
    	n.copyPoly(Moder);  	
        
        convert(input,inputToHex);                     // 16 to 2        
	inputByteSub.copyPoly(inputToHex);
	FindInverse(n,inputByteSub);          //find the inverted element
        
    }
/// #}}}
//***************************************************//
///{{{
    public static void multiply(ByteSub Ans,ByteSub x,ByteSub y)
	{
		int i,j;
		int []clear={0,0,0,0,0,0,0,0,0};

		ByteSub temp=new ByteSub();
		Ans.copyPoly(clear);
		for(i=0;i<9&&x.coef[i]>0;i++)
		{
			temp.copyPoly(clear);
			
			for(j=0;j<y.coef.length;j++)
			{

				if(y.coef[j]>0)
				{
					temp.poly[8-(x.coef[i]+y.coef[j]-2)]=1;
				}
				else
				 	 break;
			}
			for(j=0;j<9;j++)
			{
				Ans.poly[j]=Ans.poly[j]^temp.poly[j];
			}
	
		}

	}
///}}}
//***************************************************//Find the inverted element
  ///{{{
  	public static void FindInverse(ByteSub m, ByteSub b) {    
	
	int []ConstantOnetoA={0,0,0,0,0,0,0,0,1};	
	int []ConstantOnetoB={0,0,0,0,0,0,0,0,1};	
	int []temp=new int[9];
        int []clear={0,0,0,0,0,0,0,0,0};
	int inverse=0;
	System.arraycopy(m.poly,0,temp,0,temp.length);
	ByteSub multiplied=new ByteSub();
	ByteSub quotient=new ByteSub();	
	ByteSub []T=new ByteSub[3];
     	ByteSub []A=new ByteSub[3];
	ByteSub []B=new ByteSub[3];
	
	for(int i=0;i<3;i++)
	{
		T[i]=new ByteSub();
		A[i]=new ByteSub();
		B[i]=new ByteSub();
	}
		

	A[0].copyPoly(ConstantOnetoA);
	A[2].copyPoly(temp);
	B[1].copyPoly(ConstantOnetoB);
	B[2].copyPoly(b.poly);

	while(B[2].coef[0]>1)
	{

		quotient.copyPoly(clear);
                multiplied.copyPoly(clear);
                
		Division(A[2],B[2],quotient);//m->remainder,b->mod	

		multiply(multiplied,quotient,B[0]);
		for(int i=0;i<9;i++)
		{
			T[0].poly[i]=A[0].poly[i]^multiplied.poly[i];
		}
			T[0].SetCoef();
		multiply(multiplied,quotient,B[1]); 
		for(int i=0;i<9;i++)
		{
			T[1].poly[i]=A[1].poly[i]^multiplied.poly[i];	
		}
		T[1].SetCoef();
		T[2].copyPoly(A[2].poly);

		A[0].copyPoly(B[0].poly);
		A[1].copyPoly(B[1].poly);
		A[2].copyPoly(B[2].poly);
	
		
		B[0].copyPoly(T[0].poly);
		B[1].copyPoly(T[1].poly);
		B[2].copyPoly(T[2].poly);


	}
	if(B[2].coef[0]>0)
		finalConvert(B[1]);	
	else if(B[2].coef[0]==0)
		finalConvert(B[2]);
    }
///}}}
//***************************************************// modify polynomial
//{{{  
    public static void Division(ByteSub x, ByteSub y,ByteSub q) {    
    	int []clear={0,0,0,0,0,0,0,0,0};
	int x_leader=x.coef[0];
	int y_leader=y.coef[0];
	ByteSub multipTemp=new ByteSub();
	ByteSub temp=new ByteSub();

	while(y_leader>1&&x_leader>=y_leader)
	{
		temp.copyPoly(clear);

		multipTemp.copyPoly(y.poly);
		q.poly[8-(x_leader-y_leader)]=1;
		for(int i=0;i<x_leader-y_leader;i++)
		{
			for(int j=0;j<8;j++)
			{
				multipTemp.poly[j]=multipTemp.poly[j+1];
			}
			multipTemp.poly[8]=0;
		}
		for(int i=0;i<9;i++)
		{
			temp.poly[i]=multipTemp.poly[i]^x.poly[i];
		}
		x.copyPoly(temp.poly);
		x_leader=x.coef[0];
	}
	if(x_leader==0)
		x.poly[x.poly.length-1]=0;
	q.SetCoef();
    }
//}}} 
 //*****************************************************//16 to 2    
//# {{{
    public static void convert(String x,int [] ToHex){
 	    
        int[][] BinaryTab = 
	{
	{0,0,0,0},{0,0,0,1},{0,0,1,0},{0,0,1,1},{0,1,0,0},{0,1,0,1},{0,1,1,0},{0,1,1,1},
	{1,0,0,0},{1,0,0,1},{1,0,1,0},{1,0,1,1},{1,1,0,0},{1,1,0,1},{1,1,1,0},{1,1,1,1},
	};  //transfer the binary table

	int leftmost=x.length()>1?Character.getNumericValue(x.charAt(0)):0;
	int rightmost=x.length()>1?Character.getNumericValue(x.charAt(1)):Character.getNumericValue(x.charAt(0));

	
	for(int copy=0;copy<4;copy++)
	{
		ToHex[copy+1]=BinaryTab[leftmost][copy];
	}
	
	for(int copy=0;copy<4;copy++)
	{
		ToHex[copy+5]=BinaryTab[rightmost][copy];
	}
		System.out.println();

    }
// }}}
//******************************************************//transfer final output to      

	public static void finalConvert(ByteSub EuclidAns)
	{
		System.out.print("inverted element:");
		EuclidAns.printPoly();
		int []temp=new int[9];
		int []tempAnswer=new int[9];
		int [][]table=
		{
			{1,0,0,0,1,1,1,1},
			{1,1,0,0,0,1,1,1},
			{1,1,1,0,0,0,1,1},
			{1,1,1,1,0,0,0,1},
			{1,1,1,1,1,0,0,0},
			{0,1,1,1,1,1,0,0},
			{0,0,1,1,1,1,1,0},
			{0,0,0,1,1,1,1,1}
		};
		int []xortable={1,1,0,0,0,1,1,0};
		for(int i=0;i<8;i++)
		{
			for(int j=0;j<8;j++)
			{
				temp[j]=table[i][j]&EuclidAns.poly[8-j];	
			}

			for(int j=0;j<8;j++)
			{
				tempAnswer[i]=tempAnswer[i]^temp[j];		
			}
		}
			System.out.print("ByteSub element: ");
		for(int i=7;i>=0;i--)
		{
			
			System.out.print(tempAnswer[i]^xortable[i]);

		}

		System.out.println();



	}
 }
