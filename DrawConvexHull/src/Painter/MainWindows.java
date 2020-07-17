package Painter;
import java.awt.Image;
import java.awt.Dimension;
import javax.swing.JFrame;
import javax.swing.JToolBar;
import java.awt.BorderLayout;
import java.awt.event.*;
import java.awt.Color;
import java.awt.GridBagLayout;
import java.awt.Window;
import java.awt.Point;
import java.util.ArrayList;
import java.awt.image.BufferedImage;
enum Status{grahamscan,linetoangle,continute};
public class MainWindows extends JFrame
{
	Dimension size;
	Page page;
	Painter parent=null;
	ConvexHull mode1;
	LineToAngle mode2;
	Status modeTo;

	MainWindows(Painter p ,String s,Dimension size)
	{

		super(s);
		parent=p;
		modeTo=Status.grahamscan;

		this.size=size;
		/*author = Shou-Liang-Sun
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
	//	System.out.printf("size = %d %d \n",scrsize.height,scrsize.width);
		/*
		 * Get the current screen size. Dimension -> java.awt.Dimension
		 */
		setResizable(false);
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
			this.addKeyListener(new KeyAdapter()
		 * import java.awt.event.MouseAdapter;
		*/
		//Entering=new Warning("test",100,100);
	//	Entering.setLocation(100,100);
		getContentPane().setLayout(new BorderLayout());	
		page=new Page(this);
		this.setFocusable(true);
		add(BorderLayout.CENTER,page);
		//  add(BorderLayout.CENTER,Entering);
		
		mode1=new ConvexHull(this);
		//  mode1.setLayout(new GridBagLayout());

		mode2=new LineToAngle(this);
		add(BorderLayout.SOUTH,mode1);
		mode2.setVisible(true);
		setVisible(true);

		this.addKeyListener(
			new KeyAdapter(){
				MainWindows parentFromThis=MainWindows.this;
				public void keyPressed(KeyEvent e)
				{
					int key=e.getKeyCode();
					if(key == KeyEvent.VK_1)
					{
						parentFromThis.remove(mode2);
		  				parentFromThis.add(BorderLayout.SOUTH,parentFromThis.mode1);
						parentFromThis.mode2.setVisible(false);
						parentFromThis.mode1.setVisible(true);
						parentFromThis.modeTo=Status.grahamscan;
						parentFromThis.setTitle("Mode: ConvexHull");
					}
					else if(key ==KeyEvent.VK_2)
					{
						parentFromThis.remove(mode1);
		  				parentFromThis.add(BorderLayout.SOUTH,parentFromThis.mode2);
						parentFromThis.mode1.setVisible(false);
						parentFromThis.mode2.setVisible(true);
						parentFromThis.modeTo=Status.linetoangle;
						parentFromThis.setTitle("Mode: LineToAngle");
						parentFromThis.page.repaint();
					}
					else if(key ==KeyEvent.VK_3)
					{
						int WidthTemp=parentFromThis.page.dim.width;
						int HeightTemp=parentFromThis.page.dim.height;
						parentFromThis.mode1.dotsfordraw=new GrahamScan(parentFromThis);
						parentFromThis.page.screenbf.setColor(new Color(255,255,255));
						parentFromThis.page.screenbf.fillRect(0,0,WidthTemp,HeightTemp);						parentFromThis.page.repaint();	
					}
				
				}

			}
			);
		this.addMouseListener(
			new MouseAdapter()
			{
				MainWindows parentFromThis=MainWindows.this;
				public void mousePressed(MouseEvent e)
				{
							System.out.println("123");	
							parentFromThis.setFocusable(true);	
							parentFromThis.mode1.X_coord_min.setFocusable(false);
							parentFromThis.mode1.X_coord_max.setFocusable(false);
							parentFromThis.mode1.Y_coord_min.setFocusable(false);
							parentFromThis.mode1.Y_coord_max.setFocusable(false);
							parentFromThis.mode1.DotsNumber.setFocusable(false);
				}
			}
		);
		
	}


}
