# castore-server
>作者：[codimiracle](https://github.com/codimiracle)
>项目链接：[castore-server](https://github.com/codimiracle/castore-server)
## 目录
- [简介](#简介)
- [特色](#特色)
- [安装/配置](#安装配置)
- [附加说明](#附加说明)

### 简介
这个东东是为了填补 15 级师兄留下的坑而制作的。
### 特色
- 完整的 PC 网页体验
- 完整的 AppStore 体验
- 提供了客户端访问接口，使用 OkHttp(java) 进行连接即可。
### 安装/配置
- 安装
    - 依赖
        - PHP >= 5.4
    - 步骤
        - 克隆项目
        - 移动到 apache 的 www 文件夹。
        - 浏览 http://localhost/CAstoreServer
    
- 配置
    - 打开项目根目录
    - 编辑 settings.php
        ```php
        <?php
          // 与网站相关的变量
          $website = array();
          // 与网站数据库相关的变量
          $database = array();
        ```
    - 根据实际需要编辑模板
        - templates
### 附加说明
- deline: [here](https://github.com/codimiracle/deline)
- license: LGPL2.0
- bugs: [feedback](mailto:Codimiracle@outlook.com)
