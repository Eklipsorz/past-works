#Code_Author: Shou Liang Sun
#Date: 11/5
#Subject : DES


###
TEMP=test
SCODE=GenerKey.c encryption.c ToolKit.c
OBJS=$(SCODE:.c=.o)
FLAGS=-lm
CC=gcc
EXEC=DES
default:$(TEMP)
$(TEMP):$(SCODE)
	$(CC) $(FLAGS) $? -o $(EXEC)
	$(RM) *.o *~ $(TEMP)
.c.o:
	$(CC) $(FLAGS) $<
clean:
	$(RM) $(EXEC)

