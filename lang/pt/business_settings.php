<?php

return [
    // Page
    'title' => 'Configurações da Empresa', // Page title
    'sidebar_title' => 'Empresa', // Title in the sidebar
    'description' => 'Configura as informações do teu negócio para faturas, orçamentos e documentos oficiais.',
    
    // Tabs
    'personal_info' => 'Dados Pessoais',
    'legal_address_tab' => 'Sede Legal',
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

    // Fiscal Regime
    'fiscal_regime_section' => 'Regime Fiscal',
    'tax_regime' => 'Regime Fiscal',
    'substitute_tax_rate' => 'Imposto Substitutivo',
    'profitability_coefficient' => 'Coef. de Rentabilidade',
    'annual_revenue_cap' => 'Faturação Anual Máxima',
    'business_start_date' => 'Início de Atividade',

    // Pension
    'pension_section' => 'Previdência',
    'pension_fund' => 'Fundo de Pensões',
    'pension_registration_number' => 'Número de Matrícula',
    'pension_registration_date' => 'Data de Inscrição',

    // ATECO
    'ateco_section' => 'Códigos ATECO',
    'ateco_code' => 'Código',
    'ateco_description' => 'Descrição',
    'ateco_primary' => 'Principal',
    'ateco_add' => 'Adicionar',
    'ateco_set_primary' => 'Definir como principal',
    'ateco_no_codes' => 'Nenhum código ATECO adicionado',
    'ateco_delete_confirm' => 'Eliminar este código ATECO?',
    
    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Prefixo',
    'phone' => 'Telefone',
    
    // Business Info
    'business_name' => 'Nome da Empresa',
    'business_description' => 'Descrição dos Serviços',
    'website' => 'Website',
        'billing_tool_url' => 'ex. https://faturacao.suaempresa.pt',
        'tax_regime' => 'ex. Regime simplificado',
        'substitute_tax_rate' => 'ex. 15',
        'profitability_coefficient' => 'ex. 67',
        'annual_revenue_cap' => 'ex. 85000',
        'pension_fund' => 'ex. GS INPS',
        'pension_registration_number' => 'ex. 3300',
        'ateco_code' => 'ex. 62.01',
        'ateco_description' => 'ex. Produção de software',
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
        'invoice_note' => 'ex. Isento de IVA nos termos do art. 53.º do CIVA',
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
    'billing_tool' => 'Ferramenta de faturação',
    'billing_tool_url' => 'URL da ferramenta de faturação',
        'tax_regime' => 'ex. Regime simplificado',
        'substitute_tax_rate' => 'ex. 15',
        'profitability_coefficient' => 'ex. 67',
        'annual_revenue_cap' => 'ex. 85000',
        'pension_fund' => 'ex. GS INPS',
        'pension_registration_number' => 'ex. 3300',
        'ateco_code' => 'ex. 62.01',
        'ateco_description' => 'ex. Produção de software',
    'billing_tool_url_hint' => 'Insira o link da ferramenta que utiliza para emitir faturas.',

    // Documents tab
    'documents_tab' => 'Documentos',
    'documents' => [
        'title' => 'Documentos pessoais / NIF',
        'description' => 'Carregue documentos relacionados com a sua atividade: registo IVA, alterações ATECO, etc.',
        'upload' => 'Carregar documento',
        'name' => 'Nome do documento',
        'notes' => 'Notas',
        'file' => 'Ficheiro',
        'uploaded_at' => 'Carregado em',
        'no_documents' => 'Nenhum documento carregado.',
        'created' => 'Documento carregado com sucesso.',
        'updated' => 'Documento atualizado com sucesso.',
        'deleted' => 'Documento eliminado com sucesso.',
        'delete_confirm' => 'Eliminar este documento?',
        'placeholder_name' => 'ex. Certificado de registo IVA',
        'placeholder_notes' => 'ex. Documento oficial da Autoridade Tributária',
    ],

    // Invoice Note
    'invoice_note_section' => 'Nota de fatura',
    'invoice_note' => 'Nota legal / fiscal',
    'invoice_note_hint' => 'Texto que aparecerá no rodapé da fatura.',
];
