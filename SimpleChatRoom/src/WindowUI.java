/**
 * Created by Orion on 6/19/15.
 */

import javax.swing.JTextField;
import javax.swing.JList;
import javax.swing.JScrollPane;
import javax.swing.DefaultListModel;
import java.awt.Dimension;
import javax.swing.JFrame;
import java.awt.BorderLayout;
import java.awt.event.*;
import javax.swing.JOptionPane;
import java.io.IOException;
import java.io.OutputStream;
import java.io.PrintStream;
import java.net.Socket;


public class WindowUI extends JFrame{

    Dimension size;
    DefaultListModel listModel;
    JTextField jtext;
    JList jlist;
    String user;

    int deport;
    int soport;


    WindowUI(String username, Dimension size, int ReceiverPort, int SenderPort)
    {


        /* build a jframe instance as jframe (string title) */
        super( username + " 的讯息介面");

        user = username;
        soport = ReceiverPort;
        deport = SenderPort;


        /* create a text field as message input UI*/

        jtext = new JTextField(18);

        /*
         * create a list to show all of messages
         * one of all functions for jlist is to divide jlist into UI and its content manager
         * To add message as mine wishes, I build a content model to manage each of element on list
         * and a list UI.
         *
         * If I want to add/delete some elements (messages), then i call the method for the content manager
         */

        listModel = new DefaultListModel(); // THIS content manager for jlist.
        jlist = new JList(listModel);

        this.size = size;
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


		/* build a layout to easily put any component into jframe */
        getContentPane().setLayout(new BorderLayout());

        /* add text field and list into jframe */
        add(BorderLayout.SOUTH,jtext);  /* text field is put to bottom in the jframe */
        add(BorderLayout.NORTH,jlist);  /* list is put to top position in the jframe */
        add(new JScrollPane(jlist));    /* add a Scroll bar onto list */
        this.setFocusable(true);


        setVisible(true);


        /* build a keyboard listener to text field and list */
        jtext.addKeyListener(
                new KeyAdapter() {
                        WindowUI parentFromThis = WindowUI.this;
                        String temp = parentFromThis.user;
                    public void keyPressed(KeyEvent e) {
                        int key = e.getKeyCode();
                        if (key == KeyEvent.VK_ENTER) {
                            if(jtext.getText().length()>0) {
                                String tempString=temp + ": " + jtext.getText();
                                parentFromThis.listModel.addElement(tempString);

                                try {
                                    Socket socket;
                                    socket = new Socket("127.0.0.1", parentFromThis.deport);
                                    OutputStream outstream = socket.getOutputStream();
                                    PrintStream out = new PrintStream(outstream);
                                    out.println(tempString);

                                    out.close();
                                    outstream.close();
                                    socket.close();
                                }catch(IOException ioex)
                                {
                                   System.out.println("hi");
                                }



                            }
                            else
                                JOptionPane.showMessageDialog(new JFrame(), "安安 請不要以為什麼都沒打就能按", "Dialog",JOptionPane.ERROR_MESSAGE);
                            jtext.setText("");
                        } else if (key == KeyEvent.VK_2) {

                        } else if (key == KeyEvent.VK_3) {

                        }

                    }

                }
        );
        this.addMouseListener(
                new MouseAdapter() {
                    WindowUI parentFromThis = WindowUI.this;

                    public void mousePressed(MouseEvent e) {

                    }
                }
        );

    }






}
