<?php

return [
    'title'       => 'Impuestos',
    'subtitle'    => 'Gestionar pagos fiscales y documentos',
    'create_tax'  => 'Agregar impuesto',
    'edit_tax'    => 'Editar impuesto',
    'no_taxes'    => 'Sin impuestos',
    'no_taxes_description' => 'Registra tu primer pago fiscal',
    'confirm_delete' => '¿Estás seguro de que deseas eliminar este impuesto?',

    'description'    => 'Descripción',
    'amount'         => 'Importe',
    'due_date'       => 'Fecha de vencimiento',
    'paid_at'        => 'Pagado el',
    'reference_year' => 'Año de referencia',
    'attachment'     => 'Documento fiscal',
    'notes'          => 'Notas',

    'all_years'    => 'Todos los años',
    'all_statuses' => 'Todos',
    'paid'         => 'Pagado',
    'unpaid'       => 'Pendiente',

    'created_successfully' => 'Impuesto creado correctamente',
    'updated_successfully' => 'Impuesto actualizado correctamente',
    'deleted_successfully' => 'Impuesto eliminado correctamente',

    'attachment_uploaded_successfully' => 'Documento cargado correctamente',
    'attachment_deleted_successfully'  => 'Documento eliminado correctamente',
    'attachment_not_found'             => 'Documento no encontrado',
    'attachment_required'              => 'El archivo es obligatorio',
    'attachment_mimes'                 => 'Solo se permiten archivos PDF, JPG, JPEG, PNG',
    'attachment_max'                   => 'El tamaño del archivo no debe superar 10 MB',

    'stats' => [
        'total_all_time'  => 'Total histórico',
        'total_this_year' => 'Este año',
        'unpaid_amount'   => 'Pendiente',
        'count_this_year' => 'Impuestos este año',
        'paid_total'      => 'Total pagado',
        'due'             => 'Importe pendiente',
        'scheduled'       => 'Programado',
    ],

    'placeholder' => [
        'search'         => 'Buscar por descripción...',
        'amount'         => 'ej. 1500.00',
        'description'    => 'ej. Saldo IRPF 2025',
        'reference_year' => 'ej. 2025',
        'notes'          => 'Notas adicionales...',
    ],

    'calendar_title'       => 'Vencimiento fiscal :due_date – :description (:year)',
    'calendar_description' => 'Pago de impuesto por vencer',
    'add_to_calendar'      => 'Agregar a Google Calendar',

    'description_required'    => 'La descripción es obligatoria',
    'amount_required'         => 'El importe es obligatorio',
    'amount_min'              => 'El importe debe ser al menos 0,01',
    'due_date_required'       => 'La fecha de vencimiento es obligatoria',
    'reference_year_required' => 'El año de referencia es obligatorio',
];
