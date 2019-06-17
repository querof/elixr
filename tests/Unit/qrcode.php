<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Event;
use Request;
use App\Http\Controllers\QrcodeController;

class qrcodeTest extends TestCase
{  
    /** @test */
    public function it_can_create_a_qrcode()
    {
      Event::fake();
        $data = [
          'title' => 'QrcodeTest',
          'description' => 'QrCodeTest description'
      ];

      $request = Request::create('/store', 'POST',$data);

      $controller = new QrcodeController();

      $response = $controller->store($request);

      $this->assertEquals(302, $response->getStatusCode());

    }
}
