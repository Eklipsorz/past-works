package Painter;
import java.util.regex.Pattern;
import java.lang.String;
import java.lang.Boolean;
import javax.swing.JButton;
import java.awt.Dimension;
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
import javax.swing.JMenu;
import javax.swing.JMenuItem;
import javax.swing.JTextField;
import java.awt.GridBagConstraints;
import java.awt.GridBagLayout;
import javax.swing.JLabel;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.awt.event.MouseMotionAdapter;
import java.awt.event.MouseMotionListener;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import javax.swing.JDialog;
import javax.swing.JFrame;
import javax.swing.event.AncestorEvent;
import javax.swing.event.AncestorListener;
import javax.swing.JOptionPane;
import java.util.ArrayList;
import java.awt.Dimension;
import java.awt.Graphics2D;
public class ConvexHull extends JPanel {
	MainWindows parent=null;
	
	JTextField X_coord_min;	
	JTextField X_coord_max;	
	JTextField Y_coord_min;	
	JTextField Y_coord_max;	
	JTextField DotsNumber;

	HeapSort operate;
	GrahamScan dotsfordraw;
	Page pageOnCon;
	Graphics2D DrawPage;	
	int PageSize;	
	int X_max_process;
	int X_min_process;
	int Y_max_process;
	int Y_min_process;
	int Dots_process;
	
