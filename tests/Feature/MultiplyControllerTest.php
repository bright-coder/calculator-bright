<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MultiplyControllerTest extends TestCase
{
    public function testAddMainViewDisplay()
    {
        $response = $this->get('/multiply');
        
        $response->assertStatus(200)
            ->assertSee('Multiply (คูณ)')
            ;
    }

    public function testAnswerShouldDisplay()
    {
        $response = $this->post('/multiply', ['num1' => 1, 'num2' => 2]);

        $response->assertStatus(200)
            ->assertSee('2')
            ;
    }

    public function testAnswerShouldReceiveFormAnotherView() 
    {
        $response = $this->post('/multiply', ['num1' => 5, 'num2' => 0]);

        $response->assertStatus(200)
            ->assertSee('0')
            ;
    }

    public function testCharacterShouldDisplayWarningMessage() 
    {
        $response = $this->post('/multiply', ['num1' => 4, 'num2' => 'a']);

        $response->assertStatus(200)
            ->assertSee('Numbers are required')
            ;

        $response = $this->post('/multiply', ['num1' => 'a', 'num2' => 'b']);

        $response->assertStatus(200)
            ->assertSee('Numbers are required')
            ;
    }

    public function testFloatShouldBeMultiplied() 
    {
        $response = $this->post('/multiply', ['num1' => 2.0, 'num2' => 2.2]);

        $response->assertStatus(200)
            ->assertSee('4.4')
        ;
        
        $response = $this->post('/multiply', ['num1' => 3, 'num2' => 1.0]);
        $response->assertStatus(200)
            ->assertSee('3')
        ;
        
        $response = $this->post('/multiply', ['num1' => 3.0, 'num2' => 2]);
        $response->assertStatus(200)
            ->assertSee('6')
        ;
        
        $response = $this->post('/multiply', ['num1' => 1.5, 'num2' => 10]);
        $response->assertStatus(200)
            ->assertSee('15')
        ;
    }

    public function testNegativeShouldBeMultiplied() 
    {
        $response = $this->post('/multiply', ['num1' => -1, 'num2' => -1]);
        $response->assertStatus(200)
                ->assertSee('1')
        ;
        
        $response = $this->post('/multiply', ['num1' => 2, 'num2' => -4]);
        $response->assertStatus(200)
                ->assertSee('-8')
        ;
    }
}
