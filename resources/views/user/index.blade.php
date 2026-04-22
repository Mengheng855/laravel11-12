@extends('layout.master')

@section('title', 'Threadline Studio | Modern Clothes')

@push('styles')
    <style>
        .hero {
            min-height: calc(100vh - 76px);
            display: grid;
            align-items: end;
            padding: 72px 0 42px;
            background:
                linear-gradient(90deg, rgba(23, 21, 18, .76), rgba(23, 21, 18, .22) 52%, rgba(23, 21, 18, .04)),
                url("https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=1800&q=85") center 34% / cover;
            color: #fff;
        }

        .hero .section {
            width: min(1180px, calc(100% - 32px));
        }

        .hero p {
            max-width: 540px;
            color: rgba(255, 255, 255, .84);
            font-size: 1.07rem;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .hero .button {
            border-color: #fff;
        }

        .hero .button.secondary {
            color: #fff;
        }

        .hero-strip {
            width: min(1180px, calc(100% - 32px));
            margin: 48px auto 0;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            border: 1px solid rgba(255, 255, 255, .24);
            background: rgba(255, 253, 247, .12);
            backdrop-filter: blur(14px);
        }

        .hero-strip div {
            padding: 18px;
            border-right: 1px solid rgba(255, 255, 255, .24);
        }

        .hero-strip div:last-child {
            border-right: 0;
        }

        .hero-strip strong {
            display: block;
            margin-bottom: 6px;
            font-size: 1.25rem;
        }

        .hero-strip span {
            color: rgba(255, 255, 255, .72);
            font-size: .88rem;
        }

        .category-band {
            padding: 84px 0;
            background: var(--paper);
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .category-card {
            position: relative;
            min-height: 360px;
            overflow: hidden;
            border-radius: 8px;
            background: var(--cream);
            box-shadow: var(--shadow);
        }

        .category-card img {
            width: 100%;
            height: 100%;
            min-height: 360px;
            object-fit: cover;
            transition: transform .35s ease;
        }

        .category-card:hover img {
            transform: scale(1.04);
        }

        .category-label {
            position: absolute;
            left: 14px;
            right: 14px;
            bottom: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px;
            border-radius: 6px;
            background: rgba(255, 253, 247, .9);
            backdrop-filter: blur(12px);
            font-weight: 800;
        }

        .featured-band {
            padding: 84px 0;
            background: #eef1e9;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .product-card {
            border: 1px solid var(--line);
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
            transition: transform .24s ease, box-shadow .24s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 44px rgba(47, 61, 49, .13);
        }

        .product-media {
            position: relative;
            aspect-ratio: 4 / 5;
            background: var(--cream);
            overflow: hidden;
        }

        .product-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-body {
            padding: 20px;
            display: grid;
            gap: 16px;
        }

        .product-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .price {
            font-weight: 800;
            color: var(--olive);
        }

        .product-data {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 0;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }

        .product-data div {
            min-width: 0;
        }

        .product-data div span {
            display: block;
            margin-bottom: 4px;
            color: var(--muted);
            font-size: .68rem;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .product-data strong {
            color: var(--ink);
            font-size: .95rem;
        }

        .product-category {
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 142px;
            margin-bottom: 0;
            padding: 0 18px 0 22px;
            border-radius: 999px;
            background: #eef1e9;
            color: #686861;
            font-size: .95rem;
            line-height: 1;
            font-weight: 900;
            letter-spacing: .2em;
            text-align: center;
            text-transform: uppercase;
        }

        .swatches {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .swatch-list {
            display: flex;
            gap: 8px;
        }

        .shop-link {
            color: var(--clay);
            font-size: .88rem;
            font-weight: 900;
        }

        .swatch {
            width: 18px;
            height: 18px;
            border: 2px solid #fff;
            border-radius: 50%;
            box-shadow: 0 0 0 1px var(--line);
        }

        .story-band {
            padding: 92px 0;
            background: var(--paper);
        }

        .story-layout {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 44px;
            align-items: center;
        }

        .story-media {
            display: grid;
            grid-template-columns: 1fr .72fr;
            gap: 16px;
            align-items: end;
        }

        .story-media img {
            width: 100%;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .story-media img:first-child {
            aspect-ratio: 4 / 5;
        }

        .story-media img:last-child {
            aspect-ratio: 3 / 4;
            margin-bottom: 42px;
        }

        .feature-list {
            display: grid;
            gap: 14px;
            margin: 28px 0 0;
            padding: 0;
            list-style: none;
        }

        .feature-list li {
            display: grid;
            grid-template-columns: 38px 1fr;
            gap: 12px;
            align-items: center;
            color: var(--muted);
        }

        .feature-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #e7ddcb;
            color: var(--olive);
            font-weight: 900;
        }

        .lookbook-band {
            padding: 84px 0;
            background: #221f1a;
            color: #fff;
        }

        .lookbook-band p {
            color: rgba(255, 255, 255, .72);
        }

        .lookbook-grid {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 20px;
        }

        .lookbook-feature,
        .lookbook-stack img {
            border-radius: 8px;
            overflow: hidden;
        }

        .lookbook-feature {
            position: relative;
            min-height: 560px;
        }

        .lookbook-feature img,
        .lookbook-stack img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .lookbook-caption {
            position: absolute;
            left: 20px;
            right: 20px;
            bottom: 20px;
            padding: 20px;
            border-radius: 6px;
            background: rgba(23, 21, 18, .72);
            backdrop-filter: blur(12px);
        }

        .lookbook-caption p {
            margin-bottom: 0;
        }

        .lookbook-stack {
            display: grid;
            gap: 20px;
        }

        .lookbook-stack img {
            min-height: 270px;
        }

        .newsletter {
            width: min(900px, calc(100% - 32px));
            margin: 84px auto 0;
            text-align: center;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            max-width: 560px;
            margin: 24px auto 0;
        }

        .newsletter-form input {
            flex: 1;
            min-width: 0;
            height: 48px;
            padding: 0 16px;
            border: 1px solid var(--line);
            border-radius: 6px;
            font: inherit;
            background: #fff;
        }

        @media (max-width: 900px) {
            .category-grid,
            .product-grid,
            .story-layout,
            .lookbook-grid {
                grid-template-columns: 1fr 1fr;
            }

            .story-layout,
            .lookbook-grid {
                gap: 28px;
            }

            .lookbook-feature {
                min-height: 460px;
            }
        }

        @media (max-width: 640px) {
            .hero {
                min-height: 760px;
                padding-top: 58px;
                background-position: 58% center;
            }

            .hero-strip,
            .category-grid,
            .product-grid,
            .story-layout,
            .story-media,
            .lookbook-grid {
                grid-template-columns: 1fr;
            }

            .hero-strip div {
                border-right: 0;
                border-bottom: 1px solid rgba(255, 255, 255, .24);
            }

            .hero-strip div:last-child {
                border-bottom: 0;
            }

            .category-band,
            .featured-band,
            .story-band,
            .lookbook-band {
                padding: 60px 0;
            }

            .category-card,
            .category-card img {
                min-height: 300px;
            }

            .story-media img:last-child {
                margin-bottom: 0;
            }

            .newsletter-form {
                flex-direction: column;
            }
        }
    </style>
@endpush

@section('content')
    <section class="hero">
        <div class="section">
            <p class="eyebrow">Spring / Summer capsule</p>
            <h1>Clothes made for real days.</h1>
            <p>Soft tailoring, breathable layers, and easy statement pieces designed to move from morning coffee to late plans.</p>
            <div class="hero-actions">
                <a class="button" href="#new">Shop New Arrivals</a>
                <a class="button secondary" href="#lookbook">View Lookbook</a>
            </div>
        </div>

        <div class="hero-strip" aria-label="Store highlights">
            <div>
                <strong>42</strong>
                <span>fresh pieces in this week</span>
            </div>
            <div>
                <strong>Free</strong>
                <span>shipping from $80 orders</span>
            </div>
            <div>
                <strong>7 day</strong>
                <span>fit exchange on all clothes</span>
            </div>
        </div>
    </section>

    <section class="category-band" id="collections">
        <div class="section">
            <div class="section-title">
                <div>
                    <p class="eyebrow">Shop by mood</p>
                    <h2>New season categories</h2>
                </div>
                <a class="button secondary" href="#new">Browse All</a>
            </div>

            <div class="category-grid">
                <a class="category-card" href="#new">
                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=700&q=85" alt="Woman shopping for new clothes">
                    <span class="category-label">Dresses <span>&rarr;</span></span>
                </a>
                <a class="category-card" href="#new">
                    <img src="https://images.unsplash.com/photo-1543076447-215ad9ba6923?auto=format&fit=crop&w=700&q=85" alt="Casual streetwear outfit">
                    <span class="category-label">Streetwear <span>&rarr;</span></span>
                </a>
                <a class="category-card" href="#new">
                    <img src="https://images.unsplash.com/photo-1520975916090-3105956dac38?auto=format&fit=crop&w=700&q=85" alt="Minimal neutral outfit details">
                    <span class="category-label">Essentials <span>&rarr;</span></span>
                </a>
                <a class="category-card" href="#new">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=700&q=85" alt="Fashion model wearing outerwear">
                    <span class="category-label">Outerwear <span>&rarr;</span></span>
                </a>
            </div>
        </div>
    </section>

    <section class="featured-band" id="new">
        <div class="section">
            <div class="section-title">
                <div>
                    <p class="eyebrow">Fresh arrivals</p>
                    <h2>Ready for your rotation</h2>
                </div>
                <a class="button secondary" href="#">Filter</a>
            </div>

            <div class="product-grid">
                <article class="product-card">
                    <div class="product-media">
                        <img src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?auto=format&fit=crop&w=760&q=85" alt="Linen wrap dress on model">
                    </div>
                    <div class="product-body">
                        <div class="product-meta">
                            <h3>Linen Wrap Dress</h3>
                            <span class="price">$89</span>
                        </div>
                        <div class="product-data">
                            <div><span>Available</span><strong>62 pcs</strong></div>
                            <span class="product-category">Dresses</span>
                        </div>
                        <div class="swatches" aria-label="Available colors">
                            <span class="swatch-list">
                                <span class="swatch" style="background:#f0e6d2"></span>
                                <span class="swatch" style="background:#c46f48"></span>
                                <span class="swatch" style="background:#171512"></span>
                            </span>
                            <a class="shop-link" href="#">View</a>
                        </div>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-media">
                        <img src="https://images.unsplash.com/photo-1523398002811-999ca8dec234?auto=format&fit=crop&w=760&q=85" alt="Classic denim jacket">
                    </div>
                    <div class="product-body">
                        <div class="product-meta">
                            <h3>Denim Work Jacket</h3>
                            <span class="price">$118</span>
                        </div>
                        <div class="product-data">
                            <div><span>Available</span><strong>84 pcs</strong></div>
                            <span class="product-category">Outerwear</span>
                        </div>
                        <div class="swatches" aria-label="Available colors">
                            <span class="swatch-list">
                                <span class="swatch" style="background:#41576f"></span>
                                <span class="swatch" style="background:#e9e0cf"></span>
                                <span class="swatch" style="background:#2f3d31"></span>
                            </span>
                            <a class="shop-link" href="#">View</a>
                        </div>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-media">
                        <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=760&q=85" alt="Tailored blouse outfit">
                    </div>
                    <div class="product-body">
                        <div class="product-meta">
                            <h3>Tailored Soft Blouse</h3>
                            <span class="price">$64</span>
                        </div>
                        <div class="product-data">
                            <div><span>Available</span><strong>21 pcs</strong></div>
                            <span class="product-category">Essentials</span>
                        </div>
                        <div class="swatches" aria-label="Available colors">
                            <span class="swatch-list">
                                <span class="swatch" style="background:#ffffff"></span>
                                <span class="swatch" style="background:#d6aa4f"></span>
                                <span class="swatch" style="background:#73866a"></span>
                            </span>
                            <a class="shop-link" href="#">View</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="story-band">
        <div class="section story-layout">
            <div class="story-media">
                <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&w=760&q=85" alt="Clothing rack with curated outfits">
                <img src="https://images.unsplash.com/photo-1558769132-cb1aea458c5e?auto=format&fit=crop&w=560&q=85" alt="Folded clothes and fabric textures">
            </div>
            <div>
                <p class="eyebrow">Our fit philosophy</p>
                <h2>Comfort first, shape always.</h2>
                <p>Each piece is selected for the way it feels after hours of wear: clean shoulders, forgiving waistlines, soft hand-feel, and silhouettes that are easy to style more than one way.</p>
                <ul class="feature-list">
                    <li><span class="feature-icon">&#10003;</span><span>Breathable cotton, linen blends, denim, and ribbed knits.</span></li>
                    <li><span class="feature-icon">&#10003;</span><span>Inclusive everyday sizing from XS to 3XL.</span></li>
                    <li><span class="feature-icon">&#10003;</span><span>Small-batch drops so every collection feels considered.</span></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="lookbook-band" id="lookbook">
        <div class="section">
            <div class="section-title">
                <div>
                    <p class="eyebrow">Lookbook</p>
                    <h2>Outfits with movement</h2>
                </div>
                <a class="button secondary" href="#new">Shop the Looks</a>
            </div>

            <div class="lookbook-grid">
                <article class="lookbook-feature">
                    <img src="https://images.unsplash.com/photo-1509631179647-0177331693ae?auto=format&fit=crop&w=1000&q=85" alt="Model wearing a polished city outfit">
                    <div class="lookbook-caption">
                        <h3>The City Set</h3>
                        <p>A sharp jacket, relaxed trouser, and rib tank for warm evenings downtown.</p>
                    </div>
                </article>
                <div class="lookbook-stack">
                    <img src="https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?auto=format&fit=crop&w=760&q=85" alt="Minimal fashion outfit outdoors">
                    <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=760&q=85" alt="Colorful modern clothing outfit">
                </div>
            </div>
        </div>

        <div class="newsletter">
            <p class="eyebrow">First access</p>
            <h2>Join the next drop</h2>
            <p>Get early notice for restocks, capsule releases, and fit guides from the studio.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Email address" aria-label="Email address">
                <button class="button" type="submit">Notify Me</button>
            </form>
        </div>
    </section>
@endsection
