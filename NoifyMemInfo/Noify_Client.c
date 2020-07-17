#include <linux/kernel.h> 
#include <linux/init.h>
#include <linux/module.h> 
#include <linux/version.h>
#include <linux/mm.h>
#include <linux/sched.h>
#include <linux/workqueue.h>
#include <linux/delay.h>
#include <xen/xenbus.h>
#include <uapi/linux/sysinfo.h>

#define STR(x)	#x

static struct workqueue_struct *NoifyWq;
static void NoifyMem_process(struct work_struct *work);	
static DECLARE_DELAYED_WORK(NoifyMem_worker, NoifyMem_process);


MODULE_DESCRIPTION("Noify meminfo");
MODULE_AUTHOR("Orion <sslouis25@icloud.com>");
MODULE_LICENSE("GPL");
 
static int __init NoifyMem_init(void)
{
	NoifyWq=create_singlethread_workqueue("NoifyWqN");
	queue_delayed_work(NoifyWq,&NoifyMem_worker,0);
		
//	schedule_delayed_work(&NoifyMem_worker,100);
	return 0;
}

static void NoifyMem_process(struct work_struct *work)
{
	struct xenbus_transaction trans;
	struct sysinfo info;
	unsigned long total;
	unsigned long free;	
	int rate,t;

	si_meminfo(&info);	
	total=info.totalram<<2;
	free=info.freeram<<2;
			
	rate=(int)((double)100-((double)free*100/(double)total));

	xenbus_transaction_start(&trans);
	
	t=xenbus_printf(trans, "memory","usage", "%d",rate);
	printk("rc=%d\n",t);
		
	xenbus_transaction_end(trans, 0);
	
		//if (need_resched())
		//	{	
		//	printk("it's preempted now\n");
		//	schedule();		
		//	}
	
	queue_delayed_work(NoifyWq,&NoifyMem_worker,5000);


}
 
static void __exit NoifyMem_exit(void)
{
    	cancel_delayed_work(&NoifyMem_worker);
    	flush_workqueue(NoifyWq);
    	destroy_workqueue(NoifyWq);
    	printk(KERN_INFO "Goodbye\n");
}
 
module_init(NoifyMem_init);
module_exit(NoifyMem_exit);
