# Web编程II最终课题

## 项目概述

本项目是Web编程II课程的最终课题，旨在通过实际开发一个完整的Web应用程序来展示学生对Web开发技术的掌握程度。

## 课题要求

### 原版日文要求

#### プログラム記述上の要件
1. 関数を複数用意する。
2. 複数のページを移り変わるようにする。
   - (これまでの課題は自分自身のページを呼び出していました。これは講義でプログラムのリストの量を減らすためでしたが、最終課題では別なページを呼び出す形式にしてください。)
3. システム要件(どちらか１つ)
   - (1)複数のテーブルのデータベースを利用する。
   - (2)テーブルとWebAPIを組み合わせたもの

#### 課題(最終課題)
最終課題案をPowerpointで作る。
1. プログラムのタイトル
2. プログラムの内容
3. Webページのデザイン(まずはプログラムでないお絵かきで)
4. プログラムの説明(まだプログラムしない)
5. データベースの仕様(どんなデータを保存するか、登録するデータの具体例をかく)
   - 5.1 1つ目のテーブル
   - 5.2 2つ目のテーブル
6. 考察 他者評価をします。
   - +修正
   - +プログラム作成

#### 提出要求
7/15までに提出するもの
- WebプログラミングII最終課題1.pptx
- ここで、さぼると、最終課題の提出が間に合わない可能性がある。必ず作成してください。

### 中文翻译版本

#### 程序编写要求
1. 准备多个函数。
2. 实现多个页面之间的切换。
   - (以往的课题都是调用自己的页面。这是为了在课堂上减少程序列表的数量，但在最终课题中，请使用调用其他页面的形式。)
3. 系统要求(选择其中一个)
   - (1)使用多个表的数据库。
   - (2)结合表和Web API的系统

#### 课题(最终课题)
用PowerPoint制作最终课题方案。
1. 程序标题
2. 程序内容
3. 网页设计(首先用非编程方式绘制)
4. 程序说明(还不用编程)
5. 数据库规格(要保存什么数据，写出注册数据的具体例子)
   - 5.1 第一个表
   - 5.2 第二个表
6. 考察 将进行他人评价。
   - +修正
   - +程序创建

#### 提交要求
7/15之前提交的内容
- WebプログラミングII最終課題1.pptx
- 在这里偷懒的话，最终课题的提交可能会来不及。请务必创建。

## 项目规划

### 技术选型
- **前端**: HTML, CSS
- **后端**: PHP
- **数据库**: MySQL
- **服务器**: Apache/Nginx + PHP

### 开发步骤
1. 需求分析和项目规划
2. 数据库设计
3. 页面设计和用户界面
4. 前端开发
5. 后端开发
6. 数据库集成
7. 测试和调试
8. 部署和优化

### 项目结构
```
webtest/
├── README.md          # 项目说明文档
├── index.php          # 首页
├── pages/             # 其他页面
│   ├── login.php      # 登录页面
│   ├── register.php   # 注册页面
│   └── dashboard.php  # 仪表板页面
├── includes/          # 公共包含文件
│   ├── config.php     # 数据库配置
│   ├── functions.php  # 公共函数
│   └── header.php     # 页面头部
├── css/               # 样式文件
├── images/            # 图片资源
├── sql/               # 数据库脚本
│   └── database.sql   # 数据库创建脚本
└── docs/              # 文档目录
```

## 使用说明

### 环境要求
- PHP 7.4 或更高版本
- MySQL 5.7 或更高版本
- Apache/Nginx 服务器

### 安装步骤
1. 将项目文件放置到Web服务器目录（如 `/var/www/html/` 或 `htdocs/`）
2. 启动Apache/Nginx服务器
3. 启动MySQL服务

### 数据库配置
1. 创建MySQL数据库
2. 导入 `sql/database.sql` 文件
3. 修改 `includes/config.php` 中的数据库连接信息：
   ```php
   $host = 'localhost';
   $username = 'your_username';
   $password = 'your_password';
   $database = 'your_database';
   ```

### 运行项目
1. 在浏览器中访问 `http://localhost/webtest/`
2. 或者如果使用虚拟主机，访问相应的域名

## 注意事项

- 确保满足所有编程要求
- 实现多页面导航功能（使用PHP页面跳转）
- 数据库设计要合理（创建至少两个相关联的表）
- 代码要有良好的注释
- 按时提交PowerPoint方案
- 使用PHP的`include`或`require`来包含公共文件
- 使用PHP的`header()`函数实现页面跳转
- 确保PHP代码的安全性（防止SQL注入等）

## PHP开发指导

### 页面跳转示例
```php
// 使用header函数跳转到其他页面
header("Location: pages/dashboard.php");
exit();
```

