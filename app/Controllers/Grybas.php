<?php 
namespace Bank2\Controllers;
use Bank2\App;
use Bank2\DB\FileReader as FR;

class Grybas {
    
    public function index()
    {
        //grybai tai failas i kuri irasines
        //view tai vieta kur html ir duomenys sueina i viena ir renderinasi i vaizda
        $grybai = (new FR('grybai'))->showAll();
        $pageTitle = 'Grybai | Sąrašas';
        return App::view('grybas-list', compact('grybai', 'pageTitle'));
    }
    public function create()
    {
        $pageTitle = 'Grybai | Naujas';
        return App::view('grybas-create', compact('pageTitle'));
    }
    
    //save funkcija perduos duomenis per body(post array)
    //is Filereader imu create perduodu i masyva ir jis is posto ir bus tas masyvas
    //issaugom tai ka turim post array ir pereinam su tuo i sarasa
    public function save()
    {
        (new FR('grybai'))->create($_POST);
        //negrazinam vaizda o pereinam i kita psl (pagrindini) kuriu nauja funkcija redirect App.php
        return App::redirect('grybai');
    }

    public function edit($id)
    {
        $pageTitle = 'Grybai | Redaguoti';
        $grybas = (new FR('grybai'))->show($id);
        return App::view('grybas-edit', compact('pageTitle', 'grybas'));
    }

    public function update($id)
    {
        (new FR('grybai'))->update($id, $_POST);
        return App::redirect('grybai');
    }

    public function delete($id)
    {
        (new FR('grybai'))->delete($id);
        return App::redirect('grybai');
    }

}