<?php

return [
    // Page
    'title' => 'Company Settings', // Page title
    'sidebar_title' => 'Company', // Title in the sidebar
    'description' => 'Set up your business information for invoices, quotes, and official documents.',
    
    // Tabs
    'personal_info' => 'Personal Info',
    'legal_address' => 'Registered Office',
    'tax_info' => 'Tax Details',
    'contacts' => 'Contacts',
    'business_info' => 'Business',
    
    
    // Personal Info
    'owner_first_name' => 'First Name',
    'owner_last_name' => 'Last Name',
    
    // Legal Address
    'legal_address' => 'Legal Address',
    'legal_city' => 'City',
    'legal_zip' => 'ZIP Code',
    'legal_province' => 'Province',
    'legal_country' => 'Country',
    
    // Tax Info
    'tax_id' => 'Tax Code',
    'vat_number' => 'VAT Number',
    'iban' => 'IBAN', 
    
    // Contacts
    'email' => 'Email',
    'certified_email' => 'Certified Email (PEC)',
    'phone_prefix' => 'Prefix',
    'phone' => 'Phone Number',
    
    // Business Info
    'business_name' => 'Business Name',
    'business_description' => 'Service Description',
    'website' => 'Website',
    'logo' => 'Logo',
    
    // Actions
    'save' => 'Save Changes',
    'cancel' => 'Cancel',
    'delete_logo' => 'Delete Logo',
    'confirm_delete_logo' => 'Are you sure you want to delete the logo?',
    
    // Messages
    'updated_successfully' => 'Company settings updated successfully',
    'logo_deleted' => 'Logo deleted successfully',
    
    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'e.g. Mario',
        'owner_last_name' => 'e.g. Rossi',
        'legal_address' => 'e.g. Via Roma 1',
        'legal_city' => 'e.g. Milan',
        'legal_zip' => 'e.g. 20100',
        'legal_province' => 'e.g. MI',
        'legal_country' => 'e.g. IT',
        'tax_id' => 'e.g. RSSMRA80A01H501U',
        'vat_number' => 'e.g. IT12345678901',
        'iban' => 'e.g. IT60X0542811101000000123456', 
        'email' => 'e.g. info@yourcompany.com',
        'certified_email' => 'e.g. pec@yourcompany.com',
        'phone_prefix' => 'e.g. +39',
        'phone' => 'e.g. 3331234567',
        'business_name' => 'e.g. IT Software Solutions',
        'business_description' => 'e.g. Custom software development and consulting services',
        'website' => 'e.g. https://yourcompany.com',
    ],
    
    // Hints
    'logo_hint' => 'Accepted formats: JPG, PNG, SVG. Maximum size: 2MB.',
    'iban_hint' => 'International Bank Account Number (e.g., IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'The file must be an image.',
    'logo_max_size' => 'The logo cannot exceed 2MB.',
    'logo_allowed_formats' => 'Allowed formats: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Invalid IBAN format', 
];