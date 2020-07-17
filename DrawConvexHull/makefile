JC=javac
SRC=src
Package=Painter
ClassPath=./class
JVM=java
JFLAG=-d
src=$(SRC)/$(Package)/Main.java $(SRC)/$(Package)/MainWindows.java $(SRC)/$(Package)/ConvexHull.java $(SRC)/$(Package)/Page.java $(SRC)/$(Package)/GrahamScan.java $(SRC)/$(Package)/Painter.java $(SRC)/$(Package)/LineToAngle.java $(SRC)/$(Package)/HeapSort.java $(SRC)/$(Package)/VectorOper.java
#src=Main.java MainWindows.java Page.java Painter.java ToolBar.java
Main=Main
.SUFFIXES:.java.class
#.java.class:
#	$(JC) $*.java
#	author:Shou-Liang Sun,date 4/14
.SILENT:
default:classes
	echo "Compiled $(Main) Project was sucessful!!"	
classes:$(src:.java=$*.class)
%.class:%.java
	$(JC) $(JFLAG) $(ClassPath) -sourcepath $(SRC)  $<
run:$(ClassPath)/$(Package)/$(Main).class
	echo "Main-Class: $(Package).$(Main)\n" > $(ClassPath)/manifest.mf	
	jar -cvmf $(ClassPath)/manifest.mf $(Main).jar -C $(ClassPath) $(Package) > /dev/null 2>&1
	java -jar $(Main).jar &
	$(RM) manifest.mf
clean:
	$(RM) $(ClassPath)/$(Package)/*.class $(Main).jar
	
