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
def Schedule(SumOfPd,taskset):
	queue=[]
	tmp={}
	for task in taskset.keys():
	    tmp[task]={}
	    tmp[task]['times']=0
	    tmp[task]['dline']=0
	    tmp[task]['executed']=0

	for time in range(SumOfPd+1):
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
		min=SumOfPd*2
		for i in queue:
		 if tmp[i]['dline']<min:
		  min=tmp[i]['dline']
		  curr=i
		if not queue :
		 print("%d:I" %(time))
		else:
		 tmp[curr]['executed']+=1
		 print("%d:E:%d" %(time,int(taskset[curr]['id'])))
		 
		if tmp[curr]['executed'] == taskset[curr]['ec']:
		 for i in range(len(queue)):
		   if curr == queue[i]:
		    del queue[i]
		    break
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
	if tempRMA <= 1:
	  print("EDF:U=%f<=1\nSchedulability test pass" %(tempRMA))
	else:
	  print("EDF:U=%f>1\nSchedulability test fail" %(tempRMA))
	cycle=LCM(list(map(int,tempListInP)))
	return tempTask,cycle
if __name__ == "__main__":   
	  taskset,SumOfPd=inputToList()
	  Schedule(SumOfPd,taskset)
