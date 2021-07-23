---
title: "Another Point of View： Heap Structure"
date: 2020-08-05T20:25:08+08:00
author: "Eklipsorz"
description : "另種觀點來看待Heap結構"
keywords:
- heap
- data structure
tags : [
    "heap",
    "tree",
]
categories : [
    "Data Structure",
]

markup: "mmark"

draft: false
---

![](/img/heapinfo/cover.jpg)

## Heap 概略

#### 粗略地介紹Heap的構造、特性、實現

1. Structure Property：它是一種特殊的資料結構，其結構如同字面上的意思一樣，每個物件$Obj_i$會堆放其他物件上，最後形成一
座堆狀物：

{{< CenterImage
src="/img/heapinfo/2kheap.png"
alt="表示某個物件$Obj_i$被堆放在其他物件上" >}}

2.  Heap Order Property：根據物件所儲存的資料來堆放其他物件上，比如以每個物件所儲存的數值來比較大小，數值比較小的節點會
堆放數值較大的節點上。

3. 每當從這個結構取出物件時，會優先從結構頂端來取。

4. 通常使用樹狀結構來實現，在這實現上不能夠違背前面三個提到的性質，實現上會有Initialization、Insert、Delete等Method。

5. 應用：Priority Queue、Sorting。

Note: 似乎有很多人誤解Heap結構就是Tree結構，但其實這兩者是獨立的存在，Heap只是描述著堆狀結構，而Tree只是剛好可以拿來實現堆狀結構的另種結構。

## Structure Property

#### 定義該結構會是什麼

在這個結構內，每個物件都堆放在其他物件上，進而使整體結構像是堆狀物，當我們指定被堆放的最大物件數時，我們會稱之為$k$-ary Heap，$k$為物件數
，如果$k = 2$就代表著每個物件只能堆放在$0-2$個物件上(如下圖中的左半邊)，而如果$k = 3$就代表著每個物件只能堆放在$0-3$個物件上，不管$k$是為何
，Heap下的每個節點會像下圖中那樣排列著，而圖中的obj指的就是堆放物，而$1-k$指的是被堆放物。


{{< CenterImage
src="/img/heapinfo/2kheapdetail.png"
alt="表示k-ary Heap" >}}

理想狀態下，我們可以透過本性質將每個節點堆成一座小山，最後再將每座小山構成一座大山，比如說在Binary Heap下，原本每個節點構成的小山(下圖左半邊)
會被堆放在一起形成一座大山(下圖右半邊)。

{{< CenterImage
src="/img/heapinfo/makeabigone.png"
alt="表示多個小山組成一座大山" >}}

## Heap Order Property

根據Structure Property提到的內容，這些物件會構成一個堆狀物，但內容卻沒指定這些物件彼此間關係是為何，而且當要從堆狀物取出物件時，取出的物件會在
不確定的情況下變得毫無意義，因爲我們並不能知道每此取出的物件會是什麼，所以為了讓取的物件更加有意義而添加Heap Order Property。

#### 定義這些物件彼此間的關係

我們會根據物件儲存的數值來決定如何堆放，通常會有兩種堆放基準：

1. 物件的數值比其他物件儲存的數值來得小時，就堆放在他們上面
2. 物件的數值比其他物件儲存的數值來得大時，就堆放在他們上面
 

不論選取哪個來堆放物件，該結構上的頂端物件肯定是所有物件裡最小或者最大的，然而如果在這個結構上混用這兩種方式，該頂端物件並不能夠保證其結果的大小
關係。此外，若我們單純使用第一個基準來堆放物件，那麼最後得到的Heap會根據取出的數值是最小的而被稱之為Min Heap；反之，若我們單純使用第二個基準來堆
放物件，那麼最後得到的Heap會被稱之為Max Heap。

對於這兩個基準的實現方式，會使用Tree結構的Parent節點和其所擁有的Child節點來表示堆放物件以及被堆放的物件。


## How to get object from the structure

基本上會先取得該結構上的頂端物件來盡量不破壞Structure Property，同時使用已在Heap的物件來代替頂端物件來維持著兩種特性，另外當我們想從多個物件中找
尋擁有最小值或最大值的物件時，該結構會很有效地幫助我們尋找，因爲頂端物件不是擁有最小值的物件，就是擁有最大值的物件。

