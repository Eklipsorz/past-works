package Painter;

import java.awt.Dimension;
import javax.swing.JFrame;
import java.awt.BorderLayout;

public class MainWindows extends JFrame
{
	Dimension size;
	ToolBar tbar;
	Page page;
	Painter parent=null;
	
	MainWindows(Painter p ,String s,Dimension size)
	{

		
		super(s);
		parent=p;
		this.size=size;
		/*
		 * default The window is invisible 
		 * So Finally,You got to add method "setVisible(boolean) " to show the Window.
		 * Just write setVisible(true) 
		 */

		this.setDefaultCloseOperation(EXIT_ON_CLOSE);
		/*
		 * Add a button to Exit.
		 */
		setSize(this.size.width,this.size.height);
		/*
		 * Set the Window size. setSize -> javax.swing.JFrame method
		 */
		Dimension scrsize=java.awt.Toolkit.getDefaultToolkit().getScreenSize();
		/*
		 * Get the current screen size. Dimension -> java.awt.Dimension
		 */
		setLocation(scrsize.width/2-this.size.width/2,scrsize.height/2-this.size.height/2);
		/* 
		 * Move Window to CENTER. setLocation -> javax.swing.JFrame method
		 */
		/*
		 *
		 * JButton -> javax.swing.JButton
		 *
		 */

		/* btn1.addMouseListener ( MouseListener l ) ; // view action of the mouse 
		 * btn1.addMouseListener ( new MouseAdapter());
		 *
		 * btn1.addMouseListener(
		 *
		 * new MouseAdapter()
		 * {
		 *  	public void mouseClicked(MouseEvent e)//System Variable 
		 *  	{
		 * 		System.out.println("Click"+e.getX()+":"+e.getY());
		 *  	}
		 *
		 * }
		 *);
		 * import java.awt.event.MouseAdapter;
		 */ 

			tbar=new ToolBar(this);
			page=new Page(this);
		
		getContentPane().setLayout(new BorderLayout());	
		/* 
		 * getContentPane.setLayout(new BorderLayout()) => Setting the new ContentPane and its Layout
		 * Return ContentPane Container and its property information.
		 * 
		 * new BorderLayout => Constructs a new border layout with no gaps between components.
		 * Return BorderLayout
		 *
		 *
		 * public Container getContentPane(Container contentPane)
		 * BorderLayout -> java.awt.BorderLayout;
		 */
		//getContentPane().add(page,BorderLayout.CENTER);
		  add(BorderLayout.CENTER,page);
		  add(BorderLayout.NORTH,tbar);
		//getContentPane().add(tbar,BorderLayout.NORTH);		
	
		/* 
		 *
		 *
		 *
		 */

		
		setVisible(true);
		
	}


}
