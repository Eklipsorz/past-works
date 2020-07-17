package Painter;

import javax.swing.JButton;
import javax.swing.JPanel;
import java.awt.Point;
import java.awt.Color;
import java.awt.BorderLayout;
import java.awt.FlowLayout;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import java.awt.event.MouseMotionAdapter;
import java.awt.event.MouseMotionListener;


public class ToolBar extends JPanel {
	MainWindows parent=null;
	JButton exitBtn=null;
	JButton UndoBtn=null;
	JButton RedoBtn=null;
	JButton DrawLineBtn=null;
    	JButton stopDrawBtn=null;
	JButton FreeDrawBtn=null;
	JButton CreateObjectBtn=null;
	ToolBar(MainWindows p)
	{
		parent=p;
		this.setLayout(new FlowLayout(FlowLayout.LEFT));
		this.setBackground(Color.red);
		 exitBtn=new JButton("Exit");
		 FreeDrawBtn = new JButton("FreeDraw");
		 DrawLineBtn = new JButton("Draw Lines");
		 UndoBtn = new JButton("Undo");
	         RedoBtn = new JButton("Redo");
		 stopDrawBtn = new JButton("Stop Draw");
		 CreateObjectBtn=new JButton("CreateObject");
		//MouseListener -> Interface , if you want to let classA use classB ,you got to need implements
		//But You need to write its method, this is , you need to define to your method
		//
		//

		DrawLineBtn.addMouseListener(
		new MouseAdapter()
		{
			public void mouseClicked(MouseEvent e)
			{
			//	parent.parent.drawlines=true;
				parent.parent.status =Status.drawLine;
				parent.parent.sharp=parent.parent.sharp.LINE;		
				//System.out.println(parent.parent.sharp.getSharp());	
				ToolBar.this.DrawLineBtn.setEnabled(false);
				ToolBar.this.stopDrawBtn.setEnabled(true);
				ToolBar.this.FreeDrawBtn.setEnabled(true);
			}

		}

		);
		
		stopDrawBtn.addMouseListener(
		new MouseAdapter()
		{
			public void mouseClicked(MouseEvent e)
			{
			//	parent.parent.drawlines=false;
				
				parent.parent.status =Status.idle;
				ToolBar.this.DrawLineBtn.setEnabled(true);
				ToolBar.this.stopDrawBtn.setEnabled(false);
				ToolBar.this.FreeDrawBtn.setEnabled(true);
				ToolBar.this.parent.page.lp=new Point(-1,-1);
			}

		}
		);

		FreeDrawBtn.addMouseListener(
		new MouseAdapter()
		{
			
			public void mouseClicked(MouseEvent e)
			{
						
				parent.parent.status =Status.freeDraw;
						
				parent.parent.sharp=parent.parent.sharp.FREE;		
				//System.out.println(parent.parent.sharp.getSharp());	
				ToolBar.this.FreeDrawBtn.setEnabled(false);
				ToolBar.this.DrawLineBtn.setEnabled(true);
				ToolBar.this.stopDrawBtn.setEnabled(true);
			}

		}
					
		);
		UndoBtn.addMouseListener(
			new MouseAdapter()
			{
				
				//parent.page.repaint();
				StackInfo temp;
				public void mouseClicked(MouseEvent e)
				{
					RedoBtn.setEnabled(true);	
					parent.parent.tempStatus=parent.parent.status;
					parent.parent.status=Status.undo;
					if(!parent.parent.UndoStack.empty())
					{
						temp = (StackInfo)parent.parent.UndoStack.pop();
						switch(temp.getType())
						{
							case FREE:
								parent.parent.Panceil.remove(parent.parent.Panceil.size()-1);
							break;						
							case LINE:
								parent.parent.vLine.remove(parent.parent.vLine.size()-1);
							break;

						}
						parent.parent.RedoStack.push(temp);	 
					}
					
					parent.page.repaint();


				}

			}


		);
			
		RedoBtn.addMouseListener(
			new MouseAdapter()
			{
				public void mouseClicked(MouseEvent e)
				{
					StackInfo temp;	
					parent.parent.tempStatus=parent.parent.status;
					parent.parent.status=Status.redo;
					UndoBtn.setEnabled(true);	
					if(!parent.parent.RedoStack.empty())
					{
						temp = (StackInfo)parent.parent.RedoStack.pop();
						switch(temp.getType())
						{
							case FREE:
								parent.parent.Panceil.add(temp.getLine());
							break;						
							case LINE:
								parent.parent.vLine.add(temp.getLine());
							break;

						}
						parent.parent.UndoStack.push(temp);	 
					}
					
					parent.page.repaint();
				}
			}
		);


		CreateObjectBtn.addMouseListener(
			new MouseAdapter()
			{
				public void mouseClicked(MouseEvent e)
				{
					parent.parent.status=Status.createOBJ;
				}
			}
		);



		 /* mouseClicked -> Interface -> abstract class extends  Interface
		  * So You can add the new before adding the method to do it
		  */
		
		this.stopDrawBtn.setEnabled(false);
		this.UndoBtn.setEnabled(false);

		this.RedoBtn.setEnabled(false);
		exitBtn.addMouseListener(new MyMouseListenerAdvanced());
		this.add(DrawLineBtn);
		this.add(FreeDrawBtn);
		this.add(CreateObjectBtn);
		this.add(stopDrawBtn);
		this.add(UndoBtn);
		this.add(RedoBtn);
		this.add(exitBtn);// add button to panel



	}


}

