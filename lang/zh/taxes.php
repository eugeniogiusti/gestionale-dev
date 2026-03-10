<?php

return [
    'title'       => '税务',
    'subtitle'    => '管理税款支付和文件',
    'create_tax'  => '添加税务',
    'edit_tax'    => '编辑税务',
    'no_taxes'    => '暂无税务',
    'no_taxes_description' => '记录您的第一笔税款',
    'confirm_delete' => '确定要删除此税务吗？',

    'description'    => '描述',
    'amount'         => '金额',
    'due_date'       => '截止日期',
    'paid_at'        => '支付日期',
    'reference_year' => '参考年份',
    'attachment'     => '税务文件',
    'notes'          => '备注',

    'all_years'    => '所有年份',
    'all_statuses' => '全部',
    'paid'         => '已支付',
    'unpaid'       => '未支付',

    'created_successfully' => '税务创建成功',
    'updated_successfully' => '税务更新成功',
    'deleted_successfully' => '税务删除成功',

    'attachment_uploaded_successfully' => '文件上传成功',
    'attachment_deleted_successfully'  => '文件删除成功',
    'attachment_not_found'             => '文件未找到',
    'attachment_required'              => '文件为必填项',
    'attachment_mimes'                 => '仅允许 PDF、JPG、JPEG、PNG 文件',
    'attachment_max'                   => '文件大小不得超过 10 MB',

    'stats' => [
        'total_all_time'  => '历史总计',
        'total_this_year' => '今年',
        'unpaid_amount'   => '未支付',
        'count_this_year' => '今年税务数',
        'paid_total'      => '已支付总计',
        'due'             => '应付金额',
        'scheduled'       => '已计划',
    ],

    'placeholder' => [
        'search'         => '按描述搜索...',
        'amount'         => '例：1500.00',
        'description'    => '例：2025年所得税余额',
        'reference_year' => '例：2025',
        'notes'          => '附加备注...',
    ],

    'calendar_title'       => '税款到期 :due_date – :description (:year)',
    'calendar_description' => '税款即将到期',
    'add_to_calendar'      => '添加到 Google 日历',

    'description_required'    => '描述为必填项',
    'amount_required'         => '金额为必填项',
    'amount_min'              => '金额必须至少为 0.01',
    'due_date_required'       => '截止日期为必填项',
    'reference_year_required' => '参考年份为必填项',
];
