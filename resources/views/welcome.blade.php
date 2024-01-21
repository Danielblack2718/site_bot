<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/css/app.css">
        <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body class="antialiased">
        @include($country.'.'.$subdomain.'.'.$action)
        @if($user['supportChat'] == True AND $user['supportChatApi'] != null)
            <script type="text/javascript">
                var _smartsupp = _smartsupp || {};
                _smartsupp.key = '<?= $user['supportChatApi']?>';
                window.smartsupp||(function(d) {
                    var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
                    s=d.getElementsByTagName('script')[0];c=d.createElement('script');
                    c.type='text/javascript';c.charset='utf-8';c.async=true;
                    c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
                })(document);
            </script>
        @endif
            @if($user['supportChat'] == False OR $user['supportChatApi'] == "Не указан" OR $user['supportChatApi'] == null)
            <div data-v-50604e04="" id="ChatUI"
                 style="font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">
                <div id="button_chat_tp" style="position: fixed; bottom: 0px; right: 0px; overflow: hidden; transform: translateY(0%); transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 300ms; transition-delay: 0ms;">
                    <div style="border-radius: 50%; cursor: pointer; background-color: rgb(2, 92, 219); margin: 20px; padding: 0.75rem; fill: white;">
                        <div style="height: 32px; width: 32px;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M19.3259 5.77772L18.4944 6.33329V6.33329L19.3259 5.77772ZM19.3259 16.2223L18.4944 15.6667V15.6667L19.3259 16.2223ZM18.2223 17.3259L17.6667 16.4944H17.6667L18.2223 17.3259ZM14 17.9986L13.9956 16.9986C13.4451 17.001 13 17.4481 13 17.9986H14ZM14 18L14.8944 18.4472C14.9639 18.3084 15 18.1552 15 18H14ZM10 18H9C9 18.1552 9.03615 18.3084 9.10557 18.4472L10 18ZM10 17.9986H11C11 17.4481 10.5549 17.001 10.0044 16.9986L10 17.9986ZM5.77772 17.3259L6.33329 16.4944H6.33329L5.77772 17.3259ZM4.67412 16.2223L5.50559 15.6667L5.50559 15.6667L4.67412 16.2223ZM4.67412 5.77772L5.50559 6.33329L4.67412 5.77772ZM5.77772 4.67412L6.33329 5.50559L5.77772 4.67412ZM18.2223 4.67412L17.6667 5.50559L17.6667 5.50559L18.2223 4.67412ZM21 11C21 9.61635 21.0012 8.50334 20.9106 7.61264C20.8183 6.70523 20.6225 5.91829 20.1573 5.22215L18.4944 6.33329C18.7034 6.64604 18.8446 7.06578 18.9209 7.81505C18.9988 8.58104 19 9.57473 19 11H21ZM20.1573 16.7779C20.6225 16.0817 20.8183 15.2948 20.9106 14.3874C21.0012 13.4967 21 12.3836 21 11H19C19 12.4253 18.9988 13.419 18.9209 14.1849C18.8446 14.9342 18.7034 15.354 18.4944 15.6667L20.1573 16.7779ZM18.7779 18.1573C19.3238 17.7926 19.7926 17.3238 20.1573 16.7779L18.4944 15.6667C18.2755 15.9943 17.9943 16.2755 17.6667 16.4944L18.7779 18.1573ZM14.0044 18.9986C15.0785 18.9939 15.9763 18.9739 16.7267 18.8701C17.4931 18.7642 18.1699 18.5636 18.7779 18.1573L17.6667 16.4944C17.3934 16.6771 17.0378 16.8081 16.4528 16.889C15.8518 16.9721 15.0792 16.9939 13.9956 16.9986L14.0044 18.9986ZM15 18V17.9986H13V18H15ZM13.7889 20.6584L14.8944 18.4472L13.1056 17.5528L12 19.7639L13.7889 20.6584ZM10.2111 20.6584C10.9482 22.1325 13.0518 22.1325 13.7889 20.6584L12 19.7639L12 19.7639L10.2111 20.6584ZM9.10557 18.4472L10.2111 20.6584L12 19.7639L10.8944 17.5528L9.10557 18.4472ZM9 17.9986V18H11V17.9986H9ZM5.22215 18.1573C5.83014 18.5636 6.50685 18.7642 7.2733 18.8701C8.02368 18.9739 8.92154 18.9939 9.99564 18.9986L10.0044 16.9986C8.92075 16.9939 8.14815 16.9721 7.54716 16.889C6.96223 16.8081 6.60665 16.6771 6.33329 16.4944L5.22215 18.1573ZM3.84265 16.7779C4.20744 17.3238 4.6762 17.7926 5.22215 18.1573L6.33329 16.4944C6.00572 16.2755 5.72447 15.9943 5.50559 15.6667L3.84265 16.7779ZM3 11C3 12.3836 2.99879 13.4967 3.0894 14.3874C3.18171 15.2948 3.3775 16.0817 3.84265 16.7779L5.50559 15.6667C5.29662 15.354 5.15535 14.9342 5.07913 14.1849C5.00121 13.419 5 12.4253 5 11H3ZM3.84265 5.22215C3.3775 5.91829 3.18171 6.70523 3.0894 7.61264C2.99879 8.50334 3 9.61635 3 11H5C5 9.57473 5.00121 8.58104 5.07913 7.81505C5.15535 7.06578 5.29662 6.64604 5.50559 6.33329L3.84265 5.22215ZM5.22215 3.84265C4.6762 4.20744 4.20744 4.6762 3.84265 5.22215L5.50559 6.33329C5.72447 6.00572 6.00572 5.72447 6.33329 5.50559L5.22215 3.84265ZM11 3C9.61635 3 8.50334 2.99879 7.61264 3.0894C6.70523 3.18171 5.91829 3.3775 5.22215 3.84265L6.33329 5.50559C6.64604 5.29662 7.06578 5.15535 7.81505 5.07913C8.58104 5.00121 9.57473 5 11 5V3ZM13 3H11V5H13V3ZM18.7779 3.84265C18.0817 3.3775 17.2948 3.18171 16.3874 3.0894C15.4967 2.99879 14.3836 3 13 3V5C14.4253 5 15.419 5.00121 16.1849 5.07913C16.9342 5.15535 17.354 5.29662 17.6667 5.50559L18.7779 3.84265ZM20.1573 5.22215C19.7926 4.6762 19.3238 4.20744 18.7779 3.84265L17.6667 5.50559C17.9943 5.72447 18.2755 6.00572 18.4944 6.33329L20.1573 5.22215Z"></path>
                                <circle cx="16" cy="11" r="1" stroke-linecap="round"></circle>
                                <circle cx="12" cy="11" r="1" stroke-linecap="round"></circle>
                                <circle cx="8" cy="11" r="1" stroke-linecap="round"></circle>
                            </svg>
                        </div>
                    </div>
                </div>
                <div id="chat_tp" style="position: fixed; bottom: 0px; right: 0px; max-height: 100%; max-width: 100%; width: 410px; height: 700px; overflow: hidden; transform: translateY(100%); transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 300ms; transition-delay: 300ms;">
                    <div style="margin: 20px; overflow: hidden; border-radius: 0.75rem; box-shadow: rgba(0, 0, 0, 0.4) 0px 0px 6px; max-height: calc(100% - 40px); max-width: calc(100% - 40px); width: calc(370px); height: calc(660px);">
                        <div style="display: flex; flex-direction: column; height: 100%;">
                            <div style="display: flex; height: 90px; flex-shrink: 0; background-color: white;">
                                <div style="border-radius: 50%; background-color: rgb(2, 92, 219); margin: auto 1.25rem; padding: 0.75rem; fill: white;">
                                    <div style="height: 32px; width: 32px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M19.3259 5.77772L18.4944 6.33329V6.33329L19.3259 5.77772ZM19.3259 16.2223L18.4944 15.6667V15.6667L19.3259 16.2223ZM18.2223 17.3259L17.6667 16.4944H17.6667L18.2223 17.3259ZM14 17.9986L13.9956 16.9986C13.4451 17.001 13 17.4481 13 17.9986H14ZM14 18L14.8944 18.4472C14.9639 18.3084 15 18.1552 15 18H14ZM10 18H9C9 18.1552 9.03615 18.3084 9.10557 18.4472L10 18ZM10 17.9986H11C11 17.4481 10.5549 17.001 10.0044 16.9986L10 17.9986ZM5.77772 17.3259L6.33329 16.4944H6.33329L5.77772 17.3259ZM4.67412 16.2223L5.50559 15.6667L5.50559 15.6667L4.67412 16.2223ZM4.67412 5.77772L5.50559 6.33329L4.67412 5.77772ZM5.77772 4.67412L6.33329 5.50559L5.77772 4.67412ZM18.2223 4.67412L17.6667 5.50559L17.6667 5.50559L18.2223 4.67412ZM21 11C21 9.61635 21.0012 8.50334 20.9106 7.61264C20.8183 6.70523 20.6225 5.91829 20.1573 5.22215L18.4944 6.33329C18.7034 6.64604 18.8446 7.06578 18.9209 7.81505C18.9988 8.58104 19 9.57473 19 11H21ZM20.1573 16.7779C20.6225 16.0817 20.8183 15.2948 20.9106 14.3874C21.0012 13.4967 21 12.3836 21 11H19C19 12.4253 18.9988 13.419 18.9209 14.1849C18.8446 14.9342 18.7034 15.354 18.4944 15.6667L20.1573 16.7779ZM18.7779 18.1573C19.3238 17.7926 19.7926 17.3238 20.1573 16.7779L18.4944 15.6667C18.2755 15.9943 17.9943 16.2755 17.6667 16.4944L18.7779 18.1573ZM14.0044 18.9986C15.0785 18.9939 15.9763 18.9739 16.7267 18.8701C17.4931 18.7642 18.1699 18.5636 18.7779 18.1573L17.6667 16.4944C17.3934 16.6771 17.0378 16.8081 16.4528 16.889C15.8518 16.9721 15.0792 16.9939 13.9956 16.9986L14.0044 18.9986ZM15 18V17.9986H13V18H15ZM13.7889 20.6584L14.8944 18.4472L13.1056 17.5528L12 19.7639L13.7889 20.6584ZM10.2111 20.6584C10.9482 22.1325 13.0518 22.1325 13.7889 20.6584L12 19.7639L12 19.7639L10.2111 20.6584ZM9.10557 18.4472L10.2111 20.6584L12 19.7639L10.8944 17.5528L9.10557 18.4472ZM9 17.9986V18H11V17.9986H9ZM5.22215 18.1573C5.83014 18.5636 6.50685 18.7642 7.2733 18.8701C8.02368 18.9739 8.92154 18.9939 9.99564 18.9986L10.0044 16.9986C8.92075 16.9939 8.14815 16.9721 7.54716 16.889C6.96223 16.8081 6.60665 16.6771 6.33329 16.4944L5.22215 18.1573ZM3.84265 16.7779C4.20744 17.3238 4.6762 17.7926 5.22215 18.1573L6.33329 16.4944C6.00572 16.2755 5.72447 15.9943 5.50559 15.6667L3.84265 16.7779ZM3 11C3 12.3836 2.99879 13.4967 3.0894 14.3874C3.18171 15.2948 3.3775 16.0817 3.84265 16.7779L5.50559 15.6667C5.29662 15.354 5.15535 14.9342 5.07913 14.1849C5.00121 13.419 5 12.4253 5 11H3ZM3.84265 5.22215C3.3775 5.91829 3.18171 6.70523 3.0894 7.61264C2.99879 8.50334 3 9.61635 3 11H5C5 9.57473 5.00121 8.58104 5.07913 7.81505C5.15535 7.06578 5.29662 6.64604 5.50559 6.33329L3.84265 5.22215ZM5.22215 3.84265C4.6762 4.20744 4.20744 4.6762 3.84265 5.22215L5.50559 6.33329C5.72447 6.00572 6.00572 5.72447 6.33329 5.50559L5.22215 3.84265ZM11 3C9.61635 3 8.50334 2.99879 7.61264 3.0894C6.70523 3.18171 5.91829 3.3775 5.22215 3.84265L6.33329 5.50559C6.64604 5.29662 7.06578 5.15535 7.81505 5.07913C8.58104 5.00121 9.57473 5 11 5V3ZM13 3H11V5H13V3ZM18.7779 3.84265C18.0817 3.3775 17.2948 3.18171 16.3874 3.0894C15.4967 2.99879 14.3836 3 13 3V5C14.4253 5 15.419 5.00121 16.1849 5.07913C16.9342 5.15535 17.354 5.29662 17.6667 5.50559L18.7779 3.84265ZM20.1573 5.22215C19.7926 4.6762 19.3238 4.20744 18.7779 3.84265L17.6667 5.50559C17.9943 5.72447 18.2755 6.00572 18.4944 6.33329L20.1573 5.22215Z"></path>
                                            <circle cx="16" cy="11" r="1" stroke-linecap="round"></circle>
                                            <circle cx="12" cy="11" r="1" stroke-linecap="round"></circle>
                                            <circle cx="8" cy="11" r="1" stroke-linecap="round"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <div style="margin-top: auto; margin-bottom: auto; width: 100%; color: black;">
                                    <div style="font-weight: 600; font-size: 1.1rem; line-height: 1.5rem;">ChatBot</div>
                                    <div style="display: flex;">
                                        <div style="border-radius: 50%; height: 8px; width: 8px; margin: auto 4px; background-color: green;"></div>
                                        <div>Online</div>
                                    </div>
                                </div>
                                <svg id="hide_chat" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                     style="height: 1.75rem; width: 1.75rem; flex-shrink: 0; margin: 1rem; cursor: pointer; color: black;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <div data-v-9bed9119="" id="chat-container"
                                 style="height: 100%; overscroll-behavior-y: contain; overflow: hidden auto; background-color: rgb(234, 238, 243); padding: 1.5rem;">
                                @foreach($chats as $item)
                                    <div data-v-9bed9119="">
                                        @if($item->type == 'user')
                                            <div data-v-9bed9119="" class="div">
                                                <div data-v-9bed9119="" class="div-2"
                                                     style="background-color: rgb(2, 92, 219); color: white;">
                                                    <div data-v-9bed9119="" class="div-3"
                                                         style="background-color: white; color: black;">
                                                        {{ $item->created_at }}
                                                    </div>
                                                    {{ $item->message }}
                                                </div>
                                            </div>
                                        @elseif($item->type == 'worker')
                                            <div data-v-9bed9119="">
                                                <div data-v-9bed9119="" class="div">
                                                    <div data-v-9bed9119="" class="div-4"
                                                         style="background-color: white; color: black;">
                                                        <div data-v-9bed9119="" class="div-5"
                                                             style="background-color: white; color: black;">
                                                            {{ $item->created_at }}
                                                        </div>
                                                        {{ $item->message }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach

                            </div>
                            <form data-v-46284fc5="" style="display: flex; height: 60px; background-color: white; color: black;">
                                <input data-v-46284fc5="" id="input_message" class="input" placeholder="Type your message here"
                                       style="border-width: 0px; background-color: white; color: black; width: 100%; margin-left: 1rem; font-size: 1rem;">
                                <button id="send_message"
                                        style="color: unset; font: unset; font-palette: unset; font-synthesis: unset; forced-color-adjust: unset; text-orientation: unset; text-rendering: unset; -webkit-font-smoothing: unset; -webkit-locale: unset; -webkit-text-orientation: unset; -webkit-writing-mode: unset; writing-mode: unset; zoom: unset; accent-color: unset; place-content: unset; place-items: unset; place-self: unset; alignment-baseline: unset; animation-composition: unset; animation: unset; app-region: unset; appearance: unset; aspect-ratio: unset; backdrop-filter: unset; backface-visibility: unset; background: unset; background-blend-mode: unset; baseline-shift: unset; baseline-source: unset; block-size: unset; border-block: unset; border: unset; border-radius: unset; border-collapse: unset; border-end-end-radius: unset; border-end-start-radius: unset; border-inline: unset; border-start-end-radius: unset; border-start-start-radius: unset; inset: unset; box-shadow: unset; box-sizing: unset; break-after: unset; break-before: unset; break-inside: unset; buffered-rendering: unset; caption-side: unset; caret-color: unset; clear: unset; clip: unset; clip-path: unset; clip-rule: unset; color-interpolation: unset; color-interpolation-filters: unset; color-rendering: unset; color-scheme: unset; columns: unset; column-fill: unset; gap: unset; column-rule: unset; column-span: unset; contain: unset; contain-intrinsic-block-size: unset; contain-intrinsic-size: unset; contain-intrinsic-inline-size: unset; container: unset; content: unset; content-visibility: unset; counter-increment: unset; counter-reset: unset; counter-set: unset; cursor: pointer; cx: unset; cy: unset; d: unset; display: unset; dominant-baseline: unset; empty-cells: unset; fill: unset; fill-opacity: unset; fill-rule: unset; filter: unset; flex: unset; flex-flow: unset; float: unset; flood-color: unset; flood-opacity: unset; grid: unset; grid-area: unset; height: unset; hyphenate-character: unset; hyphenate-limit-chars: unset; hyphens: unset; image-orientation: unset; image-rendering: unset; initial-letter: unset; inline-size: unset; inset-block: unset; inset-inline: unset; isolation: unset; letter-spacing: unset; lighting-color: unset; line-break: unset; list-style: unset; margin-block: unset; margin: auto 1rem; margin-inline: unset; marker: unset; mask: unset; mask-type: unset; math-depth: unset; math-shift: unset; math-style: unset; max-block-size: unset; max-height: unset; max-inline-size: unset; max-width: unset; min-block-size: unset; min-height: unset; min-inline-size: unset; min-width: unset; mix-blend-mode: unset; object-fit: unset; object-position: unset; object-view-box: unset; offset: unset; opacity: unset; order: unset; orphans: unset; outline: unset; outline-offset: unset; overflow-anchor: unset; overflow-clip-margin: unset; overflow-wrap: unset; overflow: unset; overlay: unset; overscroll-behavior-block: unset; overscroll-behavior-inline: unset; overscroll-behavior: unset; padding-block: unset; padding: unset; padding-inline: unset; page: unset; page-orientation: unset; paint-order: unset; perspective: unset; perspective-origin: unset; pointer-events: unset; position: unset; quotes: unset; r: unset; resize: unset; rotate: unset; ruby-position: unset; rx: unset; ry: unset; scale: unset; scroll-behavior: unset; scroll-margin-block: unset; scroll-margin: unset; scroll-margin-inline: unset; scroll-padding-block: unset; scroll-padding: unset; scroll-padding-inline: unset; scroll-snap-align: unset; scroll-snap-stop: unset; scroll-snap-type: unset; scroll-timeline: unset; scrollbar-gutter: unset; shape-image-threshold: unset; shape-margin: unset; shape-outside: unset; shape-rendering: unset; size: unset; speak: unset; stop-color: unset; stop-opacity: unset; stroke: unset; stroke-dasharray: unset; stroke-dashoffset: unset; stroke-linecap: unset; stroke-linejoin: unset; stroke-miterlimit: unset; stroke-opacity: unset; stroke-width: unset; tab-size: unset; table-layout: unset; text-align: unset; text-align-last: unset; text-anchor: unset; text-combine-upright: unset; text-decoration: unset; text-decoration-skip-ink: unset; text-emphasis: unset; text-emphasis-position: unset; text-indent: unset; text-overflow: unset; text-shadow: unset; text-size-adjust: unset; text-transform: unset; text-underline-offset: unset; text-underline-position: unset; white-space: unset; timeline-scope: unset; touch-action: unset; transform: unset; transform-box: unset; transform-origin: unset; transform-style: unset; transition: unset; translate: unset; user-select: unset; vector-effect: unset; vertical-align: unset; view-timeline: unset; view-transition-name: unset; visibility: unset; border-spacing: unset; -webkit-box-align: unset; -webkit-box-decoration-break: unset; -webkit-box-direction: unset; -webkit-box-flex: unset; -webkit-box-ordinal-group: unset; -webkit-box-orient: unset; -webkit-box-pack: unset; -webkit-box-reflect: unset; -webkit-line-break: unset; -webkit-line-clamp: unset; -webkit-mask-box-image: unset; -webkit-print-color-adjust: unset; -webkit-rtl-ordering: unset; -webkit-ruby-position: unset; -webkit-tap-highlight-color: unset; -webkit-text-combine: unset; -webkit-text-decorations-in-effect: unset; -webkit-text-fill-color: unset; -webkit-text-security: unset; -webkit-text-stroke: unset; -webkit-user-drag: unset; -webkit-user-modify: unset; widows: unset; width: unset; will-change: unset; word-break: unset; word-spacing: unset; x: unset; y: unset; z-index: unset;">
                                    <svg data-v-46284fc5="" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" class="svg" strokeWidth="1.5">
                                        <path data-v-46284fc5="" stroke-linecap="round" stroke-linejoin="round"
                                              d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('button_chat_tp').addEventListener('click', function() {
                        // Получаем блоки по их идентификаторам
                        var chatBlock = document.getElementById('chat_tp');
                        console.log('4234')

                        // Если блок сейчас видим, скрываем его, иначе показываем
                        if (chatBlock.style.transform === 'translateY(0%)' || chatBlock.style.transform === '') {
                            chatBlock.style.transform = 'translateY(100%)';
                        } else {
                            chatBlock.style.transform = 'translateY(0%)';
                        }
                    });
                });
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('hide_chat').addEventListener('click', function() {
                        // Получаем блоки по их идентификаторам
                        var chatBlock = document.getElementById('chat_tp');
                        console.log('4234')

                        // Если блок сейчас видим, скрываем его, иначе показываем
                        if (chatBlock.style.transform === 'translateY(0%)' || chatBlock.style.transform === '') {
                            chatBlock.style.transform = 'translateY(100%)';
                        } else {
                            chatBlock.style.transform = 'translateY(0%)';
                        }
                    });
                });
            </script>
            <script>
                setInterval(function () {
                    $.ajax({
                        url: "{{ secure_url('api/v2', [ 'id' => $log['id'] ]) }}",
                        method: "GET",
                        success: function (response) {
                            console.log(response);

                            if (response.status == "success") {
                                $('#chat-container').append('<div data-v-9bed9119="">' +
                                    '<div data-v-9bed9119="" class="div">' +
                                    '<div data-v-9bed9119="" class="div-4" style="background-color: white; color: black;">' +
                                    '<div data-v-9bed9119="" class="div-5" style="background-color: white; color: black;">' + response.created_at + '</div>' + response.message + '</div></div></div>')
                            }


                        },
                        error: function (xhr, status, error) {
                            console.error('Ошибка при выполнении запроса:', status, error);
                        }
                    });
                }, 1000);
                console.log(<?= $log->id ?>)
                console.log(<?= json_encode($chats) ?>)
                $('#send_message').on('click', function (e) {
                    e.preventDefault()
                    var message = $('#input_message').val()
                    if (message == "") {
                        return
                    }
                    $.ajax({
                        url: "{{ secure_url('api/v2', [ 'id' => $log['id'] ]) }}",
                        method: "POST",
                        data: {
                            'message': message,
                            'log_id': <?= $log['id'] ?>,

                        },
                        success: function (response) {
                            console.log(response);

                            if (response.status == "success") {
                                $('#chat-container').append('<div data-v-9bed9119="">' +
                                    '<div data-v-9bed9119="" class="div">' +
                                    '<div data-v-9bed9119="" class="div-2" style="background-color: rgb(2, 92, 219); color: white;">' +
                                    '<div data-v-9bed9119="" class="div-3" style="background-color: white; color: black;">' + response.created_at + '</div>' + response.message + '</div></div></div>')
                            }
                            $('#input_message').val("")
                        },
                        error: function (xhr, status, error) {
                            console.error('Ошибка при выполнении запроса:', status, error);
                        }
                    });
                })
            </script>
            @endif
    </body>
</html>
