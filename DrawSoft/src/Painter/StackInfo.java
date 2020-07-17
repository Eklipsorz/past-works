package Painter;

import java.io.Serializable;

public class StackInfo implements Serializable
{
	private Sharp StackType;
	private Line TempForLine;
	public StackInfo(Sharp Stype,Line Temp)
	{
		StackType=Stype;
		TempForLine=Temp;
	}
	public Sharp getType()
	{
		return StackType;
	}
	public Line getLine()
	{
		return TempForLine;
	}

}

