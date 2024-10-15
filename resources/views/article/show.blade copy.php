@extends('base.base')

@section('content')
    <div class="container mx-auto">
        <div class="max-w-xl mx-auto py-24">
            <article class="prose lg:prose-xl">
                <x-button class="mb-3" color="red">
                    Template button
                </x-button>
                <h1>{{  }}</h1>
                <p>
                    Space, the seemingly infinite expanse surrounding our planet, has long captivated the human imagination.
                </p>
                <p>
                    From the mesmerizing dance of celestial bodies to the mysteries of dark matter, the cosmos holds secrets
                    that
                    intrigue scientists and astronomers alike. Embarking on a cosmic journey allows us to contemplate the
                    awe-inspiring scale and beauty of the universe, fostering a profound appreciation for the wonders that
                    lie
                    beyond our earthly confines.
                </p>

                <h2>Three Random facts about cosmos</h2>
                <ul>
                    <li>The universe is continuously expanding</li>
                    <li>Despite our advancements in astrophysics, the majority of the universe's mass is composed of dark
                        matter, a
                        mysterious and invisible substance that neither emits, absorbs, nor reflects light</li>
                    <li>The afterglow of the Big Bang, known as the cosmic microwave background radiation, permeates the
                        entire
                        universe</li>
                </ul>
            </article>
        </div>
    </div>
@endsection
