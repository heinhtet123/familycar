<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Repositories\BookingRepositories;
class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
 


    public function tearDown(){
        Mockery::close();
    }

   

    public function testBasicExample()
    {
        // return $interval->format('%a days %h hours %i minutes %s seconds');
        // dd( (new BookingRepositories())->daysleft("2017-05-05"));
        
        // $this->WithoutMiddleware();
        //mock stage 
        $mock = Mockery::mock("App\Http\Repositories\BookingRepositories");
       // $this->app->instance("App\Http\Repositories\BookingRepositories", $mock);
       //      ->with($input)->andReturn("1 days 3 hours 50 minutes 25 seconds");

        $mock->shouldReceive('daysleft')->with("2017-05-05")->once()->andReturn("1 days 2 hours 28 minutes 12 seconds");

        // $bookingRepository = App::make(App\Http\Repositories\BookingRepositories::class, array($mock));

          $this->assertEquals('1 days 2 hours 28 minutes 12 seconds', $mock->daysleft("2017-05-05"));
 
    }





}
