<?php

return [
    // Page titles
    'title' => 'Clients',
    'client' => 'Client',
    'clients_list' => 'Clients List',
    'create_client' => 'New Client',
    'edit_client' => 'Edit Client',
    'client_details' => 'Client Details',

    // Actions
    'add_client' => 'Add Client',
    'save' => 'Save',
    'cancel' => 'Cancel',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'restore' => 'Restore',
    'force_delete' => 'Permanently Delete',
    'search' => 'Search',
    'filter' => 'Filter',
    'reset' => 'Reset',

    // Form labels
    'name' => 'Name / Company Name',
    'email' => 'Email',
    'status' => 'Status',
    'vat_number' => 'VAT Number',
    'phone_prefix' => 'Prefix',
    'phone' => 'Phone',
    'pec' => 'PEC',
    'website' => 'Website',
    'linkedin' => 'LinkedIn',
    'notes' => 'Notes',

    // Billing fields
    'billing_info' => 'Billing Information',
    'billing_address' => 'Address',
    'billing_city' => 'City',
    'billing_zip' => 'ZIP Code',
    'billing_province' => 'State/Province',
    'billing_country' => 'Country',
    'billing_recipient_code' => 'Recipient Code',

    // Contact info
    'contact_info' => 'Contact Information',
    'web_social' => 'Web & Social',

    // Status options
    'status_lead' => 'Lead',
    'status_active' => 'Active',
    'status_archived' => 'Archived',

    // Messages
    'created_successfully' => 'Client created successfully',
    'updated_successfully' => 'Client updated successfully',
    'deleted_successfully' => 'Client deleted successfully',
    'restored_successfully' => 'Client restored successfully',
    'permanently_deleted' => 'Client permanently deleted',

    // Validation messages
    'validation' => [
        'name_required' => 'The name is required',
        'email_required' => 'The email is required',
        'email_invalid' => 'The email is not valid',
        'email_unique' => 'This email is already in use',
        'status_required' => 'The status is required',
        'status_invalid' => 'The selected status is not valid',
        'country_code_invalid' => 'The country code must be 2 characters (e.g., IT, US)',
        'recipient_code_invalid' => 'The recipient code must be 7 characters',
        'website_invalid' => 'The website URL is not valid',
        'linkedin_invalid' => 'The LinkedIn URL is not valid',
    ],

    // Table headers
    'table' => [
        'name' => 'Name',
        'email' => 'Email',
        'status' => 'Status',
        'phone' => 'Phone',
        'created_at' => 'Created',
        'actions' => 'Actions',
    ],

    // Empty states
    'no_clients' => 'No clients found',
    'no_clients_description' => 'Start by adding your first client',

    // Confirmations
    'confirm_delete' => 'Are you sure you want to delete this client?',
    'confirm_force_delete' => 'Are you sure you want to permanently delete this client? This action cannot be undone.',
    'confirm_restore' => 'Do you want to restore this client?',

    // Placeholders
    'placeholder' => [
        'name' => 'e.g., Acme Inc.',
        'email' => 'e.g., info@acme.com',
        'vat_number' => 'e.g., GB123456789',
        'phone' => 'e.g., +1 555 123 4567',
        'pec' => 'e.g., acme@pec.com',
        'website' => 'e.g., https://www.acme.com',
        'linkedin' => 'e.g., https://www.linkedin.com/company/acme',
        'billing_address' => 'e.g., 123 Main St',
        'billing_city' => 'e.g., New York',
        'billing_zip' => 'e.g., 10001',
        'billing_province' => 'e.g., NY',
        'billing_country' => 'e.g., US',
        'billing_recipient_code' => 'e.g., ABCDEFG',
        'search' => 'Search by name or email...',
        'notes' => 'Add notes...',
    ],

    // Hints
    'hint' => [
        'billing_country' => '2-character ISO code (IT, US, FR, etc.)',
        'billing_recipient_code' => 'Unique code for electronic invoicing (7 characters)',
        'billing_province' => 'State/Province code (e.g., NY, CA, TX)',
    ],
];