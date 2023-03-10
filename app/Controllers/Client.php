<?php 
namespace Bank2\Controllers;
use Bank2\App;
use Bank2\DB\FileReader as FR;
use Bank2\Message as M;

//!!!!!!!!kur koki puslapi rodyt client-edit client-create
class Client {
    
    public function index()
    {
        //clients tai failas i kuri irasines
        //view tai vieta kur html ir duomenys sueina i viena ir renderinasi i vaizda
        $clients = (new FR('clients'))->showAll();
        $pageTitle = 'Client | List';
        //irasom message
        $message = M::get();
        //perduodam message
        return App::view('client-list', compact('clients', 'pageTitle', 'message'));
    }

    //parodo tuscia forma, kurioje isirasom nauja client
    public function create()
    {
        $pageTitle = 'Account | New';
        $message = M::get();
        return App::view('client-create', compact('pageTitle', 'message'));
    }
    
    public function save()
    //kuriam new client, negrazinam vaizdo o redirectinam
    //save funkcija perduos duomenis per body(post array) POST
    //is Filereader imu create perduodu i masyva ir jis is posto ir bus tas masyvas
    //issaugom tai ka turim post array ir pereinam su tuo i sarasa
    //cia validacija ir compact-error
    {        $clients = (new FR('clients'))->showAll();
        if (strlen($_POST['name']) < 4 || strlen($_POST['surname']) < 4 || !preg_match('/^[\p{Latin}]+$/u', $_POST['name']) || !preg_match('/^[\p{Latin}]+$/u', $_POST['surname'])) {
            M::add('Name and surname - at least 3 characters (only letters)', 'alert-danger');
            return App::redirect('clients/create');
            }
        if ((strlen($_POST['personal_id']) != 11) || !is_numeric($_POST['personal_id']) || (((int)(substr($_POST['personal_id'], 5, 2)) > 31) || ((int)(substr($_POST['personal_id'], 3, 2)) > 12))) {
            M::add("Id doesn't exist", 'alert-danger');
            return App::redirect('clients/create');
        }
        else {
            (new FR('clients'))->create($_POST);
            M::add('Account added', 'alert-success');
                return App::redirect('clients');
        }
    }

    public function deposit($id)
    {
        $pageTitle = 'Account | Deposit';
        $client = (new FR('clients'))->show($id);
        $message = M::get();
        return App::view('client-deposit', compact('pageTitle', 'client', 'message'));
    }

    
    public function withdraw($id)
    {
        $pageTitle = 'Account | Withdraw';
        $client = (new FR('clients'))->show($id);
        $message = M::get();
        return App::view('client-withdraw', compact('pageTitle', 'client', 'message'));
    }

    // deposit withdraw validacija
    public function update($id, $operation)
    {
        $client = (new FR('clients'))->show($id);
        $naujaSuma = $_POST['naujaSuma'];
        $name = $client['name'];
        $surname = $client['surname'];
        if ($operation == 'deposit') {
            if (is_numeric($naujaSuma) && $naujaSuma > 0) {
            (new FR('clients'))->update($operation, $id,  $_POST);
            M::add($naujaSuma .'.00 EUR ' . 'added to ' . $name . ' ' . $surname . ' account', 'alert-success');
            return App::redirect('clients');
        } else {
            $clients = (new FR('clients'))->showAll();
            $client = (new FR('clients'))->show($id);
            M::add('Error.<br>Please type correct deposit amount.', 'alert-danger');
            return App::redirect('clients/deposit/' . $id);
        }
        } elseif ($operation == 'withdraw') {
            if (is_numeric($naujaSuma) && $naujaSuma > 0) {
            (new FR('clients'))->update($operation, $id, $_POST);
            M::add($naujaSuma .'.00 EUR ' . 'deducted from ' . $name . ' ' . $surname . ' account', 'alert-success');
            return App::redirect('clients');
            } else {
                $pageTitle = 'Account | Withdraw';
                $client = (new FR('clients'))->show($id);
                M::add('Error.<br>Please type correct withdrawal amount.', 'alert-danger');
            return App::redirect('clients/deposit/' . $id);
            }
        }
    }

public function delete($id)
{
    $clients = (new FR('clients'))->showAll();
    $client = (new FR('clients'))->show($id);
    if ($client['balance'] != 0.00) {
        M::add("Account can't be deleted, balance is not 0.", 'alert-danger');
            return App::redirect('clients');
        } else {
            (new FR('clients'))->delete($id);
            M::add('Account successfully deleted.', 'alert-success');
            return App::redirect('clients');
        }
}

}