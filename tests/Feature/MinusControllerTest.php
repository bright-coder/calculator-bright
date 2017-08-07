<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MinusControllerTest extends TestCase
{

    public function testMinusMainViewDisplay()
    {
        $response = $this->get('/minus');
        
        $response->assertStatus(200)
            ->assertSee('Minus (ลบ)')
            ;
            
    }

    public function testMinusAnswerShouldDisplay()
    {
        $response = $this->post('/minus', ['num1' => 1, 'num2' => 1]);

        $response->assertStatus(200)
            ->assertSee('0')
            ;
    }

    public function testAnswerShouldReceiveFormAnotherView() 
    {
        $response = $this->post('/minus', ['num1' => 0, 'num2' => 0]);

        $response->assertStatus(200)
            ->assertSee('0')
            ;
    }

    public function testCharacterShouldDisplayWarningMessage() 
    {
        $response = $this->post('/minus', ['num1' => 1, 'num2' => 'a']);
        $response->assertStatus(200)
            ->assertSee('Numbers are required')
            ;

        $response = $this->post('/minus', ['num1' => 'a', 'num2' => 1]);
        $response->assertStatus(200)
            ->assertSee('Numbers are required')
            ;

        $response = $this->post('/minus', ['num1' => 'a', 'num2' => 'b']);
        $response->assertStatus(200)
            ->assertSee('Numbers are required')
            ;
    }

    public function testFloatShouldBeMinus() 
    {
        $response = $this->post('/minus', ['num1' => 3.2, 'num2' => 1.2]);
        $response->assertStatus(200)
            ->assertSee('2')
        ;
        
        $response = $this->post('/minus', ['num1' => 3, 'num2' => 1.0]);
        $response->assertStatus(200)
            ->assertSee('2')
        ;
        
        $response = $this->post('/minus', ['num1' => 3.0, 'num2' => 1]);
        $response->assertStatus(200)
            ->assertSee('2')
        ;
        
        $response = $this->post('/minus', ['num1' => 0.0, 'num2' => 0.0]);
        $response->assertStatus(200)
            ->assertSee('0')
        ;
    }

    public function testNegativeShouldBeMinus() 
    {
        $response = $this->post('/minus', ['num1' => 1, 'num2' => -1]);
        $response->assertStatus(200)
                ->assertSee('2')
        ;
        
        $response = $this->post('/minus', ['num1' => -1, 'num2' => -1]);
        $response->assertStatus(200)
                ->assertSee('0')
        ;
        
        $response = $this->post('/minus', ['num1' => -1, 'num2' => 2]);
        $response->assertStatus(200)
                ->assertSee('-3')
        ;
    }
}
