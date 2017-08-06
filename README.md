# Calculator

เว็บแอปพลิเคชันเพื่อแสดงตัวอย่างการเขียนกรณีทดสอบ

## ความต้องการเบื้องต้น
| รายการซอฟต์แวร์ | รุ่นขั้นต่ำ | รุ่นที่แนะนำ | รุ่นที่ใช้พัฒนา |
|---------------|:------:|:--------:|:---------:|            
| PHP           | >=5.5  | 5.5      | 7         |
| composer      | 1.4.2  | 1.4.2    | 1.4.2     |

## การติดตั้ง

1. ดาวน์โหลด ```we-inc/calculator``` ด้วยคำสั่ง
    ```
    git clone https://github.com/we-inc/calculator
    ```

1. อัพเดต lib ด้วยคำสั่ง ```composer```
    ```
    cd calculator && \
    composer update
    ```
    
1. กรณีทดสอบจะอยู่อยู่ภายในโฟลเดอร์
    ```
    + tests
        + Features
        |  + AddControllerTest.php
        |  + MinusControllerTest.php
        + Unit
    ```

1. สร้างกรณีทดสอบโดยใช้คำสั่ง
    ```php artisan make:test SomeTestCaseTest```
    เพื่อสร้างกรณีทดสอบสำหรับหน้าที่การใช้งานตัวไป และ
    ```php artisan make:test SomeControllerTest --unit```
    สำหรับกรณีทดสอบสำหรับคลาสใดคลาสหนึ่ง

## ข้อมูลเพิ่มเติม

ข้อมูลเพิ่มเติมสำหรับกรณีทดสอบ 
- [Laravel: Getting Started](https://laravel.com/docs/master/testing)
- [Illuminate: TestCase API](https://laravel.com/api/master/Illuminate/Foundation/Testing/TestCase.html)
