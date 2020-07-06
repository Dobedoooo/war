from pyquery import PyQuery as pq
import numpy as np
import pandas as pd

# 请求头
user_agent = {
  "User-Agent" : "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36"
}

url = 'https://www.bootcss.com/'
#获取文档
doc = pq(url, headers=user_agent)

imgSrcs = []

# 包含需要的img标签src和alt（a标签title）
img = doc('.thumbnail img')
# type(res) = <class 'generator'>
res_1 = img.items()

# 包含需要的标题和副标题
title = doc('.caption h3 a')
res_2 = title.items()

# 包含需要的段落
ps = doc('.caption > p')
res_3 = ps.items()

i = 0

srcs = []
alts = []
titles = []
text = []

for src in res_1:
    srcs.append(src.attr('data-src'))
    alts.append(src.attr('alt'))

for a in res_2:
    titles.append(a.text().split('\n'))

# print([i for item in titles for i in item][1])

for p in res_3:
    text.append(p.text())

file = open('D:\\全栈\\7\\boostrap首页\\data.txt', 'w', encoding='utf-8')

for i in range(75):
    file.write(alts[i]) # 1.a title
    file.write('\n')
    file.write(srcs[i]) # 2.img src
    file.write('\n')
    file.write(alts[i]) # 3.img alt
    file.write('\n')
    file.write([i for item in titles for i in item][2 * i]) # 4.a text
    file.write('\n')
    file.write([i for item in titles for i in item][2 * i + 1]) # 5.a subtext
    file.write('\n')
    file.write(text[i]) # 6.p text
    file.write('\n')
    file.write('\n')
    print('第 %d 项完成.' % i)

# print(len(text))
# 0 1 2 3 4 5
# 0 2 4 6
# 1 3 5 7