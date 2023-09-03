<?php

namespace App\Controller;
use MercadoPago;

class PaymentController{
    public function requirePix(){
        echo 'a';
        // MercadoPago\SDK::setAccessToken(getenv('TOKEN_MP'));
        MercadoPago\SDK::setAccessToken("TEST-8915932433518897-082219-fbe52e8a0d7ea997b929b26b6782ed26-179295697");
        $preference = new MercadoPago\Preference();
        $item = new MercadoPago\Item();

        //para cada item, montar um objeto e fazer um array_push
        $item->title = 'Roupa Infantil tamanho P';
        $item->quantity = 3;
        $item->unit_price = (float)22.53;
        $item->picture_url = 'https://static.wikia.nocookie.net/disney/images/d/da/Wreck_it_Ralph_pose_transparent.png/revision/latest?cb=20180228180248&path-prefix=pt-br';
        $item2 = new MercadoPago\Item();
        $item2->title = 'Roupa Infantil Masculina PP';
        $item2->quantity = 6;
        $item2->unit_price = (float)27.90;
        
        // var_dump($item);exit;
        $preference->items = array($item, $item2);

        $preference->back_urls = array(
            "success" => 'site/success',
            "failure" => "site/failure",
            "pending" => "site/pendind"
        );

        $preference->notification_url = 'comprafeita';
        $preference->external_reference = 'id';

        $preference->save();

        $link = $preference->init_point;

        echo "\n\n batata ". $link . " \n\n";

        var_dump($preference);exit;
        
        try{
            $payload = [
                // 'code' => $discord_code,
                'client_id' => '1077215236798558218',
                'client_secret' => 'HlvOJmAly4u8iOswJo60PXgNEmdYaVas',
                'grant_type' => 'authorization_code',
                'redirect_uri' => 'http://localhost:1201/src/proccess-oauth.php',
                'scope' => 'identify%20guids',
            ];
            
            $payload_string = http_build_query($payload);
            $discord_token_url = "https://discordapp.com/api/oauth2/token";
            
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $discord_token_url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $payload_string);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); //localhost doesn't need a ssl certificate
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); //localhost doesn't need a ssl certificate
            
            $return = curl_exec($curl);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}