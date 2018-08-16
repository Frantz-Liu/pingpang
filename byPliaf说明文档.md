# byPliaf

### 数据表(后台管理员表)

#### 表名: manager

| 字段名   | 数据类型         | 字段功能      |
| -------- | ---------------- | ------------- |
| id       |                  | 自增主键      |
| username | string(20)       | 用户名        |
| password | sting(255)       | 密码          |
| name     | string(10)       | 姓名          |
| gender   | enum(男,女,保密) | 性别          |
| mobile   | char(11)         | 手机号        |
| email    | string(40)       | Email         |
| 用户状态 | enum(1,2)        | 1=禁用,2=启用 |











