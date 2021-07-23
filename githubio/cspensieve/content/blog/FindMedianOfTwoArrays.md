---
title: "Another point of view: how to find median of two sorted arrays"
date: 2020-09-15T16:38:44+08:00
author: "Eklipsorz"
description : "從另種觀點來看待如何找尋中位數(Median)"
keywords:
- Median of two sorted array
- Median
- LeetCode
tags : [
    "Algorithm",
    "LeetCode",
]
categories : [
    "Algorithm",
]

markup: "mmark"

draft: true
---

![](/img/FindMedianOfTwoArrays/cover.jpg)


假設我們給你兩個已經排序好的序列並且要求你想像這兩個序列按照數字大小重新排列成一個大序列，然後從這個序列中想辦法求得中位數(Median)
，那麼你會如何解決這件事情呢？


首先我們先試著了解 “兩個排序好的序列並且要求你想像這兩個序列按照數字大小重新排列成一個大序列" 這段話意思再來思考真正的問題，在這裡給
定兩個具體的序列(如下圖所示)來了解

{{< CenterImage
src="/img/FindMedianOfTwoArrays/Seqexample.png"
alt="2個已排序完成的數字序列" >}}

，從這兩個序列中，你會發現每個序列都按照各自序列的數值大小來排列，沒有一個是不符合，那麼在這樣的情況下，我們將這些數字打散重新按照
數值大小來排列，其結果會是如下：

{{< CenterImage
src="/img/FindMedianOfTwoArrays/Resultexample.png"
alt="序列AB被重新排序後的結果" >}}

這時，我們開始花些時間尋找中位數，而由於總元素數是偶數所以根據中位數的定義，結果序列中會有2個中位數(也就是4和5)，在這裡會將這兩筆元
素進行平均計算以及無條件捨棄小數的部分：

$\lfloor \frac{median1+median2}{2} \rfloor = \lfloor \frac{4+5}{2} \rfloor = 4$

但如果總元素數是奇數(如下圖)的話，在這裡會只會有一個中位數(也就是4)。

{{< CenterImage
src="/img/FindMedianOfTwoArrays/Oddexample.png"
alt="總元素數為奇數時" >}}

我們已經用具體例子來解釋問題描述，接著我們將專注於如何尋找中位數，在這裡我們提供兩種不同的方向來解決：

1. 按照數字大小重新將這兩個序列上的數字排列成一個較大的序列，再得到中位數。
2. 不排列一個較大序列，而是直接從這兩個序列的關係來得到中位數。

若選擇第一個解法，至少會花上$O(n)$的時間和空間成本來重新排列，比如說

(舉一個算法以及附圖)

但若我們想讓成本降下來，那麼或許可以使用第二個方法來解，本文將以第二個方法來說明

## 解法


### 使用遞增/遞減來解決


### 使用Binary search來解決


## 效能

### 效能：使用遞增/遞減


### 效能：使用Binary search


## 總結

## 參考文獻

