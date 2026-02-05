<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Traduceri pagină profil
    |--------------------------------------------------------------------------
    |
    | Toate textele vizibile în secțiunea profil utilizator (informații, parolă,
    | ștergere cont) traduse în română. Cheile urmează schema
    | profile.<secțiune>.<câmp>.
    |
    */

    // Sezione: Informazioni profilo
    'info' => [
        'title'       => 'Informații profil',
        'subtitle'    => 'Actualizează informațiile contului și adresa de email.',
        'name'        => 'Nume',
        'email'       => 'Email',
        'unverified'  => 'Adresa ta de email nu este verificată.',
        'resend'      => 'Apasă aici pentru a retrimite emailul de verificare.',
        'resent'      => 'Un nou link de verificare a fost trimis la adresa ta de email.',
        'save'        => 'Salvează',
        'saved'       => 'Salvat.',
    ],


        // Sezione: Lingua
    'locale' => [
        'title' => 'Limbă & localizare',
        'subtitle' => 'Selectează limba preferată pentru interfață.',
        'label' => 'Limbă',
    ],

    // Sezione: Aggiorna password
    'password' => [
        'title'       => 'Actualizează parola',
        'subtitle'    => 'Asigură-te că folosești o parolă lungă și aleatorie pentru a-ți menține contul în siguranță.',
        'current'     => 'Parola curentă',
        'new'         => 'Parolă nouă',
        'confirm'     => 'Confirmă parola',
        'save'        => 'Actualizează',
        'updated'     => 'Parola a fost actualizată.',

    ],

    // Sezione: Eliminazione account
    'delete' => [
        'title'            => 'Șterge contul',
        'open_button'      => 'Șterge contul',
        'lead'             => 'Odată șters contul, toate resursele și datele vor fi șterse definitiv. Înainte de a continua, descarcă datele pe care vrei să le păstrezi.',
        'confirm_title'    => 'Ești sigur că vrei să-ți ștergi contul?',
        'confirm_body'     => 'Odată șters contul, toate resursele și datele vor fi șterse definitiv. Introdu parola pentru a confirma ștergerea permanentă a contului.',
        'password_label'   => 'Parolă',
        'cancel'           => 'Anulează',
        'confirm_button'   => 'Șterge contul',
    ],

];
