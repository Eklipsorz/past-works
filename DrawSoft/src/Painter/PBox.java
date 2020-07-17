package Painter;



import java.awt.*;
import javax.swing.*;
import java.awt.event.*;

public class PBox{

	public void paintComponent(Graphics pen)
	{

		Dimension d = PBox.this.getSize();
		pen.drawRect(0,0,d.width-1,d.height-1);		


	}



}