### 数据库连接示例
```php
// includes/config.php
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
```

### 函数定义示例
```php
// includes/functions.php
function getUserById($id) {
    global $conn;
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
}
```

## 更新日志

- 2024-01-XX: 初始化项目结构
- 2024-01-XX: 完成需求分析
- 2024-01-XX: 开始开发阶段

## 联系方式

如有问题，请联系开发者。

---

## 项目具体实现方案

### 📋 项目主题：简化版个人照片博客系统

这是一个适合大二学生的简单照片分享系统，用户可以上传自己的照片，添加地点和描述信息，并进行简单的管理。

### 🎯 核心功能（保持最简单）

1. **上传照片** - 一个简单的表单，包含照片文件和基本信息
2. **展示照片** - 列表显示所有照片，包含缩略图
3. **查看详情** - 点击照片查看大图和详细信息
4. **删除照片** - 简单的删除功能

### 🗄️ 数据库设计（最简单）

#### 表1：照片表 (photos)
```sql
CREATE TABLE photos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    filename VARCHAR(255) NOT NULL,
    title VARCHAR(100) NOT NULL,
    location VARCHAR(100),
    description TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### 表2：分类表 (categories)
```sql
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    photo_count INT DEFAULT 0
);
```

### 📄 页面结构（最简单）

```
webtest/
├── index.php          # 首页 - 显示所有照片
├── upload.php         # 上传页面
├── view.php           # 查看照片详情
├── delete.php         # 删除照片
├── includes/
│   ├── config.php     # 数据库配置
│   └── functions.php  # 公共函数
├── uploads/           # 上传的照片存储目录
├── css/
│   └── style.css      # 样式文件
└── sql/
    └── database.sql   # 数据库创建脚本
```

### 🔧 使用的基础语法

- **PHP基础**：`$_POST` 和 `$_GET` 获取表单数据
- **数据库**：`mysqli_connect()` 连接数据库，基础增删改查
- **文件处理**：`move_uploaded_file()` 上传文件
- **页面跳转**：`header()` 实现页面跳转
- **HTML表单**：基础的文件上传表单
- **CSS样式**：简单的页面美化

### 📚 学习重点

1. **PHP基础语法** - 变量、数组、条件语句、循环
2. **表单处理** - 接收和验证用户输入
3. **文件上传** - 处理图片文件上传和存储
4. **数据库操作** - 连接数据库，执行增删改查
5. **页面跳转** - 多页面之间的切换和导航
6. **安全基础** - 简单的输入验证和文件类型检查

### 🎓 开发学习流程

#### 第一步：环境准备
- 创建项目文件夹
- 设置数据库连接
- 创建数据库表结构

#### 第二步：上传功能
- 学习HTML文件上传表单
- 学习PHP文件处理
- 实现照片上传和信息保存

#### 第三步：展示功能
- 学习从数据库读取数据
- 学习PHP循环显示数据
- 实现照片列表展示

#### 第四步：详情功能
- 学习URL参数传递
- 学习根据ID查询单条数据
- 实现照片详情页面

#### 第五步：删除功能
- 学习确认删除操作
- 学习删除数据库记录
- 学习删除文件

#### 第六步：美化界面
- 学习基础CSS样式
- 美化页面布局
- 提升用户体验

### 🔍 项目特点

- **简单易懂** - 适合初学者学习
- **功能完整** - 满足课题所有要求
- **实用性强** - 真正可以使用的照片博客
- **技术基础** - 涵盖PHP、HTML、MySQL核心知识
- **循序渐进** - 一步步学习，逐步完善

### 📝 课题要求对照

✅ **多个函数** - 上传函数、展示函数、删除函数等
✅ **多页面跳转** - index.php → upload.php → view.php → delete.php
✅ **多个数据库表** - photos表 + categories表
✅ **PHP + HTML + MySQL** - 完全符合技术要求

### 🚀 预期成果

完成后您将获得：
- 一个完整的照片博客系统
- 扎实的PHP基础知识
- 数据库操作经验
- 文件上传处理能力
- 多页面Web开发经验

### 📋 PowerPoint方案要素

1. **程序标题**：个人照片博客系统
2. **程序内容**：照片上传、展示、删除管理
3. **网页设计**：简洁的博客风格界面
4. **程序说明**：基于PHP+MySQL的多页面应用
5. **数据库规格**：
   - 5.1 照片表：存储照片信息和描述
   - 5.2 分类表：存储照片分类信息
6. **考察重点**：文件上传、数据库操作、页面跳转 

index.php          # 首页 - 显示所有照片
upload.php         # 上传页面
view.php           # 查看照片详情
delete.php         # 删除照片