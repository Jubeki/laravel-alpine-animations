@props([
    'as' => 'button',
    'innerClass' => '',
    'translateXMultiplier' => 0.7,
    'translateYMultiplier' => 0.7,
])

<{{ $as }}
    x-data="{
        translateXMultiplier: {{ $translateXMultiplier }},
        translateYMultiplier: {{ $translateYMultiplier }},

        move(e) {
            const position = this.$root.getBoundingClientRect()

            const translateX = (e.x - position.left - position.width / 2) * this.translateXMultiplier
            const translateY = (e.y - position.top - position.height / 2) * this.translateYMultiplier

            this.$root.children[0].style.transform = `translate(${translateX}px, ${translateY}px)`
        },

        reset(e) {
            this.$root.children[0].style.transform = 'translate(0px, 0px)'
        },
    }"
    @@mousemove="move($event)"
    @@mouseout="reset($event)"
    {{ $attributes->class(['relative cursor-pointer'])}}
>
    <span class="{{ $innerClass }} relative m-10 transition-transform ease-out duration-1000">
        {{ $slot }}
    </span>
</{{ $as }}>
