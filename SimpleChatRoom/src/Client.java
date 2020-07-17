/**
 * Created by Orion on 6/9/15.
 */
import java.io.IOException;
import java.io.OutputStream;
import java.io.PrintStream;
import java.net.InetSocketAddress;
import java.net.Socket;

public class Client implements Runnable{

    public void run()
    {

        Socket socket;
        try {

           try {
                Thread.sleep(500);
            }catch(InterruptedException inex)
            {
                inex.printStackTrace();
            }


            System.out.println(Thread.currentThread().getName());

            socket = new Socket("127.0.0.1", 5001);
            OutputStream outstream = socket.getOutputStream();
            PrintStream out = new PrintStream(outstream);
            String toSend = "hi";
            out.println("hi SADDADADS"+Thread.currentThread().getName());

            out.close();
            outstream.close();
            socket.close();

        }catch(IOException ioex)
        {
            ioex.printStackTrace();
        }






    }


}
