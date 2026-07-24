@extends('layouts.app')

@section('content')
    
        <section id="intro" class="main style1 dark fullscreen">
        <div class="content">
            <header>
                <h2>Crea la tua candela perfetta</h2>
            </header>
            <p>
                Dalla cera al packaging, ogni dettaglio è nelle tue mani. Benvenuto in un mondo di
                fragranze e personalizzazione.
            </p>
            <div class="image-placeholder">
                </div>
            <footer>
                <a href="#about-us" class="button style2 down"></a>                
				<div class="button-text">Scopri di più</div>
            </footer>
        </div>
    </section>
    
    <section id="about-us" class="main style2 left dark fullscreen">
        <div class="content box style2">
            <header>
                <h2>Chi siamo</h2>
            </header>
            <p>
                Siamo un team di appassionati artigiani che credono nella bellezza della
                personalizzazione. La nostra missione è creare candele uniche e speciali,
                realizzate con cura e attenzione ai dettagli.
            </p>
            <p>
                Ogni candela è un'opportunità per esprimere la propria creatività e creare
                un'atmosfera unica. Siamo orgogliosi di offrire ai nostri clienti la possibilità
                di personalizzare ogni aspetto della loro candela, dalla scelta della cera e
                della fragranza al design del packaging.
            </p>
        </div>
        <a href="#one" class="button style2 down anchored"></a>
    </section>

	    <section id="one" class="main style2 right dark fullscreen">
        <div class="content box style2">
            <header>
                <h2>Scegli la base perfetta</h2>
            </header>
            <div class="options-container">
                <div class="option">
                    <div class="image-placeholder small">
                        </div>
                    <h3>Cera</h3>
                    <p>
                        Scegli tra cera di soia, paraffina o altre opzioni. Ogni cera offre una combustione
                        e una resa olfattiva uniche.
                    </p>
                </div>
                <div class="option">
                    <div class="image-placeholder small">
                        </div>
                    <h3>Forma</h3>
                    <p>
                        Dalle classiche forme cilindriche a design più moderni e originali, trova la forma
                        che si adatta al tuo stile.
                    </p>
                </div>
                </div>
        </div>
        <a href="#two" class="button style2 down anchored"></a>
    </section>
    
        <section id="two" class="main style2 left dark fullscreen">
        <div class="content box style2">
            <header>
                <h2>Un profumo unico, un colore che ti rappresenta</h2>
            </header>
            <div class="options-container">
                <div class="option">
                    <div class="image-placeholder small">
                        </div>
                    <h3>Fragranza</h3>
                    <p>
                        Esplora le nostre famiglie olfattive e crea una sinfonia di profumi che catturi
                        l'essenza dei tuoi momenti speciali.
                    </p>
                </div>
                <div class="option">
                    <div class="image-placeholder small">
                        </div>
                    <h3>Colore</h3>
                    <p>
                        Dai toni pastello delicati ai colori vivaci e audaci, scegli la tonalità che
                        esprime la tua personalità.
                    </p>
                </div>
                </div>
        </div>
        <a href="#candles" class="button style2 down anchored"></a>
    </section>
    
    <section id="candles" class="main style3 primary">
        <div class="content">
            <header>
                <h2>Le nostre candele</h2>
                <p>
                    Scopri la nostra selezione di candele artigianali, perfette per ogni occasione.
                </p>
            </header>

            <div class="gallery">
                <article class="from-left">
                    <a href="#" class="image fit">
                    <div class="candle-container">
    					<div class="circle-image">
							<img src="{{ asset('images/candles/candle1.jpg') }}" alt="Candela 1" />
    					</div>
    				<h3>Nome Candela 1</h3>
					</div>
                    </a>
                </article>
                <article class="from-right">
                    <a href="#" class="image fit">
                    <div class="candle-container">
    					<div class="circle-image">
							<img src="{{ asset('images/candles/_candle2.jpg') }}" alt="Candela 1" />
    					</div>
    				<h3>Nome Candela 2</h3>
					</div>
                    </a>
                </article>
                </div>

            <footer>
                <a href="{{ route('candles.index') }}" class="button style2 down"></a>
				<div class="button-text">Scopri le nostre Candele</div>
            </footer>
        </div>
        <a href="#work" class="button style2 down anchored"></a>
    </section>
    
        <section id="work" class="main style3 primary">
        <div class="content">
            <header>
                <h2>Il tocco finale</h2>
                <p>
                    Scopri come personalizzare il packaging e aggiungere dettagli unici alla tua
                    candela.
                </p>
            </header>

            <div class="gallery">
                <article class="from-left">
                    <a href="#" class="image fit">
                        <div class="image-placeholder small">
                            </div>
                        <h3>Packaging</h3>
                    </a>
                </article>
                <article class="from-right">
                    <a href="#" class="image fit">
                        <div class="image-placeholder small">
                            </div>
                        <h3>Dettagli</h3>
                    </a>
                </article>
                </div>
        </div>
        <a href="#offers" class="button style2 down anchored"></a>
    </section>
    
    <section id="offers" class="main style1 dark">
        <div class="content">
            <header>
                <h2>Offerte speciali</h2>
                <p>
                    Non perdere le nostre incredibili promozioni sulle candele personalizzate!
                </p>
            </header>

            <div class="offer-container" >
                <div class="offer">
                	<img class="immagine-landing" src="{{ asset('images/offers/offer1.png') }}" alt="Offerta 1" />
                    <h3>Sconto del 20% su tutte le candele</h3>
                    <p>
                        Approfitta di uno sconto del 20% su tutte le candele personalizzate per un
                        periodo limitato.
                    </p>
                    <a href="#" class="button style2">Approfitta ora</a>
                </div>
                <div class="offer">
                	<img class="immagine-landing" src="{{ asset('images/offers/offer2.png') }}" alt="Offerta 2" />
                    <h3>Spedizione gratuita per ordini superiori a 50€</h3>
                    <p>
                        Ricevi la spedizione gratuita per tutti gli ordini superiori a 50€.
                    </p>
                    <a href="#contact" class="button style2 down"></a>
                </div>
                </div>
        </div>
    </section>

    <section id="contact" class="main style3 secondary">
        <div class="content">
            <header>
                <h2>Hai domande? Siamo qui per aiutarti.</h2>
                <p>
                    Contattaci per qualsiasi informazione o richiesta speciale. Siamo pronti a
                    realizzare la tua candela perfetta.
                </p>
            </header>
            <div class="box">
                <form method="post" action="#">
                    <div class="fields">
                        <div class="field half">
                            <input type="text" name="name" placeholder="Name" />
                        </div>
                        <div class="field half">
                            <input type="email" name="email" placeholder="Email" />
                        </div>
                        <div class="field">
                            <textarea name="message" placeholder="Message" rows="6"></textarea>
                        </div>
                    </div>
                    <ul class="actions special">
                        <li><input type="submit" value="Send Message" /></li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
@endsection