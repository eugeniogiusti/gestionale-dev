<?php

namespace Database\Seeders;

use App\Models\BusinessSettings;
use App\Models\Project;
use Illuminate\Database\Seeder;

class IndieHackerProjectSeeder extends Seeder
{
    public function run(): void
    {
        $currency = BusinessSettings::current()->default_currency ?? 'EUR';

        foreach ($this->projects() as $data) {
            $project = Project::create($data['project']);

            foreach ($data['tasks'] as $task) {
                $project->tasks()->create($task);
            }

            foreach ($data['costs'] as $cost) {
                $project->costs()->create(array_merge($cost, ['currency' => $currency]));
            }

            foreach ($data['payments'] as $payment) {
                $project->payments()->create(array_merge($payment, ['currency' => $currency]));
            }

            foreach ($data['meetings'] as $meeting) {
                $project->meetings()->create($meeting);
            }
        }
    }

    private function projects(): array
    {
        return [
            // ============================================================
            // 1) FocusPulse - Productivity timer SaaS
            // ============================================================
            [
                'project' => [
                    'name'           => 'FocusPulse',
                    'slug'           => 'focuspulse',
                    'description'    => 'Minimalist productivity timer for remote workers. Pomodoro + deep work sessions with analytics and Slack integration.',
                    'status'         => 'in_progress',
                    'type'           => 'product',
                    'priority'       => 'high',
                    'repo_url'       => 'https://github.com/johndoe/focuspulse',
                    'production_url' => 'https://focuspulse.app',
                    'docs_url'       => 'https://docs.focuspulse.app',
                    'start_date'     => '2026-01-05',
                    'notes'          => 'MVP launched. Focus on onboarding funnel and monthly retention.',
                ],
                'tasks' => [
                    ['title' => 'Add Slack notification integration',       'type' => 'feature',        'status' => 'done',        'priority' => 'high',   'order' => 1, 'description' => 'Send a Slack message when a deep work session is completed.'],
                    ['title' => 'Build analytics dashboard',               'type' => 'feature',        'status' => 'done',        'priority' => 'high',   'order' => 2, 'description' => 'Weekly and monthly charts showing focus hours and streaks.'],
                    ['title' => 'Fix timer not pausing on tab switch',     'type' => 'bug',            'status' => 'done',        'priority' => 'high',   'order' => 3, 'description' => 'Timer keeps running when switching browser tabs.'],
                    ['title' => 'Add dark mode support',                   'type' => 'feature',        'status' => 'in_progress', 'priority' => 'medium', 'order' => 4, 'description' => 'Respect system theme and allow manual toggle.'],
                    ['title' => 'Implement Stripe billing portal',         'type' => 'feature',        'status' => 'in_progress', 'priority' => 'high',   'order' => 5, 'description' => 'Allow users to manage subscriptions and download invoices.'],
                    ['title' => 'Fix broken password reset email',         'type' => 'bug',            'status' => 'todo',        'priority' => 'high',   'order' => 6, 'description' => 'Reset link returns 404 due to expired signed URL.', 'due_date' => '2026-02-14'],
                    ['title' => 'Refactor session storage to Redis',       'type' => 'refactor',       'status' => 'todo',        'priority' => 'low',    'order' => 7, 'description' => 'Move from file-based sessions to Redis.'],
                    ['title' => 'Write API documentation',                 'type' => 'administrative', 'status' => 'todo',        'priority' => 'medium', 'order' => 8, 'description' => 'Document all public endpoints.'],
                ],
                'costs' => [
                    ['amount' => 6.00,   'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'monthly', 'paid_at' => '2026-01-01', 'notes' => 'DigitalOcean Droplet'],
                    ['amount' => 14.00,  'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'yearly',  'paid_at' => '2026-01-05', 'notes' => 'Domain focuspulse.app'],
                    ['amount' => 29.00,  'type' => 'tool',     'recurring' => true,  'recurring_period' => 'monthly', 'paid_at' => '2026-01-05', 'notes' => 'Postmark transactional emails'],
                    ['amount' => 50.00,  'type' => 'ads',      'recurring' => false, 'paid_at' => '2026-01-28', 'notes' => 'Sponsored post on Indie Hackers newsletter'],
                    ['amount' => 6.00,   'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'monthly', 'paid_at' => '2026-02-01', 'notes' => 'DigitalOcean Droplet (February)'],
                ],
                'payments' => [
                    ['amount' => 12.00,  'paid_at' => '2026-01-10', 'method' => 'stripe', 'reference' => 'pi_fp_001', 'notes' => 'Pro plan - first paying customer'],
                    ['amount' => 12.00,  'paid_at' => '2026-01-18', 'method' => 'stripe', 'reference' => 'pi_fp_002', 'notes' => 'Pro plan'],
                    ['amount' => 39.00,  'paid_at' => '2026-01-25', 'method' => 'stripe', 'reference' => 'pi_fp_003', 'notes' => 'Team plan'],
                    ['amount' => 12.00,  'paid_at' => '2026-02-01', 'method' => 'stripe', 'reference' => 'pi_fp_004', 'notes' => 'Pro plan'],
                    ['amount' => 39.00,  'paid_at' => '2026-02-05', 'method' => 'stripe', 'reference' => 'pi_fp_005', 'notes' => 'Team plan renewal'],
                    ['amount' => 12.00,  'due_date' => '2026-02-20', 'notes' => 'Pro plan renewal - pending'],
                ],
                'meetings' => [
                    ['title' => 'Product roadmap kick-off',    'scheduled_at' => '2026-01-08 10:00:00', 'duration_minutes' => 45, 'status' => 'completed', 'meeting_url' => 'https://meet.google.com/fp-roadmap',    'notes' => 'Defined Q1 priorities: analytics, Slack integration, billing.'],
                    ['title' => 'Stripe integration planning', 'scheduled_at' => '2026-01-22 11:00:00', 'duration_minutes' => 30, 'status' => 'completed', 'meeting_url' => 'https://meet.google.com/fp-stripe',     'notes' => 'Using Stripe Checkout + Customer Portal. Webhook handler needed.'],
                    ['title' => 'Monthly growth review',       'scheduled_at' => '2026-02-12 10:00:00', 'duration_minutes' => 45, 'status' => 'scheduled', 'meeting_url' => 'https://meet.google.com/fp-growth',     'description' => 'Review MRR, churn rate, and acquisition channels.'],
                ],
            ],

            // ============================================================
            // 2) ShipFast Boilerplate - Laravel starter kit
            // ============================================================
            [
                'project' => [
                    'name'           => 'ShipFast Boilerplate',
                    'slug'           => 'shipfast-boilerplate',
                    'description'    => 'Production-ready Laravel starter kit with auth, billing, admin panel, and deployment scripts. Sell once, deliver forever.',
                    'status'         => 'completed',
                    'type'           => 'product',
                    'priority'       => 'medium',
                    'repo_url'       => 'https://github.com/johndoe/shipfast',
                    'production_url' => 'https://shipfast.dev',
                    'start_date'     => '2026-01-02',
                    'notes'          => 'v1.0 shipped. Selling on Gumroad. Maintenance mode.',
                ],
                'tasks' => [
                    ['title' => 'Setup Gumroad product page',              'type' => 'administrative', 'status' => 'done',        'priority' => 'high',   'order' => 1, 'description' => 'Create listing with screenshots, demo video, and pricing tiers.'],
                    ['title' => 'Build admin panel scaffolding',           'type' => 'feature',        'status' => 'done',        'priority' => 'high',   'order' => 2, 'description' => 'CRUD generators, role management, dashboard widgets.'],
                    ['title' => 'Add Stripe subscription support',         'type' => 'feature',        'status' => 'done',        'priority' => 'high',   'order' => 3, 'description' => 'Laravel Cashier integration with plans and trial periods.'],
                    ['title' => 'Write installation docs',                 'type' => 'administrative', 'status' => 'done',        'priority' => 'medium', 'order' => 4, 'description' => 'Step-by-step guide for new buyers.'],
                    ['title' => 'Fix Docker compose for Apple Silicon',    'type' => 'bug',            'status' => 'done',        'priority' => 'medium', 'order' => 5, 'description' => 'MySQL image not working on ARM64.'],
                    ['title' => 'Add multi-tenancy module',                'type' => 'feature',        'status' => 'todo',        'priority' => 'low',    'order' => 6, 'description' => 'Optional module for SaaS use case with tenant isolation.'],
                ],
                'costs' => [
                    ['amount' => 12.00,  'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'yearly',  'paid_at' => '2026-01-02', 'notes' => 'Domain shipfast.dev'],
                    ['amount' => 5.00,   'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'monthly', 'paid_at' => '2026-01-02', 'notes' => 'GitHub Pro (private repos)'],
                    ['amount' => 29.00,  'type' => 'tool',     'recurring' => false, 'paid_at' => '2026-01-03', 'notes' => 'Screen recording tool for demo video'],
                ],
                'payments' => [
                    ['amount' => 79.00,  'paid_at' => '2026-01-12', 'method' => 'stripe', 'reference' => 'pi_sf_001', 'notes' => 'Starter license'],
                    ['amount' => 149.00, 'paid_at' => '2026-01-18', 'method' => 'stripe', 'reference' => 'pi_sf_002', 'notes' => 'Pro license with lifetime updates'],
                    ['amount' => 79.00,  'paid_at' => '2026-01-25', 'method' => 'paypal', 'reference' => 'PAY-sf-003', 'notes' => 'Starter license (via PayPal)'],
                    ['amount' => 149.00, 'paid_at' => '2026-02-02', 'method' => 'stripe', 'reference' => 'pi_sf_004', 'notes' => 'Pro license'],
                    ['amount' => 149.00, 'paid_at' => '2026-02-06', 'method' => 'stripe', 'reference' => 'pi_sf_005', 'notes' => 'Pro license'],
                ],
                'meetings' => [
                    ['title' => 'Launch day retrospective',    'scheduled_at' => '2026-01-15 09:00:00', 'duration_minutes' => 30, 'status' => 'completed', 'meeting_url' => 'https://meet.google.com/sf-retro',  'notes' => 'Good traction on Product Hunt. 12 sales in first 48h.'],
                    ['title' => 'Customer support review',     'scheduled_at' => '2026-02-10 14:00:00', 'duration_minutes' => 30, 'status' => 'scheduled', 'meeting_url' => 'https://meet.google.com/sf-support', 'description' => 'Review common issues and FAQ updates.'],
                ],
            ],

            // ============================================================
            // 3) PingBot - Uptime monitoring
            // ============================================================
            [
                'project' => [
                    'name'           => 'PingBot',
                    'slug'           => 'pingbot',
                    'description'    => 'Simple uptime monitoring service. Ping your endpoints every minute, get alerts via email, Slack, or Telegram.',
                    'status'         => 'in_progress',
                    'type'           => 'product',
                    'priority'       => 'high',
                    'repo_url'       => 'https://github.com/johndoe/pingbot',
                    'production_url' => 'https://pingbot.io',
                    'start_date'     => '2026-01-10',
                    'notes'          => 'Beta launched with 15 users. Need to improve alert delivery speed.',
                ],
                'tasks' => [
                    ['title' => 'Build check scheduler (cron)',            'type' => 'feature',  'status' => 'done',        'priority' => 'high',   'order' => 1, 'description' => 'Run HTTP checks every 60s using Laravel scheduler.'],
                    ['title' => 'Implement email alerts',                  'type' => 'feature',  'status' => 'done',        'priority' => 'high',   'order' => 2, 'description' => 'Send email when endpoint goes down or recovers.'],
                    ['title' => 'Add Telegram bot notifications',          'type' => 'feature',  'status' => 'done',        'priority' => 'medium', 'order' => 3, 'description' => 'Integrate Telegram Bot API for instant alerts.'],
                    ['title' => 'Build status page (public)',              'type' => 'feature',  'status' => 'in_progress', 'priority' => 'high',   'order' => 4, 'description' => 'Public-facing status page per user with custom domain support.'],
                    ['title' => 'Add SSL certificate monitoring',          'type' => 'feature',  'status' => 'todo',        'priority' => 'medium', 'order' => 5, 'description' => 'Alert when SSL certificate is about to expire.'],
                    ['title' => 'Fix false positives on slow responses',   'type' => 'bug',      'status' => 'todo',        'priority' => 'high',   'order' => 6, 'description' => 'Timeout threshold too aggressive, triggers false down alerts.', 'due_date' => '2026-02-12'],
                    ['title' => 'Setup Redis queue for alert dispatch',    'type' => 'infra',    'status' => 'todo',        'priority' => 'medium', 'order' => 7, 'description' => 'Move alert sending to background queue for speed.'],
                ],
                'costs' => [
                    ['amount' => 12.00,  'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'monthly', 'paid_at' => '2026-01-10', 'notes' => 'Hetzner VPS (2 vCPU, 4GB RAM)'],
                    ['amount' => 10.00,  'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'yearly',  'paid_at' => '2026-01-10', 'notes' => 'Domain pingbot.io'],
                    ['amount' => 15.00,  'type' => 'api',      'recurring' => true,  'recurring_period' => 'monthly', 'paid_at' => '2026-01-15', 'notes' => 'Postmark email delivery'],
                    ['amount' => 12.00,  'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'monthly', 'paid_at' => '2026-02-01', 'notes' => 'Hetzner VPS (February)'],
                ],
                'payments' => [
                    ['amount' => 9.00,   'paid_at' => '2026-01-20', 'method' => 'stripe', 'reference' => 'pi_pb_001', 'notes' => 'Starter plan (10 monitors)'],
                    ['amount' => 9.00,   'paid_at' => '2026-01-28', 'method' => 'stripe', 'reference' => 'pi_pb_002', 'notes' => 'Starter plan'],
                    ['amount' => 29.00,  'paid_at' => '2026-02-01', 'method' => 'stripe', 'reference' => 'pi_pb_003', 'notes' => 'Pro plan (50 monitors)'],
                    ['amount' => 9.00,   'paid_at' => '2026-02-04', 'method' => 'stripe', 'reference' => 'pi_pb_004', 'notes' => 'Starter plan'],
                    ['amount' => 29.00,  'due_date' => '2026-02-25', 'notes' => 'Pro plan renewal - pending'],
                ],
                'meetings' => [
                    ['title' => 'Beta launch planning',           'scheduled_at' => '2026-01-12 10:00:00', 'duration_minutes' => 30, 'status' => 'completed', 'meeting_url' => 'https://meet.google.com/pb-launch',     'notes' => 'Shared on Twitter and Reddit. Target: 20 beta users.'],
                    ['title' => 'Infrastructure scaling review',  'scheduled_at' => '2026-02-15 11:00:00', 'duration_minutes' => 45, 'status' => 'scheduled', 'meeting_url' => 'https://meet.google.com/pb-infra',      'description' => 'Evaluate if current VPS can handle 100+ monitors.'],
                ],
            ],

            // ============================================================
            // 4) InvoiceSnap - PDF invoice generator
            // ============================================================
            [
                'project' => [
                    'name'           => 'InvoiceSnap',
                    'slug'           => 'invoicesnap',
                    'description'    => 'Dead simple invoice generator for freelancers. Create professional PDF invoices in seconds, track payment status.',
                    'status'         => 'in_progress',
                    'type'           => 'product',
                    'priority'       => 'medium',
                    'repo_url'       => 'https://github.com/johndoe/invoicesnap',
                    'production_url' => 'https://invoicesnap.co',
                    'start_date'     => '2026-01-15',
                    'notes'          => 'Soft launch done. Working on multi-currency and recurring invoices.',
                ],
                'tasks' => [
                    ['title' => 'Build PDF generation engine',             'type' => 'feature',        'status' => 'done',        'priority' => 'high',   'order' => 1, 'description' => 'Generate professional invoices using DomPDF with custom templates.'],
                    ['title' => 'Add client management',                   'type' => 'feature',        'status' => 'done',        'priority' => 'high',   'order' => 2, 'description' => 'CRUD for clients with address and tax info.'],
                    ['title' => 'Implement payment tracking',              'type' => 'feature',        'status' => 'done',        'priority' => 'high',   'order' => 3, 'description' => 'Mark invoices as paid/unpaid with payment date.'],
                    ['title' => 'Add multi-currency support',              'type' => 'feature',        'status' => 'in_progress', 'priority' => 'medium', 'order' => 4, 'description' => 'Support EUR, USD, GBP with correct formatting.'],
                    ['title' => 'Build recurring invoices',                'type' => 'feature',        'status' => 'todo',        'priority' => 'medium', 'order' => 5, 'description' => 'Auto-generate invoices monthly/quarterly for retainer clients.'],
                    ['title' => 'Fix PDF alignment on long company names', 'type' => 'bug',            'status' => 'todo',        'priority' => 'low',    'order' => 6, 'description' => 'Header layout breaks when company name exceeds 40 chars.'],
                    ['title' => 'Research e-invoicing compliance (IT)',     'type' => 'research',       'status' => 'todo',        'priority' => 'high',   'order' => 7, 'description' => 'Italian fattura elettronica XML format requirements.', 'due_date' => '2026-02-28'],
                ],
                'costs' => [
                    ['amount' => 5.00,   'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'monthly', 'paid_at' => '2026-01-15', 'notes' => 'Shared hosting on Railway'],
                    ['amount' => 15.00,  'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'yearly',  'paid_at' => '2026-01-15', 'notes' => 'Domain invoicesnap.co'],
                    ['amount' => 39.00,  'type' => 'license',  'recurring' => true,  'recurring_period' => 'yearly',  'paid_at' => '2026-01-16', 'notes' => 'PDF template kit from ThemeForest'],
                    ['amount' => 5.00,   'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'monthly', 'paid_at' => '2026-02-01', 'notes' => 'Railway hosting (February)'],
                ],
                'payments' => [
                    ['amount' => 7.00,   'paid_at' => '2026-01-25', 'method' => 'stripe', 'reference' => 'pi_is_001', 'notes' => 'Basic plan'],
                    ['amount' => 7.00,   'paid_at' => '2026-01-30', 'method' => 'stripe', 'reference' => 'pi_is_002', 'notes' => 'Basic plan'],
                    ['amount' => 19.00,  'paid_at' => '2026-02-03', 'method' => 'stripe', 'reference' => 'pi_is_003', 'notes' => 'Pro plan (unlimited invoices)'],
                    ['amount' => 7.00,   'due_date' => '2026-02-25', 'notes' => 'Basic plan renewal - pending'],
                ],
                'meetings' => [
                    ['title' => 'Freelancer user interviews',     'scheduled_at' => '2026-01-20 15:00:00', 'duration_minutes' => 60, 'status' => 'completed', 'meeting_url' => 'https://zoom.us/j/9876543210',         'notes' => 'Interviewed 3 freelancers. Main pain point: recurring invoices.'],
                    ['title' => 'E-invoicing compliance review',  'scheduled_at' => '2026-02-18 10:00:00', 'duration_minutes' => 45, 'status' => 'scheduled', 'meeting_url' => 'https://meet.google.com/is-einvoice',  'description' => 'Review SDI requirements with accountant.'],
                ],
            ],

            // ============================================================
            // 5) DevLinks - Link-in-bio for developers
            // ============================================================
            [
                'project' => [
                    'name'           => 'DevLinks',
                    'slug'           => 'devlinks',
                    'description'    => 'Link-in-bio page builder for developers. Show your GitHub stats, latest blog posts, and social links in a beautiful page.',
                    'status'         => 'draft',
                    'type'           => 'product',
                    'priority'       => 'low',
                    'repo_url'       => 'https://github.com/johndoe/devlinks',
                    'figma_url'      => 'https://figma.com/file/devlinks-mockup',
                    'start_date'     => '2026-02-01',
                    'notes'          => 'Side project idea. Validating demand before building. Competitor analysis in progress.',
                ],
                'tasks' => [
                    ['title' => 'Create landing page with waitlist',       'type' => 'feature',        'status' => 'done',        'priority' => 'high',   'order' => 1, 'description' => 'Simple landing page to collect emails and gauge interest.'],
                    ['title' => 'Design mockups in Figma',                 'type' => 'feature',        'status' => 'in_progress', 'priority' => 'high',   'order' => 2, 'description' => '3 template variations: minimal, developer, creative.'],
                    ['title' => 'Research competitor pricing',             'type' => 'research',       'status' => 'in_progress', 'priority' => 'medium', 'order' => 3, 'description' => 'Analyze Linktree, Bento, and Bio.link pricing models.'],
                    ['title' => 'Build profile editor (drag & drop)',      'type' => 'feature',        'status' => 'todo',        'priority' => 'high',   'order' => 4, 'description' => 'Visual editor to arrange blocks on the page.'],
                    ['title' => 'Integrate GitHub API for stats widget',   'type' => 'feature',        'status' => 'todo',        'priority' => 'medium', 'order' => 5, 'description' => 'Show contributions, top repos, and languages.'],
                    ['title' => 'Setup custom domain support',             'type' => 'infra',          'status' => 'todo',        'priority' => 'low',    'order' => 6, 'description' => 'Let users connect their own domain via CNAME.'],
                ],
                'costs' => [
                    ['amount' => 12.00,  'type' => 'hosting',  'recurring' => true,  'recurring_period' => 'yearly',  'paid_at' => '2026-02-01', 'notes' => 'Domain devlinks.page'],
                    ['amount' => 15.00,  'type' => 'tool',     'recurring' => true,  'recurring_period' => 'monthly', 'paid_at' => '2026-02-01', 'notes' => 'Figma Pro subscription'],
                    ['amount' => 40.00,  'type' => 'ads',      'recurring' => false, 'paid_at' => '2026-02-05', 'notes' => 'Twitter ads for waitlist signups'],
                ],
                'payments' => [],
                'meetings' => [
                    ['title' => 'Brainstorming session',          'scheduled_at' => '2026-02-03 16:00:00', 'duration_minutes' => 45, 'status' => 'completed', 'meeting_url' => 'https://meet.google.com/dl-brainstorm', 'notes' => 'Core differentiator: GitHub integration + developer-friendly themes.'],
                    ['title' => 'Validate idea with dev community', 'scheduled_at' => '2026-02-20 14:00:00', 'duration_minutes' => 30, 'status' => 'scheduled', 'meeting_url' => 'https://meet.google.com/dl-validate', 'description' => 'Share mockups in Discord communities and collect feedback.'],
                ],
            ],
        ];
    }
}
