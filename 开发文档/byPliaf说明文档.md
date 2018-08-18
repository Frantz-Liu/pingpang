# byPliaf


### 数据表(后台管理员表)

#### 表名: manager

| 字段名   | 数据类型                | 字段功能               |
| -------- | -----------------------| ----------------------|
| id       |                        | 自增主键               |
| username | string(20)             | 用户名                 |
| password | sting(255)             | 密码                   |
| name     | string(10)             | 姓名                   |
| gender   | enum('男','女','保密')  | 性别                   |
| mobile   | char(11)               | 手机号                 |
| email    | string(40)             | Email                  |
| status   | enum(1,2)              | 用户状态,1=禁用,2=启用  |


###数据表(后台赛事表)

####表名:competitions 
| 字段名               |   数据类型  |  字段功能 |
| --------------------|-------------| ---------|
| id                  |             | 自增主键  |
| competitions_name   | string(50)  | 赛事名称  |
| date                | date        | 赛事日期  |
| events              | string(100) | 比赛项目(男单,女单,男双,女双,混合,男团,女团)  |
| counrty             | string(20)  | 比赛国家  |
| city                | string(20)  | 比赛城市  |


###数据表(比赛详细数据表)

#### 表名: matchdetails
| 字段名     | 数据类型          | 字段功能               |
| --------- | ----------------- | ----------------------|
| id        |                   | 自增主键               |
| match_id  | tinyInteger       | 比赛id                 |
| order     | tinyInteger       | 顺序                   |
| game      | tinyInteger       | 局数                   |
| a_score   | tinyInteger       | A得分                  |
| b_score   | tinyInteger       | B得分                  |
| server    | tinyInteger       | 发球方运动员id          |
| a_count   | tinyInteger       | A拍数                  |
| b_count   | tinyInteger       | B拍数                  |
| a_method  | string(20)        | A手段                  |
| b_method  | string(20)        | B手段                  |
| winner    | tinyInteger       | 得分方id               |






