<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddControllerTest extends TestCase
{
    
    public function testAddMainViewDisplay()
    {
        $response = $this->get('/add');
        
        $response->assertStatus(200)
            ->assertSee('Add (บวก)')
            ;
    }

    public function testAnswerShouldDisplay()
    {
        $response = $this->post('/add', ['num1' => 1, 'num2' => 2]);

        $response->assertStatus(200)
            ->assertSee('3')
            ;
    }

    public function testAnswerShouldReceiveFormAnotherView() 
    {
        $response = $this->post('/add', ['num1' => 5, 'num2' => 0]);

        $response->assertStatus(200)
            ->assertSee('5')
            ;
    }

    public function testCharacterShouldDisplayWarningMessage() 
    {
        $response = $this->post('/add', ['num1' => 4, 'num2' => 'a']);

        $response->assertStatus(200)
            ->assertSee('Numbers are required')
            ;

        $response = $this->post('/add', ['num1' => 'a', 'num2' => 'b']);

        $response->assertStatus(200)
            ->assertSee('Numbers are required')
            ;
    }

    public function testFloatShouldBeAdded() 
    {
        $response = $this->post('/add', ['num1' => 3.2, 'num2' => 1.8]);

        $response->assertStatus(200)
            ->assertSee('5')
        ;
        
        $response = $this->post('/add', ['num1' => 3, 'num2' => 1.0]);
        $response->assertStatus(200)
            ->assertSee('4')
        ;
        
        $response = $this->post('/add', ['num1' => 3.0, 'num2' => 1]);
        $response->assertStatus(200)
            ->assertSee('4')
        ;
        
        $response = $this->post('/add', ['num1' => 0.0, 'num2' => 0.0]);
        $response->assertStatus(200)
            ->assertSee('0')
        ;
    }

    public function testNegativeShouldBeAdd() 
    {
        $response = $this->post('/add', ['num1' => 1, 'num2' => -1]);
        $response->assertStatus(200)
                ->assertSee('0')
        ;
        
        $response = $this->post('/add', ['num1' => 1, 'num2' => -1]);
        $response->assertStatus(200)
                ->assertSee('0')
        ;
    }
    
}
