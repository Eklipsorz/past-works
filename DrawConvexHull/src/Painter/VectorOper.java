package Painter;

import java.awt.Point;
import java.lang.Math;

public class VectorOper
{
	private Point start;
	private Point end;
	private Point Vertend;
	private double StartToEnd;
	private double VertendToStart;
	private double angle;
	private Point VectorToEnd;
	private Point VectorToVertend;
	VectorOper()
	{

	}
	VectorOper(Line temp)
	{
		start = temp.getStart();
		end = temp.getEnd();
		Vertend = new Point(start.x+10,start.y);
		StartToEnd=0;
		angle=0;
		VertendToStart=0;
		VectorToVertend=new Point(Vertend.x-start.x,0);
		VectorToEnd=new Point(end.x-start.x,end.y-start.y);

	}
	public void setStart(Point s)
	{
		start=s;
	}
	public void setEnd(Point l)
	{
		end=l;
		setVertend(start,end);
	}
	public void setVertend(Point s,Point l)
	{
		Vertend.x=l.x-s.x;
		Vertend.y=l.y;
	}

	public void setAngle(double ang)
	{
		angle=ang;
	}
	public double getCrossProduct()
	{
		double temp1=VectorToEnd.x*VectorToVertend.y-VectorToVertend.x*VectorToEnd.y;
		return temp1;
	}

	public double getStartToEnd()
	{
		double temp1=Math.pow(end.x-start.x,2);
		double temp2=Math.pow(end.y-start.y,2);
		StartToEnd=Math.sqrt(temp1+temp2);
		return StartToEnd;
	}
	public double getVertendToStart()
	{
		double temp1=Math.pow(Vertend.x-start.x,2);
		double temp2=Math.pow(Vertend.y-start.y,2);
		VertendToStart=Math.sqrt(temp1+temp2);
		return VertendToStart;
	}
	public double getStartToEnd(Point a,Point b)
	{
		double temp1=Math.pow(b.x-a.x,2);
		double temp2=Math.pow(b.y-a.y,2);
		StartToEnd=Math.sqrt(temp1+temp2);
		return StartToEnd;
	}
	public double getVertendToStart(Point a,Point b)
	{
		double temp1=Math.pow(b.x-a.x,2);
		double temp2=Math.pow(b.y-a.y,2);
		VertendToStart=Math.sqrt(temp1+temp2);
		return VertendToStart;
	}
	public Point getVectorToEnd()
	{
		return VectorToEnd;
	}
	public Point getVectorVertend()
	{
		return VectorToVertend;
	}

	public int getAngle(Point a,Point b)
	{
		
		Vertend = new Point(a.x+10,a.y);
		VertendToStart=0;
		VectorToVertend=new Point(Vertend.x-a.x,0);
		VectorToEnd=new Point(b.x-a.x,b.y-a.y);
		double temp1=getStartToEnd(a,Vertend);	
		double temp2=getStartToEnd(a,b);	
		double dotProduct=VectorToVertend.x*VectorToEnd.x+VectorToVertend.y*VectorToEnd.y;
		double temp=dotProduct/(temp1*temp2);
		if(temp==1)
			angle=0;
		else if(temp==-1)
			angle=180;
		else if((b.y-a.y)<0 && dotProduct==0)
			angle=90;
		else if((b.y-a.y)>0 && dotProduct==0)
			angle=270;	
		else
			angle=Math.toDegrees(Math.acos(temp));

		if( (VectorToEnd.x < 0 && VectorToEnd.y >0 ) || (VectorToEnd.x>0 && VectorToEnd.y>0))
		{	
			angle=360-angle;
		}
			return (int)(Math.round(angle));
	}

	public int getAngle()
	{
		double dotProduct=VectorToVertend.x*VectorToEnd.x+VectorToVertend.y*VectorToEnd.y;
		double temp=dotProduct/(getStartToEnd()*getVertendToStart());
		if(temp==1)
			angle=0;
		else if(temp==-1)
			angle=180;
		else if((end.y-start.y)<0 && dotProduct==0)
			angle=90;
		else if((end.y-start.y)>0 && dotProduct==0)
			angle=270;	
		else
			angle=Math.toDegrees(Math.acos(temp));

		if( (VectorToEnd.x < 0 && VectorToEnd.y >0 ) || (VectorToEnd.x>0 && VectorToEnd.y>0))
		{	
			angle=360-angle;
		}
			return (int)(Math.round(angle));
	}


};


