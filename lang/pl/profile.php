<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Tłumaczenia strony profilu
    |--------------------------------------------------------------------------
    |
    | Wszystkie teksty widoczne w sekcji profilu użytkownika (informacje, hasło,
    | usunięcie konta) przetłumaczone na język polski. Klucze mają format
    | profile.<sekcja>.<pole>.
    |
    */

    // Sezione: Informazioni profilo
    'info' => [
        'title'       => 'Informacje o profilu',
        'subtitle'    => 'Zaktualizuj informacje o koncie i adres email.',
        'name'        => 'Imię',
        'email'       => 'Email',
        'unverified'  => 'Twój adres email nie jest zweryfikowany.',
        'resend'      => 'Kliknij tutaj, aby wysłać ponownie email weryfikacyjny.',
        'resent'      => 'Nowy link weryfikacyjny został wysłany na Twój adres email.',
        'save'        => 'Zapisz',
        'saved'       => 'Zapisano.',
    ],


        // Sezione: Lingua
    'locale' => [
        'title' => 'Język i lokalizacja',
        'subtitle' => 'Wybierz preferowany język interfejsu.',
        'label' => 'Język',
    ],

    // Sezione: Aggiorna password
    'password' => [
        'title'       => 'Zmień hasło',
        'subtitle'    => 'Upewnij się, że używasz długiego, losowego hasła, aby zabezpieczyć konto.',
        'current'     => 'Aktualne hasło',
        'new'         => 'Nowe hasło',
        'confirm'     => 'Potwierdź hasło',
        'save'        => 'Aktualizuj',
        'updated'     => 'Hasło zaktualizowane.',

    ],

    // Sezione: Eliminazione account
    'delete' => [
        'title'            => 'Usuń konto',
        'open_button'      => 'Usuń konto',
        'lead'             => 'Po usunięciu konta wszystkie zasoby i dane zostaną trwale skasowane. Przed kontynuacją pobierz dane, które chcesz zachować.',
        'confirm_title'    => 'Czy na pewno chcesz usunąć swoje konto?',
        'confirm_body'     => 'Po usunięciu konta wszystkie zasoby i dane zostaną trwale skasowane. Wpisz hasło, aby potwierdzić trwałe usunięcie konta.',
        'password_label'   => 'Hasło',
        'cancel'           => 'Anuluj',
        'confirm_button'   => 'Usuń konto',
    ],

];
