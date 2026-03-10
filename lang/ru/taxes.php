<?php

return [
    'title'       => 'Налоги',
    'subtitle'    => 'Управление налоговыми платежами и документами',
    'create_tax'  => 'Добавить налог',
    'edit_tax'    => 'Редактировать налог',
    'no_taxes'    => 'Нет налогов',
    'no_taxes_description' => 'Зарегистрируйте первый налоговый платёж',
    'confirm_delete' => 'Вы уверены, что хотите удалить этот налог?',

    'description'    => 'Описание',
    'amount'         => 'Сумма',
    'due_date'       => 'Срок оплаты',
    'paid_at'        => 'Оплачено',
    'reference_year' => 'Отчётный год',
    'attachment'     => 'Налоговый документ',
    'notes'          => 'Примечания',

    'all_years'    => 'Все годы',
    'all_statuses' => 'Все',
    'paid'         => 'Оплачено',
    'unpaid'       => 'Не оплачено',

    'created_successfully' => 'Налог успешно создан',
    'updated_successfully' => 'Налог успешно обновлён',
    'deleted_successfully' => 'Налог успешно удалён',

    'attachment_uploaded_successfully' => 'Документ успешно загружен',
    'attachment_deleted_successfully'  => 'Документ успешно удалён',
    'attachment_not_found'             => 'Документ не найден',
    'attachment_required'              => 'Файл обязателен',
    'attachment_mimes'                 => 'Разрешены только файлы PDF, JPG, JPEG, PNG',
    'attachment_max'                   => 'Размер файла не должен превышать 10 МБ',

    'stats' => [
        'total_all_time'  => 'Всего за всё время',
        'total_this_year' => 'В этом году',
        'unpaid_amount'   => 'Не оплачено',
        'count_this_year' => 'Налогов в этом году',
        'paid_total'      => 'Итого оплачено',
        'due'             => 'Сумма к оплате',
        'scheduled'       => 'Запланировано',
    ],

    'placeholder' => [
        'search'         => 'Поиск по описанию...',
        'amount'         => 'напр. 1500.00',
        'description'    => 'напр. Остаток НДФЛ 2025',
        'reference_year' => 'напр. 2025',
        'notes'          => 'Дополнительные примечания...',
    ],

    'calendar_title'       => 'Срок уплаты налога :due_date – :description (:year)',
    'calendar_description' => 'Налоговый платёж к оплате',
    'add_to_calendar'      => 'Добавить в Google Календарь',

    'description_required'    => 'Описание обязательно',
    'amount_required'         => 'Сумма обязательна',
    'amount_min'              => 'Сумма должна быть не менее 0,01',
    'due_date_required'       => 'Срок оплаты обязателен',
    'reference_year_required' => 'Отчётный год обязателен',
];
