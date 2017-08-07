<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DivideControllerTest extends TestCase
{
    public function testAddMainViewDisplay()
    {
        $response = $this->get('/divide');
        
        $response->assertStatus(200)
            ->assertSee('Divide (หาร)')
            ;
    }

    public function testAnswerShouldDisplay()
    {
        $response = $this->post('/divide', ['num1' => 1, 'num2' => 2]);

        $response->assertStatus(200)
            ->assertSee('0.5')
            ;
    }

    public function testAnswerShouldReceiveFormAnotherView() 
    {
        $response = $this->post('/divide', ['num1' => 5, 'num2' => 5]);

        $response->assertStatus(200)
            ->assertSee('1')
            ;
    }

    public function testCharacterShouldDisplayWarningMessage() 
    {
        $response = $this->post('/divide', ['num1' => 4, 'num2' => 'a']);

        $response->assertStatus(200)
            ->assertSee('Numbers are required')
            ;

        $response = $this->post('/divide', ['num1' => 'a', 'num2' => 'b']);

        $response->assertStatus(200)
            ->assertSee('Numbers are required')
            ;
    }

    public function testFloatShouldBeDivided() 
    {
        $response = $this->post('/divide', ['num1' => 3, 'num2' => 1.5]);

        $response->assertStatus(200)
            ->assertSee('2')
        ;
        
        $response = $this->post('/divide', ['num1' => 1, 'num2' => 0.5]);
        $response->assertStatus(200)
            ->assertSee('2')
        ;
        
        $response = $this->post('/divide', ['num1' => 3.0, 'num2' => 2]);
        $response->assertStatus(200)
            ->assertSee('1.5')
        ;
        
        $response = $this->post('/divide', ['num1' => 10, 'num2' => 2.5]);
        $response->assertStatus(200)
            ->assertSee('4')
        ;
    }

    public function testNegativeShouldBeDivided() 
    {
        $response = $this->post('/divide', ['num1' => -1, 'num2' => -1]);
        $response->assertStatus(200)
                ->assertSee('1')
        ;
        
        $response = $this->post('/divide', ['num1' => 2, 'num2' => -4]);
        $response->assertStatus(200)
                ->assertSee('-0.5')
        ;
    }

    public function testZeroShouldNotBeDivider(){
    	$response = $this->post('/divide', ['num1' => 40, 'num2' => 0]);
        $response->assertStatus(200)
                ->assertSee('Cannot divided by zero')
        ;
    }
}
