<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Traducciones página de perfil
    |--------------------------------------------------------------------------
    |
    | Todos los textos visibles en la sección de perfil del usuario (información,
    | contraseña, eliminación de cuenta) traducidos al español. Las claves siguen
    | el esquema profile.<seccion>.<campo>.
    |
    */

    // Sección: Información de perfil
    'info' => [
        'title'       => 'Información del perfil',
        'subtitle'    => 'Actualiza la información de tu cuenta y la dirección de email.',
        'name'        => 'Nombre',
        'email'       => 'Email',
        'unverified'  => 'Tu dirección de email no está verificada.',
        'resend'      => 'Haz clic aquí para reenviar el email de verificación.',
        'resent'      => 'Se ha enviado un nuevo enlace de verificación a tu dirección de email.',
        'save'        => 'Guardar',
        'saved'       => 'Guardado.',
    ],

    
        // Sección: Idioma
    'locale' => [
        'title' => 'Idioma y localización',
        'subtitle' => 'Selecciona tu idioma preferido para la interfaz.',
        'label' => 'Idioma',
    ],

    // Sección: Actualizar contraseña
    'password' => [
        'title'       => 'Actualizar contraseña',
        'subtitle'    => 'Asegúrate de usar una contraseña larga y aleatoria para mantener segura la cuenta.',
        'current'     => 'Contraseña actual',
        'new'         => 'Nueva contraseña',
        'confirm'     => 'Confirmar contraseña',
        'save'        => 'Actualizar',
        'updated'     => 'Contraseña actualizada.',

    ],

    // Sección: Eliminación de cuenta
    'delete' => [
        'title'            => 'Eliminar cuenta',
        'open_button'      => 'Eliminar cuenta',
        'lead'             => 'Una vez eliminada la cuenta, todos los recursos y datos se borrarán de forma permanente. Antes de continuar, descarga los datos que quieras conservar.',
        'confirm_title'    => '¿Seguro que quieres eliminar tu cuenta?',
        'confirm_body'     => 'Una vez eliminada la cuenta, todos los recursos y datos se borrarán de forma permanente. Introduce la contraseña para confirmar la eliminación permanente de tu cuenta.',
        'password_label'   => 'Contraseña',
        'cancel'           => 'Cancelar',
        'confirm_button'   => 'Eliminar cuenta',
    ],

];
