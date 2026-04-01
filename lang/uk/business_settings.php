<?php

return [
    // Page
    'title' => 'Налаштування компанії', // Page title
    'sidebar_title' => 'Компанія', // Title in the sidebar
    'description' => 'Налаштуйте інформацію про свою діяльність для рахунків, пропозицій і офіційних документів.',

    // Tabs
    'personal_info' => 'Особисті дані',
    'legal_address_tab' => 'Юридична адреса',
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

    // Fiscal Regime
    'fiscal_regime_section' => 'Податковий Режим',
    'tax_regime' => 'Податковий Режим',
    'substitute_tax_rate' => 'Замінний Податок',
    'profitability_coefficient' => 'Коефіцієнт Рентабельності',
    'annual_revenue_cap' => 'Макс. Річний Дохід',
    'business_start_date' => 'Дата Початку Діяльності',

    // Pension
    'pension_section' => 'Пенсійне Забезпечення',
    'pension_fund' => 'Пенсійний Фонд',
    'pension_registration_number' => 'Реєстраційний Номер',
    'pension_registration_date' => 'Дата Реєстрації',

    // ATECO
    'ateco_section' => 'Коди ATECO',
    'ateco_code' => 'Код',
    'ateco_description' => 'Опис',
    'ateco_primary' => 'Основний',
    'ateco_add' => 'Додати',
    'ateco_set_primary' => 'Встановити як основний',
    'ateco_no_codes' => 'Коди ATECO не додано',
    'ateco_delete_confirm' => 'Видалити цей код ATECO?',

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
        'tax_regime' => 'напр. Спрощена система',
        'substitute_tax_rate' => 'напр. 15',
        'profitability_coefficient' => 'напр. 67',
        'annual_revenue_cap' => 'напр. 85000',
        'pension_fund' => 'напр. GS INPS',
        'pension_registration_number' => 'напр. 3300',
        'ateco_code' => 'напр. 62.01',
        'ateco_description' => 'напр. Розробка програмного забезпечення',
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
        'invoice_note' => 'напр. Звільнено від ПДВ згідно ст. 197 ПКУ',
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
        'tax_regime' => 'напр. Спрощена система',
        'substitute_tax_rate' => 'напр. 15',
        'profitability_coefficient' => 'напр. 67',
        'annual_revenue_cap' => 'напр. 85000',
        'pension_fund' => 'напр. GS INPS',
        'pension_registration_number' => 'напр. 3300',
        'ateco_code' => 'напр. 62.01',
        'ateco_description' => 'напр. Розробка програмного забезпечення',
    'billing_tool_url_hint' => 'Введіть посилання на інструмент, який ви використовуєте для виставлення рахунків.',

    // Documents tab
    'documents_tab' => 'Документи',
    'documents' => [
        'title' => 'Особисті документи / ІПН',
        'description' => "Завантажте документи, пов'язані з діяльністю: реєстрація ПДВ, зміни ATECO тощо.",
        'upload' => 'Завантажити документ',
        'name' => 'Назва документа',
        'notes' => 'Примітки',
        'file' => 'Файл',
        'uploaded_at' => 'Завантажено',
        'no_documents' => 'Документи не завантажені.',
        'created' => 'Документ завантажено.',
        'updated' => 'Документ оновлено.',
        'deleted' => 'Документ видалено.',
        'delete_confirm' => 'Видалити цей документ?',
        'placeholder_name' => 'напр. Свідоцтво про реєстрацію ПДВ',
        'placeholder_notes' => 'напр. Офіційний документ податкової служби',
    ],

    // Invoice Note
    'invoice_note_section' => 'Примітка до рахунку',
    'invoice_note' => 'Правова / податкова примітка',
    'invoice_note_hint' => 'Текст, що відображається внизу рахунку.',
];
