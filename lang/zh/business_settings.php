<?php

return [
    // Page
    'title' => '企业设置',
    'sidebar_title' => '企业',
    'description' => '配置你的企业信息，用于发票、报价和正式文档。',

    // Tabs
    'personal_info' => '个人信息',
    'legal_address_tab' => '法定地址',
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

    // Fiscal Regime
    'fiscal_regime_section' => '税收制度',
    'tax_regime' => '税收制度',
    'substitute_tax_rate' => '替代税率',
    'profitability_coefficient' => '盈利系数',
    'annual_revenue_cap' => '年度最高营业额',
    'business_start_date' => '营业开始日期',

    // Pension
    'pension_section' => '养老保险',
    'pension_fund' => '养老基金',
    'pension_registration_number' => '注册编号',
    'pension_registration_date' => '注册日期',

    // ATECO
    'ateco_section' => 'ATECO代码',
    'ateco_code' => '代码',
    'ateco_description' => '描述',
    'ateco_primary' => '主要',
    'ateco_add' => '添加',
    'ateco_set_primary' => '设为主要',
    'ateco_no_codes' => '未添加ATECO代码',
    'ateco_delete_confirm' => '删除此ATECO代码？',

    // Contacts
    'email' => '邮箱',
    'certified_email' => '认证邮箱 (PEC)',
    'phone_prefix' => '区号',
    'phone' => '电话',

    // Business Info
    'business_name' => '企业名称',
    'business_description' => '服务描述',
    'website' => '网站',
        'billing_tool_url' => '例如 https://billing.yourcompany.com',
        'tax_regime' => '例如 简化制度',
        'substitute_tax_rate' => '例如 15',
        'profitability_coefficient' => '例如 67',
        'annual_revenue_cap' => '例如 85000',
        'pension_fund' => '例如 GS INPS',
        'pension_registration_number' => '例如 3300',
        'ateco_code' => '例如 62.01',
        'ateco_description' => '例如 软件开发',
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
        'invoice_note' => '例：依据增值税法第X条免税',
    ],

    // Hints
    'logo_hint' => '支持格式：JPG、PNG、SVG。最大 2MB。',
    'iban_hint' => '银行账户 IBAN（例如 IT60X0542811101000000123456）',

    // Validation
    'logo_must_be_image' => '文件必须是图片。',
    'logo_max_size' => 'Logo 不能超过 2MB。',
    'logo_allowed_formats' => '允许格式：JPEG、JPG、PNG、SVG。',
    'iban_invalid_format' => 'IBAN 格式无效',

    // Integrations
    'integrations' => '集成',
    'github_pat' => 'GitHub 个人访问令牌',
    'github_pat_hint' => '在此生成令牌',
    'github_required_scopes' => '所需权限',
    'github_scope_repo' => '访问公共和私有仓库',
    'github_scope_read_user' => '读取用户资料',
    'billing_tool' => '账单工具',
    'billing_tool_url' => '账单工具网址',
        'tax_regime' => '例如 简化制度',
        'substitute_tax_rate' => '例如 15',
        'profitability_coefficient' => '例如 67',
        'annual_revenue_cap' => '例如 85000',
        'pension_fund' => '例如 GS INPS',
        'pension_registration_number' => '例如 3300',
        'ateco_code' => '例如 62.01',
        'ateco_description' => '例如 软件开发',
    'billing_tool_url_hint' => '输入您用于开具发票的工具的链接。',

    // Documents tab
    'documents_tab' => '文件',
    'documents' => [
        'title' => '个人/增值税文件',
        'description' => '上传与业务相关的文件：增值税注册、ATECO变更等。',
        'upload' => '上传文件',
        'name' => '文件名称',
        'notes' => '备注',
        'file' => '文件',
        'uploaded_at' => '上传日期',
        'no_documents' => '暂无上传文件。',
        'created' => '文件上传成功。',
        'updated' => '文件更新成功。',
        'deleted' => '文件删除成功。',
        'delete_confirm' => '确定删除此文件？',
        'placeholder_name' => '例：增值税注册证书',
        'placeholder_notes' => '例：税务局官方文件',
    ],

    // Invoice Note
    'invoice_note_section' => '发票备注',
    'invoice_note' => '法律/税务备注',
    'invoice_note_hint' => '将显示在发票底部的文字。',
];
