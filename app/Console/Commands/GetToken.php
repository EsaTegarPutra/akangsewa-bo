<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tokens;
use App\Library\CurlGen;

class GetToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Token Backend';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(CurlGen $curlGen)
    {
      date_default_timezone_set("Asia/Jakarta");
      $url = "/api/authenticate";
      $user = "admin";
      $old_token = Tokens::orderby('id','desc')->first();
      $passwordString = "admin";
      $data = array(
          'password' => $passwordString,
          'rememberMe' => true,
          'username' => $user
        );

      $param = $curlGen->getToken($url, $data, $old_token);

       // print_r($param);

      $token = Tokens::orderby('id','desc')->first();
      $token->token = $param[1]->id_token;
      $token->save();
    }
}
