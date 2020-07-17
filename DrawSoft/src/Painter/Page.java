
package Painter;
import java.io.Serializable;
import java.awt.Dimension;
import java.awt.Point;
import javax.swing.JButton;
import java.awt.Rectangle;
import java.awt.Color;
import javax.swing.JPanel;
import java.awt.Graphics;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.awt.event.MouseMotionAdapter;
import java.awt.event.MouseMotionAdapter;
import java.lang.Math;




public class Page extends JPanel implements Serializable{

	MainWindows parent = null;
 	// Graphics pen;
	Point lp;
	Rectangle rectangle;
	Point LineStart;
	Point LineEnd;
	Point ViewTemp;
	int width,length;	
	Page(MainWindows p)
	{
		LineStart=new Point(-1,-1);
		LineEnd = new Point(-1,-1);
		ViewTemp = new Point(-1,-1);
		
		setBackground(Color.yellow);
		parent=p;
		setLayout(null);
	this.addMouseListener(
	new MouseAdapter()
	{
		
		public void mouseClicked(MouseEvent e)
		{
			if(parent.parent.status==Status.drawLine)
			{
				/*
				System.out.print("X="+e.getX()+" Y="+e.getY());
				if(lp.x!=-1){
				Graphics pen = Page.this.getGraphics();
				pen.setPaintMode();
			 	pen.setColor(Color.RED);
				pen.drawLine(lp.x,lp.y,e.getX(),e.getY());
				}
				lp=e.getPoint();
				//picture=g;	
				*/
			}

		}		
	
		public void mousePressed(MouseEvent e)
		{
			
			
			if(parent.parent.status==Status.freeDraw){			
				//lp=e.getPoint();
				LineStart=e.getPoint();
			}
			else if(parent.parent.status==Status.drawLine)
			{
				LineStart=e.getPoint();			
				/*x=e.getX();
				y=e.getY();*/
			}
			else if(parent.parent.status==Status.createOBJ)
			{
				LineStart=e.getPoint();		
			}

		}
		public void mouseReleased(MouseEvent e)
		{
			if(parent.parent.status==Status.freeDraw)
			{			
			 // do nothing
				
			}	
			else if(parent.parent.status==Status.drawLine)
			{
			//if(Page.this.pen==null)
			//	System.out.print("ERROR");
			
			LineEnd=e.getPoint();
			parent.parent.vLine.add(new Line(LineStart,LineEnd,Color.RED));		
			parent.parent.UndoStack.push(new StackInfo(parent.parent.sharp,new Line(LineStart,LineEnd,Color.RED)));
			parent.tbar.UndoBtn.setEnabled(true);
			}
			else if(parent.parent.status==Status.createOBJ)
			{
				
				Graphics pen = Page.this.getGraphics();
				pen.setPaintMode();
				pen.setColor(Color.RED);
				
				//System.out.println(e.getX()+","+e.getY());
				width=Math.abs(LineEnd.x-LineStart.x);
				length=Math.abs(LineEnd.y-LineStart.y);
				int x=0,y=0;
				x=LineEnd.x;
				y=LineStart.y;
				if(LineStart.x>x)
					LineStart.x=x;
				if(LineStart.y>y)
					LineStart.y=y;
				JButton addNewComponent=new JButton("Test");
				addNewComponent.setLocation(LineStart);
				addNewComponent.setSize(width,length);
				Page.this.add(addNewComponent);
				repaint();
				//addNewComponent.
				//pen.drawRect(LineStart.x,LineStart.y,width,length);
				//parent.parent.ObjRect.add(new Rectangle(LineStart.x,LineStart.y,width,length));		
				
			

			}

		}
	
	}

	);

	this.addMouseMotionListener(
	new MouseAdapter()
	{
		public void mouseDragged(MouseEvent e)
		{
			
			if(parent.parent.status==Status.drawLine){			
			
			ViewTemp=e.getPoint();

			}
			else if(parent.parent.status==Status.freeDraw)
			{
			
			
			//vLine.add(new Line(LineStart,LineEnd,Color.RED));		
		//	parent.parent.sharp=parent.parent.Sharp.FREE;		
			//Painter.sharp=Painter.Sharp.FREE;
			parent.parent.sharp=parent.parent.sharp.FREE;		
			Graphics pen = Page.this.getGraphics();
			pen.setPaintMode();
			pen.setColor(Color.RED);
			LineEnd=e.getPoint();
			pen.drawLine(LineStart.x,LineStart.y,LineEnd.x,LineEnd.y);
			
			
			parent.parent.Panceil.add(new Line(LineStart,LineEnd,Color.RED));		
			parent.parent.UndoStack.push(new StackInfo(parent.parent.sharp,new Line(LineStart,LineEnd,Color.RED)));

			parent.tbar.UndoBtn.setEnabled(true);
			
			parent.tbar.RedoBtn.setEnabled(true);
			LineStart=e.getPoint();
			
			}
			else if(parent.parent.status==Status.createOBJ)
			{
				LineEnd=e.getPoint();
			}
						
			repaint();
		}

	}
	);





	}
	public void paintComponent(Graphics g)
	{
		super.paintComponent(g);
			

		if(parent.parent.UndoStack.empty())
			parent.tbar.UndoBtn.setEnabled(false);
		else if(parent.parent.RedoStack.empty())
			parent.tbar.RedoBtn.setEnabled(false);



		for(int i=0;i<parent.parent.vLine.size();i++)
		{
			Point temp1=((Line)parent.parent.vLine.elementAt(i)).getStart();
			Point temp2=((Line)parent.parent.vLine.elementAt(i)).getEnd();
			g.setColor(((Line)parent.parent.vLine.elementAt(i)).getColor());
			g.drawLine(temp1.x,temp1.y,temp2.x,temp2.y);
		}
		
		for(int i=0;i<parent.parent.Panceil.size();i++)
		{
			Point temp1=((Line)parent.parent.Panceil.elementAt(i)).getStart();
			Point temp2=((Line)parent.parent.Panceil.elementAt(i)).getEnd();
			g.setColor(((Line)parent.parent.Panceil.elementAt(i)).getColor());
			g.drawLine(temp1.x,temp1.y,temp2.x,temp2.y);
		}
		for(int i=0;i<parent.parent.ObjRect.size();i++)
		{
				
			int temp1=(parent.parent.ObjRect.elementAt(i)).x;
			int temp2=(parent.parent.ObjRect.elementAt(i)).y;
			g.drawRect(temp1,temp2,(parent.parent.ObjRect.elementAt(i)).width,(parent.parent.ObjRect.elementAt(i)).height);
		}

				g.setColor(Color.RED);

				
		


			if(parent.parent.status==Status.drawLine)
			{			
				g.drawLine(LineStart.x,LineStart.y,ViewTemp.x,ViewTemp.y);
			}
			else if((parent.parent.status==Status.undo) || (parent.parent.status==Status.redo))
			{	
			   parent.parent.status=parent.parent.tempStatus;
			}
			else if(parent.parent.status==Status.createOBJ)
			{
				
				if((LineStart.x > LineEnd.x) && (LineStart.y>LineEnd.y))
					g.drawRect(LineEnd.x,LineEnd.y,Math.abs(LineEnd.x-LineStart.x),Math.abs(LineEnd.y-LineStart.y));
				else if(LineStart.x > LineEnd.x)
					g.drawRect(LineEnd.x,LineStart.y,Math.abs(LineEnd.x-LineStart.x),Math.abs(LineEnd.y-LineStart.y));	
				else if(LineStart.y > LineEnd.y)
					g.drawRect(LineStart.x,LineEnd.y,Math.abs(LineEnd.x-LineStart.x),Math.abs(LineEnd.y-LineStart.y));
				else
					g.drawRect(LineStart.x,LineStart.y,Math.abs(LineEnd.x-LineStart.x),Math.abs(LineEnd.y-LineStart.y));
			}
			
			 

	
	}

	public void showOutline(Dimension size,Point p)
	{
			
		Graphics g=this.getGraphics();
		g.setColor(Color.cyan);
		g.drawRect(p.x-3,p.y-3,size.width+6,size.height+6);

	}




}




