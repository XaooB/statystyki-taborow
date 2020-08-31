<?php


namespace App\Services;


class TextDictionary
{
    public function TextDictionary() {
        return [
            'admin_edit' => 'Edytuj',
            'admin_delete' => 'Usuń',
            'admin_category_success' => 'Kategoria została dodana'
        ];
    }

    public function getText($key) {
        $dictionary = $this->TextDictionary();

        if (array_key_exists($key, $dictionary)) {
            return $dictionary[$key];
        }

        throw new \Exception('No value provided for key ' . $key . ' in TextDictionary class');
    }
}