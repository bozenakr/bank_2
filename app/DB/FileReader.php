<?php
// //cia suimplementinam interface
// //informacijos irasymas i faila (neatsakingas uz userio info, uz tai kokia info)
    
namespace Bank2\DB;

use App\DB\DataBase;

class FileReader implements DataBase {

    //$name tai mano failo vardas
    //tikrinu ar egzistuoja failas, jei ne tai tuscias masyvas, jei egzistuoja nuskaitom ir irasom
    private $data, $name;

        public function __construct($name)
    {
        $this->name = $name;
        if (!file_exists(__DIR__ . '/' . $this->name)) {
            $this->data = [];
        } 
        else {
            $this->data = unserialize(file_get_contents(__DIR__ . '/' . $this->name));
        }
    }
    
    //kai viskas pasibaigia nuskaitom duomenis, serialize ir irasom i faila
    public function __destruct()
    {
        file_put_contents(__DIR__ . '/' . $this->name, serialize($this->data));
    }
    
    //kiekvienas kreipimasis i getId funkcija, id padidinamas +1
    private function getId() : int
    {
        if (!file_exists(__DIR__ . '/' . $this->name .'_id')) {
            file_put_contents(__DIR__ . '/' . $this->name .'_id', serialize(1));
            return 1;
        } 
        else {
            $id = unserialize(file_get_contents(__DIR__ . '/' . $this->name .'_id'));
            $id++;
            file_put_contents(__DIR__ . '/' . $this->name .'_id', serialize($id));
            return $id;
        }
    }

    //kuriam nauja masyva su duomenimis + sukurtu su getId id
    public function create(array $userData) : void
    {
        $userData['id'] = $this->getId();
        $userData['iban'] = 'LT' . rand(40,60) . 35000 . rand(10000000000,99999999999);
        $userData['balance'] = 0;
        $this->data[] = $userData;
    }

    //$userData tai vienas client masyvas (tas kuri norim redaguot) viduje didelio masyvo is klientu
    public function update (string $operation, int $userId, array $userData) : void
    {
        $userData['id'] = $userId;
        //einam per visa array, susiranda vieta kur user id sutampa su id ir ta vieta overwrite, kitus perkeliam kaip buvo
        foreach ($this->data as $index => $client){
            if ($userId == $client['id']) {
                if ($operation == 'deposit') {
                    $this->data [$index]['balance'] += (float) $userData['naujaSuma'];
                } elseif ($operation =='withdraw') {
                    $this->data [$index]['balance'] -= (float) $userData['naujaSuma'];
                }
            }
        }
    }

    //einu per visus duomenis ir jei user id sutampa tai yra false, jei yra false neperkeliam i array, ismetam
    public function delete(int $userId) : void
    { 
        $this->data = array_filter($this->data, fn($data) => $userId != $data['id']);
    }
    
    //jei neranda duomenu grazina tuscia masyva, apsidraudziu del erroru
    public function show(int $userId) : array
    {
        foreach ($this->data as $data) {
            if ($userId == $data['id']) {
                return $data;
            }
        }
        return [];
    }

    public function showAll() : array
    {
        return $this->data;
    }
}