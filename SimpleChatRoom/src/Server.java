/**
 * Created by Orion on 6/9/15.
 */

import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;
import java.io.*;


public class Server implements Runnable{

    Socket server;
    Socket socket;
    InputStream Is;
    DataInputStream DIs;
    Socket Ssocket;
    WindowUI mainW;
    int port;
    Server(WindowUI windowUI, int ReceiverPort)
    {
        /* chatroom settings */
        mainW = windowUI;
        port = ReceiverPort;

    }

    public void run()
    {


        try {
            String str;

            /* Build a receiver socket */
            ServerSocket listener = new ServerSocket(port);

            while(true) {

                try {
                    Thread.sleep(250);
                }catch(InterruptedException inex)
                {
                    inex.printStackTrace();
                }

                Ssocket = listener.accept();
                System.out.println("Entering input mode");
                BufferedReader input = new BufferedReader(new InputStreamReader(Ssocket.getInputStream(), "UTF-8"));
                while (null != (str = input.readLine())) {
                    //  System.out.println(DIs.readLine());
                    mainW.listModel.addElement(str);
                }
               // DIs.close();
               // Is.close();
            }

        }catch(IOException ioex)
        {
          ioex.printStackTrace();
        }




    }


}
