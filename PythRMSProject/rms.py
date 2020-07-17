#!/usr/bin/env python3

from sys import *
from collections import defaultdict
from functools import reduce
import math
import operator
def gcd(a,b):
	if b==0: return a
	return gcd(b,a%b)
def lcm(a,b):
	return a*b/gcd(a,b)
def LCM(list):
	return int(reduce(lcm,list))
def RMAnalysis(list,num1,temp):
	sum=0
	for tempD in range(num1):
	  sum+=list[tempD]['ec']*math.ceil(float(temp)/list[tempD]['period'])
	if sum != temp and sum < list[num1-1]['period']:
	  return RMAnalysis(list,num1,sum)
	elif sum != temp and sum > list[num1-1]['period']:
	  print("exact test fail")
	  return -1
	elif sum == list[num1-1]['period'] or sum == temp:	
	  return 0
def Schedule(PList,taskset):
	queue=[]
	tmp={}
	cycle=LCM(list(map(int,PList)))	
	for task in taskset.keys():
	    tmp[task]={}
	    tmp[task]['times']=0
	    tmp[task]['dline']=0
	    tmp[task]['executed']=0

	for time in range(cycle+1):
		for t in tmp.keys():
		 if time == tmp[t]['dline']:
		  if tmp[t]['times']>0 and taskset[t]['ec']>tmp[t]['executed']:
		   print("%d:X:%d" %(time,int(taskset[t]['id'])))
		   exit()
		  else:
		   tmp[t]['dline']+=taskset[t]['period']
		   tmp[t]['executed']=0
		   tmp[t]['times']+=1
		   queue.append(t)
		min=cycle*2
		for i in queue:
		 if taskset[i]['period']<min:
		  min=taskset[i]['period']
		  curr=i
		if curr==-1 :
		 print("%d:I" %(time))
		else:
		 tmp[curr]['executed']+=1
		 print("%d:E:%d" %(time,int(taskset[curr]['id'])))
		 
		if tmp[curr]['executed'] == taskset[curr]['ec']:
		 for i in range(len(queue)):
		   if curr == queue[i]:
		    del queue[i]
		    break

def SortAndBuildLList(tempTask,tempRMA,a,b):
  
    tempTaskinH={}
    index=0
    temp=0
    taskNum=len(tempTask)
    for tempD in a:
     tempTaskinH[index]={}
     tempTaskinH[index]['period']=tempD
     tempTaskinH[index]['ec']=int(b[str(tempD)][0])
     tempTaskinH[index]['id']=0
     for i in tempTask.keys():
       if tempD == tempTask[i]['period'] and tempTaskinH[index]['ec'] == tempTask[i]['ec']:
         tempTaskinH[index]['id']=tempTask[i]['id']
     index+=1
     b[str(tempD)].pop(0)
 
    taskNum=len(tempTask)
  #RMAanalysis(list,tasknum,r0)
    if tempRMA > (taskNum*(2**(1/taskNum)-1)):
     print("RMS:U=%f>%f" % (tempRMA,taskNum*(2**(1/taskNum)-1)))
    else:
     print("RMS:U=%f<=%f" % (tempRMA,round(taskNum*(2**(1/taskNum)-1),4))) 
    for i in range(taskNum):
     temp+=tempTaskinH[i]['ec']
     ans=RMAnalysis(tempTaskinH,i+1,temp) 
     if ans == -1 : break
    if ans !=-1: print("exact test pass")

    return tempTaskinH	
def inputToList():
	tempRMA=0
	tempTask={}
	tempListInP=[]
	tempListInC=defaultdict(list)
	f=open('testdata')
	for l in f:		
	  temp=l.strip()
	  if not (temp == '0'):
	   SplitWord=temp.split(':')
	   tempTask[SplitWord[0]]={}
	   tempTask[SplitWord[0]]['id']=SplitWord[0]
	   tempTask[SplitWord[0]]['period']=int(SplitWord[1])
	   tempTask[SplitWord[0]]['ec']=int(SplitWord[2])
	   tempListInP.append(int(SplitWord[1])) 
	   tempListInC[SplitWord[1]].append(SplitWord[2]) 	
	   tempRMA += float(SplitWord[2])/float(SplitWord[1])   
	f.close()
	return tempTask,tempRMA,sorted(tempListInP),tempListInC
if __name__ == "__main__":   
	  tempTask,tempRMA,tempListInP,tempListInC=inputToList()
	  taskset=SortAndBuildLList(tempTask,tempRMA,tempListInP,tempListInC) 
	  Schedule(tempListInP,taskset)
