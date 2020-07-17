package Painter;
import java.io.Serializable;
import java.awt.Point;
import java.awt.Color;

public class Line implements Serializable
{
	private Point start;
	private Point end;
	private Color foreColor;

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




}
