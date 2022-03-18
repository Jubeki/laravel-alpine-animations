@props([
    'values',
    'startAt' => 0,
    'initDelay' => 700,
    'deletingDelay' => 70,
    'typingDelay' => 100,
    'startDeletingDelay' => 1200,
    'startTypingDelay' => 300,
    'toggleCursorDelay' => 375,
    'cursor' => 'border-r-4',
    'cursorHidden' => 'border-transparent',
    'cursorShown' => 'border-black',
])

<span
    @if($cursor !== false)
        {{ $attributes->class($cursor.' '.$cursorHidden) }}
        :class="{
            '{{ $cursorHidden }}': !showCursor,
            '{{ $cursorShown }}': showCursor,
        }"
    @else
        {{ $attributes }}
    @endif
    x-text="text"
    x-data="{
        showCursor: false,
        values: @js($values),
        current: @js($startAt),
        text: @js($values[$startAt]),
        initDelay: {{ $initDelay }},
        deletingDelay: {{ $deletingDelay }},
        typingDelay: {{ $typingDelay }},
        startDeletingDelay: {{ $startDeletingDelay }},
        startTypingDelay: {{ $startTypingDelay }},
        @if($cursor !== false)
        toggleCursorDelay: {{ $toggleCursorDelay }},
        toggleCursor() {
            this.showCursor = !this.showCursor
        },
        @endif
        type() {
            this.text = this.values[this.current].substring(0, this.text.length + 1)

            if(this.text === this.values[this.current]) {
                setTimeout(() => this.delete(), this.startDeletingDelay)
            } else {
                setTimeout(() => this.type(), this.typingDelay)
            }
        },
        delete() {
            this.text = this.text.slice(0, -1)

            if(this.text === '') {
                this.current = (this.current + 1) % this.values.length
                this.current_curr = 0

                setTimeout(() => this.type(), this.startTypingDelay)
            } else {
                setTimeout(() => this.delete(), this.deletingDelay)
            }
        },
        init() {
            setTimeout(() => this.delete(), this.initDelay)
            @if($cursor !== false)
            setInterval(() => this.toggleCursor(), this.toggleCursorDelay)
            @endif
        },
    }"
>{{ $values[$startAt] }}</span>
