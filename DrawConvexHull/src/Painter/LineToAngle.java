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
import javax.swing.JMenu;
import javax.swing.JMenuItem;
import java.awt.Dimension;

public class LineToAngle extends JPanel {
	MainWindows parent=null;
	
	LineToAngle(MainWindows p)
	{

		parent=p;
		int x=parent.mode1.getSize().width;
		int y=parent.mode1.getSize().height;
		setSize(x,y);
		setPreferredSize(new Dimension(x,y));
	//	JButton ext=new JButton("mode2");
	//	this.add(ext);	
		this.setLayout(new FlowLayout(FlowLayout.LEFT));
		this.setBackground(new Color(128,128,255));
		setVisible(false);	
	}


}

