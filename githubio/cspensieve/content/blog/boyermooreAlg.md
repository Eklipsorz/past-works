---
title: "Introduction: Boyer-Moore majority vote algorithm"
date: 2020-08-21T16:17:45+08:00
author: "Eklipsorz"
description : "利用+1和-1來尋找佔多數的元素"
keywords:
- majority element
- Boyer Moore
- Algorithm
tags : [
    "algorithm",
    "math",
]
categories : [
    "algorithm",
]

markup: "mmark"

draft: true
---

![](/img/boyermooreAlg/cover.jpeg)

## Overview


## Proof: why the algorithm works


假設$n$個投票者中存在著$m$個候選者來讓投票者支持(如下圖)，並且我們使用該算法來尋找多數人支持的候選者，在這個算法中，我們會發現當下一個投票者
所支持的對象是我們選定的對象那麼就會增加$k$值，反之，當我們發現下一個投票者所支持的對象不是我們所選定的對象時，就會減少$k$值，

{{< CenterImage
src="/img/boyermooreAlg/A1AnSeq.png"
alt="$n$個投票者" >}}

這樣子的運算會使得每個候選者在$n$個投票者中存在著某個區間是他們各自被選中的情況，比如某個候選者$i$的區間(被包圍的範圍)會是如下圖所示，當我們把
$n$個投票者的範圍縮小至只有$A1$至$A3$的範疇時，此時被選定的對象會是候選者$i$，而超出這個範疇的話，被選定的對象不會是候選者$i$

{{< CenterImage
src="/img/boyermooreAlg/Candidate1Range.png"
alt="候選者1所擁有的區間" >}}


接著我們使用該算法來尋找多數人支持的候選者，一開始我們會將第一個投票者所支持的對象
被假定成最多人支持的候選者，當第二個投票者支持的對象也和第一個一樣
根據演算法給予的條件，我們可以總結二個觀察結果：
(利用一些簡單的例子從同位所支持的候選者到增加一些反對者的數量來說明)


1. 當探訪某個區間內的投票者並且$k$值是等於0時，那就代表下一個投票者將會決定何人是較多人支持的。
2. 當探訪某個區間內的投票者並且$k$值是大於0時，那就代表較多人支持的人會是目前候選人或者下一個投票者所支持的候選人。


那麼當出現超過半數支持的候選者時，$k$值勢必會在所有投票者中會是大於0，並且也代表著程式最後的執行結果會是該候選者，但若

利用前面提到的觀察結果，若出現超過半數支持的候選者時，勢必會讓$k$值大於0，並且判定候選者為最多人支持。

## Performance


## Conclusion

