package scheduling.pcp;
import java.util.LinkedList;
import java.util.Queue;
import java.util.Stack;
/**
 * Created by Orion on 12/26/15.
 */
public class Resource {

    int id; /* id of the resource */
    int ceiling; /* the highest of priority in the task set,in which each element want to use the resource ri */
    boolean locked; /* state of the resource: True(locked) False(Unlocked) */
    task locker; /* task which is locking me*/
    int lker_priority; /* priority of the locker */
    static Queue<task> priorityQ=new LinkedList<task>();/* task which is blocked by locker */
    static Stack<Integer> sysceil=new Stack<Integer>();
    /* system_ceiling: top of stack is current system ceiling
     * lowest priority -> when stack is empty.
     * highest priority -> the highest priority of all tasks.
     */


    Resource(int i)
    {
        /*
            At first, none of task can lock any resource.
            So, i set the locked and locker to be false and null respectively.
         */

        id=i;
        ceiling=11;
        locked=false;
        locker=null;
    }
    public void changeCeil(int priority)
    {
        /*
        *  Before scheduling, system need to set ceiling of each resource
        */
        if(this.ceiling>priority)
            this.ceiling=priority;
    }

    public task canilockme(task lker)
    {

        if(locked) {/* including direct blocking and priority-inheritance blocking */
            lker.state = State.Blocked;
            this.locker.priority=lker.priority;
        }
        else {
                /*
                      When task τ wants to use the resource ri, the following cases will occur:
                        A.      the priority of task τ is higher than the current system ceiling.
                        B.      the priority of task τ is lower than the current system ceiling.
                        C.      the task τ has had the resource rj (its ceiling is equal to the
                                current system ceiling)
                 */
            if (!sysceil.isEmpty()&&sysceil.peek()<=lker.priority) {
                /* handling for case C:
                *
                *   The handling is same as handling for case C.
                *   Before that, system need to set "ihaveother" to 1.
                */

                int ihaveother=0;
                for(requirement req:lker.reqqueue) {
                    if (req.required.locker == lker) {
                        ihaveother=1;
                        sysceil.push(lker.priority);
                        this.locker = lker;
                        this.lker_priority=lker.priority;
                        this.locked = true;
                      //  System.out.println("hi "+req.required.id);
                        break;
                    }
                }
                if(ihaveother==0)/* including avoidance blocking */
                {
                    /* handling for case A:
                    *
                    *  Let another task τj be set to "Blcoked" and locker has priority of task τj.
                    */
                    lker.state = State.Blocked;
                    this.locker.priority=lker.priority;
                }

            }
            else {
                /*
                *  handling for case B:
                *  system has to update system ceiling and set for some information:
                *  for example:   Is the resource locked? Which task is locking the resource ri?
                */
                sysceil.push(lker.priority);
                this.locker = lker;
                this.lker_priority=lker.priority;
                this.locked = true;
            }
        }

        /*
            if the task τ is blocked,then system return locker.
            Otherwise, system return the task τ.
         */
        if(lker.state==State.Blocked)
        {
            priorityQ.add(lker);
            return this.locker;
        }
        return lker;
    }

    public void unlock()
    {
        /*
        *  unlock() has two following cases:
        *   a.      A task τ has the resource, which none of task wants to use the resource except for the task τ.
        *   b.      A task τ has the resource, which others want to use resource
        *
        * */

        /* handling for case a */

        /* handling for case b */
        if(!priorityQ.isEmpty()) {
            /*
             some tasks want to access resource ri,which is used by task τ.

             If task τ don't want to use ri, then it need to unlock and set first element in priorityQ be "Unblocked".
             The priorityQ stores the blocked (by task τ) tasks.
             */
            task temp = priorityQ.poll();
            temp.state = State.Unblocked;
            locker.priority = lker_priority;
        }
        /* handling for case b */

        /*
        *   In unlock() phase,
        *                       system has to make the resource ri be unlocked and the system ceiling be
        *                       sysceil(t) at time t.
        */

        this.locked=false;
        sysceil.pop();
        this.locker=null;
        /* handling for case a */
    }


}

