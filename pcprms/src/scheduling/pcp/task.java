package scheduling.pcp;
import java.util.*;
import java.lang.*;

/**
 * Created by Orion on 12/26/15.
 */


public class task implements Comparable<task>{

    int id;
    int priority;
    int period;
    int execution;
    int deadline;
    int time;
    int realexec;
    State state;

    List<requirement> reqqueue=new ArrayList<requirement>();
    //requirement require;
    task(int i,int per,int exec)
    {
        id=i;
        period=per;
        time=0;
        realexec=0;
        deadline=0;
        execution=exec;
        state=State.Unblocked;

    }
     @Override
     public int compareTo(task compared){
         return this.period-compared.period;
    }

}

class requirement{
    int stime;
    int ftime;
    int exec;

    Resource required;

    requirement(int s,int f,Resource req)
    {
        stime=s;
        ftime=f;
        exec=f-s;
        required=req;
    }

}

enum State{
    Blocked,Unblocked;
}