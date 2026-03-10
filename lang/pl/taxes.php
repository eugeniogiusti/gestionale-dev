<?php

return [
    'title'       => 'Podatki',
    'subtitle'    => 'Zarządzaj płatnościami podatkowymi i dokumentami',
    'create_tax'  => 'Dodaj podatek',
    'edit_tax'    => 'Edytuj podatek',
    'no_taxes'    => 'Brak podatków',
    'no_taxes_description' => 'Zarejestruj pierwszą płatność podatkową',
    'confirm_delete' => 'Czy na pewno chcesz usunąć ten podatek?',

    'description'    => 'Opis',
    'amount'         => 'Kwota',
    'due_date'       => 'Termin płatności',
    'paid_at'        => 'Zapłacono dnia',
    'reference_year' => 'Rok referencyjny',
    'attachment'     => 'Dokument podatkowy',
    'notes'          => 'Notatki',

    'all_years'    => 'Wszystkie lata',
    'all_statuses' => 'Wszystkie',
    'paid'         => 'Zapłacono',
    'unpaid'       => 'Niezapłacono',

    'created_successfully' => 'Podatek utworzony pomyślnie',
    'updated_successfully' => 'Podatek zaktualizowany pomyślnie',
    'deleted_successfully' => 'Podatek usunięty pomyślnie',

    'attachment_uploaded_successfully' => 'Dokument przesłany pomyślnie',
    'attachment_deleted_successfully'  => 'Dokument usunięty pomyślnie',
    'attachment_not_found'             => 'Dokument nie znaleziony',
    'attachment_required'              => 'Plik jest wymagany',
    'attachment_mimes'                 => 'Dozwolone są tylko pliki PDF, JPG, JPEG, PNG',
    'attachment_max'                   => 'Rozmiar pliku nie może przekraczać 10 MB',

    'stats' => [
        'total_all_time'  => 'Łącznie przez cały czas',
        'total_this_year' => 'W tym roku',
        'unpaid_amount'   => 'Niezapłacone',
        'count_this_year' => 'Podatki w tym roku',
        'paid_total'      => 'Łącznie zapłacono',
        'due'             => 'Kwota do zapłaty',
        'scheduled'       => 'Zaplanowane',
    ],

    'placeholder' => [
        'search'         => 'Szukaj według opisu...',
        'amount'         => 'np. 1500.00',
        'description'    => 'np. Saldo podatku dochodowego 2025',
        'reference_year' => 'np. 2025',
        'notes'          => 'Dodatkowe notatki...',
    ],

    'calendar_title'       => 'Podatek należny :due_date – :description (:year)',
    'calendar_description' => 'Płatność podatkowa do uiszczenia',
    'add_to_calendar'      => 'Dodaj do Kalendarza Google',

    'description_required'    => 'Opis jest wymagany',
    'amount_required'         => 'Kwota jest wymagana',
    'amount_min'              => 'Kwota musi wynosić co najmniej 0,01',
    'due_date_required'       => 'Termin płatności jest wymagany',
    'reference_year_required' => 'Rok referencyjny jest wymagany',
];
