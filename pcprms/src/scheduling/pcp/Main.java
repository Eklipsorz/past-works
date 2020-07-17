package scheduling.pcp;

import java.util.ArrayList;
import java.util.LinkedList;
import java.util.List;

public class Main {

    public static void main(String[] args) {

        List<task> taskarray = new ArrayList<>();
        ArrayList<Resource> resarray = new ArrayList<Resource>();

      //  System.out.println(args.length);
        FiletoData step1=new FiletoData(args[1],taskarray,resarray);//convert the context in file to data
        scheduler step2=new scheduler(taskarray,resarray);


    }
}
