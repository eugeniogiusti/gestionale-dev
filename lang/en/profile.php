<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Profile Page Translations
    |--------------------------------------------------------------------------
    |
    | All visible texts in the user profile section (information, password,
    | account deletion) translated into English. Keys follow the pattern
    | profile.<section>.<field>.
    |
    */

    // Section: Profile information
    'info' => [
        'title'       => 'Profile Information',
        'subtitle'    => 'Update your account information and email address.',
        'name'        => 'Name',
        'email'       => 'Email',
        'unverified'  => 'Your email address is unverified.',
        'resend'      => 'Click here to resend the verification email.',
        'resent'      => 'A new verification link has been sent to your email address.',
        'save'        => 'Save',
        'saved'       => 'Saved.',
    ],


            // Sezione: Lingua
    'locale' => [
        'title' => 'Language & Localization',
        'subtitle' => 'Select your preferred language for the interface.',
        'label' => 'Language',
    ],

    // Section: Update password
    'password' => [
        'title'       => 'Update Password',
        'subtitle'    => 'Make sure to use a long, random password to keep your account secure.',
        'current'     => 'Current Password',
        'new'         => 'New Password',
        'confirm'     => 'Confirm Password',
        'save'        => 'Update',
        'updated'     => 'Password updated.',
    ],

    // Section: Delete account
    'delete' => [
        'title'            => 'Delete Account',
        'open_button'      => 'Delete Account',
        'lead'             => 'Once your account is deleted, all resources and data will be permanently removed. Before proceeding, download any information you wish to keep.',
        'confirm_title'    => 'Are you sure you want to delete your account?',
        'confirm_body'     => 'Once deleted, all resources and data will be permanently removed. Please enter your password to confirm permanent deletion of your account.',
        'password_label'   => 'Password',
        'cancel'           => 'Cancel',
        'confirm_button'   => 'Delete Account',
    ],

];