## Heap Example

#### 以Binary Heap以及它帶有的Method來更清楚地介紹Heap

根據Structure Property談到的定義：當我們指定被堆放的物件數時，我們會稱之為k-ary Heap，在這裡如果我們要堆放的物件數是2個時，我們會稱之為Binary Heap
，我們可以透過Binary Tree(BT)的左右子樹節點就能表示，換言之，每個節點能夠連接兩個相同型態的節點。在Binary Tree下的Structure Property和Heap Order 
Property 這兩個性質會在保持著Heap的原有性質的情況下更加強調Binary Tree的實作。

### BT: Structure Property

在Structure Property上，會為了更加簡單地透過Array來實作Binary Tree而強調該樹狀結構必須是Complete Tree為原則，換言之，除了最後一層的節點之外，每層的
節點數都必須是$2^k$個節點，而$k$是表示第$k$個階層，而最後一層的節點數可以少於 $2^m$ ($m$為最後一層的階層第次) 個且在這階層中的節點必須連續地排列在同
一個階層，舉例來說，我們會預期最後一層的節點位置會是下圖，而這些白圈並沒有放置任何節點，但若在該位置放入節點時便會以灰圈來表示，

{{< CenterImage
src="/img/heapinfo/expectedNodes.png"
alt="最後一層的預期節點位置" >}}


當指定該樹狀結構為Complete Tree時，節點位置$A1$至某個位置之間的位置都必須存在著節點，我們可以用下圖左右兩邊來表示，左邊代表著節點位置$A1$至某個位置之
間的位置都存在著節點，而右邊會是全部的位置都被節點佔據著。你可以看到這些節點們都連續地擺放在一起，

{{< CenterImage
src="/img/heapinfo/continuousNodes.png"
alt="最後一層的預期節點位置" >}}

然而，若節點位置$A1$至某個位置之間的位置存在著白圈的話(如下圖)，此時的樹狀結構就不為Complete Tree。

{{< CenterImage
src="/img/heapinfo/discontinuousNodes.png"
alt="節點$A1$至某個節點位置之間的位置必須都有節點" >}}


當我們依照這樣實作規則製作出Complete Binary Tree並且由上層來依序給予序號(如下圖)，會發現每個節點$i$的子節點會是節點$2i$或者節點$2i+1$，這時我們就可以

{{< CenterImage
src="/img/heapinfo/completeTree.png"
alt="表示Complete Tree" >}}

直接宣告一個固定大小的陣列來實作Binary Tree，並且利用節點與其子節點的序號關係來存取，index為1的記憶體空間為root節點，而root節點的子節點就是index為2~3的
記憶體空間，當我們想存取某節點$i$的子節點時，便直接朝著index為$2i$以及$2i+1$的記憶體空間來存取。


### BT: Heap Order Property

Heap Order Property在這裡會以數值系統來比較並且採用以Min Heap為主的基準來建立Heap，也就是說會拿每個物件所儲存的數值來將每個節點堆積到另外兩個數值比較大的
節點上。


### BT: How to get object from the structure

而當我們要從Heap結構取出物件時，便是拿Binary Tree上的root節點，並且從剩餘節點中挑出適當的節點來頂替root節點以維持Structure Property和Heap Order Property這
兩個性質。



### BT: Implementation

#### 定義了Heap的ADT並按照ADT來寫出對應的Pseudo Code。

在這ADT(如下圖)中，我們定義了Heap是什麼、存放什麼物件、它擁有哪些可以對自己處理的操作，在這裡我們以建構Min Heap為主，首先我們可以透過在用Binary Tree實作時強調的性
質直接將每個Heap當成固定大小的陣列，並且以該陣列以及其他參數$item$、$n$來當作每個函式的輸入參數。參數$item$在Heap結構中會是每個節點會儲存的資料，而每個$item$可以是
不同型態的資料，在這裡將它設定成$Element$型態以保持彈性，最後$n$則是正整數(包含0)，定義陣列所擁有的節點總數，通常會使用函式$getHeapSize(heap)$來獲取對應的總數並放入
$n$.

