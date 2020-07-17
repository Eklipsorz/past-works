
package Painter;
import java.util.Stack;
import java.util.Vector;
import java.awt.Dimension;
import java.awt.Rectangle;
enum Status{drawLine,freeDraw,undo,redo,createOBJ,idle};
enum Sharp{IDLE,FREE,LINE,RECT};

public class Painter
{
		
/*
public static enum Sharp{
	FREE(0),
	LINE(1);

	private final int number;
	Sharp(int number)
	{
		this.number=number;
	}
	
	public int getSharp(){return number;}
}
*/
//	boolean drawlines=false;
	public Status status = Status.idle;
	public Status tempStatus = Status.idle;
	public Sharp sharp=Sharp.FREE;
	
	Stack  <StackInfo>UndoStack;
	Stack  <StackInfo>RedoStack;
	Vector <Line>vLine;
	Vector <Line>Panceil;
	Vector <Rectangle>ObjRect;
	Painter()
	{
	UndoStack=new Stack<StackInfo>();
	RedoStack=new Stack<StackInfo>();
	vLine=new Vector<Line>();
	Panceil=new Vector<Line>();
	ObjRect=new Vector<Rectangle>();
	MainWindows w = new MainWindows(this,"test",new Dimension(500,600));
	}
}