	ConvexHull(MainWindows p)
	{
		super.setLayout(new FlowLayout(FlowLayout.LEFT));
		parent=p;
		pageOnCon=parent.page;
		DrawPage=pageOnCon.screenbf;
		setSize(760,68);
		setPreferredSize(new Dimension(760,68));
		PageSize=505;
		dotsfordraw=new GrahamScan(p);
		operate=new HeapSort();
		parent=p;
		JPanel toolbox=new JPanel(new GridBagLayout());
		toolbox.setBackground(new Color(128,128,255));
	/*************************************TextField*******************************/
		X_coord_max=new JTextField("Empty",14);
		X_coord_min=new JTextField("Empty",14);
		Y_coord_max=new JTextField("Empty",14);
		Y_coord_min=new JTextField("Empty",14);
		DotsNumber=new JTextField("Empty",14);



			X_coord_max.setFocusable(false);
			X_coord_min.setFocusable(false);
			Y_coord_max.setFocusable(false);
			Y_coord_min.setFocusable(false);
			DotsNumber.setFocusable(false);


	
		X_coord_max.setHorizontalAlignment(JTextField.CENTER);
		X_coord_min.setHorizontalAlignment(JTextField.CENTER);
		Y_coord_max.setHorizontalAlignment(JTextField.CENTER);
		Y_coord_min.setHorizontalAlignment(JTextField.CENTER);
		DotsNumber.setHorizontalAlignment(JTextField.CENTER);
		
		X_coord_max.setForeground(Color.black);
		X_coord_min.setForeground(Color.black);
		Y_coord_max.setForeground(Color.black);
		Y_coord_min.setForeground(Color.black);
		DotsNumber.setForeground(Color.black);


		GridBagConstraints gtoolbox=new GridBagConstraints();
		gtoolbox.gridx=1;
		gtoolbox.gridy=0;
		gtoolbox.gridwidth=1;
		gtoolbox.gridheight=1;
		gtoolbox.weightx=0;
		gtoolbox.weighty=0;
		gtoolbox.fill=GridBagConstraints.NONE;
		gtoolbox.anchor=GridBagConstraints.CENTER;
		toolbox.add(X_coord_min,gtoolbox);
		gtoolbox.gridx=1;
		gtoolbox.gridy=1;
		toolbox.add(X_coord_max,gtoolbox);
		gtoolbox.gridx=3;
		gtoolbox.gridy=0;
		toolbox.add(Y_coord_min,gtoolbox);
		gtoolbox.gridx=3;
		gtoolbox.gridy=1;
		toolbox.add(Y_coord_max,gtoolbox);
		gtoolbox.gridx=5;
		gtoolbox.gridy=0;
		toolbox.add(DotsNumber,gtoolbox);
		/*=============================== TextField Keyboard Action================================*/
			X_coord_min.addKeyListener(
			new KeyAdapter(){
				Page tempForPage=parent.page;
						public void keyReleased(KeyEvent e)
						{
							Pattern pattern=Pattern.compile("[0-9]*");
							String temp=X_coord_min.getText();
							int KeyCode=e.getKeyCode();
							int maxtemp=tempForPage.page_width-5;
							int tempint;
							int lengthOftemp=temp.length();
				
							if(lengthOftemp==0)
									return;
							else if(lengthOftemp>1&&temp.charAt(0)=='-')
							{
								String []SplitNumber=temp.split("-");

								if(!pattern.matcher(SplitNumber[1]).matches())
									return;
								tempint=0-Integer.parseInt(SplitNumber[1]);
							}
							else
							{
								if(!pattern.matcher(temp).matches())
									return;
								tempint=Integer.parseInt(temp);
							}
								if(tempint>=0 &&tempint<=maxtemp)
									return;
								else
								{
								
									String message="[ 0 - " +Integer.toString(maxtemp) +" ]";
									X_coord_min.setText(message);	
								}
								
						}
					}
				);
			X_coord_max.addKeyListener(
			new KeyAdapter(){
				Page tempForPage=parent.page;
						public void keyReleased(KeyEvent e)
						{
							Pattern pattern=Pattern.compile("[0-9]*");
							String temp=X_coord_max.getText();
							int KeyCode=e.getKeyCode();
							int maxtemp=tempForPage.page_width-5;
							int tempint;
							int lengthOftemp=temp.length();
							if(lengthOftemp==0)
									return;
							else if(lengthOftemp>1&&temp.charAt(0)=='-')
							{
								String []SplitNumber=temp.split("-");

								if(!pattern.matcher(SplitNumber[1]).matches())
									return;
								tempint=0-Integer.parseInt(SplitNumber[1]);
							}
							else
							{
								if(!pattern.matcher(temp).matches())
									return;
								tempint=Integer.parseInt(temp);
							}
								if(tempint>=0 &&tempint<=maxtemp)
									return;
								else
								{
								
									String message="[ 0 - " +Integer.toString(maxtemp) +" ]";
									X_coord_max.setText(message);	
								}
						}
					}
				
				);
			Y_coord_min.addKeyListener(
			new KeyAdapter(){
				Page tempForPage=parent.page;
						public void keyReleased(KeyEvent e)
						{
							Pattern pattern=Pattern.compile("[0-9]*");
							String temp=Y_coord_min.getText();
							int maxtemp=tempForPage.page_height-7;
							int KeyCode=e.getKeyCode();
							int tempint;
							int lengthOftemp=temp.length();
							if(lengthOftemp==0)
									return;
							else if(lengthOftemp>1&&temp.charAt(0)=='-')
							{
								String []SplitNumber=temp.split("-");

								if(!pattern.matcher(SplitNumber[1]).matches())
									return;
								tempint=0-Integer.parseInt(SplitNumber[1]);
							}
							else
							{
								if(!pattern.matcher(temp).matches())
									return;
								tempint=Integer.parseInt(temp);
							}
								
								if(tempint>=0 &&tempint<=maxtemp)
									return;
								else
								{
								
									String message="[ 0 - " +Integer.toString(maxtemp) +" ]";
									Y_coord_min.setText(message);	
								}
						}
					}
				
				);
			Y_coord_max.addKeyListener(
			new KeyAdapter(){
				Page tempForPage=parent.page;
						public void keyReleased(KeyEvent e)
						{
							Pattern pattern=Pattern.compile("[0-9]*");
							String temp=Y_coord_max.getText();
							int KeyCode=e.getKeyCode();
							int maxtemp=tempForPage.page_height-7;
							int tempint;
							int lengthOftemp=temp.length();
							if(lengthOftemp==0)
									return;
							else if(lengthOftemp>1&&temp.charAt(0)=='-')
							{
								String []SplitNumber=temp.split("-");

								if(!pattern.matcher(SplitNumber[1]).matches())
									return;
								tempint=0-Integer.parseInt(SplitNumber[1]);
							}
							else
							{
								if(!pattern.matcher(temp).matches())
									return;
								tempint=Integer.parseInt(temp);
							}
								
								if(tempint>=0 &&tempint<=maxtemp)
									return;
								else
								{
								
									String message="[ 0 - " +Integer.toString(maxtemp) +" ]";
									Y_coord_max.setText(message);	
								}
						}
					}
				
				);
	
	

			DotsNumber.addKeyListener(
			new KeyAdapter(){
						public void keyReleased(KeyEvent e)
						{
							Pattern pattern=Pattern.compile("[0-9]*");
							String temp=DotsNumber.getText();
							int KeyCode=e.getKeyCode();
							int tempint;
							int lengthOftemp=temp.length();
							if(lengthOftemp==0)
									return;
							else if(lengthOftemp>1&&temp.charAt(0)=='-')
							{
								String []SplitNumber=temp.split("-");

								if(!pattern.matcher(SplitNumber[1]).matches())
									return;
								tempint=0-Integer.parseInt(SplitNumber[1]);
							}
							else
							{
								if(!pattern.matcher(temp).matches())
									return;
								tempint=Integer.parseInt(temp);
							}
								

								if(tempint>=0)
									return;
								else
								{
								
									String message="[ 0 - N ]";
									DotsNumber.setText(message);	
								}
						}
					}
				
				);
	/*=============================== TextField Mouse Action================================*/
		X_coord_max.addMouseListener(
			new MouseAdapter()
			{
				public void mouseEntered(MouseEvent e)
				{
					ConvexHull.this.X_coord_max.setFocusable(true);
				}

			}
		);
		X_coord_min.addMouseListener(
			new MouseAdapter()
			{
				public void mouseEntered(MouseEvent e)
				{
					ConvexHull.this.X_coord_min.setFocusable(true);
				}

			}
		);
		Y_coord_max.addMouseListener(
			new MouseAdapter()
			{
				public void mouseEntered(MouseEvent e)
				{
					ConvexHull.this.Y_coord_max.setFocusable(true);
				}

			}
		);
		Y_coord_min.addMouseListener(
			new MouseAdapter()
			{
				public void mouseEntered(MouseEvent e)
				{
					ConvexHull.this.Y_coord_min.setFocusable(true);
				}

			}
		);
		DotsNumber.addMouseListener(
			new MouseAdapter()
			{
				public void mouseEntered(MouseEvent e)
				{
					ConvexHull.this.DotsNumber.setFocusable(true);
				}

			}
		);
	/*=============================== label ====================================*/
		JLabel X_Min_label=new JLabel("X_coord_Min:");	
		JLabel X_Max_label=new JLabel("X_coord_Max:");
		JLabel Y_Min_label=new JLabel("Y_coord_Min:");	
		JLabel Y_Max_label=new JLabel("Y_coord_Max:");
		JLabel DotCount=new JLabel("Dots:");


		X_Max_label.setFocusable(false);
		X_Max_label.setFocusable(false);
		Y_Max_label.setFocusable(false);
		Y_Min_label.setFocusable(false);
		DotCount.setFocusable(false);

		gtoolbox.gridx=0;
		gtoolbox.gridy=0;
		toolbox.add(X_Min_label,gtoolbox);
		gtoolbox.gridx=0;
		gtoolbox.gridy=1;
		toolbox.add(X_Max_label,gtoolbox);
		gtoolbox.gridx=2;
		gtoolbox.gridy=0;
		toolbox.add(Y_Min_label,gtoolbox);
		gtoolbox.gridx=2;
		gtoolbox.gridy=1;
		toolbox.add(Y_Max_label,gtoolbox);

		gtoolbox.gridx=4;
		gtoolbox.gridy=0;
		toolbox.add(DotCount,gtoolbox);
	/*=============================== button  ====================================*/
		
		JButton EnterKey=new JButton("Enter");
		EnterKey.setPreferredSize(new Dimension(175,20));
		EnterKey.setFocusable(false);
		gtoolbox.gridx=5;
		gtoolbox.gridy=1;
		gtoolbox.gridwidth=1;
		toolbox.add(EnterKey,gtoolbox);

	/*=============================== Button Action====================================*/
		EnterKey.addMouseListener(
			new MouseAdapter()
			{
				ConvexHull parentFromCon=ConvexHull.this;
				public void mousePressed(MouseEvent e)
				{
					Pattern pattern=Pattern.compile("[0-9]*");
					String Xtempformax=parentFromCon.X_coord_max.getText();
					String Xtempformin=parentFromCon.X_coord_min.getText();
					String Ytempformax=parentFromCon.Y_coord_max.getText();
					String Ytempformin=parentFromCon.Y_coord_min.getText();
					String tempforDots=parentFromCon.DotsNumber.getText();
					String Errmessage="Error!! Please Debug following bugs：\n";
					int XtempMaxInt=0;
					int XtempMinInt=0;
					int YtempMaxInt=0;
					int YtempMinInt=0;
					int DotsNumberInt=0;

					if(Xtempformax.length()==0)
						Errmessage+="The value of X_coord_max is empty\n";
					if(Xtempformin.length()==0)
						Errmessage+="The value of X_coord_min is empty\n";
					if(Ytempformax.length()==0)
						Errmessage+="The value of Y_coord_max is empty\n";
					if(Ytempformin.length()==0)
						Errmessage+="The value of Y_coord_min is empty\n";
					if(tempforDots.length()==0)
						Errmessage+="The value of Dots is empty\n";

						
					if(!pattern.matcher(Xtempformax).matches())
						Errmessage+="Ths value of X_coord_max isn't numeric\n";
					else
						XtempMaxInt=Integer.parseInt(Xtempformax);
					if(!pattern.matcher(Xtempformin).matches())
						Errmessage+="Ths value of X_coord_min isn't numeric\n";
					else
						XtempMinInt=Integer.parseInt(Xtempformin);
					if(!pattern.matcher(Ytempformax).matches())
						Errmessage+="Ths value of Y_coord_max isn't numeric\n";
					else
						YtempMaxInt=Integer.parseInt(Ytempformax);
					if(!pattern.matcher(Ytempformin).matches())
						Errmessage+="Ths value of Y_coord_min isn't numeric\n";
					else
						YtempMinInt=Integer.parseInt(Ytempformin);
					if(!pattern.matcher(tempforDots).matches())
						Errmessage+="Ths value of Dots isn't numeric\n";
					else
						DotsNumberInt=Integer.parseInt(tempforDots);
					
					

					if(XtempMinInt>XtempMaxInt)
					Errmessage+="The minimum of X can't be greater the maximum of X";
					if(YtempMinInt>YtempMaxInt)
					Errmessage+="The minimum of Y can't be greater the maximum of Y";


				if(Errmessage!="Error!! Please Debug following bugs：\n")
				JOptionPane.showMessageDialog(null,Errmessage,"Error Message",JOptionPane.INFORMATION_MESSAGE);				
				else
				{
					int tempforwidth;
					int tempforheight;
					Status whatdo=parent.modeTo;
					if(whatdo==Status.grahamscan){
					ConvexHull.this.X_max_process=XtempMaxInt;
					ConvexHull.this.X_min_process=XtempMinInt;
					ConvexHull.this.Y_max_process=YtempMaxInt;
					ConvexHull.this.Y_min_process=YtempMinInt;
					ConvexHull.this.Dots_process=DotsNumberInt;

					DrawPage.setPaintMode();
					DrawPage.setColor(Color.red);
					for(int i=0;i<Dots_process;i++)
					{
						tempforwidth=(int)(Math.random()*(X_max_process-X_min_process)+(double)X_min_process);
						tempforheight=PageSize-(int)(Math.random()*(Y_max_process-Y_min_process)+(double)Y_min_process);
						dotsfordraw.dots.add(new Point(tempforwidth,tempforheight));	
						DrawPage.fillOval(tempforwidth-2,tempforheight-2,5,5);
						pageOnCon.repaint();
					}

					}

					dotsfordraw.startPoint=operate.AfterSortForYPoint(dotsfordraw.dots);
						
					int x=dotsfordraw.startPoint.x;
					int y=dotsfordraw.startPoint.y;
					
					System.out.println("startPoint:x="+x+",y="+(PageSize-y));
					DrawPage.setColor(Color.blue);		
					DrawPage.fillOval(x-2,y-2,5,5);
					dotsfordraw.setEachLineOfAngle();
				
				}	
				}
			}
		);
	/****************************************************************************/
		this.add(toolbox);
		this.setBackground(new Color(128,128,255));
	}


}