{{< CenterImage
src="/img/heapinfo/heapADT.png"
alt="ADT: heap structure" >}}


函式部分則有$isEmpty$、$isFull$、$top$、$insert$以及$DeleteMin$等基本函式，$isEmpty$和$isFull$(如下圖所表示的兩個演算法)會根據結構內的節點總數來判別該Heap是否空或者是
否滿，當總數(此時由$n$變數存放)等於0時，就表示heap結構沒有任何節點；而當總數等於該heap結構能存放的容量$MaxSize$時，就表示Heap結構的節點總數到達該結構能夠存放的容量。

{{< CenterImage
src="/img/heapinfo/Heap_isEmptyAlg.png"
alt="Algorithm: isEmpty function" >}}

{{< CenterImage
src="/img/heapinfo/Heap_isFullAlg.png"
alt="Algorithm: isFull function" >}}


而$top$函式則是固定獲得Heap結構的頂端物件或者頂端節點，在這裡以陣列中的第1個位置上的物件來表示頂端節點，其中第0個位置由於其位置數是代表0，很難去直接用它來做$i\*2$
和$i/2$來存取child和parent這兩個節點，因此都跳過該位置並拿它下一個位置當作是頂端節點。

{{< CenterImage
src="/img/heapinfo/Heap_topAlg.png"
alt="Algorithm: top function" >}}

$Insert$函式(如下圖所示)會在維持前面所述的兩種性質下將$item$放入該結構中，首先該算法將在第5、6、10行預先將要放入的$item$定義成$NewElement$並且在樹狀結構新增一個
擁有空值的節點或者說佔用陣列中的第$n+1$個位置($n$為目前存有$item$的節點數)，

{{< CenterImage
src="/img/heapinfo/Heap_InsertAlg.png"
alt="Algorithm: Insert function" >}}

其結果如下所示：

{{< CenterImage
src="/img/heapinfo/nplus1Node.png"
alt="Insert Algorithm: Add a new empty node in a heap" >}}

圖中的左邊是新增空節點之前，而右邊則是之後的結果，接下來的過程中將會用白圈代表著目前是空值的節點，而第7行的$shiftUp$(過程如下圖)拿新增加的節點(第$n+1$個節點)對應的parent節點
(為下圖的橘圈)與$NewElement$進行第一次的$item$之數值比較，當parent節點的數值比較大時，便把parent節點的$item$放入新增加的節點(白圈)裡，而此時白圈會用紅圈表示該節點已經被填入
$item$，而此時的白圈將由原本的parent節點來替代，接著我們再以目前白圈的parent節點來和$NewElement$進行第二次的$item$之數值比較，若parent節點還是比較大時，則會像第一次那樣，原
本的白圈會擁有此時的parent節點所存下的$item$，而parent節點則以白圈來替代，

{{< CenterImage
src="/img/heapinfo/shiftUp14.png"
alt="Insert Algorithm: Demo how to shift down" >}}


這樣的流程持續到當$NewElement$比較大時，此時的結果會像是如下圖這樣，代表橘圈的節點擁有比較小的$item$，而白圈下的節點都擁有著比$NewElement$還大的$item$，

{{< CenterImage
src="/img/heapinfo/shiftUpBeforeEnd.png"
alt="Insert Algorithm: Meet termination condition" >}}

而面對這樣子的情況，我們可以直接將$NewElement$放入白圈中以維持性質。當然如果白圈已經移動至結構的頂端位置時，會因爲$h[0]$所存的值而被迫只能留在$h[1]$或者目前頂端位置，而這時我
們只需要將$NewElement$填入至白圈即可。

補充：從這樣的流程來看，我們一直不斷往上移動白圈直到移動到適當位置，並放入$NewElement$至白圈內部，所以將此處理方式命名為$shiftUp$。
 
{{< CenterImage
src="/img/heapinfo/shiftUpAfterEnd.png"
alt="Insert Algorithm: Insert $NewElement$ into the empty node" >}}


