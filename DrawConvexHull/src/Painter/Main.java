
package Painter;
public class Main
{
	MainWindows mainwin;

	public static void main(String[] args)
	{
	    // Create 760 x 600 frame to display panel, some buttons and so on.
		mainwin = new MainWindows(this,"test",new Dimension(760,600));
		// Set icon in the frame.
		mainwin.setIconImage(new ImageIcon("./images.jpeg").getImage());

	}
}

