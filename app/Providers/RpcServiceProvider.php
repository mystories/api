<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Yar_Client;
use Yar_Client_Exception;
use Yar_Client_Transport_Exception;

class RPCServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('rpc', function($app) {
            return function($method, $params) use ($app) {
                $client = new Yar_Client('tcp://localhost:8900');
                $client->SetOpt(YAR_OPT_PACKAGER, "msgpack");
                $client->SetOpt(YAR_OPT_CONNECT_TIMEOUT, 3000);
                $client->SetOpt(YAR_OPT_TIMEOUT, 3000);
                $client->SetOpt(YAR_OPT_PERSISTENT , true);

                try {
                    $result = $client->__call($method, $params);
                } catch(Yar_Client_Transport_Exception $e) {
                    return ["Error"=> 1, "Msg"=> "rpc error:" + $e->getMessage()];
                }
                return $result;
            };
        });
    }
}
