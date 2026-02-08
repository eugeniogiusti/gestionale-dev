<?php

return [
    // Form verifica al login
    'challenge_message' => '请输入认证应用中的验证码或恢复码。',
    'code_label' => '认证码',
    'code_placeholder' => '123456',
    'remember_device' => '记住此设备',
    'verify_button' => '验证',
    'invalid_code' => '验证码无效。',

    // Opzione codici di recupero
    'use_recovery_code' => '使用恢复码',
    'use_authentication_code' => '使用认证码',
    'recovery_code_label' => '恢复码',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Sezione profilo
    'title' => '双因素认证',
    'subtitle' => '为你的账户增加额外的安全层。',
    'enabled_since' => '启用于 :date',
    'disabled' => '当前未启用双因素认证。',
    'enable_button' => '启用 2FA',
    'disable_button' => '禁用 2FA',
    'confirm_button' => '确认',
    'cancel_setup' => '取消',
    'password_label' => '密码',
    'scan_qr' => '请使用认证应用扫描此二维码（Google Authenticator、Authy 等）',
    'secret_help' => '或手动输入以下密钥：',
    'otp_label' => '验证码',

    // Recovery codes
    'recovery_codes_title' => '恢复码',
    'recovery_codes_help' => '请将这些代码保存在安全的地方。若设备丢失可用其登录。',
    'recovery_codes_warning' => '请立即保存这些代码！之后将不再显示。',

    // Flash messages
    'flash_enabled' => '双因素认证已成功启用！',
    'flash_disabled' => '双因素认证已禁用。',
    'flash_pending' => '请扫描二维码并输入验证码确认。',
    'flash_already_enabled' => '双因素认证已启用。',

    // Errors
    'errors' => [
        'no_pending_setup' => '当前没有进行中的 2FA 设置。',
        'invalid_code' => '验证码无效。',
    ],

    // Gestione device fidati
    'trusted_devices' => [
        'title' => '受信设备',
        'subtitle' => '管理你已通过 2FA 登录的设备。',
        'manage_button' => '管理设备',
        'no_devices' => '当前没有受信设备。',
        'current_device' => '当前设备',
        'added_on' => '添加于 :date',
        'revoke_button' => '撤销',
        'revoke_all_button' => '撤销所有设备',
        'revoke_all_confirm' => '确定要撤销所有受信设备吗？下次登录需要重新输入 2FA 码。',
        'back_to_profile' => '返回个人资料',
    ],

    // Flash messages device
    'device_revoked' => '设备撤销成功。',
    'all_devices_revoked' => '所有设备均已撤销。',

];