最後的$DeleteMin$函式會優先取得Heap結構上的頂端節點，也就是$h[1]$，此時的頂端節點會因爲被取走的關係而不能夠繼續存在該結構中，所以必須透過第七行的$shiftDown$函式從剩下的
節點挑出適合節點來頂替它以維持Heap結構原本要有的性質，該$shiftDown$函式跟$shiftUp$函式雷同，只是白圈會從頂端的位置往下移動，最後由第二十五行提到的$LastElement$來放入白圈
中。

{{< CenterImage
src="/img/heapinfo/Heap_DeleteMinAlg.png"
alt="Algorithm: DeleteMin function" >}}

首先我們進入$DeleteMin$函式之前，我們所擁有的Heap結構會如同下圖：

{{< CenterImage
src="/img/heapinfo/DeleteMin_origin.png"
alt="DeleteMin Algorithm: origin structure before execution of the algorithm" >}}

接著我們依照算法的指示先取得頂端節點和最後一個節點(如下圖)，頂端節點會在第六、八行回傳給呼叫者以保證呼叫者能從中拿到最小值之$item$，而最後一個節點$LastElement$會優先在第十行
取得並在第二十五行找出適當位置來放入白圈中。

{{< CenterImage
src="/img/heapinfo/getTopAndLast.png"
alt="DeleteMin Algorithm: get top element and last element" >}}

而當我們取得指定的節點時，便會在第十一行扣除掉最後一個節點來用while結構計算白圈的適當位置，在while結構內部中，我們設定 $i\*2 \leq n$ 當作成立條件來存取Heap結構下的子節點，而
該結構中除了leaf節點和擁有第$n$個子節點的節點之外，其他節點都因爲結構上是complete tree而擁有兩個子節點，當我們想要存取leaf節點的子節點便會因爲while的條件而被避免，而擁有第
$n$個子節點的節點則會因爲第十五行的條件來避免程式認為有兩個子節點而存取錯誤，不管是遇上哪個例外，這些情況下，都會透過第二十五行來將$LastElement$放入當前節點中，而非直接處理
例外的子節點。

那麼考慮擁著有兩個子節點的節點，一開始進入while時，我們會像下圖中的第一次一樣先將頂端節點位置設定成白圈並找到其child節點，並且拿他們所擁有的$item$來和$LastElement$比較(第一
次的橘圈表示當前要被比較的節點)，當child節點之一比較小時，較小的節點便像圖中第二次的第二個節點那樣頂替白圈，而原本的節點就變成白圈，接著我們再以白圈為主的child節點和$LastElement$
進行比較(第二次的橘圈來表示當前要被比較節點)，若還是child節點之一比較小時，較小的節點就如同第三次的第四個節點那樣，然後再挑出child節點和$LastElement$來比較，接著大小關係還是一樣的
狀況時，就會像是第四次，每一次的相同比較結果出現都會使得白圈往下移動，

{{< CenterImage
src="/img/heapinfo/shiftDown14.png"
alt="DeleteMin Algorithm: Demo how to shift down" >}}

然而，當遇到$LastElement$比較小或者遇上比較例外的子節點而僅剩$LastElement可以比較(如下圖)時，

{{< CenterImage
src="/img/heapinfo/shiftDownBeforeEnd.png"
alt="DeleteMin Algorithm: Meet termination condition" >}}

這時我們可以將$LastElement$放入當前白圈中，這樣的處理剛好滿足了Heap結構的性質。

{{< CenterImage
src="/img/heapinfo/shiftDownAfterEnd.png"
alt="Algorithm: Insert the Last element into the empty node" >}}

## 結論
雖然Heap結構上在每本書中都會有一定程度上的解釋，但大部分都把Heap結構視作為Tree結構來解釋，而非直接強調兩者是獨立的結構來說明。為此，我寫下了這篇文章心得簡單地描述
Heap結構和Tree結構兩者間的獨立性以及強調Tree結構只不過是實現Heap結構的其中一個手段，接著再用Binary Tree來構築一個Heap結構以及它會有什麼樣的基本操作。另外程式碼的部
分我不會使用某種特定語言來侷限於看得懂語法的人，而是直接採用比較中立的Pseudo code來說明如何用Binary Tree構築。
