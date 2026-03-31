<?php

return [
    // Page
    'title' => 'Настройки компании',
    'sidebar_title' => 'Компания',
    'description' => 'Настройте данные вашей деятельности для счетов, предложений и официальных документов.',

    // Tabs
    'personal_info' => 'Личные данные',
    'legal_address' => 'Юридический адрес',
    'tax_info' => 'Налоговые данные',
    'contacts' => 'Контакты',
    'business_info' => 'Бизнес',

    // Personal Info
    'owner_first_name' => 'Имя',
    'owner_last_name' => 'Фамилия',

    // Legal Address
    'legal_address' => 'Юридический адрес',
    'legal_city' => 'Город',
    'legal_zip' => 'Индекс',
    'legal_province' => 'Область',
    'legal_country' => 'Страна',

    // Tax Info
    'tax_id' => 'Налоговый код',
    'vat_number' => 'НДС номер',
    'iban' => 'IBAN',
    'default_currency' => 'Валюта по умолчанию',

    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Код',
    'phone' => 'Телефон',

    // Business Info
    'business_name' => 'Название компании',
    'business_description' => 'Описание услуг',
    'website' => 'Веб-сайт',
        'billing_tool_url' => 'напр. https://billing.vashakompaniya.ru',
    'logo' => 'Логотип',

    // Actions
    'save' => 'Сохранить изменения',
    'cancel' => 'Отмена',
    'delete_logo' => 'Удалить логотип',
    'confirm_delete_logo' => 'Вы уверены, что хотите удалить логотип?',

    // Messages
    'updated_successfully' => 'Настройки компании успешно обновлены',
    'logo_deleted' => 'Логотип успешно удален',

    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'напр. Mario',
        'owner_last_name' => 'напр. Rossi',
        'legal_address' => 'напр. Via Roma 1',
        'legal_city' => 'напр. Milano',
        'legal_zip' => 'напр. 20100',
        'legal_province' => 'напр. MI',
        'legal_country' => 'напр. IT',
        'tax_id' => 'напр. RSSMRA80A01H501U',
        'vat_number' => 'напр. IT12345678901',
        'iban' => 'напр. IT60X0542811101000000123456',
        'email' => 'напр. info@yourcompany.it',
        'certified_email' => 'напр. pec@yourcompany.it',
        'phone_prefix' => 'напр. +39',
        'phone' => 'напр. 3331234567',
        'business_name' => 'напр. IT Software Solutions',
        'business_description' => 'напр. Консалтинг и разработка кастомного ПО',
        'website' => 'напр. https://yourcompany.it',
    ],

    // Hints
    'logo_hint' => 'Допустимые форматы: JPG, PNG, SVG. Максимальный размер: 2MB.',
    'iban_hint' => 'IBAN банковского счета (напр. IT60X0542811101000000123456)',

    // Validation
    'logo_must_be_image' => 'Файл должен быть изображением.',
    'logo_max_size' => 'Логотип не должен превышать 2MB.',
    'logo_allowed_formats' => 'Допустимые форматы: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Неверный формат IBAN',

    // Integrations
    'integrations' => 'Интеграции',
    'github_pat' => 'Персональный токен доступа GitHub',
    'github_pat_hint' => 'Создайте токен на',
    'github_required_scopes' => 'Необходимые разрешения',
    'github_scope_repo' => 'доступ к публичным и приватным репозиториям',
    'github_scope_read_user' => 'чтение профиля пользователя',
    'billing_tool' => 'Инструмент выставления счетов',
    'billing_tool_url' => 'URL инструмента выставления счетов',
    'billing_tool_url_hint' => 'Введите ссылку на инструмент, который вы используете для выставления счетов.',
];
