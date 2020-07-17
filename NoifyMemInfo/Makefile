obj-m := Noify_Client.o
version :=$(shell uname -r)

all:
	make -C /lib/modules/$(version)/build M=$(shell pwd) Noify_Client.ko
