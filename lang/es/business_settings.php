<?php

return [
    // Page
    'title' => 'Configuración de la empresa', // Page title
    'sidebar_title' => 'Empresa', // Title in the sidebar
    'description' => 'Configura la información de tu actividad para facturas, presupuestos y documentos oficiales.',
    
    // Tabs
    'personal_info' => 'Datos personales',
    'legal_address' => 'Domicilio fiscal',
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
    
    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Prefijo',
    'phone' => 'Teléfono',
    
    // Business Info
    'business_name' => 'Nombre de la empresa',
    'business_description' => 'Descripción de servicios',
    'website' => 'Sitio web',
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
];
