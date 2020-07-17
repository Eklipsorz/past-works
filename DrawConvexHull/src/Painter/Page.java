
package Painter;
import java.util.ArrayList;
import java.io.Serializable;
import java.awt.Dimension;
import java.awt.Point;
import javax.swing.JButton;
import java.awt.Rectangle;
import java.awt.Color;
import javax.swing.JPanel;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.awt.event.MouseMotionAdapter;
import java.awt.event.MouseMotionAdapter;
import java.lang.Math;
import java.awt.Image;
import java.awt.image.BufferedImage;
import java.awt.RenderingHints;

public class Page extends JPanel implements Serializable{

	MainWindows parent = null;
	Dimension dim;
 	// Graphics pen;
	Point lp;
	Rectangle rectangle;
	Point LineStart;
	Point LineEnd;
	Point ViewTemp;
	int page_width,page_height;
	int width,length;
	Graphics2D screenbf;
	BufferedImage buffer;
	
	Page(MainWindows p)
	{
	
		parent=p;
		setSize(760,512);
		setPreferredSize(new Dimension(760,512));
		dim=getSize();
		
		buffer=new BufferedImage(dim.width,dim.height,BufferedImage.TYPE_INT_ARGB);
		screenbf=buffer.createGraphics();
		screenbf.setRenderingHint(RenderingHints.KEY_ANTIALIASING,RenderingHints.VALUE_ANTIALIAS_ON);
	
		LineStart=new Point(-1,-1);
		LineEnd = new Point(-1,-1);
		ViewTemp = new Point(-1,-1);
		page_height=this.getHeight();
		page_width=this.getWidth();
		setBackground(new Color(255,255,255));
		setLayout(null);
	this.addMouseListener(
	new MouseAdapter()
	{
		
		
		public void mouseClicked(MouseEvent e)
		{
		}		
	
		public void mousePressed(MouseEvent e)
		{
			
			int x=e.getX();
			int y=e.getY();
			Status temp=parent.modeTo;
			screenbf.setPaintMode();
			screenbf.setColor(Color.black);
			screenbf.fillOval(x-2,y-2,5,5);
			if(temp==Status.grahamscan){
				parent.mode1.dotsfordraw.dots.add(new Point(x,y));	
				repaint();
			}
			else if(parent.modeTo==Status.linetoangle)
			{
				double r=2000;
				double x_angle,y_angle;
				double angle;

			screenbf.setColor(Color.RED);
			for(int i=0;i<=360;i++){
			
				angle=(360-i)*Math.PI/180;
				x_angle=r*Math.cos(angle);
				y_angle=r*Math.sin(angle);
				screenbf.setColor(new Color(i%256,i%256,i%256));
				screenbf.drawLine((int)(x+x_angle),(int)(y+y_angle),(int)(x-x_angle),(int)(y-y_angle));
				repaint();
			}		
		
			}
			

		}
		public void mouseEntered(MouseEvent e)
		{
		}
		public void mouseReleased(MouseEvent e)
		{

		}
	
	}

	);

	this.addMouseMotionListener(
	new MouseAdapter()
	{
		public void mouseDragged(MouseEvent e)
		{
		}

	}
	);

	}
	public void paintComponent(Graphics g)
	{
		g.clearRect(0,0,dim.width,dim.height);
		g.drawImage(buffer,0,0,null);
					
	}
}
