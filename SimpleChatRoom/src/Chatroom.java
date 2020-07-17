/**
 * Created by Orion on 6/19/15.
 */
import java.awt.Dimension;

public class Chatroom {


   public WindowUI mainwin;

   Chatroom(int ReceiverPort,int SenderPort,String username) {


        /* set a user interface for the chatroom. The width and height for this UI is 760 and 600, respectively. */
        mainwin = new WindowUI(username, new Dimension(760,600), ReceiverPort, SenderPort);
        /* set a receiver to receive the message of another one */
        Server server = new Server(mainwin, ReceiverPort);

        /* run the receiver as a thread */
        Thread t1 = new Thread(server);
        t1.start();

   }



}
