package scheduling.pcp;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

/**
 * Created by Orion on 12/28/15.
 */
public class FiletoData {


    FiletoData(String path,List<task> taskarray,ArrayList<Resource> resarray) {
        int tasknum = 0, resnum = 0,i = 0;
        try (BufferedReader br = new BufferedReader(new FileReader(path))) {
            String line;
            String[] temps;
            while ((line = br.readLine()) != null) {
                if (tasknum == 0) {
                    temps = line.split(",");
                    tasknum = Integer.parseInt(temps[0]);
                    resnum = Integer.parseInt(temps[1]);
                    /******************************************************************************************/
                    //build resource array and store.
                    for (int j = 0; j < resnum; j++) {
                        resarray.add(new Resource(j + 1));
                        //System.out.println(resarray.get(j).id);
                    }
                    /******************************************************************************************/
                } else {

                    temps = line.replaceAll("\\D", " ").split(" +");
                    //replace all non-digit characters with space " " //
                    task temptask = new task(i + 1, Integer.parseInt(temps[1]), Integer.parseInt(temps[2]));

                    /******************************************************************************************/
                    // build the requirements of all resources.
                    //System.out.println(Integer.parseInt(temps[3]));

                    for (int j = 0, limit = Integer.parseInt(temps[3]); j < limit; j++) {
                        int temp1 = Integer.parseInt(temps[4 + j * 3]);
                        int temp2 = Integer.parseInt(temps[5 + j * 3]);
                        int temp3 = Integer.parseInt(temps[6 + j * 3]);
                        temptask.reqqueue.add(new requirement(temp2, temp3, resarray.get(temp1 - 1)));
                        //    System.out.println(i+" resourceid:"+temp1+" "+temp2+"-"+temp3);

                    }
                    /******************************************************************************************/
                    taskarray.add(temptask);
                    i++;

                }
            }

        } catch (IOException e) {
            e.printStackTrace();
        }
        //System.out.println(taskarray[0].period);

        /* allocate order to each task according to period */
        Collections.sort(taskarray);
        /* allocate priority to each task*/
        /* allocate ceiling to each resource*/
        for (int p = 1; p <= tasknum; p++) {
            task tmp = taskarray.get(p - 1);
            tmp.priority = p;
            for (requirement req : tmp.reqqueue)
                req.required.changeCeil(tmp.priority);
        }
        /*System testbed check for task*/
        /*
        for (task t : taskarray) {
            System.out.print(t.id + " " + t.period + " " + t.execution + " " + "priority:" + t.priority + " ");
            for (requirement req : t.reqqueue) {
                System.out.print(req.required.id + " ");
            }
            System.out.println("");
        }
        */
        /*System testbed check for resource*/
        /*
        for (Resource resource : resarray)
            System.out.println("id:" + resource.id + " " + resource.ceiling);
        */


    }


}
