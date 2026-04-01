<?php

return [
    // Page
    'title' => 'Ustawienia firmy', // Page title
    'sidebar_title' => 'Firma', // Title in the sidebar
    'description' => 'Skonfiguruj informacje o swojej działalności dla faktur, ofert i dokumentów oficjalnych.',

    // Tabs
    'personal_info' => 'Dane osobowe',
    'legal_address_tab' => 'Siedziba prawna',
    'tax_info' => 'Dane podatkowe',
    'contacts' => 'Kontakty',
    'business_info' => 'Działalność',


    // Personal Info
    'owner_first_name' => 'Imię',
    'owner_last_name' => 'Nazwisko',

    // Legal Address
    'legal_address' => 'Adres prawny',
    'legal_city' => 'Miasto',
    'legal_zip' => 'Kod pocztowy',
    'legal_province' => 'Województwo',
    'legal_country' => 'Kraj',

    // Tax Info
    'tax_id' => 'NIP',
    'vat_number' => 'VAT',
    'iban' => 'IBAN',
    'default_currency' => 'Domyślna Waluta',

    // Fiscal Regime
    'fiscal_regime_section' => 'Reżim Podatkowy',
    'tax_regime' => 'Reżim Podatkowy',
    'substitute_tax_rate' => 'Podatek Zastępczy',
    'profitability_coefficient' => 'Współczynnik Rentowności',
    'annual_revenue_cap' => 'Maks. Roczny Przychód',
    'business_start_date' => 'Data Rozpoczęcia Działalności',

    // Pension
    'pension_section' => 'Ubezpieczenie Emerytalne',
    'pension_fund' => 'Fundusz Emerytalny',
    'pension_registration_number' => 'Numer Rejestracyjny',
    'pension_registration_date' => 'Data Rejestracji',

    // ATECO
    'ateco_section' => 'Kody ATECO',
    'ateco_code' => 'Kod',
    'ateco_description' => 'Opis',
    'ateco_primary' => 'Główny',
    'ateco_add' => 'Dodaj',
    'ateco_set_primary' => 'Ustaw jako główny',
    'ateco_no_codes' => 'Nie dodano kodów ATECO',
    'ateco_delete_confirm' => 'Usunąć ten kod ATECO?',

    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Prefix',
    'phone' => 'Telefon',

    // Business Info
    'business_name' => 'Nazwa działalności',
    'business_description' => 'Opis usług',
    'website' => 'Strona www',
        'billing_tool_url' => 'np. https://faktury.twojaFirma.pl',
        'tax_regime' => 'np. Ryczałt',
        'substitute_tax_rate' => 'np. 15',
        'profitability_coefficient' => 'np. 67',
        'annual_revenue_cap' => 'np. 85000',
        'pension_fund' => 'np. GS INPS',
        'pension_registration_number' => 'np. 3300',
        'ateco_code' => 'np. 62.01',
        'ateco_description' => 'np. Produkcja oprogramowania',
    'logo' => 'Logo',

    // Actions
    'save' => 'Zapisz zmiany',
    'cancel' => 'Anuluj',
    'delete_logo' => 'Usuń logo',
    'confirm_delete_logo' => 'Czy na pewno chcesz usunąć logo?',

    // Messages
    'updated_successfully' => 'Ustawienia firmy zaktualizowane pomyślnie',
    'logo_deleted' => 'Logo usunięte pomyślnie',

    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'np. Mario',
        'owner_last_name' => 'np. Rossi',
        'legal_address' => 'np. Via Roma 1',
        'legal_city' => 'np. Milano',
        'legal_zip' => 'np. 20100',
        'legal_province' => 'np. MI',
        'legal_country' => 'np. IT',
        'tax_id' => 'np. RSSMRA80A01H501U',
        'vat_number' => 'np. IT12345678901',
        'iban' => 'np. IT60X0542811101000000123456',
        'email' => 'np. info@twojafirma.pl',
        'certified_email' => 'np. pec@twojafirma.pl',
        'phone_prefix' => 'np. +39',
        'phone' => 'np. 3331234567',
        'business_name' => 'np. IT Software Solutions',
        'business_description' => 'np. Doradztwo i tworzenie oprogramowania na zamówienie',
        'website' => 'np. https://twojafirma.pl',
        'invoice_note' => 'np. Zwolnienie z VAT na podstawie art. 113 ustawy o VAT',
    ],

    // Hints
    'logo_hint' => 'Akceptowane formaty: JPG, PNG, SVG. Maksymalny rozmiar: 2MB.',
    'iban_hint' => 'Kod IBAN rachunku bankowego (np. IT60X0542811101000000123456)',

    // Validation
    'logo_must_be_image' => 'Plik musi być obrazem.',
    'logo_max_size' => 'Logo nie może przekraczać 2MB.',
    'logo_allowed_formats' => 'Dozwolone formaty: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Nieprawidłowy format IBAN',

    // Integrations
    'integrations' => 'Integracje',
    'github_pat' => 'Osobisty Token Dostępu GitHub',
    'github_pat_hint' => 'Wygeneruj token na',
    'github_required_scopes' => 'Wymagane uprawnienia',
    'github_scope_repo' => 'dostęp do publicznych i prywatnych repozytoriów',
    'github_scope_read_user' => 'odczyt profilu użytkownika',
    'billing_tool' => 'Narzędzie do fakturowania',
    'billing_tool_url' => 'URL narzędzia do fakturowania',
        'tax_regime' => 'np. Ryczałt',
        'substitute_tax_rate' => 'np. 15',
        'profitability_coefficient' => 'np. 67',
        'annual_revenue_cap' => 'np. 85000',
        'pension_fund' => 'np. GS INPS',
        'pension_registration_number' => 'np. 3300',
        'ateco_code' => 'np. 62.01',
        'ateco_description' => 'np. Produkcja oprogramowania',
    'billing_tool_url_hint' => 'Wprowadź link do narzędzia, którego używasz do wystawiania faktur.',

    // Documents tab
    'documents_tab' => 'Dokumenty',
    'documents' => [
        'title' => 'Dokumenty osobiste / NIP',
        'description' => 'Prześlij dokumenty związane z działalnością: rejestracja VAT, zmiany ATECO itp.',
        'upload' => 'Prześlij dokument',
        'name' => 'Nazwa dokumentu',
        'notes' => 'Notatki',
        'file' => 'Plik',
        'uploaded_at' => 'Przesłano dnia',
        'no_documents' => 'Brak przesłanych dokumentów.',
        'created' => 'Dokument przesłany.',
        'updated' => 'Dokument zaktualizowany.',
        'deleted' => 'Dokument usunięty.',
        'delete_confirm' => 'Usunąć ten dokument?',
        'placeholder_name' => 'np. Zaświadczenie o rejestracji VAT',
        'placeholder_notes' => 'np. Oficjalny dokument z Urzędu Skarbowego',
    ],

    // Invoice Note
    'invoice_note_section' => 'Uwaga na fakturze',
    'invoice_note' => 'Uwaga prawna / podatkowa',
    'invoice_note_hint' => 'Tekst widoczny na dole faktury.',
];
