package scheduling.pcp;

import java.util.Iterator;
import java.util.ArrayList;
import java.util.List;

/**
 * Created by Orion on 12/29/15.
 */
public class scheduler {

    scheduler(List<task> taskarray,ArrayList<Resource> resarray)
    {
        int [] periodT=new int[taskarray.size()];
        List<task> readyqueue = new ArrayList<>();
        int RAtTime;
        task curr=null;
        int cycle=0,min;
        for(int i=0;i<taskarray.size();i++)
            periodT[i]=taskarray.get(i).period;
       // System.out.println(lcm(periodT));
        cycle=lcm(periodT);

        for(int t=0;t<cycle+1;t++)
        {
            curr=null;
            RAtTime=0;
            for(task j: taskarray)
            {
                if(j.deadline==t)
                {
                    if(j.time>0&&j.execution>j.realexec)/*when task τ miss its deadline, system has to print and exit*/
                    {
                        System.out.println(t + ":X" +"["+j.id+"]");
                        System.exit(0);
                    }
                    else/* when task τ arrives at time t, task τ is token into ready queue*/
                    {
                       // System.out.println(j.id+" coming into readqueue");
                        j.deadline+=j.period;
                        j.realexec=0;
                        j.time+=1;
                        readyqueue.add(j);

                    }
                }
            }

            min=cycle*2;
            for(task j:readyqueue) {
                if (j.state==State.Unblocked&&j.priority < min) {
                    min = j.priority;
                    curr=j;
                }
            }

            task tempcurr=curr;
            if(curr!=null) {
                for (requirement req : curr.reqqueue) {
                    if (req.stime == curr.realexec) {
                        RAtTime = 1;
                        req.exec = req.ftime - req.stime;
                        //System.out.println(req.required.id+" 567 "+req.exec);
                        curr = req.required.canilockme(curr);
                        if (tempcurr != curr)
                            break;
                        //System.out.println("hi123");
                    }

                }

                for (requirement req : curr.reqqueue) {
                    int temp = req.ftime - req.stime;
                    if (req.required.locker == curr)
                        if (temp > 0 && temp > req.exec)
                            RAtTime = 1;
                    //  System.out.println(curr+" hi "+req.required.id+" "+req.required.locker+" "+req.exec);
                }
            }



           // System.out.println("curr "+curr.priority);


            //task tempforcurr=curr;
            if(curr==null)
                System.out.println(t+":I");
            else {

                curr.realexec++;
                ArrayList<Integer> resourceid = new ArrayList<Integer>();
                System.out.print(t + ":E:" + curr.id);
                if (RAtTime == 1) {

                    for (requirement req : curr.reqqueue) {
                        //System.out.println("id: "+req.required.id+" "+req.exec);
                        if (req.required.locker == curr) {
                           // System.out.print(req.required.id + " ");
                            resourceid.add(req.required.id);
                            req.exec--;
                        }
                    }
                    System.out.print("[");
                    for(int i=0;i<resourceid.size();i++)
                    {
                        System.out.print(resourceid.get(i));
                        if(i!=resourceid.size()-1)
                            System.out.print(",");
                    }


                    System.out.print("]");
                }

                System.out.println();


                for (requirement req : curr.reqqueue) {
                    if (req.required.locker == curr) {
                        // System.out.println(req.required.locked+" 123 "+req.exec);
                        if (req.required.locked == true && req.exec == 0) {
                            //  System.out.println("resource "+req.required.id);
                            req.required.unlock();
                            //System.out.println(curr.id+" resource end "+req.required.id+" "+req.required.locker);
                        }
                    }
                }

                if (curr.execution == curr.realexec) {
                    Iterator<task> iter = readyqueue.iterator();
                    //   System.out.println(curr.id);
                    while (iter.hasNext()) {
                        if (iter.next().id == curr.id) {
                            iter.remove();
                            break;
                        }
                    }


                }
            }

        }

    }

    public static int gcd(int a,int b)
    {
        if(b==0)
            return a;
        else
            return gcd(b,a%b);

    }

    public static int lcm(int []a)
    {
        //return (a*b)/gcd(a,b);
        int result=a[0];
        for(int i=1;i<a.length;i++)
            result=(result*a[i])/gcd(result,a[i]);
        return result;

    }



}
