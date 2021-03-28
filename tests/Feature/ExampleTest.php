<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use OrderStatusesTableSeeder;


class ExampleTest extends TestCase
{
        use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_url_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');

        $response->assertStatus(200);
    }
        public function test_login_2_users()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $user1 = User::factory()->create();

        $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->get('/adverts/create');
                        
        $response = $this->actingAs($user1)
                        ->withSession(['banned' => false])
                        ->get('/adverts/create');
                        
        $response->assertStatus(200);
    }

        public function test_register()
    {
                $this->withoutExceptionHandling();

        $response = $this->post('/register',[
            'name'=>'Krzysztof Witkowwski',
            'email'=>'krzysiekwit1@gmail.com',
            'password'=>'Bestfolk1',
            'password_confirmation'=>'Bestfolk1',
        ]);

        $response->assertStatus(302);
    }

        public function test_create_advert_as_user()
    {
                $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->get('/adverts/create');
                        
        $response->assertStatus(200);
    }
            public function test_userpanel_access_test()
    {
                $user = User::factory()->create();
                        $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->get('/userpanel');
                        $response->assertStatus(200);
        
    }
                public function test_add_advert_access_test()
    {
                $user = User::factory()->create();
                        $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->get('/adverts/create');
                        $response->assertStatus(200);
        
    }
                    public function test_add_advert_post_test()
    {
                $user = User::factory()->create();
                $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->get('/adverts/create');
                        $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->post('/adverts',[
                            'name'=>'Marek Czarek',
                            'nativ_language_1'=>'Arabic',
                            'country'=>'Poland',
                            'city'=>'Ciechanow',
                            'language_1'=>'Arabic',
                            'language_level_1'=>'A1',
                            'description'=>'ASDasdfasdfasdf',
                            'price'=>'40',
                        ]);
                        $response2 = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->get('/adverts/create');
                        $response2 = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->post('/adverts',[
                            'name'=>'Marek Czarek',
                            'nativ_language_1'=>'Arabic',
                            'country'=>'Poland',
                            'city'=>'Ciechanow',
                            'language_1'=>'Arabic',
                            'language_level_1'=>'A1',
                            'description'=>'ASDasdfasdfasdf',
                            'price'=>'40',
                        ]);
                        $this->assertDatabaseCount('adverts', 2);
    }

            public function test_edit_advert_access_test()
    {
                $user = User::factory()->create();
                        $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->get('/adverts/3/edit');
                        $response->assertStatus(500);
    }
                public function test_edit_advert_after_created_advert_access_test()
    {
                $user = User::factory()->create();
                $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->get('/adverts/create');
                        $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->post('/adverts',[
                            'name'=>'Marek Czarek',
                            'nativ_language_1'=>'Arabic',
                            'country'=>'Poland',
                            'city'=>'Ciechanow',
                            'language_1'=>'Arabic',
                            'language_level_1'=>'A1',
                            'description'=>'ASDasdfasdfasdf',
                            'price'=>'40',
                        ]);
                        $response2 = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->get('/adverts/1/edit');
                            $response->assertStatus(302);
    }
            public function test_calendar_access_test()
    {
                $user = User::factory()->create();
                        $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->get('/calendar/10/2020');
                        $response->assertStatus(200);
    }
                public function test_unauthenticated_user_advert_create_access_test()
    {
            $response = $this->withSession(['banned' => false])->get('/adverts/create');
                        $response->assertStatus(302);
    }
                public function test_unauthenticated_user_advert_edit_access_test()
    {
            $response = $this->withSession(['banned' => false])->get('/adverts/edit');
                        $response->assertStatus(302);
    }
                public function test_unauthenticated_user_main_access_test()
    {
            $response = $this->withSession(['banned' => false])->get('/');
                        $response->assertStatus(200);
    }
                    public function test_unauthenticated_userpanel_access_test()
    {
            $response = $this->withSession(['banned' => false])->get('/userpanel');
                        $response->assertStatus(302);
    }
        public function test_json()
    {
                $user = User::factory()->create();
                        $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->post('/calendar/10/2020');
                        $response->assertStatus(200);
    }

}
