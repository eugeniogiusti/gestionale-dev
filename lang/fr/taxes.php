<?php

return [
    'title'       => 'Taxes',
    'subtitle'    => 'Gérer les paiements fiscaux et les documents',
    'create_tax'  => 'Ajouter une taxe',
    'edit_tax'    => 'Modifier la taxe',
    'no_taxes'    => 'Aucune taxe',
    'no_taxes_description' => 'Enregistrez votre premier paiement fiscal',
    'confirm_delete' => 'Êtes-vous sûr de vouloir supprimer cette taxe ?',

    'description'    => 'Description',
    'amount'         => 'Montant',
    'due_date'       => 'Date d\'échéance',
    'paid_at'        => 'Payé le',
    'reference_year' => 'Année de référence',
    'attachment'     => 'Document fiscal',
    'notes'          => 'Notes',

    'all_years'    => 'Toutes les années',
    'all_statuses' => 'Tous',
    'paid'         => 'Payé',
    'unpaid'       => 'Impayé',

    'created_successfully' => 'Taxe créée avec succès',
    'updated_successfully' => 'Taxe mise à jour avec succès',
    'deleted_successfully' => 'Taxe supprimée avec succès',

    'attachment_uploaded_successfully' => 'Document téléversé avec succès',
    'attachment_deleted_successfully'  => 'Document supprimé avec succès',
    'attachment_not_found'             => 'Document introuvable',
    'attachment_required'              => 'Le fichier est obligatoire',
    'attachment_mimes'                 => 'Seuls les fichiers PDF, JPG, JPEG, PNG sont autorisés',
    'attachment_max'                   => 'La taille du fichier ne doit pas dépasser 10 Mo',

    'stats' => [
        'total_all_time'  => 'Total depuis toujours',
        'total_this_year' => 'Cette année',
        'unpaid_amount'   => 'Impayé',
        'count_this_year' => 'Taxes cette année',
        'paid_total'      => 'Total payé',
        'due'             => 'Montant dû',
        'scheduled'       => 'Planifié',
    ],

    'placeholder' => [
        'search'         => 'Rechercher par description...',
        'amount'         => 'ex. 1500.00',
        'description'    => 'ex. Solde impôt sur le revenu 2025',
        'reference_year' => 'ex. 2025',
        'notes'          => 'Notes supplémentaires...',
    ],

    'calendar_title'       => 'Taxe due le :due_date – :description (:year)',
    'calendar_description' => 'Paiement fiscal à échéance',
    'add_to_calendar'      => 'Ajouter à Google Agenda',

    'description_required'    => 'La description est obligatoire',
    'amount_required'         => 'Le montant est obligatoire',
    'amount_min'              => 'Le montant doit être d\'au moins 0,01',
    'due_date_required'       => 'La date d\'échéance est obligatoire',
    'reference_year_required' => 'L\'année de référence est obligatoire',
];
