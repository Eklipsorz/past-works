/**
 * Created by Orion on 6/9/15.
 */

/*
 * @author orion (shou-liang sun)
 */

public class TwoFakeUsers {


    public static void main(String[] args)
    {

        /* Generates two fake users to test */
        Chatroom fakeuser1=new Chatroom(5001,5002,"Orion");
        Chatroom fakeuser2=new Chatroom(5002,5001,"Darren");

        System.out.println("The system have generated two fake users to test chatroom");


    }



}
