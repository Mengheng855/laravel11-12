@extends('layout.master')

@section('title', 'Register | Threadline Studio')
@section('body_class', 'auth-page')
@section('hide_header', true)
@section('hide_footer', true)

@push('styles')
    <style>
        .auth-page {
            background: #fbfaf7;
        }

        .auth-shell {
            min-height: 100vh;
            display: grid;
            grid-template-columns: minmax(420px, 1.05fr) minmax(0, .95fr);
        }

        .auth-visual {
            min-height: 100vh;
            padding: 34px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background:
                linear-gradient(180deg, rgba(23, 21, 18, .12), rgba(23, 21, 18, .68)),
                url("https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=1300&q=85") center / cover;
            color: #fff;
        }

        .auth-brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            width: max-content;
            font-weight: 900;
            font-size: 1.15rem;
        }

        .auth-mark {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #fff;
            color: var(--clay);
            font-size: .9rem;
            font-weight: 900;
        }

        .auth-copy {
            max-width: 560px;
        }

        .auth-copy h1 {
            margin: 0 0 18px;
            max-width: none;
            color: #fff;
            font-size: clamp(2.8rem, 6vw, 5.6rem);
            line-height: .92;
        }

        .auth-copy p {
            max-width: 480px;
            color: rgba(255, 255, 255, .78);
            font-size: 1.05rem;
        }

        .auth-content {
            position: relative;
            min-height: 100vh;
            padding: 34px;
            display: grid;
            place-items: center;
        }

        .auth-card {
            width: min(540px, 100%);
            padding: 36px;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 24px 70px rgba(31, 29, 25, .08);
        }

        .auth-back {
            position: absolute;
            top: 34px;
            left: 34px;
            width: max-content;
            min-height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 14px;
            border: 1px solid rgba(23, 21, 18, .12);
            border-radius: 10px;
            background: #fbfaf7;
            color: var(--muted);
            font-weight: 900;
        }

        .auth-back:hover {
            color: var(--ink);
            border-color: var(--ink);
        }

        .auth-card h2 {
            margin: 0 0 10px;
            color: var(--ink);
            font-size: 2.2rem;
            line-height: 1;
        }

        .auth-card p {
            margin-bottom: 26px;
        }

        .auth-form {
            display: grid;
            gap: 16px;
        }

        .auth-field {
            display: grid;
            gap: 8px;
        }

        .auth-field label {
            color: var(--muted);
            font-size: .86rem;
            font-weight: 800;
        }

        .auth-field input {
            width: 100%;
            min-height: 52px;
            padding: 0 15px;
            border: 1px solid rgba(23, 21, 18, .12);
            border-radius: 10px;
            background: #fbfaf7;
            color: var(--ink);
            font: inherit;
            outline: none;
        }

        .auth-field input:focus {
            border-color: var(--clay);
            box-shadow: 0 0 0 4px rgba(196, 111, 72, .14);
        }

        .auth-link {
            color: var(--clay);
            font-weight: 900;
        }

        .auth-submit {
            min-height: 52px;
            border: 0;
            border-radius: 10px;
            background: var(--ink);
            color: #fff;
            font: inherit;
            font-weight: 900;
            cursor: pointer;
        }

        .auth-submit:hover {
            background: var(--clay);
        }

        .auth-switch {
            margin: 22px 0 0;
            text-align: center;
        }

        @media (max-width: 900px) {
            .auth-shell {
                grid-template-columns: 1fr;
            }

            .auth-visual {
                min-height: 380px;
                order: -1;
            }

            .auth-content {
                min-height: auto;
            }
        }

        @media (max-width: 560px) {
            .auth-visual,
            .auth-content {
                padding: 20px;
            }

            .auth-card {
                padding: 24px;
            }

        }
    </style>
@endpush

@section('content')
    <section class="auth-shell">
        <main class="auth-content">
            <a class="auth-back" href="{{ url('/') }}">Back to Home</a>
            <section class="auth-card">
                <h2>Create Account</h2>
                <p>Join Threadline Studio and start building your wardrobe.</p>

                <form class="auth-form" method="post" action="{{ route('register') }}" >
                    @csrf
                    <div class="auth-field">
                        <label for="username">Username</label>
                        <input id="username" name="name" type="text" placeholder="Enter username">
                    </div>

                    <div class="auth-field">
                        <label for="email">Email Address</label>
                        <input id="email" name="email" type="email" placeholder="you@example.com">
                    </div>

                    <div class="auth-field">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" placeholder="Create password">
                    </div>

                    <button class="auth-submit" type="submit">Register</button>
                </form>

                <p class="auth-switch">Already have an account? <a class="auth-link" href="{{ url('/login') }}">Login</a></p>
            </section>
        </main>

        <aside class="auth-visual">
            <a class="auth-brand" href="{{ url('/') }}">
                <span class="auth-mark">TS</span>
                <span>Threadline Studio</span>
            </a>
            <div class="auth-copy">
                <h1>Dress your next chapter.</h1>
                <p>Create an account for faster checkout, saved preferences, and first access to new clothing drops.</p>
            </div>
        </aside>
    </section>
@endsection
