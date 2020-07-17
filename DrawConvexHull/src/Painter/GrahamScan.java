package Painter;


import java.util.ArrayList;
import java.util.Stack;
import java.awt.Point;
import java.lang.Boolean;
import java.lang.Integer;
import java.awt.Color;
import java.awt.Graphics2D;
public class GrahamScan
{
	Point startPoint;
 	MainWindows parent;
	ArrayList<Point> dots;
	Stack<Point> tempForDrawing;
	ArrayList<Line> tempForVector;
	VectorOper operate;
	HeapSort sortAngle;
	Graphics2D bfOnGram;
	Page PageOnGram;
	int Pagesize;
	GrahamScan(MainWindows p)
	{

		parent=p;
		PageOnGram=parent.page;
		bfOnGram=PageOnGram.screenbf;
		Pagesize=parent.page.dim.height;
		dots=new ArrayList<Point>();
		dots.add(new Point(-1,-1));
		tempForDrawing=new Stack<Point>();
			
		operate=new VectorOper();
		sortAngle=new HeapSort();
	}
	public void setEachLineOfAngle()
	{
		tempForVector=new ArrayList<Line>();
		tempForVector.add(new Line(new Point(-1,-1),new Point(-1,-1)));		
		Point temp;
		
		int angle;
		int directAngle=0;
		dots.remove(startPoint);
		

		for(int i=1,n=dots.size();i<n;i++)
		{
			temp=dots.get(i);
			angle=operate.getAngle(startPoint,temp);
			tempForVector.add(new Line(startPoint,temp,angle));
		}
			sortAngle.AfterSortForAngle(tempForVector);
		scan();		
	}
	public Boolean TurnOrDirect(Point a,Point b,Point c)//a->top b->nextTotop c->willbeTop
	{
		return ((b.x-a.x)*(-c.y+a.y)-(-b.y+a.y)*(c.x-a.x))>0;
	}

	public void scan()
	{
		
			this.tempForDrawing.push(startPoint);
			this.tempForDrawing.push(tempForVector.get(1).getEnd());
			this.tempForDrawing.push(tempForVector.get(2).getEnd());
			int order=tempForDrawing.size()-1;

			for(int i=3;i<tempForVector.size();i++,order=tempForDrawing.size()-1)
			{
					
	while(order>0&&!TurnOrDirect(tempForDrawing.get(order-1),tempForDrawing.get(order),tempForVector.get(i).getEnd())){
				tempForDrawing.pop();
					order=tempForDrawing.size()-1;			
	}
				tempForDrawing.push(tempForVector.get(i).getEnd());
			}
			


					bfOnGram.setColor(Color.orange);
			bfOnGram.drawLine(startPoint.x,startPoint.y,tempForDrawing.get(0).x,tempForDrawing.get(0).y);
					PageOnGram.repaint();
			for(int i=1,n=tempForDrawing.size();i<n;i++)
			{
				Point start=tempForDrawing.get(i-1);
				Point end=tempForDrawing.get(i);
				bfOnGram.drawLine(start.x,start.y,end.x,end.y);	
					PageOnGram.repaint();

			}
			bfOnGram.drawLine(tempForDrawing.get(tempForDrawing.size()-1).x,tempForDrawing.get(tempForDrawing.size()-1).y,startPoint.x,startPoint.y);
					PageOnGram.repaint();


	}







};
