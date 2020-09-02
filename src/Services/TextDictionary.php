<?php


namespace App\Services;


use Symfony\Component\Config\Definition\Exception\Exception;

class TextDictionary
{
    protected $dictionary = [
        'admin_edit' => 'Edytuj',
        'admin_delete' => 'Usuń',
        'admin_database_saved' => 'Nowy wpis został dodany do bazy',
        'admin_add_new' => 'Dodaj'
    ];

    public function getText($key) {
        if (array_key_exists($key, $this->dictionary)) {
            return $this->dictionary[$key];
        }

        throw new Exception('No value provided for key ' . $key . ' in TextDictionary class');
    }
}