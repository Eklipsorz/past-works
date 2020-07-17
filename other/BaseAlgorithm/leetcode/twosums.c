

/**
 * Note: The returned array must be malloced, assume caller calls free().
 */



typedef struct hashtab * hashtab;
typedef struct linknode * hashtabListNode;

struct linknode {
        int value;
        int pos;
        struct linknode *next;
};

struct hashtab{
        int size;
        hashtabListNode List;
        hashtabListNode LastNodePerList[10];
    
};

int hashcode(int value)
{
    
    return value > 0 ? value % 10 : (-1 * value) % 10;
    
}





hashtab createHashtab(int size)
{
        int i;
        hashtab htab;
    
        htab = (hashtab) malloc(sizeof(struct hashtab));
        htab->size = size;
        htab->List = (hashtabListNode) malloc(size*sizeof(struct linknode));
    
        for(i = 0; i < size; i++)
            htab->List[i].next = NULL;
    
        
    
        return  htab;    
}


void insert2HashtabList(int value, int pos, hashtab h)
{
        int hashpos;
    
        hashpos = hashcode(value);
        hashtabListNode temp = (hashtabListNode) malloc(sizeof(struct linknode));
        
        temp->value = value;
        temp->pos = pos;
        temp->next = h->List[hashpos].next;
        h->List[hashpos].next = temp;
        
      
    
}

int value2pos(int value, int pos, hashtab h)
{
    int hashpos;
    
    hashpos = hashcode(value);

    hashtabListNode temp = h->List[hashpos].next;
    

    for(;temp != NULL; temp = temp->next)
        if(temp->value == value && temp->pos != pos)
            return  temp->pos;

    return  -1;
    
}



int* twoSum(int* nums, int numsSize, int target, int* returnSize){

    hashtab htab;
    int i, hashpos, requiredNum, posofreqNum;
    int *ans = NULL;
    
    
    htab = createHashtab(10);
    
    for(i = 0; i < numsSize; i++)
        insert2HashtabList(nums[i], i, htab);
        
    
    //showhashtab(htab);
    
    for(i = 0; i < numsSize; i++)
    {
        requiredNum = target - nums[i];
        if ((posofreqNum = value2pos(requiredNum, i, htab)) != -1)
        {
            *returnSize = 2;
            ans = (int *)malloc(2*sizeof(int));
            ans[0] = i;
            ans[1] = posofreqNum;
            break;
        }
    
    }
    
  
    return ans;
}


