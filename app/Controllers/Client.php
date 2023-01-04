<?php 
namespace Bank2\Controllers;
use Bank2\App;
use Bank2\DB\FileReader as FR;

class Client {
    
    public function index()
    {
        //clients tai failas i kuri irasines
        //view tai vieta kur html ir duomenys sueina i viena ir renderinasi i vaizda
        $clients = (new FR('clients'))->showAll();
        $pageTitle = 'Clients | List';
        return App::view('Client-list', compact('clients', 'pageTitle'));
    }
    public function create()
    {
        $pageTitle = 'Account | New';
        return App::view('client-create', compact('pageTitle'));
    }
    
    //save funkcija perduos duomenis per body(post array)
    //is Filereader imu create perduodu i masyva ir jis is posto ir bus tas masyvas
    //issaugom tai ka turim post array ir pereinam su tuo i sarasa
    public function save()
    {
        (new FR('clients'))->create($_POST);
        //negrazinam vaizda o pereinam i kita psl (pagrindini) kuriu nauja funkcija redirect App.php
        return App::redirect('clients');
    }

    public function edit($id)
    {
        $pageTitle = 'Account | Edit';
        $client = (new FR('clients'))->show($id);
        return App::view('client-edit', compact('pageTitle', 'client'));
    }

    public function update($id)
    {
        (new FR('clients'))->update($id, $_POST);
        return App::redirect('clients');
    }

    public function delete($id)
    {
        (new FR('clients'))->delete($id);
        return App::redirect('clients');
    }

}