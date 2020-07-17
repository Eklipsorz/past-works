package Painter;



import java.awt.*;
import javax.swing.*;
import java.awt.event.*;

public class PObject extends JPanel{

	Status status;
	Page parent;
	PObject(Page p,Dimension size,Point location)
	{
		super();
		parent=p;
		status = Status.selected;
		this.setSize(size);
		this.setLocation(location);
		showOutline();
	}
	void showOutline()
	{

		parent.showOutline(this.getSize(),this.getLocation());
	}



}
