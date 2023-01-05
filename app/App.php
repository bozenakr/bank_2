<?php
namespace Bank2;

use Bank2\Controllers\Client;
// use Bank2\Controllers\Api;

class App {

    public static function start()
    {
        //request uri paverciam i masyva
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url);
        return self::router($url);
        
    }
    //cia kreipiuos i kontrolerius
    private static function router(array $url)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($url[0] == 'clients' && count($url) == 1 && $method == 'GET') {
            return (new Client)->index();
        }

        if ($url[0] == 'clients' && $url[1] == 'create' && count($url) == 2 && $method == 'GET') {
            return (new Client)->create();
        }

        if ($url[0] == 'clients' && $url[1] == 'save' && count($url) == 2 && $method == 'POST') {
            return (new Client)->save();
        }

        if ($url[0] == 'clients' && $url[1] == 'deposit' && count($url) == 3 && $method == 'GET') {
            return (new Client)->deposit($url[2]);
        }

        if ($url[0] == 'clients' && $url[1] == 'withdraw' && count($url) == 3 && $method == 'GET') {
            return (new Client)->withdraw($url[2]);
        }

        if ($url[0] == 'clients' && $url[1] == 'update' && count($url) == 3 && $method == 'POST') {
            return (new Client)->update($url[2]);
        }

        if ($url[0] == 'clients' && $url[1] == 'delete' && count($url) == 3 && $method == 'POST') {
            return (new Client)->delete($url[2]);
        }

        if ($url[0] == 'users' && $url[1] == 'all' && count($url) == 2 && $method == 'GET') {
            return (new Api)->allUsers();
        }

        if ($url[0] == 'users' && $url[1] == 'js' && count($url) == 2 && $method == 'GET') {
            return (new Api)->jsUsers();
        }

        return 'pagrindinis psl login';
    }

    //view metodas paima kintamuosius ir sumeta i template (failai view folderyje) - top, bottom.. viskas yra atskirta (cia headerio menu pvz)
    //$_name tai pvz ne view/calculator o kitas file view folderyje (jei norim kitaip atvaizduot)
    public static function view(string $__name, array $data)
    {
        //buferis - sukuriam kintamaji, kuriame saugom ka sukurem
        ob_start();

        //is array su elementais su savybem padaro kintamuosius
        extract($data);

        require __DIR__ .'/../view/header.php';
        
        //paleidziam faila $name - pvz client
        require __DIR__ .'/../view/'.$__name.'.php';

        require __DIR__ .'/../view/footer.php';

        //nuskaitymas is buferio i kintamaji (viskas nebuvo isechointa, o pasiliko buferyje)
        $out = ob_get_contents();

        //isvalau buferi
        ob_end_clean();

        //funkcija view grazina kintamaji $out
        return $out;
    }

    //naudoju Client.php kontroleryje
    public static function redirect($url)
    {
        header('Location: ' . URL . $url);
        return null;
    }
}