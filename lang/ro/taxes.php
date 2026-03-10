<?php

return [
    'title'       => 'Taxe',
    'subtitle'    => 'Gestionați plățile fiscale și documentele',
    'create_tax'  => 'Adaugă taxă',
    'edit_tax'    => 'Editează taxa',
    'no_taxes'    => 'Nicio taxă',
    'no_taxes_description' => 'Înregistrați prima plată fiscală',
    'confirm_delete' => 'Sigur doriți să ștergeți această taxă?',

    'description'    => 'Descriere',
    'amount'         => 'Sumă',
    'due_date'       => 'Dată scadentă',
    'paid_at'        => 'Plătit la',
    'reference_year' => 'An de referință',
    'attachment'     => 'Document fiscal',
    'notes'          => 'Note',

    'all_years'    => 'Toți anii',
    'all_statuses' => 'Toate',
    'paid'         => 'Plătit',
    'unpaid'       => 'Neplătit',

    'created_successfully' => 'Taxă creată cu succes',
    'updated_successfully' => 'Taxă actualizată cu succes',
    'deleted_successfully' => 'Taxă ștearsă cu succes',

    'attachment_uploaded_successfully' => 'Document încărcat cu succes',
    'attachment_deleted_successfully'  => 'Document șters cu succes',
    'attachment_not_found'             => 'Document negăsit',
    'attachment_required'              => 'Fișierul este obligatoriu',
    'attachment_mimes'                 => 'Sunt permise doar fișiere PDF, JPG, JPEG, PNG',
    'attachment_max'                   => 'Dimensiunea fișierului nu trebuie să depășească 10 MB',

    'stats' => [
        'total_all_time'  => 'Total din toate timpurile',
        'total_this_year' => 'Anul acesta',
        'unpaid_amount'   => 'Neplătit',
        'count_this_year' => 'Taxe anul acesta',
        'paid_total'      => 'Total plătit',
        'due'             => 'Sumă datorată',
        'scheduled'       => 'Programat',
    ],

    'placeholder' => [
        'search'         => 'Căutați după descriere...',
        'amount'         => 'ex. 1500.00',
        'description'    => 'ex. Sold impozit pe venit 2025',
        'reference_year' => 'ex. 2025',
        'notes'          => 'Note suplimentare...',
    ],

    'calendar_title'       => 'Taxă scadentă :due_date – :description (:year)',
    'calendar_description' => 'Plată fiscală scadentă',
    'add_to_calendar'      => 'Adaugă în Google Calendar',

    'description_required'    => 'Descrierea este obligatorie',
    'amount_required'         => 'Suma este obligatorie',
    'amount_min'              => 'Suma trebuie să fie cel puțin 0,01',
    'due_date_required'       => 'Data scadentă este obligatorie',
    'reference_year_required' => 'Anul de referință este obligatoriu',
];
