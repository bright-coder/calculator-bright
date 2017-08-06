# Calculator

เว็บแอปพลิเคชันเพื่อแสดงตัวอย่างการเขียนกรณีทดสอบ โดยใช้ `Laravel 5.4` และ `PHPUnit` เพื่อการทดสอบ

## ความต้องการเบื้องต้น
| รายการซอฟต์แวร์ | รุ่นขั้นต่ำ | รุ่นที่แนะนำ | รุ่นที่ใช้พัฒนา |
|---------------|:------:|:--------:|:---------:|            
| PHP           | >=5.5  | 5.5      | 7         |
| composer      | 1.4.2  | 1.4.2    | 1.4.2     |

## การติดตั้ง

1. ดาวน์โหลด `we-inc/calculator` ด้วยคำสั่ง
    ```bash
    git clone https://github.com/we-inc/calculator
    ```

1. อัพเดต lib ด้วยคำสั่ง `composer`
    ```bash
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

1. สร้างกรณีทดสอบโดยใช้คำสั่งด้านล่าง โดยคำสั่งนี้จะสร้างคลาสซึ่งเป็น Unit Test ชื่อ `SomeTestCaseTest` (โดยที่กรณีทดสอบนั้นต้องลงท้ายชื่อด้วย `Test`)
    ```bash
    php artisan make:test SomeTestCaseTest
    ```
    เพื่อสร้างกรณีทดสอบสำหรับหน้าที่การใช้งานตัวไป และ

    ```bash
    php artisan make:test SomeControllerTest --unit
    ```
    สำหรับกรณีทดสอบสำหรับคลาสใดคลาสหนึ่ง
    
1. ภายในคลาส `SomeTestCaseTest` ที่สร้างขึ้นมานั้น จะมีซอร์สโค้ดดังตัวอย่างด้านล่าง
    ```php
    <?php

        namespace Tests\Feature;
        
        use Tests\TestCase;
        use Illuminate\Foundation\Testing\WithoutMiddleware;
        use Illuminate\Foundation\Testing\DatabaseMigrations;
        use Illuminate\Foundation\Testing\DatabaseTransactions;
        
        class SomeTestCaseTest extends TestCase
        {
            /**
             * A basic test example.
             *
             * @return void
             */
            public function testExample()
            {
                $this->assertTrue(true);
            }
        }
    ```
    ด้านในจะปรากฏเมธอด `testExample()` ซึ่งเมธอดที่มีชื่อขึ้นต้นด้วย `test` นั้นจะบรรจุกรณีทดสอบ ซึ่งจะนำมาใช้ทดสอบคุณสมบัติต่าง ๆ ของซอฟต์แวร์ตามที่ต้องการ

1. ทดสอบซอฟต์แวร์ด้วยกรณีทดสอบที่สร้างขึ้นด้วยคำสั่ง `phpunit` ณ โฟลเดอร์ชั้นบนสุดของโปรเจค
    ```php
    phpunit
    ```

    เมื่อผลการทดสอบเสร็จสิ้น จะมีผลลัพธ์การดำเนินการแสดงให้ทราบ

## ข้อมูลเพิ่มเติม

ข้อมูลเพิ่มเติมสำหรับกรณีทดสอบ 
- [Laravel: Getting Started](https://laravel.com/docs/master/testing)
- [Illuminate: TestCase API](https://laravel.com/api/master/Illuminate/Foundation/Testing/TestCase.html)
