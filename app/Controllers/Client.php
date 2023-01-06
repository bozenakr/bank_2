<?php 
namespace Bank2\Controllers;
use Bank2\App;
use Bank2\DB\FileReader as FR;

//!!!!!!!!kur koki puslapi rodyt client-edit client-create
class Client {
    
    public function index()
    {
        //clients tai failas i kuri irasines
        //view tai vieta kur html ir duomenys sueina i viena ir renderinasi i vaizda
        $clients = (new FR('clients'))->showAll();
        $pageTitle = 'Client | List';
        return App::view('client-list', compact('clients', 'pageTitle'));
    }
    public function create()
    {
        $pageTitle = 'Account | New';
        return App::view('client-create', compact('pageTitle'));
    }
    
    public function save()
    //save funkcija perduos duomenis per body(post array)
    //is Filereader imu create perduodu i masyva ir jis is posto ir bus tas masyvas
    //issaugom tai ka turim post array ir pereinam su tuo i sarasa
    //cia validacija ir compact-error
    {
        if (strlen($_POST['name']) < 4 || strlen($_POST['surname']) < 4 || !preg_match('/^[\p{Latin}]+$/u', $_POST['name']) || !preg_match('/^[\p{Latin}]+$/u', $_POST['surname'])) {
            $errorVardasPavarde = 'Vardas ir pavardė turi būti ilgesni nei 3 simboliai ir turėti tik raides';
            return App::view('client-create', compact('errorVardasPavarde'));
            }
        if ((strlen($_POST['personal_id']) != 11) || !is_numeric($_POST['personal_id']) || (((int)(substr($_POST['personal_id'], 5, 2)) > 31) || ((int)(substr($_POST['personal_id'], 3, 2)) > 12))) {
            $errorPersonal_ID = 'Toks asmens kodas neegzistuoja';
                return App::view('client-create', compact('errorPersonal_ID'));
        }
        else {
                (new FR('clients'))->create($_POST);
                    return App::redirect('clients');
        }
    }

    public function deposit($id)
    {
        $pageTitle = 'Account | Deposit';
        $client = (new FR('clients'))->show($id);
        return App::view('client-deposit', compact('pageTitle', 'client'));
    }

    
    public function withdraw($id)
    {
        $pageTitle = 'Account | Withdraw';
        $client = (new FR('clients'))->show($id);
        return App::view('client-withdraw', compact('pageTitle', 'client'));
    }

    public function update($id)
    {
        (new FR('clients'))->update($id, $_POST);
        return App::redirect('clients');
    }
    
    public function update2($id)
    {
        (new FR('clients'))->update2($id, $_POST);
        return App::redirect('clients');
    }

    public function delete($id)
    {
        // if($id =)
        (new FR('clients'))->delete($id);
        return App::redirect('clients');
    }

}