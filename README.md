# Library-Management-System
一个基于 Yii2 框架开发的 图书馆管理系统


为了方便图书馆管理员能够更好的管理图书馆内的图书，能够方便的操作图书的借阅、图书的归还。

<br/>

####本系统共有五大模块
  1.  参数设置
  2.  图书档案
  3.  读者管理
  4.  图书借阅
  5.  图书借阅查询
  

#####参数设置模块下，又分为五个子模块
  1. 参数设置
    * 书架管理 &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- **( 对图书馆里的书籍进行分类存放。例如:小说区、计算机区 )**
    * 出版社管理 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- **( 对图书的出版社进行登记，方便做图书出版社分布的信息统计。 例如：清华大学出版社 )**
    * 读者类型管理 &nbsp; - **( 录入各种职业类型与能借的书籍数量。 例如：学生只能借10本书，教师能借 20本书 )**
    * 图书类型管理 &nbsp; - **( 图书类型属于书架下的子分类。例如: 小说区 又分有 武侠小说\科幻小说  )**

  2. 图书档案
    * 图书添加 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- **( 录入图书信息。 例如：书名、ISBN、出版社 等等  )**
    * 图书搜索 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- **( 根据某种搜索类型进行图书搜索，搜索出图书的全部信息。例如：根据 书名 搜索图书  )**
    * 图书信息统计 &nbsp;- **( 统计饼图。根据书架(大分类)和图书类型(小分类)在整个图书馆图书内每个(大/小)分类所占的比重)**
    
  3. 读者管理
    * 添加读者 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - **( 录入读者的信息 例如：姓名、职业  )**
    * 读者搜索 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - **( 根据读者信息或编号搜索读者，方便修改读者信息 )**
    * 读者信息统计 &nbsp;&nbsp;- **( 统计饼图。根据读者职业进行分布统计。 例如：学生在图书馆读者中占比 55.3% )**

  4. 图书借还 - ( 没有子模块 )
    > 此图书借还模块是本系统中的核心模块，集成了 图书借阅 和 图书归还 功能。 
    > 图书借阅 功能块：可以根据 ISBN 号搜索出要借的图书。
    > 图书归还 功能块：对读者所借阅图书的操作 ( 续借/归还 )

  5. 图书借还查询 - ( 没有子模块 )
    > 查询N天内被借阅的书籍( 已归还 或 未归还 )
         
