<?php
namespace App\Library;

use App\Models\Tokens as Token;
use Response;
use File;
use App\User;

class CurlGen {

  public function getToken($urls,$data, $old_token){

    $url = config('custom.api_url').$urls;

    date_default_timezone_set("Asia/Jakarta");
    $token = Token::orderby('id','desc')->first();
    // print_r($url);
    $datas = json_encode($data);
    $content_type = "application/json";

    $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: '.$content_type,
          'Authorization: '.$old_token
        )
      );

      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      // dd($url);
      curl_close($ch);

    $asd = json_decode($output);

    return [$httpCode,$asd];

  }

  public function getIndex($urls){ //GET

    $url = config('custom.api_url').$urls;

    date_default_timezone_set("Asia/Jakarta");
    $content_type = "application/json";
    $user = Token::orderby('id','desc')->first();
    $authorization = $user->token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 4000);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Authorization: Bearer '.$authorization
      )
    );
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      curl_close($ch);

      $param = json_decode($output, true);
      return $param;
  }

  public function store($urls,$data){ //POST

    $url = config('custom.api_url').$urls;

    date_default_timezone_set("Asia/Jakarta");
    $token = Token::orderby('id','desc')->first();

    $datas = json_encode($data);
    $content_type = "application/json";

    $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: '.$content_type,
          'Accept: '.$content_type,
          'Authorization: Bearer '.$token->token
        )
      );
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      curl_close($ch);

      $result = json_decode($output, true);
      // dd($asd);
      return [$httpCode,$result];

  }

  public function edit($urls){ //GET

    $url = config('custom.api_url').$urls;
    date_default_timezone_set("Asia/Jakarta");
    $content_type = "application/json";
    $user = Token::orderby('id','desc')->first();
    $authorization = $user->token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 4000);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Authorization: Bearer '.$authorization
      )
    );
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      curl_close($ch);
      $data = json_decode($output, true);

      return [$httpCode,$data];
  }

  public function update($urls,$data){ //PUT

    $url = config('custom.api_url').$urls;
    date_default_timezone_set("Asia/Jakarta");
    $token = Token::orderby('id','desc')->first();

    $datas = json_encode($data);
    $content_type = "application/json";
    $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: '.$content_type,
        'Accept: '.$content_type,
        'Authorization: Bearer '.$token->token
      )
    );
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);
      $param = json_decode($output, true);
      return [$httpCode,$param];
  }

  public function patch($urls,$data){ //PUT
    $url = config('custom.api_url').$urls;
    date_default_timezone_set("Asia/Jakarta");
    $token = Token::orderby('id','desc')->first();

    $datas = json_encode($data);
    $content_type = "application/json";
    $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: '.$content_type,
        'Accept: '.$content_type,
        'Authorization: Bearer '.$token->token
      )
    );
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);
      $param = json_decode($output, true);
      return [$httpCode,$param];
  }

  public function delete($urls){ //Delete
    date_default_timezone_set("Asia/Jakarta");
    $url = config('custom.api_url').$urls;
    $token = Token::orderby('id','desc')->first();
    $content_type = "application/json";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: */*',
        'Authorization: Bearer '.$token->token
      )
    );
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      curl_close($ch);
      $asd = json_decode($output, true);

      return $httpCode;
  }

}

?>
