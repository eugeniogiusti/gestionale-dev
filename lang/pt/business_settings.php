<?php

return [
    // Page
    'title' => 'Configurações da Empresa', // Page title
    'sidebar_title' => 'Empresa', // Title in the sidebar
    'description' => 'Configura as informações do teu negócio para faturas, orçamentos e documentos oficiais.',
    
    // Tabs
    'personal_info' => 'Dados Pessoais',
    'legal_address' => 'Sede Legal',
    'tax_info' => 'Dados Fiscais',
    'contacts' => 'Contactos',
    'business_info' => 'Atividade',
    
    
    // Personal Info
    'owner_first_name' => 'Nome',
    'owner_last_name' => 'Apelido',
    
    // Legal Address
    'legal_address' => 'Morada Legal',
    'legal_city' => 'Cidade',
    'legal_zip' => 'Código Postal',
    'legal_province' => 'Província',
    'legal_country' => 'País',
    
    // Tax Info
    'tax_id' => 'Código Fiscal',
    'vat_number' => 'NIF',
    'iban' => 'IBAN',
    'default_currency' => 'Moeda Padrão',
    
    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Prefixo',
    'phone' => 'Telefone',
    
    // Business Info
    'business_name' => 'Nome da Empresa',
    'business_description' => 'Descrição dos Serviços',
    'website' => 'Website',
    'logo' => 'Logo',
    
    // Actions
    'save' => 'Guardar Alterações',
    'cancel' => 'Cancelar',
    'delete_logo' => 'Eliminar Logo',
    'confirm_delete_logo' => 'Tens a certeza de que queres eliminar o logo?',
    
    // Messages
    'updated_successfully' => 'Configurações da empresa atualizadas com sucesso',
    'logo_deleted' => 'Logo eliminado com sucesso',
    
    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'ex. Mário',
        'owner_last_name' => 'ex. Rossi',
        'legal_address' => 'ex. Via Roma 1',
        'legal_city' => 'ex. Milão',
        'legal_zip' => 'ex. 20100',
        'legal_province' => 'ex. MI',
        'legal_country' => 'ex. IT',
        'tax_id' => 'ex. RSSMRA80A01H501U',
        'vat_number' => 'ex. IT12345678901',
        'iban' => 'ex. IT60X0542811101000000123456', 
        'email' => 'ex. info@tuaempresa.it',
        'certified_email' => 'ex. pec@tuaempresa.it',
        'phone_prefix' => 'ex. +39',
        'phone' => 'ex. 3331234567',
        'business_name' => 'ex. IT Software Solutions',
        'business_description' => 'ex. Consultoria e desenvolvimento de software personalizado',
        'website' => 'ex. https://tuaempresa.it',
    ],
    
    // Hints
    'logo_hint' => 'Formatos aceites: JPG, PNG, SVG. Tamanho máximo: 2MB.',
    'iban_hint' => 'Código IBAN da conta bancária (ex. IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'O ficheiro deve ser uma imagem.',
    'logo_max_size' => 'O logo não pode ultrapassar 2MB.',
    'logo_allowed_formats' => 'Formatos permitidos: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Formato IBAN inválido', 

    // Integrations
    'integrations' => 'Integrações',
    'github_pat' => 'Token de Acesso Pessoal do GitHub',
    'github_pat_hint' => 'Gere um token em',
    'github_required_scopes' => 'Permissões necessárias',
    'github_scope_repo' => 'acesso a repositórios públicos e privados',
    'github_scope_read_user' => 'leitura do perfil do utilizador',
];
