<?php

return [
    'title'       => 'Податки',
    'subtitle'    => 'Управління податковими платежами та документами',
    'create_tax'  => 'Додати податок',
    'edit_tax'    => 'Редагувати податок',
    'no_taxes'    => 'Немає податків',
    'no_taxes_description' => 'Зареєструйте перший податковий платіж',
    'confirm_delete' => 'Ви впевнені, що хочете видалити цей податок?',

    'description'    => 'Опис',
    'amount'         => 'Сума',
    'due_date'       => 'Термін сплати',
    'paid_at'        => 'Сплачено',
    'reference_year' => 'Звітний рік',
    'attachment'     => 'Податковий документ',
    'notes'          => 'Примітки',

    'all_years'    => 'Всі роки',
    'all_statuses' => 'Всі',
    'paid'         => 'Сплачено',
    'unpaid'       => 'Не сплачено',

    'created_successfully' => 'Податок успішно створено',
    'updated_successfully' => 'Податок успішно оновлено',
    'deleted_successfully' => 'Податок успішно видалено',

    'attachment_uploaded_successfully' => 'Документ успішно завантажено',
    'attachment_deleted_successfully'  => 'Документ успішно видалено',
    'attachment_not_found'             => 'Документ не знайдено',
    'attachment_required'              => 'Файл обов\'язковий',
    'attachment_mimes'                 => 'Дозволені лише файли PDF, JPG, JPEG, PNG',
    'attachment_max'                   => 'Розмір файлу не повинен перевищувати 10 МБ',

    'stats' => [
        'total_all_time'  => 'Всього за весь час',
        'total_this_year' => 'Цього року',
        'unpaid_amount'   => 'Не сплачено',
        'count_this_year' => 'Податків цього року',
        'paid_total'      => 'Разом сплачено',
        'due'             => 'Сума до сплати',
        'scheduled'       => 'Заплановано',
    ],

    'placeholder' => [
        'search'         => 'Пошук за описом...',
        'amount'         => 'напр. 1500.00',
        'description'    => 'напр. Залишок ПДФО 2025',
        'reference_year' => 'напр. 2025',
        'notes'          => 'Додаткові примітки...',
    ],

    'calendar_title'       => 'Термін сплати :due_date – :description (:year)',
    'calendar_description' => 'Податковий платіж до сплати',
    'add_to_calendar'      => 'Додати до Google Календаря',

    'description_required'    => 'Опис обов\'язковий',
    'amount_required'         => 'Сума обов\'язкова',
    'amount_min'              => 'Сума повинна бути не менше 0,01',
    'due_date_required'       => 'Термін сплати обов\'язковий',
    'reference_year_required' => 'Звітний рік обов\'язковий',
];
