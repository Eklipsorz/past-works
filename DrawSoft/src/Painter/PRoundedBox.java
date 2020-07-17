package Painter;



import java.awt.*;
import javax.swing.*;
import java.awt.event.*;

public class PRoundedBox{

	public void paintComponent(Graphics pen)
	{

		Dimension d = PRoundedBox.this.getSize();
		pen.drawLine(0,0,d.width-1,d.height-1);		
		pen.drawLine(30,0,d.width-1,d.height-1);


	}



}
