<?php

return [
    // Page
    'title' => '企业设置',
    'sidebar_title' => '企业',
    'description' => '配置你的企业信息，用于发票、报价和正式文档。',

    // Tabs
    'personal_info' => '个人信息',
    'legal_address' => '法定地址',
    'tax_info' => '税务信息',
    'contacts' => '联系方式',
    'business_info' => '业务信息',

    // Personal Info
    'owner_first_name' => '名',
    'owner_last_name' => '姓',

    // Legal Address
    'legal_address' => '法定地址',
    'legal_city' => '城市',
    'legal_zip' => '邮编',
    'legal_province' => '省/州',
    'legal_country' => '国家',

    // Tax Info
    'tax_id' => '税号',
    'vat_number' => '增值税号',
    'iban' => 'IBAN',
    'default_currency' => '默认货币',

    // Contacts
    'email' => '邮箱',
    'certified_email' => '认证邮箱 (PEC)',
    'phone_prefix' => '区号',
    'phone' => '电话',

    // Business Info
    'business_name' => '企业名称',
    'business_description' => '服务描述',
    'website' => '网站',
    'logo' => 'Logo',

    // Actions
    'save' => '保存更改',
    'cancel' => '取消',
    'delete_logo' => '删除 Logo',
    'confirm_delete_logo' => '确定要删除 Logo 吗？',

    // Messages
    'updated_successfully' => '企业设置已更新',
    'logo_deleted' => 'Logo 已删除',

    // Placeholders
    'placeholder' => [
        'owner_first_name' => '例如：Mario',
        'owner_last_name' => '例如：Rossi',
        'legal_address' => '例如：Via Roma 1',
        'legal_city' => '例如：Milano',
        'legal_zip' => '例如：20100',
        'legal_province' => '例如：MI',
        'legal_country' => '例如：IT',
        'tax_id' => '例如：RSSMRA80A01H501U',
        'vat_number' => '例如：IT12345678901',
        'iban' => '例如：IT60X0542811101000000123456',
        'email' => '例如：info@yourcompany.it',
        'certified_email' => '例如：pec@yourcompany.it',
        'phone_prefix' => '例如：+39',
        'phone' => '例如：3331234567',
        'business_name' => '例如：IT Software Solutions',
        'business_description' => '例如：定制软件咨询与开发',
        'website' => '例如：https://yourcompany.it',
    ],

    // Hints
    'logo_hint' => '支持格式：JPG、PNG、SVG。最大 2MB。',
    'iban_hint' => '银行账户 IBAN（例如 IT60X0542811101000000123456）',

    // Validation
    'logo_must_be_image' => '文件必须是图片。',
    'logo_max_size' => 'Logo 不能超过 2MB。',
    'logo_allowed_formats' => '允许格式：JPEG、JPG、PNG、SVG。',
    'iban_invalid_format' => 'IBAN 格式无效',
];
