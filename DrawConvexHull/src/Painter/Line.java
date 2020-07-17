package Painter;
import java.io.Serializable;
import java.awt.Point;
import java.awt.Color;
import java.lang.Math;

public class Line implements Serializable
{
	private Point start;
	private Point end;
	public int Angle;
	public int distance;
	public int vector_x;
	public int vector_y;
	public Color foreColor;
	public Line(Point s,Point l,int a)
	{
		start=s;
		end=l;
		Angle=a;
		distance=(int)Math.round(Math.sqrt((Math.pow(l.x-s.x,2)+Math.pow(l.y-s.y,2))));	

	}
	public Line(Point s,Point l)
	{
		start=s;
		end=l;
	}
	public Line(Point s,Point l,Color color)
	{
		start=s;
		end=l;
		foreColor=color;
	}
	public Color getColor()
	{
		return foreColor;
	}
	public Point getStart()
	{
		return start;
	}
	public Point getEnd()
	{
		return end;
	}
	public void setAngle(int a)
	{
		Angle=a;
	}



}
