<style>
    .admin-page {
        background: #f6f3ee;
    }

    .admin-page main {
        min-height: 100vh;
    }

    .admin-shell {
        min-height: 100vh;
        display: grid;
        grid-template-columns: 230px 1fr;
        color: #1f1d19;
        background: #fbfaf7;
    }

    .admin-sidebar {
        min-height: 100vh;
        padding: 32px 24px;
        display: flex;
        flex-direction: column;
        gap: 34px;
        background: #fffdf8;
        border-right: 1px solid rgba(31, 29, 25, .06);
    }

    .admin-logo {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        font-weight: 800;
        color: #dd8950;
    }

    .admin-logo-mark {
        width: 34px;
        height: 34px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        background: #fae0bc;
        color: #c96d38;
        font-weight: 800;
    }

    .side-title {
        margin: 0 0 14px;
        color: #1f1d19;
        font-size: 1rem;
        font-weight: 800;
    }

    .side-menu {
        display: grid;
        gap: 10px;
    }

    .side-link {
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 48px;
        padding: 0 16px;
        border-radius: 10px;
        color: #6f6a60;
        font-size: .92rem;
        font-weight: 700;
    }

    .side-link.active,
    .side-link:hover {
        background: #ffbd72;
        color: #fff;
        box-shadow: 0 14px 28px rgba(255, 160, 75, .28);
    }

    .side-icon {
        width: 22px;
        text-align: center;
        font-size: 1rem;
    }

    .upgrade-card {
        margin-top: auto;
        padding: 20px;
        border-radius: 18px;
        background: #fff3e3;
    }

    .upgrade-card strong {
        display: block;
        margin-bottom: 8px;
        font-size: .94rem;
    }

    .upgrade-card p {
        margin: 0 0 10px;
        color: #a09a90;
        font-size: .88rem;
        line-height: 1.5;
    }

    .upgrade-card a {
        color: #dd8950;
        font-size: .88rem;
        font-weight: 800;
    }

    .admin-content {
        min-width: 0;
        padding: 34px;
    }

    .admin-topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 28px;
    }

    .admin-topbar h1 {
        max-width: none;
        margin: 0 0 8px;
        color: #1f1d19;
        font-size: clamp(1.85rem, 3vw, 2.65rem);
        line-height: 1.05;
    }

    .admin-topbar p,
    .muted {
        margin: 0;
        color: #9b948a;
        line-height: 1.55;
    }

    .admin-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .admin-btn {
        min-height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 0 16px;
        border: 0;
        border-radius: 10px;
        background: #1f1d19;
        color: #fff;
        font: inherit;
        font-weight: 800;
        cursor: pointer;
    }

    .admin-btn.soft {
        background: #fff;
        color: #6f6a60;
        border: 1px solid rgba(31, 29, 25, .08);
    }

    .stat-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 24px;
    }

    .stat-card,
    .admin-panel,
    .item-card {
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 16px 40px rgba(31, 29, 25, .04);
    }

    .stat-card {
        padding: 20px;
        overflow: hidden;
        position: relative;
    }

    .stat-card::after {
        content: "";
        position: absolute;
        right: -24px;
        bottom: -34px;
        width: 104px;
        height: 104px;
        border-radius: 50%;
        background: rgba(255, 189, 114, .24);
    }

    .stat-card span {
        display: block;
        margin-bottom: 8px;
        color: #a09a90;
        font-size: .84rem;
        font-weight: 700;
    }

    .stat-card strong {
        color: #1f1d19;
        font-size: 2rem;
        line-height: 1;
    }

    .admin-panel {
        padding: 24px;
    }

    .form-layout {
        display: grid;
        grid-template-columns: 1.1fr .9fr;
        gap: 18px;
        margin-bottom: 24px;
    }

    .admin-form {
        display: grid;
        gap: 16px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .form-field {
        display: grid;
        gap: 8px;
    }

    .form-field.full {
        grid-column: 1 / -1;
    }

    .form-field label {
        color: #6f6a60;
        font-size: .84rem;
        font-weight: 800;
    }

    .form-field input,
    .form-field select,
    .form-field textarea {
        width: 100%;
        min-height: 46px;
        padding: 0 14px;
        border: 1px solid rgba(31, 29, 25, .09);
        border-radius: 10px;
        background: #fbfaf7;
        color: #1f1d19;
        font: inherit;
        outline: none;
    }

    .form-field textarea {
        min-height: 108px;
        padding-top: 12px;
        resize: vertical;
    }

    .form-field input:focus,
    .form-field select:focus,
    .form-field textarea:focus {
        border-color: #ffbd72;
        box-shadow: 0 0 0 4px rgba(255, 189, 114, .16);
    }

    .form-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .add-page-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.35fr) minmax(280px, .65fr);
        gap: 22px;
        align-items: start;
    }

    .upload-box {
        min-height: 220px;
        display: grid;
        place-items: center;
        padding: 22px;
        border: 2px dashed rgba(31, 29, 25, .14);
        border-radius: 16px;
        background: #fffaf2;
        text-align: center;
    }

    .upload-box strong {
        display: block;
        margin-bottom: 8px;
        color: #1f1d19;
    }

    .preview-card {
        position: sticky;
        top: 24px;
        overflow: hidden;
    }

    .preview-card img {
        width: 100%;
        aspect-ratio: 4 / 5;
        object-fit: cover;
        border-radius: 16px;
        margin-bottom: 18px;
    }

    .preview-card h3 {
        margin: 0 0 8px;
        color: #1f1d19;
        font-size: 1.2rem;
    }

    .preview-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 16px;
    }

    .edit-icon {
        background: #fff0dc;
        color: #c96d38;
    }

    .panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 18px;
    }

    .panel-header h2 {
        margin: 0;
        color: #1f1d19;
        font-size: 1.18rem;
        line-height: 1.2;
    }

    .search-box {
        min-height: 42px;
        width: min(280px, 100%);
        padding: 0 14px;
        border: 1px solid rgba(31, 29, 25, .08);
        border-radius: 10px;
        background: #fbfaf7;
        font: inherit;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
    }

    .admin-table th,
    .admin-table td {
        padding: 16px 12px;
        border-bottom: 1px solid rgba(31, 29, 25, .07);
        text-align: left;
        vertical-align: middle;
    }

    .admin-table th {
        color: #aaa298;
        font-size: .74rem;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .admin-table td {
        color: #4d4942;
        font-size: .94rem;
        font-weight: 600;
    }

    .table-item {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .table-thumb,
    .avatar {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        object-fit: cover;
        background: #fff3e3;
    }

    .avatar {
        border-radius: 50%;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        min-height: 28px;
        padding: 0 10px;
        border-radius: 999px;
        background: #fff0dc;
        color: #c96d38;
        font-size: .78rem;
        font-weight: 800;
    }

    .badge.green {
        background: #e3f8ef;
        color: #1b9b68;
    }

    .badge.blue {
        background: #e4f3fb;
        color: #2486b1;
    }

    .table-actions {
        display: flex;
        gap: 8px;
    }

    .icon-action {
        width: 34px;
        height: 34px;
        display: grid;
        place-items: center;
        border: 0;
        border-radius: 9px;
        background: #fbfaf7;
        color: #6f6a60;
        cursor: pointer;
    }

    .card-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
    }

    .item-card {
        padding: 18px;
    }

    .item-card img {
        width: 100%;
        aspect-ratio: 16 / 10;
        object-fit: cover;
        border-radius: 14px;
        margin-bottom: 16px;
    }

    .item-card h3 {
        margin: 0 0 8px;
        color: #1f1d19;
        font-size: 1.05rem;
    }

    .item-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 14px;
    }

    @media (max-width: 1060px) {
        .admin-shell {
            grid-template-columns: 210px 1fr;
        }

        .stat-grid,
        .add-page-layout,
        .form-layout,
        .card-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 760px) {
        .admin-shell {
            grid-template-columns: 1fr;
        }

        .admin-sidebar {
            min-height: auto;
        }

        .side-menu {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .admin-content {
            padding: 22px;
        }

        .admin-topbar,
        .panel-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .stat-grid,
        .add-page-layout,
        .form-layout,
        .form-grid,
        .card-grid {
            grid-template-columns: 1fr;
        }

        .admin-table {
            min-width: 720px;
        }

        .table-scroll {
            overflow-x: auto;
        }
    }
</style>
