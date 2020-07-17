package Painter;
import java.util.ArrayList;
import java.awt.Point;

public class HeapSort{

		public static int HeapSize;
		public static int DotsSize;	
		public static ArrayList<Integer> Heap;
		public static ArrayList<Point> Dots;
	HeapSort()
	{
		Heap=new ArrayList<Integer>();
		Dots=new ArrayList<Point>();
	}
	public void setHeapSize(int s)
	{
		HeapSize=s;
	}
	public  void HeapifyForYPoint(int i,ArrayList<Point> p)
	{

		int left=2*i;
		int right=2*i+1;
		int largest;
		Point temp;
		if(left<HeapSize && p.get(left).y>p.get(i).y)
			largest=left;
		else
			largest=i;
		if(right<HeapSize && p.get(right).y > p.get(largest).y)
			largest=right;

		if(largest!=i)
		{
			temp=p.get(largest);
			p.set(largest,p.get(i));
			p.set(i,temp);
			HeapifyForYPoint(largest,p);
		}


	}
	public Point AfterSortForYPoint(ArrayList<Point> p)
	{

		ArrayList<Point> SameDots=new ArrayList<Point>();
		SameDots.add(new Point(-1,-1));
		Point temp;
		setHeapSize(p.size());
		for(int i=HeapSize/2;i>0;i--)
		{
			HeapifyForYPoint(i,p);
		}
		
		for(int i=HeapSize-1;i>1;i--)
		{
			temp=p.get(1);
			p.set(1,p.get(HeapSize-1));
			p.set(HeapSize-1,temp);
			HeapSize-=1;
			HeapifyForYPoint(1,p);

		}
		
		SameDots.add(p.get(1)); 
	
		for(int i=2;i<p.size();i++)
		{
				if(p.get(p.size()-1).y==p.get(i).y)
					SameDots.add(p.get(i));
				else break;
		}
		if(SameDots.size()>2){
			SameDots.add(p.get(1)); 
			AfterSortForXPoint(SameDots);
			return SameDots.get(1);
		}
		else 
			return p.get(p.size()-1);
	}
	public void HeapifyForAngle(int i,ArrayList<Line> p)
	{
		int left=2*i;
		int right=2*i+1;
		int largest;
		Line temp;
		if(left<HeapSize && p.get(left).Angle>p.get(i).Angle)
			largest=left;
		else
			largest=i;
		if(right<HeapSize && p.get(right).Angle > p.get(largest).Angle)
			largest=right;
		if(largest!=i)
		{
			temp=p.get(largest);
			p.set(largest,p.get(i));
			p.set(i,temp);
			HeapifyForAngle(largest,p);
		}
	}
	public void AfterSortForAngle(ArrayList<Line> p)
	{
		Line temp;
		int angle;
		int subcount=0;
		setHeapSize(p.size());
			
		for(int i=HeapSize/2;i>0;i--)
		{
			HeapifyForAngle(i,p);
		}
		for(int i=HeapSize-1;i>1;i--)
		{
			temp=p.get(1);
			p.set(1,p.get(HeapSize-1));
			p.set(HeapSize-1,temp);
			HeapSize-=1;
			HeapifyForAngle(1,p);
		}
		for(int i=1;i<p.size()-1;i++)
		{
			if(p.get(i).Angle == p.get(i+1).Angle)
			{
				while(p.size()-i>1&&p.get(i).Angle ==p.get(i+1).Angle)
				{	
					if(p.get(i+1).distance>p.get(i).distance)		
						p.remove(i);
					else
						p.remove(i+1);
				}
			}
		}

	}
	public void HeapifyForXPoint(int i,ArrayList<Point> p)
	{
		int left=2*i;
		int right=2*i+1;
		int largest;
		Point temp;
		if(left<HeapSize && p.get(left).x>p.get(i).x)
			largest=left;
		else
			largest=i;
		if(right<HeapSize && p.get(right).x > p.get(largest).x)
			largest=right;

		if(largest!=i)
		{
			temp=p.get(largest);
			p.set(largest,p.get(i));
			p.set(i,temp);
			HeapifyForXPoint(largest,p);
		}
	}
	public void AfterSortForXPoint(ArrayList<Point> p)
	{
		Point temp;
		setHeapSize(p.size());
		for(int i=HeapSize/2;i>0;i--)
		{
			HeapifyForXPoint(i,p);
		}
		for(int i=HeapSize-1;i>1;i--)
		{
			temp=p.get(1);
			p.set(1,p.get(HeapSize-1));
			p.set(HeapSize-1,temp);
			HeapSize-=1;
			HeapifyForXPoint(1,p);

		}
	}
};
