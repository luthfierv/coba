<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? config('app.name', 'BPBD HSS') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
            --bg: #fff7ed;
            --surface: #ffffff;
            --surface-soft: #fffaf5;
            --ink: #1f2937;
            --muted: #6b7280;
            --link: #c2410c;
            --brand: #f97316;
            --brand-strong: #ea580c;
            --brand-soft: #ffedd5;
            --on-brand: #ffffff;
            --border: #fed7aa;
            --line: #fdba74;
            --focus-ring: rgba(249, 115, 22, 0.2);
            --card-shadow: 0 12px 30px rgba(124, 45, 18, 0.08);
            --topbar-bg: linear-gradient(to bottom, rgba(255, 250, 245, 0.96), rgba(255, 250, 245, 0.88));
            --body-bg:
                radial-gradient(circle at 10% 0%, #ffedd5 0%, rgba(255, 237, 213, 0.25) 28%, transparent 54%),
                radial-gradient(circle at 90% 16%, #ffedd5 0%, rgba(255, 237, 213, 0.3) 26%, transparent 56%),
                linear-gradient(180deg, #fffaf5 0%, var(--bg) 56%, #fff 100%);
            --menu-hover-bg: #ffffff;
            --input-bg: #ffffff;
            --table-bg: #ffffff;
            --table-head-bg: #fff7ed;
            --table-head-ink: #9a3412;
            --table-row-line: #ffedd5;
            --pill-bg: #fff7ed;
            --pill-border: #fdba74;
            --pill-ink: #9a3412;
            --card-glow-bg:
                radial-gradient(circle at 100% 0%, rgba(251, 146, 60, 0.2), transparent 42%),
                linear-gradient(160deg, #fff 0%, #fff7ed 100%);
            --card-glow-border: #fdba74;
            --success-bg: #ecfdf3;
            --success-ink: #166534;
            --success-border: #bbf7d0;
            --error-bg: #fef2f2;
            --error-ink: #991b1b;
            --error-border: #fecaca;
            --btn-danger: #dc2626;
            --btn-dark: #374151;
            --btn-success: #16a34a;
            --radius: 16px;

            --admin-shell-bg:
                radial-gradient(circle at 8% 0%, rgba(251, 146, 60, 0.2), transparent 30%),
                linear-gradient(180deg, #fff7ed 0%, #fffaf5 100%);
            --admin-surface: #fffaf5;
            --admin-surface-2: #fff7ed;
            --admin-border: #fdba74;
            --admin-text: #7c2d12;
            --admin-muted: #9a3412;
            --admin-accent: #f97316;
            --admin-accent-strong: #ea580c;
            --admin-chip-bg: #ffffff;
            --admin-chip-border: #fdba74;
            --admin-brand-text: #9a3412;
            --admin-brand-strong: #7c2d12;
            --admin-active-ink: #ffffff;
            --admin-logo-grad: linear-gradient(140deg, #fb923c, #f97316);
            --admin-logo-shadow: 0 10px 20px rgba(249, 115, 22, 0.35);
            --admin-toggle-bg: #ffffff;
            --admin-toggle-border: #fdba74;
            --admin-toggle-ink: #9a3412;
            --admin-toggle-bg-hover: #fff7ed;
            --admin-toggle-border-hover: #fb923c;
            --admin-menu-ink: #7c2d12;
            --admin-menu-ink-hover: #7c2d12;
            --admin-menu-active-border: #fb923c;
            --admin-icon-border: #fdba74;
            --admin-icon-bg: #fff7ed;
            --admin-logout-bg: #fff7ed;
            --admin-logout-border: #fdba74;
            --admin-logout-ink: #9a3412;
            --admin-logout-bg-hover: #ffedd5;
            --admin-logout-border-hover: #fb923c;
            --admin-card-shadow: 0 12px 30px rgba(124, 45, 18, 0.1);
        }

        @media (prefers-color-scheme: dark) {
            :root {
                color-scheme: dark;
                --bg: #0f172a;
                --surface: #111827;
                --surface-soft: #0b1220;
                --ink: #e5e7eb;
                --muted: #94a3b8;
                --link: #fb923c;
                --brand: #fb923c;
                --brand-strong: #f97316;
                --brand-soft: rgba(251, 146, 60, 0.18);
                --on-brand: #1f2937;
                --border: #374151;
                --line: #4b5563;
                --focus-ring: rgba(251, 146, 60, 0.32);
                --card-shadow: 0 12px 30px rgba(2, 6, 23, 0.45);
                --topbar-bg: linear-gradient(to bottom, rgba(11, 18, 32, 0.96), rgba(11, 18, 32, 0.88));
                --body-bg:
                    radial-gradient(circle at 10% 0%, rgba(251, 146, 60, 0.16) 0%, transparent 42%),
                    radial-gradient(circle at 90% 18%, rgba(56, 189, 248, 0.12) 0%, transparent 40%),
                    linear-gradient(180deg, #020617 0%, #0b1220 52%, #111827 100%);
                --menu-hover-bg: #1f2937;
                --input-bg: #111827;
                --table-bg: #111827;
                --table-head-bg: #1f2937;
                --table-head-ink: #e5e7eb;
                --table-row-line: #374151;
                --pill-bg: #1f2937;
                --pill-border: #4b5563;
                --pill-ink: #e5e7eb;
                --card-glow-bg:
                    radial-gradient(circle at 100% 0%, rgba(251, 146, 60, 0.2), transparent 42%),
                    linear-gradient(160deg, #0f172a 0%, #111827 100%);
                --card-glow-border: #4b5563;
                --success-bg: rgba(22, 163, 74, 0.18);
                --success-ink: #86efac;
                --success-border: rgba(34, 197, 94, 0.4);
                --error-bg: rgba(239, 68, 68, 0.16);
                --error-ink: #fca5a5;
                --error-border: rgba(239, 68, 68, 0.4);
                --btn-danger: #ef4444;
                --btn-dark: #475569;
                --btn-success: #22c55e;

                --admin-shell-bg:
                    radial-gradient(circle at 8% 0%, rgba(251, 146, 60, 0.2), transparent 32%),
                    linear-gradient(180deg, #0f172a 0%, #111827 100%);
                --admin-surface: #0b1220;
                --admin-surface-2: #111827;
                --admin-border: rgba(75, 85, 99, 0.85);
                --admin-text: #e2e8f0;
                --admin-muted: #94a3b8;
                --admin-accent: #fb923c;
                --admin-accent-strong: #f97316;
                --admin-chip-bg: rgba(251, 146, 60, 0.2);
                --admin-chip-border: rgba(251, 146, 60, 0.45);
                --admin-brand-text: #f8fafc;
                --admin-brand-strong: #f8fafc;
                --admin-active-ink: #f8fafc;
                --admin-logo-grad: linear-gradient(140deg, #fb923c, #f97316);
                --admin-logo-shadow: 0 10px 20px rgba(249, 115, 22, 0.3);
                --admin-toggle-bg: rgba(30, 41, 59, 0.9);
                --admin-toggle-border: rgba(100, 116, 139, 0.8);
                --admin-toggle-ink: #f8fafc;
                --admin-toggle-bg-hover: rgba(51, 65, 85, 0.95);
                --admin-toggle-border-hover: rgba(148, 163, 184, 0.95);
                --admin-menu-ink: #e2e8f0;
                --admin-menu-ink-hover: #f8fafc;
                --admin-menu-active-border: rgba(251, 146, 60, 0.72);
                --admin-icon-border: rgba(100, 116, 139, 0.75);
                --admin-icon-bg: rgba(30, 41, 59, 0.8);
                --admin-logout-bg: rgba(17, 24, 39, 0.88);
                --admin-logout-border: rgba(100, 116, 139, 0.75);
                --admin-logout-ink: #e2e8f0;
                --admin-logout-bg-hover: rgba(30, 41, 59, 0.95);
                --admin-logout-border-hover: rgba(148, 163, 184, 0.95);
                --admin-card-shadow: 0 12px 30px rgba(2, 6, 23, 0.45);
            }
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Plus Jakarta Sans", "Segoe UI", sans-serif;
            background: var(--body-bg);
            color: var(--ink);
            min-height: 100vh;
        }

        .container {
            width: min(1140px, calc(100% - 2rem));
            margin: 0 auto;
        }

        .topbar-wrap {
            position: sticky;
            top: 0;
            z-index: 80;
            background: var(--topbar-bg);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--border);
        }

        .topbar {
            min-height: 72px;
            display: flex;
            align-items: center;
        }

        .topbar-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
            width: 100%;
            padding: 0.7rem 0;
        }

        .brand {
            color: var(--ink);
            text-decoration: none;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            letter-spacing: 0.01em;
        }

        .brand-badge {
            width: 2rem;
            height: 2rem;
            border-radius: 11px;
            background: linear-gradient(145deg, #fb923c, #f97316);
            box-shadow: 0 8px 18px rgba(249, 115, 22, 0.35);
            position: relative;
        }

        .brand-badge::after {
            content: "";
            position: absolute;
            width: 0.65rem;
            height: 0.65rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.9);
            top: 0.68rem;
            left: 0.68rem;
        }

        .menu {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .menu a,
        .menu button {
            color: var(--muted);
            text-decoration: none;
            padding: 0.52rem 0.78rem;
            border-radius: 10px;
            cursor: pointer;
            font: inherit;
            font-size: 0.92rem;
            font-weight: 600;
            border: 1px solid transparent;
            background: transparent;
            transition: 0.18s ease;
        }

        .menu a:hover,
        .menu button:hover {
            color: var(--ink);
            background: var(--menu-hover-bg);
            border-color: var(--border);
        }

        .menu .is-active {
            color: var(--brand-strong);
            background: var(--brand-soft);
            border-color: var(--line);
        }

        .menu .cta {
            color: var(--on-brand);
            background: linear-gradient(140deg, #fb923c, var(--brand));
            border-color: var(--brand);
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.28);
        }

        .menu .cta:hover {
            color: var(--on-brand);
            border-color: var(--brand-strong);
            background: linear-gradient(140deg, #f97316, var(--brand-strong));
        }

        .page {
            padding: 1.2rem 0 2.2rem;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.15rem;
            box-shadow: var(--card-shadow);
        }

        .card-glow {
            background: var(--card-glow-bg);
            border: 1px solid var(--card-glow-border);
        }

        .flash {
            padding: 0.82rem 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            font-size: 0.94rem;
        }

        .flash-success {
            background: var(--success-bg);
            border-color: var(--success-border);
            color: var(--success-ink);
        }

        .flash-error {
            background: var(--error-bg);
            border-color: var(--error-border);
            color: var(--error-ink);
        }

        .muted {
            color: var(--muted);
        }

        h1,
        h2,
        h3 {
            line-height: 1.22;
            letter-spacing: -0.01em;
        }

        a {
            color: var(--brand-strong);
        }

        .grid-2 {
            display: grid;
            gap: 0.9rem;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        .grid-3 {
            display: grid;
            gap: 0.9rem;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        .field {
            display: grid;
            gap: 0.38rem;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 0.62rem 0.7rem;
            border: 1px solid var(--border);
            border-radius: 10px;
            font: inherit;
            background: var(--input-bg);
            color: var(--ink);
            transition: border-color 0.18s ease, box-shadow 0.18s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--brand);
            outline: none;
            box-shadow: 0 0 0 3px var(--focus-ring);
        }

        .checkline {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkline input[type="checkbox"] {
            width: auto;
            transform: translateY(1px);
        }

        .btn {
            border: 1px solid transparent;
            border-radius: 10px;
            padding: 0.6rem 0.95rem;
            font: inherit;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            transition: 0.18s ease;
        }

        .btn-primary {
            background: linear-gradient(140deg, #fb923c, var(--brand));
            color: var(--on-brand);
            border-color: var(--brand);
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.28);
        }

        .btn-primary:hover {
            background: linear-gradient(140deg, #f97316, var(--brand-strong));
            border-color: var(--brand-strong);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: var(--input-bg);
            color: var(--brand-strong);
            border-color: var(--line);
        }

        .btn-outline:hover {
            background: var(--brand-soft);
        }

        .btn-danger {
            background: var(--btn-danger);
            color: #fff;
            border-color: var(--btn-danger);
        }

        .btn-dark {
            background: var(--btn-dark);
            color: #fff;
            border-color: var(--btn-dark);
        }

        .btn-success {
            background: var(--btn-success);
            color: #fff;
            border-color: var(--btn-success);
        }

        .table-wrap {
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 720px;
            background: var(--table-bg);
        }

        .data-table th {
            text-align: left;
            border-bottom: 1px solid var(--border);
            background: var(--table-head-bg);
            color: var(--table-head-ink);
            font-size: 0.86rem;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            padding: 0.66rem;
        }

        .data-table td {
            border-bottom: 1px solid var(--table-row-line);
            padding: 0.66rem;
            vertical-align: top;
            font-size: 0.93rem;
        }

        .data-table tr:last-child td {
            border-bottom: 0;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            gap: 0.8rem;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            font-size: 0.82rem;
            font-weight: 700;
            padding: 0.26rem 0.58rem;
            border-radius: 999px;
            border: 1px solid var(--pill-border);
            background: var(--pill-bg);
            color: var(--pill-ink);
        }

        .page-title {
            margin: 0 0 0.45rem;
            font-size: clamp(1.35rem, 1.2rem + 1vw, 2rem);
        }

        .section-gap {
            margin-top: 1rem;
        }

        .admin-shell {
            --adm-surface: var(--admin-surface);
            --adm-surface-2: var(--admin-surface-2);
            --adm-border: var(--admin-border);
            --adm-text: var(--admin-text);
            --adm-muted: var(--admin-muted);
            --adm-accent: var(--admin-accent);
            --adm-accent-strong: var(--admin-accent-strong);
            --adm-chip-bg: var(--admin-chip-bg);
            --adm-chip-border: var(--admin-chip-border);
            background: var(--admin-shell-bg);
        }

        .admin-layout {
            display: grid;
            grid-template-columns: auto minmax(0, 1fr);
            gap: 1rem;
            min-height: 100vh;
            padding: 1rem;
            transition: grid-template-columns 0.25s ease;
        }

        .admin-sidebar {
            position: sticky;
            top: 1rem;
            height: calc(100vh - 2rem);
        }

        .admin-sidebar-panel {
            width: 248px;
            height: 100%;
            border-radius: 16px;
            border: 1px solid var(--adm-border);
            background: linear-gradient(180deg, var(--adm-surface-2) 0%, var(--adm-surface) 100%);
            box-shadow: 0 24px 44px rgba(15, 23, 42, 0.4);
            padding: 0.8rem;
            display: flex;
            flex-direction: column;
            gap: 0.9rem;
            color: var(--adm-text);
            transition: width 0.25s ease;
        }

        .admin-layout.is-collapsed .admin-sidebar-panel {
            width: 84px;
        }

        .admin-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 0.45rem;
        }

        .admin-brand {
            color: var(--admin-brand-text);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            min-width: 0;
        }

        .admin-logo-dot {
            width: 1.55rem;
            height: 1.55rem;
            border-radius: 999px;
            background: var(--admin-logo-grad);
            box-shadow: var(--admin-logo-shadow);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 800;
        }

        .admin-brand-text-wrap {
            display: grid;
            min-width: 0;
        }

        .admin-brand-text-wrap strong {
            font-size: 0.95rem;
            line-height: 1.1;
            letter-spacing: 0.02em;
            color: var(--admin-brand-strong);
        }

        .admin-role {
            font-size: 0.74rem;
            color: var(--adm-muted);
            line-height: 1.15;
        }

        .admin-toggle {
            width: 1.95rem;
            height: 1.95rem;
            border-radius: 9px;
            border: 1px solid var(--admin-toggle-border);
            background: var(--admin-toggle-bg);
            color: var(--admin-toggle-ink);
            font-size: 1rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: 0.18s ease;
        }

        .admin-toggle:hover {
            border-color: var(--admin-toggle-border-hover);
            background: var(--admin-toggle-bg-hover);
        }

        .admin-menu-group {
            display: grid;
            gap: 0.45rem;
        }

        .admin-menu-title {
            margin: 0;
            font-size: 0.66rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--adm-muted);
        }

        .admin-menu {
            display: grid;
            gap: 0.4rem;
        }

        .admin-menu a {
            color: var(--admin-menu-ink);
            text-decoration: none;
            padding: 0.55rem;
            border-radius: 10px;
            border: 1px solid transparent;
            font-weight: 600;
            font-size: 0.88rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: 0.18s ease;
        }

        .admin-menu a:hover {
            color: var(--admin-menu-ink-hover);
            background: var(--adm-chip-bg);
            border-color: var(--adm-chip-border);
        }

        .admin-menu a.is-active {
            color: var(--admin-active-ink);
            background: linear-gradient(140deg, var(--adm-accent), var(--adm-accent-strong));
            border-color: var(--admin-menu-active-border);
        }

        .admin-link-icon {
            width: 1.45rem;
            height: 1.45rem;
            border-radius: 8px;
            border: 1px solid var(--admin-icon-border);
            background: var(--admin-icon-bg);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.66rem;
            font-weight: 800;
            flex-shrink: 0;
        }

        .admin-sidebar-foot {
            margin-top: auto;
        }

        .admin-logout-btn {
            width: 100%;
            border: 1px solid var(--admin-logout-border);
            border-radius: 10px;
            background: var(--admin-logout-bg);
            color: var(--admin-logout-ink);
            padding: 0.58rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font: inherit;
            font-size: 0.88rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.18s ease;
        }

        .admin-logout-btn:hover {
            background: var(--admin-logout-bg-hover);
            border-color: var(--admin-logout-border-hover);
        }

        .admin-main {
            padding: 0.2rem 0.3rem 1.4rem;
        }

        .admin-container {
            width: min(1320px, 100%);
            margin: 0 auto;
        }

        .admin-layout.is-collapsed .admin-brand-text-wrap,
        .admin-layout.is-collapsed .admin-menu-title,
        .admin-layout.is-collapsed .admin-link-label {
            display: none;
        }

        .admin-layout.is-collapsed .admin-head {
            justify-content: center;
        }

        .admin-layout.is-collapsed .admin-toggle {
            position: absolute;
            left: 0.8rem;
            top: 3.2rem;
            width: 1.6rem;
            height: 1.6rem;
            font-size: 0.88rem;
        }

        .admin-layout.is-collapsed .admin-menu a,
        .admin-layout.is-collapsed .admin-logout-btn {
            justify-content: center;
            padding: 0.55rem 0.45rem;
        }

        .admin-layout.is-collapsed .admin-link-icon {
            margin: 0;
        }

        .admin-shell .card {
            border-color: var(--border);
            box-shadow: var(--admin-card-shadow);
        }

        .admin-shell .card-glow {
            background: var(--card-glow-bg);
            border: 1px solid var(--card-glow-border);
        }

        .admin-shell .pill {
            border-color: var(--pill-border);
            background: var(--pill-bg);
            color: var(--pill-ink);
        }

        .admin-shell .btn-outline {
            border-color: var(--line);
            color: var(--brand-strong);
        }

        .admin-shell .btn-outline:hover {
            background: var(--brand-soft);
        }

        .admin-shell .data-table th {
            background: var(--table-head-bg);
            border-bottom-color: var(--border);
            color: var(--table-head-ink);
        }

        .admin-shell .data-table td {
            border-bottom-color: var(--table-row-line);
        }

        @media (max-width: 860px) {
            .menu {
                width: 100%;
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 0.15rem;
                -webkit-overflow-scrolling: touch;
            }

            .menu a,
            .menu button {
                white-space: nowrap;
            }

            .card {
                padding: 1rem;
            }
        }

        @media (max-width: 980px) {
            .admin-layout {
                grid-template-columns: 1fr;
                padding: 0.75rem;
                gap: 0.75rem;
            }

            .admin-sidebar {
                position: relative;
                height: auto;
                top: 0;
            }

            .admin-sidebar-panel {
                width: 100%;
                height: auto;
                border-radius: 14px;
            }

            .admin-layout.is-collapsed .admin-sidebar-panel {
                width: 100%;
            }

            .admin-layout.is-collapsed .admin-brand-text-wrap,
            .admin-layout.is-collapsed .admin-menu-title,
            .admin-layout.is-collapsed .admin-link-label {
                display: block;
            }

            .admin-layout.is-collapsed .admin-link-label {
                display: inline;
            }

            .admin-layout.is-collapsed .admin-head {
                justify-content: space-between;
            }

            .admin-layout.is-collapsed .admin-toggle {
                position: static;
                width: 1.95rem;
                height: 1.95rem;
                font-size: 1rem;
            }

            .admin-layout.is-collapsed .admin-menu a,
            .admin-layout.is-collapsed .admin-logout-btn {
                justify-content: flex-start;
                padding: 0.55rem;
            }

            .admin-main {
                padding: 0;
            }
        }
    </style>
</head>
@php
    $isAdminArea = request()->routeIs('admin.*') && auth()->check() && auth()->user()->is_admin;
@endphp
<body class="{{ $isAdminArea ? 'admin-shell' : '' }}">
    @if ($isAdminArea)
        <div class="admin-layout" id="adminLayout">
            <aside class="admin-sidebar">
                <div class="admin-sidebar-panel">
                    <div class="admin-head">
                        <a class="admin-brand" href="{{ route('admin.dashboard') }}">
                            <span class="admin-logo-dot">A</span>
                            <span class="admin-brand-text-wrap">
                                <strong>BPBD HSS</strong>
                                <span class="admin-role">Admin Panel</span>
                            </span>
                        </a>
                        <button type="button" class="admin-toggle" id="adminSidebarToggle" aria-label="Toggle sidebar">&#9776;</button>
                    </div>

                    <div class="admin-menu-group">
                        <p class="admin-menu-title">Main Menu</p>
                        <nav class="admin-menu">
                            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                                <span class="admin-link-icon">DB</span>
                                <span class="admin-link-label">Dashboard</span>
                            </a>
                            <a href="{{ route('admin.relawans.index') }}" class="{{ request()->routeIs('admin.relawans.*') ? 'is-active' : '' }}">
                                <span class="admin-link-icon">RV</span>
                                <span class="admin-link-label">Manajemen Relawan</span>
                            </a>
                            <a href="{{ route('admin.logs.index') }}" class="{{ request()->routeIs('admin.logs.*') ? 'is-active' : '' }}">
                                <span class="admin-link-icon">LG</span>
                                <span class="admin-link-label">Log Aktivitas</span>
                            </a>
                            <a href="{{ route('admin.artikels.index') }}" class="{{ request()->routeIs('admin.artikels.*') ? 'is-active' : '' }}">
                                <span class="admin-link-icon">AR</span>
                                <span class="admin-link-label">Manajemen Artikel</span>
                            </a>
                        </nav>
                    </div>

                    <div class="admin-sidebar-foot">
                        <form action="{{ route('admin.logout') }}" method="POST" style="margin:0;">
                            @csrf
                            <button type="submit" class="admin-logout-btn">
                                <span class="admin-link-icon">LO</span>
                                <span class="admin-link-label">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </aside>

            <main class="admin-main">
                <div class="admin-container">
                    @if (session('success'))
                        <div class="flash flash-success">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="flash flash-error">
                            <strong>Terjadi kesalahan:</strong>
                            <ul style="margin:0.5rem 0 0 1rem; padding:0;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>

        <script>
            (function () {
                const layout = document.getElementById('adminLayout');
                const toggle = document.getElementById('adminSidebarToggle');
                if (!layout || !toggle) return;

                const storageKey = 'bpbd-hss-admin-sidebar-collapsed';
                const isMobile = window.matchMedia('(max-width: 980px)').matches;
                const saved = localStorage.getItem(storageKey) === '1';
                if (saved && !isMobile) {
                    layout.classList.add('is-collapsed');
                }

                toggle.addEventListener('click', function () {
                    layout.classList.toggle('is-collapsed');
                    localStorage.setItem(storageKey, layout.classList.contains('is-collapsed') ? '1' : '0');
                });
            })();
        </script>
    @else
        <header class="topbar-wrap">
            <div class="container topbar">
                <div class="topbar-inner">
                    <a class="brand" href="{{ auth()->check() && auth()->user()->is_admin ? route('admin.dashboard') : route('home') }}">
                        <span class="brand-badge"></span>
                        <span>BPBD HSS</span>
                    </a>
                    <nav class="menu">
                    @auth
                        @if (auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.*') ? 'is-active' : '' }}">Panel Admin</a>
                            <form action="{{ route('admin.logout') }}" method="POST" style="margin:0;">
                                @csrf
                                <button type="submit" class="btn-outline">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Beranda</a>
                            <a href="{{ route('artikel.index') }}" class="{{ request()->routeIs('artikel.*') ? 'is-active' : '' }}">Artikel</a>
                            <a href="{{ route('status-relawan.index') }}" class="{{ request()->routeIs('status-relawan.*') ? 'is-active' : '' }}">Status Relawan</a>
                            <a href="{{ route('kontak-relawan.index') }}" class="{{ request()->routeIs('kontak-relawan.*') ? 'is-active' : '' }}">Kontak Relawan</a>
                            <a href="{{ route('relawan.create') }}" class="cta {{ request()->routeIs('relawan.*') ? 'is-active' : '' }}">Daftar Relawan</a>
                        @endif
                    @else
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Beranda</a>
                        <a href="{{ route('artikel.index') }}" class="{{ request()->routeIs('artikel.*') ? 'is-active' : '' }}">Artikel</a>
                        <a href="{{ route('status-relawan.index') }}" class="{{ request()->routeIs('status-relawan.*') ? 'is-active' : '' }}">Status Relawan</a>
                        <a href="{{ route('kontak-relawan.index') }}" class="{{ request()->routeIs('kontak-relawan.*') ? 'is-active' : '' }}">Kontak Relawan</a>
                        <a href="{{ route('admin.login') }}" class="{{ request()->routeIs('admin.login*') ? 'is-active' : '' }}">Login</a>
                        <a href="{{ route('relawan.create') }}" class="cta {{ request()->routeIs('relawan.*') ? 'is-active' : '' }}">Daftar Relawan</a>
                    @endauth
                    </nav>
                </div>
            </div>
        </header>

        <main class="page">
            <div class="container">
                @if (session('success'))
                    <div class="flash flash-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="flash flash-error">
                        <strong>Terjadi kesalahan:</strong>
                        <ul style="margin:0.5rem 0 0 1rem; padding:0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    @endif
</body>
</html>
