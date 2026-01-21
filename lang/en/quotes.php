<?php

return [
    // Navigation
    'nav_title' => 'Quotes',
    
    // Page titles
    'title' => 'Quotes',
    'quote_list' => 'Quote List',
    'add_quote' => 'Add Quote',
    'create_quote' => 'Create Quote',
    'edit_quote' => 'Edit Quote',
    'view_project' => 'View Project',
    
    // Fields
    'quote_number' => 'Quote Number',
    'quote_date' => 'Quote Date',
    'quote_title' => 'Title',
    'items' => 'Services Offered',
    'item_description' => 'Service Description',
    'item_price' => 'Price',
    'total' => 'Total',
    'payment_terms' => 'Payment Terms',
    'validity_days' => 'Valid for (days)',
    'expiry_date' => 'Expiry Date',
    'status' => 'Status',
    'notes' => 'Notes',
    'project' => 'Project',
    'client' => 'Client',
    
    // Status
    'status_draft' => 'Draft',
    'status_sent' => 'Sent',
    'status_accepted' => 'Accepted',
    'status_rejected' => 'Rejected',
    'status_expired' => 'Expired',
    
    // Actions
    'add_item' => 'Add Service',
    'remove_item' => 'Remove',
    'download' => 'Download PDF',
    'save_draft' => 'Save as Draft',
    'mark_sent' => 'Mark as Sent',
    'mark_accepted' => 'Mark as Accepted',
    'mark_rejected' => 'Mark as Rejected',
    
    // Messages
    'created_successfully' => 'Quote created successfully',
    'updated_successfully' => 'Quote updated successfully',
    'status_updated' => 'Quote status updated successfully',
    'deleted_successfully' => 'Quote deleted successfully',
    'confirm_delete' => 'Are you sure you want to delete this quote?',
    'no_quotes' => 'No quotes',
    'no_quotes_description' => 'Create your first quote to get started.',
    
    // Validation
    'items_required' => 'At least one service is required',
    'items_min' => 'At least one service is required',
    'item_description_required' => 'Service description is required',
    'item_price_required' => 'Price is required',
    'item_price_min' => 'Price must be greater than zero',
    
    // Placeholders
    'placeholder' => [
        'title' => 'e.g. Landing Page Development Quote',
        'item_description' => 'e.g. UI/UX Design',
        'item_price' => '0.00',
        'payment_terms' => 'e.g. 50% upfront, 50% on delivery',
        'validity_days' => '30',
        'notes' => 'Optional notes...',
        'search' => 'Search quotes...',
    ],
    
    // Hints
    'payment_terms_hint' => 'Describe how the client should pay (e.g., installments, milestones)',
    'validity_days_hint' => 'Number of days this quote is valid for (default: 30 days)',
    'items_hint' => 'Add all services included in this quote',
    
    // Stats
    'total_quotes' => 'Total Quotes',
    'draft_quotes' => 'Drafts',
    'sent_quotes' => 'Sent',
    'accepted_quotes' => 'Accepted',
    'rejected_quotes' => 'Rejected',
    'total_value' => 'Total Value (Accepted)',
    'recent_quotes' => 'Recent Quotes',
    'by_status' => 'Quotes by Status',
    
    // Filters
    'filter_by_project' => 'Filter by Project',
    'filter_by_status' => 'Filter by Status',
    'all_projects' => 'All Projects',
    'all_statuses' => 'All Statuses',
    
    // PDF
    'pdf_title' => 'QUOTE',
    'pdf_valid_until' => 'Valid until',
    'pdf_services_offered' => 'SERVICES OFFERED',
    'pdf_payment_terms' => 'PAYMENT TERMS',
];