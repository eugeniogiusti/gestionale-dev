<?php

return [
    // Page
    'title' => 'Configuración de la empresa', // Page title
    'sidebar_title' => 'Empresa', // Title in the sidebar
    'description' => 'Configura la información de tu actividad para facturas, presupuestos y documentos oficiales.',
    
    // Tabs
    'personal_info' => 'Datos personales',
    'legal_address_tab' => 'Domicilio fiscal',
    'tax_info' => 'Datos fiscales',
    'contacts' => 'Contactos',
    'business_info' => 'Actividad',
    
    
    // Personal Info
    'owner_first_name' => 'Nombre',
    'owner_last_name' => 'Apellidos',
    
    // Legal Address
    'legal_address' => 'Dirección legal',
    'legal_city' => 'Ciudad',
    'legal_zip' => 'Código postal',
    'legal_province' => 'Provincia',
    'legal_country' => 'País',
    
    // Tax Info
    'tax_id' => 'Código fiscal',
    'vat_number' => 'NIF / IVA',
    'iban' => 'IBAN',
    'default_currency' => 'Moneda Predeterminada',

    // Fiscal Regime
    'fiscal_regime_section' => 'Régimen Fiscal',
    'tax_regime' => 'Régimen Fiscal',
    'substitute_tax_rate' => 'Impuesto Sustitutivo',
    'profitability_coefficient' => 'Coef. de Rentabilidad',
    'annual_revenue_cap' => 'Facturación Anual Máxima',
    'business_start_date' => 'Inicio de Actividad',

    // Pension
    'pension_section' => 'Previsión Social',
    'pension_fund' => 'Fondo de Pensiones',
    'pension_registration_number' => 'Número de Afiliación',
    'pension_registration_date' => 'Fecha de Inscripción',

    // ATECO
    'ateco_section' => 'Códigos ATECO',
    'ateco_code' => 'Código',
    'ateco_description' => 'Descripción',
    'ateco_primary' => 'Principal',
    'ateco_add' => 'Agregar',
    'ateco_set_primary' => 'Establecer como principal',
    'ateco_no_codes' => 'No se han añadido códigos ATECO',
    'ateco_delete_confirm' => '¿Eliminar este código ATECO?',
    
    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Prefijo',
    'phone' => 'Teléfono',
    
    // Business Info
    'business_name' => 'Nombre de la empresa',
    'business_description' => 'Descripción de servicios',
    'website' => 'Sitio web',
        'billing_tool_url' => 'p.ej. https://facturacion.tuempresa.es',
        'tax_regime' => 'p.ej. Régimen simplificado',
        'substitute_tax_rate' => 'p.ej. 15',
        'profitability_coefficient' => 'p.ej. 67',
        'annual_revenue_cap' => 'p.ej. 85000',
        'pension_fund' => 'p.ej. GS INPS',
        'pension_registration_number' => 'p.ej. 3300',
        'ateco_code' => 'p.ej. 62.01',
        'ateco_description' => 'p.ej. Producción de software',
    'logo' => 'Logo',
    
    // Actions
    'save' => 'Guardar cambios',
    'cancel' => 'Cancelar',
    'delete_logo' => 'Eliminar logo',
    'confirm_delete_logo' => '¿Seguro que quieres eliminar el logo?',
    
    // Messages
    'updated_successfully' => 'Configuración de la empresa actualizada correctamente',
    'logo_deleted' => 'Logo eliminado correctamente',
    
    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'p. ej. Mario',
        'owner_last_name' => 'p. ej. Rossi',
        'legal_address' => 'p. ej. Via Roma 1',
        'legal_city' => 'p. ej. Milán',
        'legal_zip' => 'p. ej. 20100',
        'legal_province' => 'p. ej. MI',
        'legal_country' => 'p. ej. IT',
        'tax_id' => 'p. ej. RSSMRA80A01H501U',
        'vat_number' => 'p. ej. IT12345678901',
        'iban' => 'p. ej. IT60X0542811101000000123456', 
        'email' => 'p. ej. info@tuempresa.it',
        'certified_email' => 'p. ej. pec@tuempresa.it',
        'phone_prefix' => 'p. ej. +39',
        'phone' => 'p. ej. 3331234567',
        'business_name' => 'p. ej. IT Software Solutions',
        'business_description' => 'p. ej. Consultoría y desarrollo de software a medida',
        'website' => 'p. ej. https://tuempresa.it',
        'invoice_note' => 'ej. Operación exenta de IVA según art. 20 LIVA',
    ],
    
    // Hints
    'logo_hint' => 'Formatos aceptados: JPG, PNG, SVG. Tamaño máximo: 2MB.',
    'iban_hint' => 'Código IBAN de la cuenta bancaria (p. ej. IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'El archivo debe ser una imagen.',
    'logo_max_size' => 'El logo no puede superar 2MB.',
    'logo_allowed_formats' => 'Formatos permitidos: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Formato IBAN no válido', 

    // Integrations
    'integrations' => 'Integraciones',
    'github_pat' => 'Token de Acceso Personal de GitHub',
    'github_pat_hint' => 'Genera un token en',
    'github_required_scopes' => 'Permisos requeridos',
    'github_scope_repo' => 'acceso a repositorios públicos y privados',
    'github_scope_read_user' => 'leer perfil de usuario',
    'billing_tool' => 'Herramienta de facturación',
    'billing_tool_url' => 'URL de la herramienta de facturación',
        'tax_regime' => 'p.ej. Régimen simplificado',
        'substitute_tax_rate' => 'p.ej. 15',
        'profitability_coefficient' => 'p.ej. 67',
        'annual_revenue_cap' => 'p.ej. 85000',
        'pension_fund' => 'p.ej. GS INPS',
        'pension_registration_number' => 'p.ej. 3300',
        'ateco_code' => 'p.ej. 62.01',
        'ateco_description' => 'p.ej. Producción de software',
    'billing_tool_url_hint' => 'Introduce el enlace de la herramienta que usas para emitir facturas.',

    // Documents tab
    'documents_tab' => 'Documentos',
    'documents' => [
        'title' => 'Documentos personales / NIF',
        'description' => 'Sube documentos relacionados con tu actividad: alta autónomo, cambios ATECO, etc.',
        'upload' => 'Subir documento',
        'name' => 'Nombre del documento',
        'notes' => 'Notas',
        'file' => 'Archivo',
        'uploaded_at' => 'Subido el',
        'no_documents' => 'No hay documentos subidos.',
        'created' => 'Documento subido correctamente.',
        'updated' => 'Documento actualizado correctamente.',
        'deleted' => 'Documento eliminado correctamente.',
        'delete_confirm' => '¿Eliminar este documento?',
        'placeholder_name' => 'ej. Certificado alta autónomo',
        'placeholder_notes' => 'ej. Documento oficial de la Agencia Tributaria',
    ],

    // Invoice Note
    'invoice_note_section' => 'Nota de factura',
    'invoice_note' => 'Nota legal / fiscal',
    'invoice_note_hint' => 'Texto que aparecerá al pie de la factura.',
];
