<?php

return [
    'title'       => 'Impostos',
    'subtitle'    => 'Gerir pagamentos fiscais e documentos',
    'create_tax'  => 'Adicionar imposto',
    'edit_tax'    => 'Editar imposto',
    'no_taxes'    => 'Sem impostos',
    'no_taxes_description' => 'Registe o seu primeiro pagamento fiscal',
    'confirm_delete' => 'Tem a certeza de que deseja eliminar este imposto?',

    'description'    => 'Descrição',
    'amount'         => 'Valor',
    'due_date'       => 'Data de vencimento',
    'paid_at'        => 'Pago em',
    'reference_year' => 'Ano de referência',
    'attachment'     => 'Documento fiscal',
    'notes'          => 'Notas',

    'all_years'    => 'Todos os anos',
    'all_statuses' => 'Todos',
    'paid'         => 'Pago',
    'unpaid'       => 'Pendente',

    'created_successfully' => 'Imposto criado com sucesso',
    'updated_successfully' => 'Imposto atualizado com sucesso',
    'deleted_successfully' => 'Imposto eliminado com sucesso',

    'attachment_uploaded_successfully' => 'Documento carregado com sucesso',
    'attachment_deleted_successfully'  => 'Documento eliminado com sucesso',
    'attachment_not_found'             => 'Documento não encontrado',
    'attachment_required'              => 'O ficheiro é obrigatório',
    'attachment_mimes'                 => 'Apenas são permitidos ficheiros PDF, JPG, JPEG, PNG',
    'attachment_max'                   => 'O tamanho do ficheiro não deve exceder 10 MB',

    'stats' => [
        'total_all_time'  => 'Total histórico',
        'total_this_year' => 'Este ano',
        'unpaid_amount'   => 'Pendente',
        'count_this_year' => 'Impostos este ano',
        'paid_total'      => 'Total pago',
        'due'             => 'Valor em dívida',
        'scheduled'       => 'Agendado',
    ],

    'placeholder' => [
        'search'         => 'Pesquisar por descrição...',
        'amount'         => 'ex. 1500.00',
        'description'    => 'ex. Saldo IRS 2025',
        'reference_year' => 'ex. 2025',
        'notes'          => 'Notas adicionais...',
    ],

    'calendar_title'       => 'Imposto vence :due_date – :description (:year)',
    'calendar_description' => 'Pagamento fiscal a vencer',
    'add_to_calendar'      => 'Adicionar ao Google Agenda',

    'description_required'    => 'A descrição é obrigatória',
    'amount_required'         => 'O valor é obrigatório',
    'amount_min'              => 'O valor deve ser pelo menos 0,01',
    'due_date_required'       => 'A data de vencimento é obrigatória',
    'reference_year_required' => 'O ano de referência é obrigatório',
];
