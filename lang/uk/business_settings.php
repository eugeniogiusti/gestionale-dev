<?php

return [
    // Page
    'title' => 'Налаштування компанії', // Page title
    'sidebar_title' => 'Компанія', // Title in the sidebar
    'description' => 'Налаштуйте інформацію про свою діяльність для рахунків, пропозицій і офіційних документів.',

    // Tabs
    'personal_info' => 'Особисті дані',
    'legal_address' => 'Юридична адреса',
    'tax_info' => 'Податкові дані',
    'contacts' => 'Контакти',
    'business_info' => 'Діяльність',


    // Personal Info
    'owner_first_name' => 'Імʼя',
    'owner_last_name' => 'Прізвище',

    // Legal Address
    'legal_address' => 'Юридична адреса',
    'legal_city' => 'Місто',
    'legal_zip' => 'Поштовий індекс',
    'legal_province' => 'Область',
    'legal_country' => 'Країна',

    // Tax Info
    'tax_id' => 'Податковий код',
    'vat_number' => 'ПДВ',
    'iban' => 'IBAN',
    'default_currency' => 'Валюта за замовчуванням',

    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Префікс',
    'phone' => 'Телефон',

    // Business Info
    'business_name' => 'Назва діяльності',
    'business_description' => 'Опис послуг',
    'website' => 'Вебсайт',
        'billing_tool_url' => 'напр. https://billing.vashakompaniya.ua',
    'logo' => 'Логотип',

    // Actions
    'save' => 'Зберегти зміни',
    'cancel' => 'Скасувати',
    'delete_logo' => 'Видалити логотип',
    'confirm_delete_logo' => 'Ви впевнені, що хочете видалити логотип?',

    // Messages
    'updated_successfully' => 'Налаштування компанії успішно оновлено',
    'logo_deleted' => 'Логотип успішно видалено',

    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'напр. Маріо',
        'owner_last_name' => 'напр. Россі',
        'legal_address' => 'напр. Via Roma 1',
        'legal_city' => 'напр. Milano',
        'legal_zip' => 'напр. 20100',
        'legal_province' => 'напр. MI',
        'legal_country' => 'напр. IT',
        'tax_id' => 'напр. RSSMRA80A01H501U',
        'vat_number' => 'напр. IT12345678901',
        'iban' => 'напр. IT60X0542811101000000123456',
        'email' => 'напр. info@company.ua',
        'certified_email' => 'напр. pec@company.ua',
        'phone_prefix' => 'напр. +39',
        'phone' => 'напр. 3331234567',
        'business_name' => 'напр. IT Software Solutions',
        'business_description' => 'напр. Консалтинг і розробка ПЗ на замовлення',
        'website' => 'напр. https://company.ua',
    ],

    // Hints
    'logo_hint' => 'Допустимі формати: JPG, PNG, SVG. Максимальний розмір: 2MB.',
    'iban_hint' => 'Код IBAN банківського рахунку (напр. IT60X0542811101000000123456)',

    // Validation
    'logo_must_be_image' => 'Файл має бути зображенням.',
    'logo_max_size' => 'Логотип не може перевищувати 2MB.',
    'logo_allowed_formats' => 'Дозволені формати: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Невірний формат IBAN',

    // Integrations
    'integrations' => 'Інтеграції',
    'github_pat' => 'Особистий токен доступу GitHub',
    'github_pat_hint' => 'Створіть токен на',
    'github_required_scopes' => 'Необхідні дозволи',
    'github_scope_repo' => 'доступ до публічних і приватних репозиторіїв',
    'github_scope_read_user' => 'читання профілю користувача',
    'billing_tool' => 'Інструмент виставлення рахунків',
    'billing_tool_url' => 'URL інструменту виставлення рахунків',
    'billing_tool_url_hint' => 'Введіть посилання на інструмент, який ви використовуєте для виставлення рахунків.',
];
